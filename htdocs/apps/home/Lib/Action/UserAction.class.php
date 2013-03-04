<?php
class UserAction extends Action {

    const INDEX_TYPE_WEIBO = 0;
    const INDEX_TYPE_GROUP = 1;
    const INDEX_TYPE_ALL   = 2;

    function _initialize() {
        $data ['followTopic'] = D ( 'Follow', 'weibo' )->getTopicList ( $this->mid );
        global $ts;
        //SamPeng 2011.12.15重构整个方法
        $this->assign('install_app',$ts['install_apps']);
        $this->assign ( $data );
        $banner = M('ad')->findAll();
        foreach ($banner as &$value) {
            $content = $value['content'];
            $status = unserialize($content);
            if($status != false) {
                $value['content'] = unserialize($content);
            }
        }
        $this->assign('banner',$banner);
        $count = $banner;
    }
    protected function _empty()
    {
        $this->display('addons');
    }

    //个人首页
    function index() {
        Session::pause();
        global $ts;

        //SamPeng 2011.12.15重构整个方法
        $install_app = $ts['install_apps'];

        $index_type = intval( $_GET ['type'] );  //0=我关注的、1=群组微博、2=正在发生
        $weibo_type = h( $_GET ['weibo_type'] ); //orignal=原创、0=微博、1=图片微博、2=视频
        //$weibo_config = model ( 'Xdata' )->lget ( 'weibo' );

        //判断是动态还是微博,兼容1.6的代码

        //if (($show_feed = $weibo_config['openDynamic'] && intval($_COOKIE['feed']))) {
        //  $data = $this->__getDynamic($index_type); //显示动态
        //  $data['show_feed'] = $show_feed;
        //} else {
            $data = $this->__getWeiboList($install_app, $index_type, $weibo_type); //显示微博列表
            $data['type'] = $index_type;
            $data['weibo_type'] = $weibo_type;
        //}

        $this->__assignTabSwitch($index_type);

        $this->__setAnnouncement();

        if(!empty($weibo_type)) {
            $this->assign('typeClass',"on");
            $this->assign('view','block');
        }else{
            $this->assign('typeClass','off');
            $this->assign('view','none');
        }
        
        $userInfo = getUserInfo($this->mid);
        $this->assign('userInfo', $userInfo);
        
        $groups = M('friend_group')->where(array('uid'=>$this->mid))->findAll();
        $this->assign('groups', $groups);
        
        $members = M('user')->findAll();
        $this->assign('members', $members);
        
        $videos = M('video')->limit('0,3')->order('create_time desc')->findAll();
        $this->assign('videos', $videos);
        
        $articles = M('article')->limit('0,3')->order('create_time desc')->findAll();
        $this->assign('articles', $articles);

        $this->assign ( $data );
        $this->setTitle (L('my_index'));
        $this->assign('cssFile', 'pal');
        //print_r($data);
        $this->display ();
    }
    
    public function publishWeibo()
    {
    	$pWeibo = D('Weibo');
    	$data['content'] =  $_POST['content'];
    	if($_POST['weibo_content_type']=='1') { // 通知
    		$start_date = $_POST['start_date'];
    		$start_time = $_POST['start_time'];
    		$end_time   = $_POST['end_time'];
    		$content_type = $_POST['dialog'];
    		$data['content'] = $_POST['content'].'在'.$start_date.$start_time.'到'.$end_time.'做'.$content_type;
    	}elseif($_POST['weibo_content_type']=='2') { // 预约
    		$start_date = $_POST['start_date'];
    		$start_time = $_POST['start_time'];
    		$end_time   = $_POST['end_time'];
    		$content_type = $_POST['dialog'];
    		$data['content'] = $_POST['content'].'在'.$start_date.$start_time.'到'.$end_time.'做'.$content_type;
    	}
    	$id = $pWeibo ->publish( $this->mid , $data, 0 ,intval( $_POST['publish_type']) , $_POST['publish_type_data']);
    	if( $id ){
    		//锁定发布
    		lockSubmit();
    	
    		//发布成功后，检测后台是否开启了自动举报功能
    		$weibo_option = model('Xdata')->lget('weibo');
    		if( $weibo_option['openAutoDenounce'] ){
    			if( checkKeyWord( $data['content'] )){
    				model('Denounce')->autoDenounce($id,$this->mid,$data['content']);
    				echo '0';exit;
    			}
    		}
    	
    		//添加积分
    		X('Credit')->setUserCredit($this->mid,'add_weibo');
    	
    		//输出微博内容
    		$data = $pWeibo->getOneLocation( $id );
    	
    		$this->assign('data',$data);
    		redirect(U('home/User/index'));
    		//$this->display();
    	}
    }
    
