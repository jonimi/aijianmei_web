<?php 
class ArticleModel extends Model {
	public function getAllArticles()
	{
		
	}
	
	public function getDaily($channel)
	{
		$sql = "select d.id,d.title,d.img,d.content,d.create_time,v.id as vid,v.title as vtitle,v.link,v.intro from ai_daily as d
				left join ai_daily_video  as v on v.daily_id=d.id 
				where d.channel=".$channel;
		
		$result = M('')->query($sql);
		
		$parser = api('UrlParser');		
		//$info = $parser->getVideoInfo('http://v.youku.com/v_playlist/f12280371o1p0.html');
		//var_dump($info);
		
		foreach ($result as $r) {
			$info = $parser->getVideoInfo($r['link']);
			if($daily[$r['id']]) {
				$daily[$r['id']]['video'][] = array('id'=>$r['vid'], 'title'=>$r['vtitle'], 'link'=>$r['link'], 'intro'=>$r['intro'], 'img'=>$info['img']);
			}else {
				$daily[$r['id']]['article'] = array('id'=>$r['id'], 'title'=>$r['title'], 'img'=>$r['img'], 'content'=>$r['content'], 'ctime'=>$r['create_time']);
				$daily[$r['id']]['video'][] = array('id'=>$r['vid'], 'title'=>$r['vtitle'], 'link'=>$r['link'], 'intro'=>$r['intro'], 'img'=>$info['img']);
			}
			
			$daily[$r['id']]['comments'] = $this->getDailyComments($r['id']);
		}
		
		return $daily;
	}
	
	protected function getDailyComments($id)
	{
		$sql = "select * from ai_comments where parent_type='4' and parent_id=".$id;
		$result = M('')->query($sql);
		
		foreach ($result as $r) {
			$comments[$r['id']] = $r;
			$comments[$r['id']]['userInfo'] = getUserInfo($r['uid']);
		}
		
		return $comments;
	}
	
	public function getVideoImgById($id)
	{
		$parse = api('UrlParser');
		$video = M('daily_video')->where(array('id'=>$id))->find();
		$info = $parse->getVideoInfo($video['link']);
		//print_r($info);
		if( empty($info) || $info==null) return null;
		return $info['img'];
	}
	
	public function getVideoInfoByLink($link)
	{	
		
		$parse = api('UrlParser');
		
		$info = $parse->getVideoInfo($link);
		
		return $info;
	}
}
?>