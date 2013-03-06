<?php
class AppendAction extends Action {
	public function index()
	{
		$cate = M('article_category')->where(array('channel'=>'4'))->findAll();
		foreach($cate as $c) {
			if($c['parent']==NULL) $realCate[$c['id']] = $c;
			else $realCate[$c['parent']]['children'][] = $c;;
			$cate_id[] = $c['id'];
		}
		$map['category_id'] = array('in', implode(',', $cate_id));
		$articles = M('article')->where($map)->findAll();
		//print_r($articles);
		$this->assign('articles', $articles);
		$this->assign('categories', $realCate);
		$this->assign('cssFile', 'add');
		$this->display();
	}
	
	public function articleList()
	{
		$id = intval($_GET['id']);
		$cate = M('article_category')->where(array('channel'=>'4'))->findAll();
		foreach($cate as $c) {
			if($c['parent']==NULL) $realCate[$c['id']] = $c;
			else $realCate[$c['parent']]['children'][] = $c;;
			$cate_id[] = $c['id'];
		}
		$map['category_id'] = $id ? $id : array('in', implode(',', $cate_id));
		$articles = M('article')->where(array('category_id'=>$id))->findAll();
		$this->assign('articles', $articles);
		$this->assign('categories', $realCate);
		$this->assign('cssFile', 'add');
		$this->display('list');
	}
}
?>