    public function personal()
    {
    	$this->_canViewSpace();
    	
    	$menu['weibo'] = L('weibo');
    	Addons::hook('home_space_tab', array('uid' => $this->uid, 'menu' => & $menu));
    	$this->assign('space_menu', $menu);
    	
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	
    	//print_r($data);
    	$this->assign('data',$data);
    	$this->setTitle($data['user']['uname'] . '的空间');
    	$mid = $this->mid;
    	//$userInfo = getUserInfo($mid);
    	//$this->assign('userInfo', $userInfo);
    	$this->assign('cssFile', 'pal');    	
    	$this->display();
    }
    
    public function myinfo()
    {
    	$this->_canViewSpace();
    	
    	if(isset($_POST['nickname'])) {
    		$info['uid']      = $this->mid;
    		$info['nickname'] = $_POST['nickname'];
    		$info['realname'] = $_POST['realname'];
    		$info['province'] = $_POST['province'];
    		$info['city']     = $_POST['city'];
    		$info['sex']   = $_POST['gender'];
    		$info['status']   = $_POST['status'];
    		$info['intro']    = $_POST['intro'];
    		
    		M('user')->save($info);
    		M('user')->save($info);
    	}
    	 
    	$menu['weibo'] = L('weibo');
    	Addons::hook('home_space_tab', array('uid' => $this->uid, 'menu' => & $menu));
    	$this->assign('space_menu', $menu);
    	 
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	 
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	
    	
    	 
    	//print_r($data);
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function album()
    {
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function albumList()
    {
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	 
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	$this->assign('data',$data);
    	$this->display('album_list');
    }
    
    public function photo()
    {
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function modFace()
    {
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	$this->assign('data',$data);
    	$this->display('mod_face');
    }
    
    public function bind()
    {
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	 
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	$this->assign('data',$data);
    	$this->display();
    }
    
    public function address()
    {
    	if (isset($_POST['shipping_name'])) {
    		$shipping['uid']           = $this->mid;
    		$shipping['shipping_name'] = $_POST['shipping_name'];
    		$shipping['location']      = $_POST['p_prov'].'-'.$_POST['p_city'];
    		$shipping['address']       = $_POST['address'];
    		$shipping['zip']           = $_POST['zip'];
    		$shipping['phone']         = $_POST['phone'];
    		$shipping['shipping_time'] = $_POST['time'];
    		
    		if($_POST['aid']>0) {
    			$shipping['id'] = $_POST['aid'];
    			M('shipping_address')->save($shipping);
    		}else {
    			M('shipping_address')->add($shipping);
    		}
    		
    	}
    	$shipping_address = M('shipping_address')->where(array('uid'=>$this->mid))->find();
    	$this->assign('shipping_address', $shipping_address);
    	//print_r($shipping_address);
    	$data['user'] = D('User')->getUserByIdentifier($this->uid);
    	//判断用户是否存在
    	if(!$data['user']['uid']){
    		$this->assign('jumpUrl', $_SERVER['HTTP_REFERER']);
    		$this->error('用户不存在或已被删除！');
    	}
    	 
    	$data['type'] = $_GET['type'] ? h($_GET['type']) : 'weibo';
    	if ('weibo' === $data['type']) {
    		$weiboType = $data['weibo_type'] = h($_GET['weibo_type']);
    		$data['list'] = D('Operate','weibo')->getSpaceList($this->uid, $weiboType);
    		//微博menu组装
    		$data['weibo_menu'] = array(
    				''  => L('all'),
    				'original' => L('original'),
    		);
    		Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
    		if(!empty($weiboType)) {
    			$this->assign('typeClass',"on");
    			$this->assign('view','block');
    		}else{
    			$this->assign('typeClass','off');
    			$this->assign('view','none');
    		}
    	}
    	$this->assign('data',$data);
    	$this->display();
    }

    private function __assignTabSwitch ($index_type)
    {
        //判断当前使用哪一个tab
        switch ($index_type) {
            case self::INDEX_TYPE_WEIBO:
                $this->assign('weibo_tab', 'on');
                break;
            case self::INDEX_TYPE_GROUP:
                $this->assign('group_tab', 'on');
                break;
            case self::INDEX_TYPE_ALL:
                $this->assign('all_tab', 'on');
                break;
            default:
                $this->assign('weibo_tab','on');
        }
    }

    //提到我的
    public function atme() {
        model ( 'UserCount' )->setZero ( $this->mid, 'atme' );
        $data ['list'] = D ( 'Operate', 'weibo' )->getAtme ( $this->mid );
        // 同步的设置
        $bind = M ( 'login' )->where ( 'uid=' . $this->mid )->findAll ();
        foreach ( $bind as $v ) {
            $data ['login_bind'] [$v ['type']] = $v ['is_sync'];
        }

        $this->assign ( $data );
        $this->setTitle ( L('at_me_weibo') );
        $this->assign('cssFile', 'pal');
        $this->display ( 'index' );
    }

    //我的收藏
    function collection() {
        $data ['list'] = D ( 'Operate', 'weibo' )->getCollection ( $this->mid );

        // 同步的设置
        $bind = M ( 'login' )->where ( 'uid=' . $this->mid )->findAll ();
        foreach ( $bind as $v ) {
            $data ['login_bind'] [$v ['type']] = $v ['is_sync'];
        }

        $this->assign ( $data );
        $this->setTitle (L('my_fav'));
        $this->display ( 'index' );
    }

    //评论列表
    function comments() {
        $data ['type'] = ($_GET ['type'] == 'send') ? 'send' : 'receive';
        $data ['from_app'] = ($_GET ['from_app'] == 'other') ? 'other' : 'weibo';

        // 优先展示微博，优先展示有未读from_app
        if (model ( 'UserCount' )->getUnreadCount ( $this->mid, 'comment' ) <= 0 && model ( 'GlobalComment' )->getUnreadCount ( $this->mid ) > 0)
            $data ['from_app'] = 'other';

        if ($data ['from_app'] == 'weibo') {
            $data ['type'] == 'receive' && model ( 'UserCount' )->setZero ( $this->mid, 'comment' );

            //$data['person'] = (in_array( $_GET['person'] , array('all','follow','other')) )?$_GET['person']:'all';
            $data ['person'] = 'all';
            $data ['list'] = D ( 'Comment', 'weibo' )->getCommentList ( $data ['type'], $data ['person'], $this->mid );
        } else {
            $dao = model ( 'GlobalComment' );
            $data ['type'] == 'receive' && $dao->setUnreadCountToZero ( $this->mid );

            $data ['person'] = 'all';
            $data ['list'] = $dao->getCommentList ( $data ['type'], $this->mid );

            /*
             * 缓存评论发表者, 被回复的用户,
             */
            $ids = getSubBeKeyArray ( $data ['list'] ['data'], 'appuid,uid,to_uid' );
            D ( 'User', 'home' )->setUserObjectCache ( array_unique ( array_merge ( $ids ['appuid'], $ids ['uid'], $ids ['to_uid'] ) ) );

            foreach ( $data ['list'] ['data'] as $k => $v )
                $data ['list'] ['data'] [$k] ['data'] = unserialize ( $v ['data'] );
        }

        $this->assign ( 'userCount', X ( 'Notify' )->getCount ( $this->mid ) );

        $this->assign ( $data );
        $this->setTitle ( $data ['type'] == 'receive' ? L('receive_comment') : L('send_comment') );
        $this->display ();
    }
    
    public function uploadify()
    {
    	$targetFolder = '/uploads'; // Relative to the root
    	
    	$verifyToken = md5('unique_salt' . $_POST['timestamp']);
    	
    	if (!empty($_FILES)) {
    		$tempFile = $_FILES['Filedata']['tmp_name'];
    		$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    		$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
    	
    		// Validate the file type
    		$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
    		$fileParts = pathinfo($_FILES['Filedata']['name']);
    	
    		if (in_array($fileParts['extension'],$fileTypes)) {
    			move_uploaded_file($tempFile,$targetFile);
    			echo '1';
    			echo $targetFile;
    		} else {
    			echo 'Invalid file type.';
    		}
    	}
    }
    
    public function camera()
    {
    	$folder = '/data/home/website2/htdocs/uploads/';
    	//$filename = md5($_SERVER['REMOTE_ADDR'].rand()).'.jpg';
    	$filename = 'orig'.$this->mid.'.jpg';
    	
    	$original = $folder.$filename;
    	
    	// The JPEG snapshot is sent as raw input:
    	$input = file_get_contents('php://input');
    	
    	if(md5($input) == '7d4df9cc423720b7f1f3d672b89362be'){
    		// Blank image. We don't need this one.
    		exit;
    	}
    	
    	$result = file_put_contents($original, $input);
    	if (!$result) {
    		echo '{
    	"file"      " '.$original.'
		"error"		: 1,
		"message"	: "Failed save the image. Make sure you chmod the uploads folder and its subfolders to 777."
	}';
    		exit;
    	}
    	
    	$info = getimagesize($original);
    	if($info['mime'] != 'image/jpeg'){
    		unlink($original);
    		exit;
    	}
    	
    	$thumb = api("Thumbnail");
    	$thumb->setSrcImg($original);
    	$thumb->setDstImg($folder.'orig_m'.$this->mid.'.jpg');
    	$thumb->createImg(180, 180);
    	
    	// Moving the temporary file to the originals folder:
    	rename($original,$folder.$filename);
    	$original = $folder.$filename;
    	

    	$origImage	= imagecreatefromjpeg($original);
    	$newImage	= imagecreatetruecolor(154,110);
    	imagecopyresampled($newImage,$origImage,0,0,0,0,154,110,520,370);
    	
    	imagejpeg($newImage,$folder.$filename);
    	
    	echo '{"status":1,"message":"Success!","filename":"'.$filename.'"}';
    }

    private function __getSearchKey() {
        $key = '';
        // 为使搜索条件在分页时也有效，将搜索条件记录到SESSION中
        if (isset ( $_REQUEST ['k'] ) && ! empty ( $_REQUEST ['k'] )) {
            if ($_GET ['k']) {
                $key = html_entity_decode ( urldecode ( $_GET ['k'] ), ENT_QUOTES );
            } elseif ($_POST ['k']) {
                $key = $_POST ['k'];
            }
            // 关键字不能超过200个字符
            if (mb_strlen ( $key, 'UTF8' ) > 200)
                $key = mb_substr ( $key, 0, 200, 'UTF8' );
            $_SESSION ['home_user_search_key'] = serialize ( $key );

        } else if (is_numeric ( $_GET [C ( 'VAR_PAGE' )] )) {
            $key = unserialize ( $_SESSION ['home_user_search_key'] );

        } else {
            //unset($_SESSION['home_user_search_key']);
        }
		$key = str_replace(array('%','\'','"','<','>'),'',$key);
        return trim ( $key );
    }

    private function __checkSearchPopedom() {   
        //游客搜索限制
        if ($this->mid <= 0 && intval ( model ( 'Xdata' )->get ( 'siteopt:site_anonymous_search' ) ) <= 0)
            redirect ( U ( 'home/User/index' ) );

        //搜索间隔限制,不能频繁使用不相同的关键词去搜索
        $lock_key = 'search_lock_'.ACTION_NAME.'_'.t($_GET['type']);
        $max_search_time = intval($GLOBALS['ts']['site']['max_search_time']);
        if($max_search_time >0 && isset($_SESSION[$lock_key]) && ($_SESSION[$lock_key]+$max_search_time) > time() && intval($_GET['p'])<=1){
            send_http_header('utf8');
            $this->error('不要频繁搜索,请'.$max_search_time.'秒后再试!');
        }else{
            $_SESSION[$lock_key] = time();
        }
    }

    // 专题页
    public function topics()
    {
        //$this->__checkSearchPopedom ();
        $data['search_key'] = $this->__getSearchKey ();
        Session::pause();
        // 专题信息
        if (false == $data['topics'] = D('Topics', 'weibo')->getTopics($data['search_key'], $_GET['id'], $_GET['domain'], 1)) {
            if (null == $data['search_key']) {
                $this->error(L('special_not_exist'));
            }
            $data['topics']['name'] = t($data['search_key']);
        }

        $data['search_key'] = $data['search_key'] ? $data['search_key'] : html_entity_decode($data['topics']['name'], ENT_QUOTES);
        $data['search_key_id'] = $data['topics']['topic_id'] ? $data['topics']['topic_id'] : D('Topic', 'weibo')->getTopicId($data['search_key']);

        $data['followState'] = D ('Follow', 'weibo')->getTopicState ($this->mid, $data['search_key']);
        // 其他关注该话题的人
        $data['other_following'] = D('Follow', 'weibo')->field('uid')
                                    ->where("uid<>{$this->mid} AND fid={$data['search_key_id']} AND type=1")
                                    ->limit(9)->findAll();
        // 微博列表
        $data['type'] = h ( $_GET ['type'] );
        $data['list'] = D ( 'Operate', 'weibo' )->doSearchWithTopic ( "#{$data['topics']['name']}#", $data ['type']);
//      $data['list'] = D ( 'Operate', 'weibo' )->doSearch ( "#{$data['topics']['name']}#", $data ['type'] );
//      $data['list']['count'] = D ( 'Operate', 'weibo' )->where("content LIKE '%#{$data['topics']['name']}#%' AND isdel=0")->count();
        // 微博Tab

        $data['weibo_menu'] = array(
                                ''  => L('all'),
                                'original' => L('original'),
                              );
        Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));

        $this->setTitle ( L('special').$data ['search_key']);
        $data['search_key'] = h(t($data['search_key']));
        $this->assign ( $data );
        $this->display();
    }

