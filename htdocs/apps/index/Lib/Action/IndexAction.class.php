<?php
class IndexAction extends Action {
	public function index() 
	{
		$this->setTitle('index');
		$this->assign('uid',$this->mid);
		$this->assign('cssFile','index');
		
		$daily = M('daily')->findAll();
		
		
		$this->assign('daily', $daily);
		$this->display();
	}

	public function app()
	{
		$this->display();
	}

	public function articleDetail()
	{	
		global $ts;
			
		$id = (int) $_GET['id'];
		$map['id'] = $id;
		$article = M('article')->where($map)->find();
		$this->assign('article', $article); 
		
		$articleComments = M('comments')->where(array('parent_id'=>$id, 'parent_type'=>'1'))->findAll();
		foreach($articleComments as $ac) {
			$comments[$ac['id']]['content'] = $ac;
			$comments[$ac['id']]['user'] = getUserInfo($ac['uid']);			
			$comments[$ac['id']]['children'] = M('comments')->where(array('topParent'=>$ac['id'], 'parent_type'=>'3'))->order('`create_time` asc')->findAll();
		}
		
		$this->assign('comments', $comments);
		$this->assign('cssFile', 'article');
		$this->assign('uid', $this->mid);
		$this->display('detail');
	}
	
	public function addArticleLikeCount()
	{
		$id = intval($_POST['id']);
		$save['like'] = intval($_POST['count']);
		echo M('article')->where(array('id'=>$id))->save($save) ? '1' : '0';
	}
	
	
	public function addArticleUnlikeCount()
	{
		$id = intval($_POST['id']);
		$save['unlike'] = intval($_POST['count']);
		echo M('article')->where(array('id'=>$id))->save($save) ? '1' : '0';
	}
	
	public function addArticleComment()
	{
		if (isset($_POST['comment'])) {
			$this->addComment(t($_POST['comment']), intval($_POST['aid']), '1');
			/* $data['content'] = t($_POST['comment']);
			$data['uid'] = $this->mid;
			$data['parent_id'] = intval($_POST['aid']);
			$data['parent_type'] = '1';
			$data['create_time'] = time();
			
			if(!empty($data['content']) &&
			   !empty($data['uid']) &&
			   !empty($data['parent_id'])) {
				M('comments')->add($data);
			} */
						
		}
	}
	
	public function addDailyComment()
	{
		if (isset($_POST['comment'])) {
			$this->addComment(t($_POST['comment']), intval($_POST['aid']), '4');
			/* $data['content'] = t($_POST['comment']);
			$data['uid']     = $this->mid;
			$data['parent_id'] = intval($_POST['aid']);
			$data['parent_type'] = '4'; // 类型为4表示评论的是天天锻炼的文章
			$data['create_time'] = time();
			
			if(!empty($data['content']) &&
					!empty($data['uid']) &&
					!empty($data['parent_id'])) {
				M('comments')->add($data);
			} */
		}
	}
	
	public function addVideoComment()
	{
		if(isset($_POST['comment'])) {
			$this->addComment(t($_POST['comment']), intval($_POST['aid']), '2'); // 类型2表示的是视频
		}
	}
	
	public function addDailyVideoComment()
	{
		if(isset($_POST['comment'])) {
			$this->addComment(t($_POST['comment']), intval($_POST['aid']), '3'); // 类型3表示的是评论
		}
	}
	
	protected function addComment($content, $parent_id, $parent_type) {
		$data['content'] = $content;
		$data['uid']     = $this->mid;
		$data['parent_id'] = $parent_id;
		$data['parent_type'] = $parent_type;
		$data['create_time'] = time();
		
		if(!empty($data['content']) &&
				!empty($data['uid']) &&
				!empty($data['parent_id'])) {
			$cid = M('comments')->add($data);
			return $cid;
		}
		
		return false;
	}
	
	public function articleList()
	{
		$id = (int) $_GET['id'];
		$this->assign('cssFile', 'classify');
		$this->display('list');
	}

