<?php 
class UrlParserApi extends Api {
	public function getVideoInfo($url)
	{
		require_once 'VideoUrlParser.class.php';
		$info = VideoUrlParser::parse($url);
		
		return $info;
	}
}
?>