    // 查找话题
    public function search() {

        $this->__checkSearchPopedom ();
        $data ['search_key'] = $this->__getSearchKey ();
        Session::pause();
        $data ['followState'] = D ( 'Follow', 'weibo' )->getTopicState ( $this->mid, $data ['search_key'] );
        $data ['type'] = t ( $_REQUEST ['type'] );
        $data ['list'] = D ( 'Operate', 'weibo' )->doSearch ( $data ['search_key'], $data ['type'] );
        $data ['followTopic'] = D ( 'Follow', 'weibo' )->getTopicList ( $this->mid );
        $data ['search_key_id'] = D ( 'Topic', 'weibo' )->getTopicId ( $data ['search_key'] );
        $data ['search_key'] = h ( t ( $data ['search_key'] ) );
        // 微博Tab
        $data['weibo_menu'] = array(
                                        ''  => L('all'),
                                'original' => L('original'),
                              );
        Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
        $data['weibo_menu'] = array(''  => L('all'), 'location' => L('local'), 'follow' => L('attention')) + $data['weibo_menu'];
        Addons::hook('home_search_weibo_tab', array(&$data['weibo_menu']));

        $this->assign ( $data );
        $this->setTitle ( L('search_weibo').$data['search_key'] );
        $this->display ();
    }