	public function videoList()
	{
		$this->assign('cssFile', 'video');
		$this->display('vlist');
	}

	public function videoDetail()
	{
		$this->display('vdetail');
	}

	public function coach()
	{
		$this->assign('cssFile', 'teach');
		$this->display();
	}

	public function info()
	{
		
		$type = (int) $_GET['type'];
		$info = D('Article')->getDaily($type);
		//print_r($info);
		$cate = M('article_category')->where(array('type'=>'2'))->findAll();
		$this->assign('info', $info);
		$this->assign('cssFile', 'every');
		$this->display();
	}
	
	public function daily()
	{
		$id = intval($_GET['id']);
		$daily = M('daily')->where(array('id'=>$id))->find();
		$videos = M('daily_video')->where(array('daily_id'=>$id))->findAll();
		
		foreach ($videos as $k=>$v) {
			if (!empty($v['link'])) {
				$videos[$k]['img'] = D('Article')->getVideoImgById($v['id']);
			}
		}
		$comments = M('comments')->where(array('parent_type'=>'4', 'parent_id'=>$id))->findAll();
		foreach($comments as $k=>$c) {
			$comments[$k] = $c;
			$comments[$k]['userInfo'] = getUserInfo($c['uid']);
		}
		//print_r($daily);
		$this->assign('daily', $daily);
		$this->assign('videos', $videos);
		$this->assign('comments', $comments);
		$this->assign('cssFile', 'article');
		$this->display();
	}
	
	public function register()
	{
		if (service('Passport')->isLogged())
			redirect(U('index/Index/index'));
		
		//验证码
		$opt_verify = $this->_isVerifyOn('register');
		if ( $opt_verify ) {
			$this->assign('register_verify_on', 1);
		}
		
		Addons::hook('public_before_register');
		
		// 邀请码
		$invite_code = h($_REQUEST['invite']);
		$invite_info = null;
		
		// 是否开放注册
		$register_option = model('Xdata')->get('register:register_type');
		if ($register_option == 'closed') { // 关闭注册
			$this->error(L('reg_close'));
		
		} else if ($register_option == 'invite') { // 邀请注册
			// 邀请方式
			$invite_option = model('Invite')->getSet();
			if ($invite_option['invite_set'] == 'close') { // 关闭邀请
				$this->error(L('reg_invite_close'));
			} else { // 普通邀请 OR 使用邀请码
				if (!$invite_code)
					$this->error(L('reg_invite_warming'));
				else if (!($invite_info = $this->__getInviteInfo($invite_code)))
					$this->error(L('reg_invite_code_error'));
			}
		} else { // 公开注册
			if (!($invite_info = $this->__getInviteInfo($invite_code)))
				unset($invite_code, $invite_info);
		}
		$this->assign('cssFile', 'register');
		$this->display();
	}
	
	public function registerCoach()
	{
		if (service('Passport')->isLogged())
			redirect(U('index/Index/index'));
		
		//验证码
		$opt_verify = $this->_isVerifyOn('register');
		if ( $opt_verify ) {
			$this->assign('register_verify_on', 1);
		}
		
		Addons::hook('public_before_register');
		
		// 邀请码
		$invite_code = h($_REQUEST['invite']);
		$invite_info = null;
		
		// 是否开放注册
		$register_option = model('Xdata')->get('register:register_type');
		if ($register_option == 'closed') { // 关闭注册
			$this->error(L('reg_close'));
		
		} else if ($register_option == 'invite') { // 邀请注册
			// 邀请方式
			$invite_option = model('Invite')->getSet();
			if ($invite_option['invite_set'] == 'close') { // 关闭邀请
				$this->error(L('reg_invite_close'));
			} else { // 普通邀请 OR 使用邀请码
				if (!$invite_code)
					$this->error(L('reg_invite_warming'));
				else if (!($invite_info = $this->__getInviteInfo($invite_code)))
					$this->error(L('reg_invite_code_error'));
			}
		} else { // 公开注册
			if (!($invite_info = $this->__getInviteInfo($invite_code)))
				unset($invite_code, $invite_info);
		}
		$this->assign('cssFile', 'register');
		$this->display();
	}
	