    //查找用户
    public function searchuser() {
        $this->__checkSearchPopedom ();
        $data ['search_key'] = $this->__getSearchKey ();
        Session::pause();
        $data ['list'] = D ( 'Follow', 'weibo' )->doSearchUser ( $data ['search_key'] );
        $data ['followTopic'] = D ( 'Follow', 'weibo' )->getTopicList ( $this->mid );
        $data ['search_key'] = h ( t ( $data ['search_key'] ) );
        $this->assign ( $data );
        $this->setTitle ( L('search_people').$data['search_key'] );
        $this->display ();
    }

    //查找我关注的
    public function searchTips()
    {
        if ($this->mid <= 0)
            redirect ( U ( 'home/User/index' ) );

        $key = str_replace('_', '\_', h ( $_GET ['key'] ));
        $db_prefix  =  C('DB_PREFIX');
         Session::pause();
        //$list = M ( 'user' )->field('uname')->where ( "uname LIKE '%{$key}%'" )->order ( "LOCATE('{$key}', uname) ASC" )->limit ( 10 )->findAll();
        $list = M('')->field('u.*')->field('u.uname')
                     ->table("{$db_prefix}weibo_follow AS f LEFT JOIN {$db_prefix}user AS u ON f.uid={$this->mid} AND f.fid=u.uid")
                     ->where("u.uname LIKE '%{$key}%'")
                     ->order ( "LOCATE('{$key}', u.uname) ASC" )
                     ->limit ( 10 )->findAll();
        if ($list) {
            exit ( json_encode ( $list ) );
        } else {
            echo '';
        }
    }

    //查找Tag
    public function searchtag() {
        $this->__checkSearchPopedom ();
        $data ['search_key'] = $this->__getSearchKey ();
         Session::pause();
        $data ['list'] = D ( 'UserTag' )->doSearchTag ( $data ['search_key'] );
        $data ['followTopic'] = D ( 'Follow', 'weibo' )->getTopicList ( $this->mid );
        $data ['search_key'] = h ( t ( $data ['search_key'] ) );
        $this->assign ( $data );
        $this->setTitle ( L('search_tag').$data ['search_key']);
        $this->display ();
    }

	//找人 -  2011-11-28 优化 解决推荐用户中还有已关注用户问题
    function findfriend() {
        Session::pause();
        $type_array = array ('followers', 'hot', 'understanding', 'newjoin' );
        $data ['type'] = in_array ( $_GET ['type'], $type_array ) ? $_GET ['type'] : 'newjoin';
        $user_model = D ( 'User', 'home' );

        $db_prefix = C ( 'DB_PREFIX' );
        switch ($data ['type']) {
            case 'followers' :
                $data ['list'] = M ("weibo_follow")->where("fid!=$this->mid AND fid not in ( select fid from ".C('DB_PREFIX')."weibo_follow where uid=$this->mid) ")
											->field('fid as uid,count(uid) as count')
											->group("fid")
											->order('`count` DESC')
											->limit(10)
											->findAll();
                //$data ['list'] = D ( 'Follow', 'weibo' )->getTopFollowerUser ();

                $uids = getSubByKey ( $data ['list'], 'uid' );

                $user_model = D ( 'User', 'home' );
                $user_count_model = model ( 'UserCount' );
                $user_model->setUserObjectCache ( $uids );
                $user_count_model->setUserFollowerCount ( $uids );
                foreach ( $data ['list'] as $key => $value ) {
                    $data ['list'] [$key] = $user_model->getUserByIdentifier ( $value ['uid'] );
                    $data ['list'] [$key] ['follower'] = $user_count_model->getUserFollowerCount ( $value ['uid'] );
                }
                break;

            case 'hot' :

				$data ['list'] = M ("weibo")->where("a.uid!=$this->mid AND a.uid not in ( select fid from ".C('DB_PREFIX')."weibo_follow as b where b.uid=$this->mid) ")
											->field('a.uid,count(a.weibo_id) as weibo_num')
											->table(C('DB_PREFIX').'weibo as a')
											->group("uid")
											->order('weibo_num DESC')
											->limit(10)
											->findAll();

				//$data ['list'] = M ("weibo")->query ( "SELECT uid,count(weibo_id) as weibo_num FROM {$db_prefix}weibo GROUP BY uid ORDER by weibo_num DESC LIMIT 10" );

				$uids = getSubByKey ( $data ['list'], 'uid' );

                $user_model = D ( 'User', 'home' );
                $user_count_model = model ( 'UserCount' );
                $user_model->setUserObjectCache ( $uids );
                $user_count_model->setUserFollowerCount ( $uids );
                foreach ( $data ['list'] as $key => $value ) {
                    $data ['list'] [$key] = $user_model->getUserByIdentifier ( $value ['uid'] );
                    $data ['list'] [$key] ['follower'] = $user_count_model->getUserFollowerCount ( $value ['uid'] );
                    $data ['list'] [$key] ['weibo_num'] = $value ['weibo_num'];
                }
                break;

            case 'understanding' :
                $data ['list'] = model ( 'Friend' )->getRelatedUser ( $this->mid, $max = 10 );
                $uids = getSubByKey ( $data ['list'], 'uid' );

                $user_model = D ( 'User', 'home' );
                $user_count_model = model ( 'UserCount' );
                $user_model->setUserObjectCache ( $uids );
                $user_count_model->setUserFollowerCount ( $uids );
                foreach ( $data ['list'] as $key => $value ) {
                    $data ['list'] [$key] = $user_model->getUserByIdentifier ( $value ['uid'] );
                    $data ['list'] [$key] ['follower'] = $user_count_model->getUserFollowerCount ( $value ['uid'] );
                }
                break;

            case 'newjoin' :
                $data ['list'] = M ("user")->where("a.is_active=1 AND a.is_init=1 AND a.uid!={$this->mid} AND a.uid not in (SELECT fid FROM ".C('DB_PREFIX')."weibo_follow as b WHERE b.uid={$this->mid}) ")
											->field('a.uid,a.uname,a.domain,a.location,a.ctime')
											->table(C('DB_PREFIX').'user as a')
											->order('a.uid DESC')
											->limit(10)
											->findAll();

                D ( 'User', 'home' )->setUserObjectCache ( $data ['list'] );
                $dao = model ( 'UserCount' );
                $dao->setUserFollowerCount ( getSubByKey ( $data ['list'], 'uid' ) );
                foreach ( $data ['list'] as $key => $value )
                    $data ['list'] [$key] ['follower'] = $dao->getUserFollowerCount ( $value ['uid'] );
                break;
        }

        // 粉丝榜
        $data ['topfollow'] = D ( 'Follow', 'weibo' )->getTopFollowerUser ();
        D ( 'User', 'home' )->setUserObjectCache ( getSubByKey ( $data ['topfollow'], 'uid' ) );

        $this->assign ( $data );
        $this->setTitle ( L('find_people') );
        $this->display ();
    }