	public function registerGym()
	{
		if (service('Passport')->isLogged())
			redirect(U('index/Index/index'));
		
		//验证码
		$opt_verify = $this->_isVerifyOn('register');
		if ( $opt_verify ) {
			$this->assign('register_verify_on', 1);
		}
		
		Addons::hook('public_before_register');
		
		// 邀请码
		$invite_code = h($_REQUEST['invite']);
		$invite_info = null;
		
		// 是否开放注册
		$register_option = model('Xdata')->get('register:register_type');
		if ($register_option == 'closed') { // 关闭注册
			$this->error(L('reg_close'));
		
		} else if ($register_option == 'invite') { // 邀请注册
			// 邀请方式
			$invite_option = model('Invite')->getSet();
			if ($invite_option['invite_set'] == 'close') { // 关闭邀请
				$this->error(L('reg_invite_close'));
			} else { // 普通邀请 OR 使用邀请码
				if (!$invite_code)
					$this->error(L('reg_invite_warming'));
				else if (!($invite_info = $this->__getInviteInfo($invite_code)))
					$this->error(L('reg_invite_code_error'));
			}
		} else { // 公开注册
			if (!($invite_info = $this->__getInviteInfo($invite_code)))
				unset($invite_code, $invite_info);
		}
		$this->assign('cssFile', 'register');
		$this->display();
	}
	
	public function doRegister()
	{
		// 验证码
		/* $verify_option = $this->_isVerifyOn('register');
		if ($verify_option && (md5(strtoupper($_POST['verify'])) != $_SESSION['verify'])){
			$this->error(L('error_security_code'));
			exit;
		} */
		
		// 参数合法性检查
		$required_field = array(
				'email'		=> 'Email',
				'nickname'  => L('username'),
				'password'	=> L('password'),
				'repassword'=> L('retype_password'),
		);
		foreach ($required_field as $k => $v)
			if (empty($_POST[$k]))
			$this->error($v . L('not_null'));
		
		if (!$this->isValidEmail($_POST['email']))
			$this->error(L('email_format_error_retype'));
		if (!$this->isValidNickName($_POST['nickname']))
			$this->error(L('username_format_error'));
		if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16 || $_POST['password'] != $_POST['repassword'])
			$this->error(L('password_rule'));
		if (!$this->isEmailAvailable($_POST['email']))
			$this->error(L('email_used_retype'));
		
		// 是否需要Email激活
		$need_email_activate = intval(model('Xdata')->get('register:register_email_activate'));
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['uname'] = $_POST['nickname'];
		$data['is_active'] = '1';
		$data['is_init']  = '1';
		$data['sex']      = $_POST['sex'];
		$data['province'] = $_POST['province'];
		$data['city']     = $_POST['province'];
		$data['address']  = $_POST['address'];
		$data['goal']     = $_POST['goal'];
		$data['im']       = $_POST['begin'];
		
		$uid = M('user')->add($data);
		$data['uid'] = $uid;
		M('user_attr')->add($data);
		service('Passport')->loginLocal($uid);
		