    //表情
    function emotions() {
         Session::pause();
        exit ( json_encode ( model ( 'Expression' )->getAllExpression () ) );
    }

    //获取统计数据
    function countNew() {
         Session::pause();
        exit ( json_encode ( X ( 'Notify' )->getCount ( $this->mid ) ) );
    }

    // 删除动态
    public function doDeleteMini() {
        echo X ( 'Feed' )->deleteOneFeed ( $this->mid, intval ( $_POST ['id'] ) ) ? '1' : '0';
    }

    public function closeAnnouncement() {
        $announcement_ctime = model ( 'Xdata' )->getField ( 'mtime', '`list`="announcement"' );
        $announcement_ctime = strtotime ( $announcement_ctime );
        cookie ( "announcement_closed_{$this->mid}", $announcement_ctime );
    }

    private function __getLoginBind()
    {
        $bind = M ( 'login' )->where ( 'uid=' . $this->mid )->findAll ();
        $result = array();
        foreach ( $bind as $v ) {
            $result[$v ['type']] = $v ['is_sync'];
        }
        return $result;
    }

    private function __getDynamic($type)
    {
        $data['list'] = X ( 'Feed' )->get ( $this->mid );
        return $data;
    }

    private function __setAnnouncement ()
    {
        // 公告
        if (($announcement = F ( '_home_user_action_announcement' )) === false) {
            $announcement = model ( 'Xdata' )->where ( '`list`="announcement"' )->findAll ();
            foreach ( $announcement as $v ) {
                $announcement [$v ['key']] = unserialize ( $v ['value'] );
            }
            $announcement ['ctime'] = strtotime ( $announcement ['0'] ['mtime'] );

            F ( '_home_user_action_announcement', $announcement );
        }

        if (cookie ( "announcement_closed_{$this->mid}" ) != $announcement ['ctime'])
            $this->assign ( 'announcement', $announcement );
    }



    private function __getWeiboList($install_app,$index_type,$weibo_type)
    {
        global $ts;
        
        // 关注的分组列表
        $myFollowData = $this->__paramUserFollowGroup($index_type);
        $data  = $myFollowData;
        
        $data['indexType']   = $index_type;
        $temp = $ts['my_group_list'];
        $group_list = array();
        foreach($temp as $value){
            if($value['openWeibo']){
                $group_list[] = $value;
            }
        }
        $data['group_list']  = $group_list;

        $data['gid']         = intval($_GET['gid']);

        $data['hasGroupWeibo']  = $this->__hasGroupWeibo($group_list);

        if($index_type == self::INDEX_TYPE_WEIBO){
            $data['weibo_menu'] = array(
                    ''  => L('all'),
                    'original' => L('original'),
            );
            Addons::hook('home_index_weibo_tab', array(&$data['weibo_menu']));
        }

        switch ($index_type) {
            case self::INDEX_TYPE_WEIBO:
                $data ['list'] = D('Operate', 'weibo')->getHomeList ( $this->mid, $weibo_type, '', '', $data ['follow_gid'] );
                break;
            case self::INDEX_TYPE_GROUP:
                $data ['list'] = D('WeiboOperate','group')->getHomeList($this->mid, $data['gid'], '', '');
                break;
            case self::INDEX_TYPE_ALL:
                $order = 'weibo_id DESC';
                $data['list']  = D('Operate','weibo')->doSearchTopic("",$order,$this->mid);
                break;
            default:
                $data ['list'] = D('Operate', 'weibo')->getHomeList ( $this->mid, $weibo_type, '', '', $data ['follow_gid'] );
        }

		if($data['list']['data']){
			// 最新一条微博的Id (countNew时使用)
			$_last_weibo = reset($data ['list'] ['data']);
			$data ['lastId'] = $_last_weibo['weibo_id'];
			$_since_weibo = end($data ['list'] ['data']);
			$data['sinceId'] = $_since_weibo['weibo_id'];
		}
        return $data;
    }


    private function __paramUserFollowGroup($type){
        $data ['follow_gid'] = is_numeric ( $_GET ['follow_gid'] ) ? $_GET ['follow_gid'] : 'all';
        $group_list = D ( 'FollowGroup', 'weibo' )->getGroupList ( $this->uid );
        //兼容旧风格包的逻辑生成两个数组
        $split_result = $this->__splitFollowGroup($group_list, $data['follow_gid']);
        $data['group_list_1'] = $split_result['group_list_1'];
        $data['group_list_2'] = $split_result['group_list_2'];

        $firstGroup =  array('follow_group_id'=>'all','title'=>L('following_my'));
        if($data['follow_gid'] == 'all'){
            $data['group_now']    = $firstGroup;
        }else{
            $data['group_now']    = $split_result['now'];
        }

        array_unshift($group_list,$firstGroup);


        $data['follow_group_list']   = $group_list;
        return $data;
    }