		redirect(U('index/Index/index'));
	}
	
	public function doRegisterCoach()
	{
		// 验证码
		$verify_option = $this->_isVerifyOn('register');
		if ($verify_option && (md5(strtoupper($_POST['verify'])) != $_SESSION['verify'])){
			$this->error(L('error_security_code'));
			exit;
		}
		
		// 参数合法性检查
		$required_field = array(
				'email'		=> 'Email',
				'nickname'  => L('username'),
				'password'	=> L('password'),
				'repassword'=> L('retype_password'),
		);
		foreach ($required_field as $k => $v)
			if (empty($_POST[$k]))
			$this->error($v . L('not_null'));
		
		if (!$this->isValidEmail($_POST['email']))
			$this->error(L('email_format_error_retype'));
		if (!$this->isValidNickName($_POST['nickname']))
			$this->error(L('username_format_error'));
		if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16 || $_POST['password'] != $_POST['repassword'])
			$this->error(L('password_rule'));
		if (!$this->isEmailAvailable($_POST['email']))
			$this->error(L('email_used_retype'));
		
		// 是否需要Email激活
		$need_email_activate = intval(model('Xdata')->get('register:register_email_activate'));
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['uname'] = $_POST['nickname'];
		$data['sex']      = $_POST['sex'];
		$data['province'] = $_POST['province'];
		$data['city']     = $_POST['city'];
		$data['address']  = $_POST['address'];
		$data['goodat']   = $_POST['goodat'];
		$data['belong_gym']=$_POST['belong_gym'];
		
		$uid = M('user')->add($data);
		$data['uid'] = $uid;
		M('coach')->add($data);
		service('Passport')->loginLocal($uid);
		
		redirect(U('index/Index/index'));
		
	}
	
	public function doRegisterGym()
	{
		// 验证码
		$verify_option = $this->_isVerifyOn('register');
		if ($verify_option && (md5(strtoupper($_POST['verify'])) != $_SESSION['verify'])){
			$this->error(L('error_security_code'));
			exit;
		}
		
		// 参数合法性检查
		$required_field = array(
				'email'		=> 'Email',
				'nickname'  => L('username'),
				'password'	=> L('password'),
				'repassword'=> L('retype_password'),
		);
		foreach ($required_field as $k => $v)
			if (empty($_POST[$k]))
			$this->error($v . L('not_null'));
		
		if (!$this->isValidEmail($_POST['email']))
			$this->error(L('email_format_error_retype'));
		if (!$this->isValidNickName($_POST['nickname']))
			$this->error(L('username_format_error'));
		if (strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16 || $_POST['password'] != $_POST['repassword'])
			$this->error(L('password_rule'));
		if (!$this->isEmailAvailable($_POST['email']))
			$this->error(L('email_used_retype'));
		
		// 是否需要Email激活
		$need_email_activate = intval(model('Xdata')->get('register:register_email_activate'));
		$data['email']  = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['uname'] = $_POST['nickname'];
		
		$uid = M('user')->add($data);
		
		$group['user_group_id'] = '3';
		$group['user_group_title'] = '教练';
		$group['uid'] = $uid;
		M('user_group_link')->add($group);
		service('Passport')->loginLocal($uid);
		
		redirect(U('index/Index/index'));
	}
	
	/*
	 * remindMe 获取邮箱
	 */
	public function remindMe()
	{
		$data['email'] = t($_POST['email']);
		$data['createtime'] = time();
		$data['client_ip'] = $_SERVER['REMOTE_ADDR'];
		
		if ($_POST['method']=='ajax') {
			$id = M('remind')->add($data);
			if($id) echo 1;
			else    echo 0;
			return;
		}
		M('remind')->add($data);
		// display template
	}
	
	//检查Email地址是否合法
	public function isValidEmail($email) {
		if(UC_SYNC){
			$res = uc_user_checkemail($email);
			if($res == -4){
				return false;
			}else{
				return true;
			}
		}else{
			return preg_match("/[_a-zA-Z\d\-\.]+@[_a-zA-Z\d\-]+(\.[_a-zA-Z\d\-]+)+$/i", $email) !== 0;
		}
	}
	
	//检查Email是否可用
	public function isEmailAvailable($email = null) {
		$return_type = empty($email) ? 'ajax' 		   : 'return';
		$email		 = empty($email) ? $_POST['email'] : $email;
	
		$res = M('user')->where('`email`="'.$email.'"')->find();
		if(UC_SYNC){
			$uc_res = uc_user_checkemail($email);
			if($uc_res == -5 || $uc_res == -6){
				$res = true;
			}
		}
	
		if ( !$res ) {
			if ($return_type === 'ajax') echo 'success';
			else return true;
		}else {
			if ($return_type === 'ajax') echo L('email_used');
			else return false;
		}
	}
	
	// 检查验证码是否可用
	public function isVerifyAvailable($verify = null) {
		$return_type = empty($verify) ? 'ajax' : 'return';
		$verify = empty($verify) ? $_POST['verify'] : $verify;
		$verify_option = $this->_isVerifyOn('register');
		if($verify_option && md5(strtoupper($verify)) == $_SESSION['verify']) {
			if($return_type === 'ajax') {
				echo 'success';
			} else {
				return true;
			}
		} else {
			if($return_type === 'ajax') {
				echo '验证码输入错误';
			} else {
				return false;
			}
		}
	
	}
	
	//检查昵称是否符合规则，且是否为唯一
	public function isValidNickName($name) {
	
		$return_type  = empty($name)  ? 'ajax' 		   			: 'return';
		$name		  = empty($name)  ? t($_POST['nickname']) 	: $name;
	
		//昵称不能是纯数字昵称
		if(is_numeric($name)){
			echo '昵称不能是纯数字昵称';
			return;
		}
	
		//检查禁止注册的用户昵称
		$audit = model('Xdata')->lget('audit');
		if($audit['banuid']==1){
			$bannedunames = $audit['bannedunames'];
			if(!empty($bannedunames)){
				$bannedunames = explode('|',$bannedunames);
				if(in_array($name,$bannedunames)){
					if ($return_type === 'ajax') {
						echo '这个昵称禁止注册';
						return;
					} else {
						$this->error('这个昵称禁止注册');
					}
				}
			}
		}
	
		if (UC_SYNC) {
			$uc_res = uc_user_checkname($name);
			if($uc_res == -1 || !isLegalUsername($name)){
				if ($return_type === 'ajax') { echo L('username_rule');return; }
				else return false;
			}
		} else if (!isLegalUsername($name)) {
			if ($return_type === 'ajax') { echo L('username_rule');return; }
			else return false;
		} else if (checkKeyWord($name)) {
			if ($return_type === 'ajax') {
				echo '昵称含有敏感词';
				return;
			} else {
				$this->error('昵称含有敏感词');
			}
		}
	
		if ($this->mid) {
			$res = M('user')->where("uname='{$name}' AND uid<>{$this->mid}")->count();
			$nickname = M('user')->getField('uname',"uid={$this->mid}");
			if (UC_SYNC && ($uc_res == -2 || $uc_res == -3) && $nickname != $name) {
				$res = 1;
			}
		} else {
			$res = M('user')->where("uname='{$name}'")->count();
			if(UC_SYNC && ($uc_res == -2 || $uc_res == -3)){
				$res = 1;
			}
		}
	
		if ( !$res ) {
			if ($return_type === 'ajax') echo 'success';
			else return true;
		}else {
			if ($return_type === 'ajax') echo L('username_used');
			else return false;
		}
	}
	
	public function getVideoImg()
	{
		header("Content-Type:image/jpeg");
		$id = intval($_GET['id']);
		if(!$id) return 'error';
		$img = D('Article')->getVideoImgById($id);
		$type = getimagesize($img);
		//print_r($type);
		$data = fread(fopen($img,'rb'),filesize($img));
		echo $data;
		//echo $img;
		//return $img;
	}
	
	private function _isVerifyOn($type='login'){
		// 检查验证码
		if($type!='login' && $type!='register') return false;
		$opt_verify = $GLOBALS['ts']['site']['site_verify'];
		return in_array($type, $opt_verify);
	}
	
	private function __getInviteInfo($invite_code)
	{
		$res = null;
		$invite_option = model('Invite')->getSet();
		switch (strtolower($invite_option['invite_set'])) {
			case 'close':
				$res = null;
				break;
			case 'common':
				$res = D('User', 'home')->getUserByIdentifier($invite_code, 'uid');
				break;
			case 'invitecode':
				$res = model('Invite')->checkInviteCode($invite_code);
				if ($res['is_used'])
					$res = null;
				break;
		}
	
		return $res;
	}
}
?>