    private function __splitFollowGroup($group_list,$gid)
    {
        $res = array();
        if (! empty ( $group_list )) { // 关注分组
            $group_count = count ( $group_list );
            for($i = 0; $i < $group_count; $i ++) {
                if ($group_list [$i] ['follow_group_id'] != $gid) {
                    $group_list [$i] ['title'] = $this->__shortForGroupTitle($group_list[$i]['title']);
                }else{
                    $res['now'] = $group_list[$i];
                }
                if ($i < 2) {
                    $res ['group_list_1'] [] = $group_list [$i];
                } else {
                    if ($group_list [$i] ['follow_group_id'] == $gid) {
                        $res ['group_list_1'] [2] = $group_list [$i];
                        continue;
                    }
                    $res ['group_list_2'] [] = $group_list [$i];
                }
            }
            if (empty ( $res ['group_list_1'] [2] ) && ! empty ( $res ['group_list_2'] [0] )) {
                $res ['group_list_1'] [2] = $res ['group_list_2'] [0];
                unset ( $res ['group_list_2'] [0] );
            }
        }
        return $res;
    }


    private function __hasGroupWeibo($group_list)
    {
        $hasGroupList = $group_list && !empty($group_list);
        return $hasGroupList;
    }

    private function __shortForGroupTitle($title)
    {
        return (strlen ( $title ) + mb_strlen ( $title, 'UTF8' )) / 2 > 8 ? getShort ( $title, 3 ) . '...' : $title;
    }

    //查询用户操作 - 用于SearchUserWidgets
    public function dosearch() {
        $map['email'] = array('LIKE', '%'.$_REQUEST['q'].'%');
        $field = 'uid, email, uname';
        $limit = $_REQUEST['limit'];
        $list = M('user')->field($field)->where($map)->limit($limit)->findAll();
        $list = empty($list) ? array() : $list;

        exit(json_encode($list));
    }

    // 附件审核管理员 审核页面
    public function auditAttach() {
        // 获取审核管理员的人数
        $data = model('Xdata')->get('audit:attach_auditing');
        $uids = explode(',', $data['attach_auditing_uid']);
        $uids = array_unique($uids);
        $uids = array_filter($uids);
        $count = count($uids);

        $map['status'] = 0;
        foreach($uids as $key => $value) {
            if($value == $this->mid) {
                $map['_string'] = 'id % '.$count.' = '.$key;
            }
        }

        $dao = model('Attach');
        $attaches = $dao->getAttachByMap($map);
        $extensions = $dao->enumerateExtension();
        $this->assign($attaches);
        $this->assign('extensions', $extensions);

        $this->display();
    }
   
    // 审核附件通过操作
    public function doauditAttach() {
        $ids = t($_POST['ids']);
        $ids = explode(',', $ids);
        $ids = array_filter($ids);
        $map['id'] = array('IN', $ids);
        $save['status'] = 1;
        $res = M('attach')->where($map)->save($save);
        // 添加附件记录
        foreach($ids as $value) {
            $add['attach_id'] = $value;
            $add['uid'] = $this->mid;
            $add['type'] = 1;
            $add['ctime'] = time();
            M('audit_attach')->add($add);
        }
        echo $res;
    }

    // 审核附件不通过操作
    public function dounAuditAttach() {
        $ids = t($_POST['ids']);
        $ids = explode(',', $ids);
        $ids = array_filter($ids);
        $map['id'] = array('IN', $ids);
        

        // 将图片覆盖为默认图片
        $attachInfo = M('attach')->where($map)->findAll();
        $defaultImage = APPS_PATH.'/admin/Tpl/default/Public/unAudit.jpg';
        $imageArr = array('jpg', 'gif', 'png', 'jpeg', 'bmp');
        
        foreach($attachInfo as $value) {

            $savename = $value['savename'];
            $targetPath = UPLOAD_PATH.'/'.$value['savepath'];

            rename($targetPath.$savename,$targetPath.'old_'.$savename);

            if(in_array($value['extension'], $imageArr)) {
                @copy($defaultImage, $targetPath.$savename);
            }

            //插入数据
            $dmap = array();
            $dmap['id'] = $value['id']; 
            M('attach')->where($dmap)->limit(1)->delete();
            D('attach_back')->add($value);
        }

        // 添加附件记录
        foreach($ids as $value) {
            $add['attach_id'] = $value;
            $add['uid'] = $this->mid;
            $add['type'] = 2;
            $add['ctime'] = time();
            M('audit_attach')->add($add);
        }
        echo 1;
    }
    
    private function _canViewSpace()
    {
    	$user_set = D('UserPrivacy')->getUserSet($this->uid);
    	if (1 == $user_set['space']) {
    		// 我关注的人
    		if ($this->mid && $this->mid != $this->uid && 'unfollow' === getFollowState($this->uid, $this->mid, 0)) {
    			$this->error('对方不允许访问');
    		}
    	} else {
    		// 所有人（不包括黑名单）
    		if ($this->mid && $this->mid != $this->uid && isBlackList($this->uid, $this->mid)) {
    			$this->error('对方不允许访问');
    		}
    	}
    }
}
?>