<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>爱健美</title>
	<link rel="stylesheet" href="../Public/css/public.css" />
	<?php if($module_name == 'Store'): ?><link rel="stylesheet" href="../Public/css/store.css" /><?php endif; ?>
	<?php if($module_name == 'Plan'): ?><link rel="stylesheet" href="../Public/css/plan.css" /><?php endif; ?>
	<?php if($module_name == 'Training'): ?><link rel="stylesheet" href="../Public/css/training.css" /><?php endif; ?>
	<?php if($module_name == 'Nutri'): ?><link rel="stylesheet" href="../Public/css/nutri.css" /><?php endif; ?>
	<?php if($module_name == 'Add'): ?><link rel="stylesheet" href="../Public/css/add.css" /><?php endif; ?>
	<?php if($module_name == 'Intro'): ?><link rel="stylesheet" href="../Public/css/about_us.css" /><?php endif; ?>
	<?php if($module_name == 'Article'): ?><link rel="stylesheet" href="../Public/css/article.css" /><?php endif; ?>
<script type="text/javascript">

var url = '../Public/';

</script>
</head>
<body>
	<div class="body"></div>
			<div class="sheet">
				<div class="log">
					<button class="close_btn"></button>
					<h3>登陆爱健美</h3>
					<div class="ai_account">
						<form action="">
							<h4 class="tit">使用注册邮箱登陆</h4>
							<div class="text_input">
								<label for="mail">爱健美注册邮箱</label>
								<input type="text" id="mail"/>
								<span class="tip">请输入正确的邮箱地址</span>
							</div>
							<div class="text_input">
								<label for="psd">密码</label>
								<input type="password" id="psd"/>
								<span class="tip">密码长度为6~16个的数字或者字母</span>
							</div>
							<button type="submit" class="submit_btn">登陆</button>
							<a href="retrieve" class="forget">忘记密码</a>
						</form>
					</div>
					<div class="other_account clearfix">
						<h4 class="tit">使用合作网站账号登陆</h4>
						<div class="accounts">
							<a class="cop1" href="#"></a>
							<a class="cop2" href=""></a>
							<a class="cop3" href=""></a>
							<a class="cop4" href=""></a>
							<a class="cop5" href=""></a>
							<a class="cop6" href=""></a>
						</div>
						<span class="clearfix">未注册过爱健美也可以直接登陆哦</span>
						
					</div>
				</div>	
			</div><!-- End sheet -->
	<div class="wrapper">
		<div id="header">
				<ul class="top">
					<li><a id="login">登陆 </a>|</li>
					<li><a href="account.html">注册 </a>|</li>
					<li class="more"><a href="#">消息<span class="triangle"></span> </a>|
							<ul class="message">
								<li><a href="letter.html">查看私信</a></li>
								<li><a href="comment.html">查看评论</a></li>
								<li><a href="mention.html">查看@我</a></li>
								<li><a href="fans.html">查看粉丝</a></li>
								<li><a href="inform.html">查看通知</a></li>
								<li><a href="order.html">查看预约</a></li>
							</ul>
						</li>
						<li class="more"><a href="">帐号<span class="triangle"></span> </a>
							<ul class="account">
								<li><a href="information.html">个人资料</a></li>
								<li><a href="receive.html">收货地址</a></li>
								<li><a href="mod_face.html">修改头像</a></li>
								<li><a href="bind.html">绑定帐号</a></li>
								<li><a href="">退出帐号</a></li>
							</ul>
						</li>
				</ul>
				<form class="search">
					<fieldset>
						<legend>搜索</legend>
						<label for="search_title">搜索：</label>
						<input type="text" id="search_title" class="search_txt"/>
						<button class="search_btn hide_text" type="submit"></button>
					</fieldset>
				</form>
				<div class="logo">
						<a href="__APP__">
							<img src="../Public/images/logo.png" alt="aijianmei" />
						</a>
					</div>
				<ul id="nav">
						<li class="home" ><a href="__APP__"><span>首页</span></a></li>
						<li  class="store <?php if($module_name == 'Store'): ?>now_position<?php endif; ?>"><a href="__APP__/Store"><span>商店</span></a></li>
						<li <?php if($module_name == 'Plan'): ?>class="now_position"<?php endif; ?>><a href="__APP__/Plan">健身计划</a></li>
						<li <?php if($module_name == 'Training'): ?>class="now_position"<?php endif; ?>><a href="__APP__/Training">锻炼</a></li>
						<li <?php if($module_name == 'Nutri'): ?>class="now_position"<?php endif; ?>><a href="__APP__/Nutri">营养</a></li>
						<li <?php if($module_name == 'Add'): ?>class="now_position"<?php endif; ?>><a href="__APP__/Add">补充</a></li>
						<li><a href="activity.html">论坛</a></li>
						<li><a href="__ROOT__/sns">交友互动</a></li>
				</ul>
				<span class="position">爱健美/首页</span>
		</div>


		<div id="banner">
			<div class="lay_banner">
			<ul class="ul_1 clearfix">
				<li class="change_1">
					<a>
						<img src="../Public/images/banner.jpg" alt="no" class="pic_1" />
						<div class="massage" style="display:inline-block;">
							<h1 class="title">此张大图名称</h1>
							<p>大图介绍：阿萨德合肥卡萨帝豪</p>
							<img src="../Public/images/4.png" alt="no" class="png" />
						</div>
					</a>
				</li>
				<li class="change_1">
					<a>
						<img src="../Public/images/1.gif" alt="no" class="pic_2" />
						<div class="massage" style="display:inline-block;">
							<h1 class="title">此张大图名称</h1>
							<p>大图介绍：阿萨德合肥卡萨帝豪</p>
							<img src="../Public/images/4.png" alt="no" class="png" />
						</div>
					</a>
				</li>
				<li class="change_1">
					<a>
						<img src="../Public/images/2.gif" alt="no" class="pic_3" />
						<div class="massage" style="display:inline-block;">
							<h1 class="title">此张大图名称</h1>
							<p>大图介绍：阿萨德合肥卡萨帝豪</p>
							<img src="../Public/images/4.png" alt="no" class="png" />
						</div>
					</a>
				</li>
				<li class="change_1">
					<a>
						<img src="../Public/images/3.gif" alt="no" class="pic_4" />
						<div class="massage" style="display:inline-block;">
							<h1 class="title">此张大图名称</h1>
							<p>大图介绍：阿萨德合肥卡萨帝豪</p>
							<img src="../Public/images/4.png" alt="no" class="png" />
						</div>
					</a>
				</li>
			</ul>
			</div>
			<div class="choice_area">
			<ul class="ul_2 clearfix">
				<li class="first_choice">
					<img src="../Public/images/banner.jpg" alt="" class="relative_pic" />
				</li>
				<li>
					<img src="../Public/images/1.gif" alt="" class="relative_pic" />
				</li>
				<li>
					<img src="../Public/images/2.gif" alt="" class="relative_pic" />
				</li>
				<li>
					<img src="../Public/images/3.gif" alt="" class="relative_pic" />
				</li>
			</ul>
			<a class="ps_left"></a>
			<a class="ps_right"></a>
			</div>
		</div>	<!--Banner End -->


		<div id="content" class="clearfix">
					<div class="sider_all">
				<span class="corner_left"></span>
				<div class="lay_sider">
					<div class="subsider">
						<h3 class="video_all">全部</h3>
						<ul>
						<?php if(is_array($cat_list)): $i = 0; $__LIST__ = $cat_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["fid"] == 0 ): ?><li class="each_video all"><?php echo ($vo["name"]); ?></li>
						<?php else: ?>
						<li class="each_video">
						<a href="<?php echo U('training/training_list?id='.$vo['cid']);?>"><?php echo ($vo["name"]); ?></a>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				<span class="corner_bottom"></span>
			</div>


			<div class="right_sider">

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">了解锻炼的意义</h1>
						<div class="" style="margin:0 15px;">
							<div class="tr_top clearfix">
							<a class="store.html"><img src="../Public/images/training/duanlian_23.jpg" alt="no" class="supple_pic" /></a>
							<div class="lay_detail">
								<a href="<?php echo U('article/index');?>" class="detail">锻炼重在技巧</a>
								<p>最好的选择，最快的锻炼方式和最优秀的视频教学</p>
								<a href="<?php echo U('article/index');?>" href="#" class="read_art">点击阅读</a>
							</div>
							</div>
							<ul class="clearfix">
							<li class="classify">
								<a href="classify.html" class="lay_cf">
									
										<img src="../Public/images/training/abs.png" width="220" height="214px" alt="" class="best" />
										<p>最畅销分类一：XX蛋白粉</p>
									
								</a>
							</li>
							<li class="classify">
								<a href="classify.html" class="lay_cf">
									<div>
										<img src="../Public/images/training/cardio.png" width="220" height="214px" alt="" class="best" />
										<p>最畅销分类一：XX蛋白粉</p>
									</div>
								</a>
							</li>
							<li class="classify">
								<a href="classify.html" class="lay_cf">
									<div>
										<img src="../Public/images/training/triceps.png" width="220" height="214px" alt="" class="best" />
										<p>最畅销分类一：XX蛋白粉</p>
										<p class="price"></p>
									</div>
								</a>
							</li>
							</ul>
						</div>
					</div>
					<span class="corner_bottom"></span>
				</div>

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">最近锻炼文章</h1>
						<ul class="new_video clearfix">
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/musclebuilding.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">增加肌肉</a>
								<p class="summary">大量的锻炼，为建设肌肉的质量和力量！
								</p>
								<a href="#" class="add_expend">查看所有质量增加程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/fatloss.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">脂肪损失</a>
								<p class="summary">找到合适的锻炼，同时保持精益肌肉燃烧脂肪！</p>
								<a href="#" class="add_expend">查看更多脂肪损失程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/strength.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">力量锻炼</a>
								<p class="summary">训练设计的纯实力！ 5X5，温德勒，西部和更多！</p>
								<a href="#" class="add_expend">查看所有力量锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/home.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">家庭锻炼</a>
								<p class="summary">你并不需要一间健身房，看到了巨大的成果。这些以家庭为基础的锻炼！</p>
								<a href="#" class="add_expend">查看所有家庭锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/women.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">女性</a>
								<p class="summary">锻炼程序专为女生和她们的目标而设定！</p>
								<a href="#" class="add_expend">查看所有女性锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/sports.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">体育运动</a>
								<p class="summary">通过提高你的表现，获得你的竞争对手优势！</p>
								<a href="#" class="add_expend">查看所有体育运动程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/bodyweight.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">体重</a>
								<p class="summary">建立这些体重只有锻炼的肌肉和力量！</p>
								<a href="#" class="add_expend">查看所有肌肉锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_1"><img src="../Public/images/training/beginner.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">初学者</a>
								<p class="summary">刚刚起步的？这些训练将让你在正确的道路上获得成功！</p>
								<a href="#" class="add_expend">查看所有初学者锻炼程序</a>
							</li>
						</ul>
					</div>
					<span class="corner_bottom"></span>
				</div>

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">最佳锻炼文章<span class="hr_3 hr"></span></h1>
						<ul class="hot_video clearfix">
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/abs.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">腹肌训练</a>
								<p class="summary">获取的练习和锻炼，你需要建立一个令人印象深刻的6包！</p>
								<a href="#" class="add_expend">查看所有腹肌锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/chest.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">胸部锻炼</a>
								<p class="summary">完整的训练，旨在建立低，中及上胸部！</p>
								<a href="#" class="add_expend">查看所有胸部锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/biceps.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">二头肌训练</a>
								<p class="summary">这些训练会帮你收拾你的肱二头肌的肌肉质量和大小！</p>
								<a href="#" class="add_expend">查看所有二头肌训练程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/back.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">背部训练</a>
								<p class="summary">获取的锻炼，你需要建立一个强大的，宽，厚回来！</p>
								<a href="#" class="add_expend">查看所有背部锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/legs.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">腿部训练</a>
								<p class="summary">训练专门设计，建设，加强和音的腿！</p>
								<a href="#" class="add_expend">查看所有腿部锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/shoulders.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">肩部训练</a>
								<p class="summary">训练旨在建立“椰子，如”肩膀上，你的体质至关重要！</p>
								<a href="#" class="add_expend">查看所有胸部锻炼程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/triceps.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">三头肌训练</a>
								<p class="summary">如果你想大的武器，你需要大的三头肌！使用这些锻炼三头肌质量收拾！</p>
								<a href="#" class="add_expend">查看所有三头肌训练程序</a>
							</li>
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/cardio.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">心</a>
								<p class="summary">心没有很无聊！事情搞混淆了这些有氧锻炼！</p>
								<a href="#" class="add_expend">查看所有心程序</a>
							</li>
						</ul>
					</div>
					<span class="corner_bottom"></span>
				</div>

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">其他分类</h1>
						<ul class="hot_video clearfix">
							<li class="tr_classify">
								<a href="<?php echo U('article/index');?>" class="video_2"><img src="../Public/images/training/abs.png" width="165px" height="134px" alt=""></a>
								<a href="#" class="plan_article_tl">其他锻炼</a>
								<p class="summary">检查所有其他锻炼，不适合其他类别！</p>
								<a href="#" class="add_expend">查看所有其他锻炼程序</a>
							</li>
						</ul>
					</div>
					<span class="corner_bottom"></span>
				</div>


				
				<!-- <div class="clear_both">
					<h1 class="title">最新文章<span class="hr_4 hr"></span></h1>
					<ul class="new_article clearfix">
						<li class="article_classify">
							<a class="article_h">女性的锻炼</a>
							<div class="article_top clearfix">
								<a class="article_pic"><img src="../Public/images/training/wenzhangkuang.png" alt="" /></a>
								<ul class="pic_relation">
									<li>
										<a href="#" class="pic_ct">适合女生有氧健身
										</a>
									</li>
									<li>
										<a href="#" class="expert_intr">专家为了介绍一种特别的健身方法【详情】</a>
									</li>
								</ul>
							</div>
							<ul class="clear_both">
								<li>
									<a href="#" class="more_cf">女子哑铃操健身计划</a>
								</li>
								<li>
									<a href="#" class="more_cf">女子臀部锻炼健身计划</a>
								</li>
								<li>
									<a href="#" class="more_cf">女性普通塑形健身计划</a>
								</li>
								<li>
									<a href="#" class="more_cf">健身小姐锻炼健身计划</a>
								</li>
							</ul>
						</li>
						<li class="article_classify">
							<a href="#" class="article_h">体形的塑造</a>
							<div class="article_top clearfix">
								<a href="#" class="article_pic"><img src="../Public/images/training/wenzhangkuang.png" alt="" /></a>
								<ul class="pic_relation">
									<li>
										<a href="#" class="pic_ct">适合男士的体形塑造方式</a>
									</li>
									<li>
										<a href="#" class="expert_intr">专家为了介绍一种特别的健身方法【详情】</a>
									</li>
								</ul>
							</div>
							<ul class="clear_both">
								<li>
									<a href="#" class="more_cf">健美先生分享健美心得</a>
								</li>
								<li>
									<a href="#" class="more_cf">健美运动员健身计划指导</a>
								</li>
								<li>
									<a href="#" class="more_cf">大力士龙武的健身计划</a>
								</li>
								<li>
									<a href="#" class="more_cf">手臂超级组锻炼计划</a>
								</li>
							</ul>
						</li>
						<li class="article_classify">
							<a href="#" class="article_h">高强度训练</a>
							<div class="article_top clearfix">
								<a href="#" class="article_pic"><img src="../Public/images/training/wenzhangkuang.png" alt="" /></a>
								<ul class="pic_relation">
									<li>
										<a href="#" class="pic_ct">适合运动员高强度的运动方法</a>
									</li>
									<li>
										<a href="#" class="expert_intr">专家为了介绍一种特别的健身方法【详情】</a>
									</li>
								</ul>
							</div>
							<ul class="clear_both">
								<li>
									<a href="#" class="more_cf">健美运动员健身计划指导</a>
								</li>
								<li>
									<a href="#" class="more_cf">两个月循环强化训练</a>
								</li>
								<li>
									<a href="#" class="more_cf">全面的健美增肌计划</a>
								</li>
								<li>
									<a href="#" class="more_cf">六天双分化上下午循环锻炼计划</a>
								</li>
							</ul>
						</li>
					</ul>
				</div> -->

				<div class="clear_both">
					<h1 class="public_title">根据身体部位找到适合的锻炼视频</h1>
					<div class="pertinence">
						<ul class="pt_part_1">
							<li><a href="#">颈部</a></li>
							<li><a href="#">肩膀<span>(美洲)</span></a></li>
							<li><a href="#">陷阱<span>(斜方肌)</span></a></li>
							<li><a href="#">二头肌<span>(肱二头肌)</span></a></li>
							<li><a href="#">前臂<span>(肱)</span></a></li>
							<li><a href="#">胸部<span>(胸大肌)</span></a></li>
							<li><a href="#">防抱死制动系统<span>(腹直肌)</span></a></li>
							<li><a href="#">四边形<span>(四头肌)</span></a></li>
						</ul>
						<ul class="pt_part_2">
							<li><a href="#">陷阱<span>(斜方肌)</span></a></li>
							<li><a href="#">肱三头肌<span>(肱三头)</span></a></li>
							<li><a href="#">拉特<span>(背阔肌)</span></a></li>
							<li><a href="#">回到中间<span>(菱形)</span></a></li>
							<li><a href="#">下背部<span></span></a></li>
							<li><a href="#">臀部<span>(臀大肌、臀中肌)</span></a></li>
							<li class="special"><a href="#">四边形<span>(四头肌)</span></a></li>
							<li><a href="#">拉筋<span>(股二头肌)</span></a></li>
							<li><a href="#">犊牛<span>(腓肠肌)</span></a></li>
						</ul>
					</div>
				</div>


				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">目录</h1>
						<?php if(is_array($lis)): $i = 0; $__LIST__ = $lis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2 class="title_4"><?php echo ($vo["name"]); ?></h2>
						<ul class="re_nav clearfix">
						<?php if(is_array($vo['list'])): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('training/training_list?id='.$vo['cid']);?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<span class="corner_bottom"></span>
				</div>

			</div>
		</div>

				<div id="footer">
					<div class="f_list">
						<h4>发现爱健美</h4>
						<ul id="app">	
							<li><a href="<?php echo U('store/index');?>">爱健美商店</a></li>
							<li><a href="<?php echo U('training/index');?>">锻炼</a></li>
							<li><a href="<?php echo U('plan/index');?>">健身计划</a></li>
							<li><a href="<?php echo U('nutri/index');?>">营养</a></li>
							<li><a href="<?php echo U('add/index');?>">补充</a></li>
							<li><a href="<?php echo U('pal/index');?>">交友互动</a></li>
						</ul>
					</div>
					<div class="f_list">
						<h4>获取帮助</h4>
						<ul id="article">						
							<li><a href="<?php echo U('Intro/help');?>">新手指南</a></li>
							<li><a href="<?php echo U('Intro/direct');?>">社区指导原则</a></li>
							<li><a href="<?php echo U('Intro/feedback');?>">意见反馈</a></li>
						</ul>
					</div>
					<div class="f_list">
						<h4>关于我们</h4>
						<ul id="video">						
							<li><a href="<?php echo U('Intro/about');?>">关于爱健美</a></li>
							<li><a href="<?php echo U('Intro/contact');?>">联系我们</a></li>
							<li><a href="<?php echo U('Intro/join');?>">加入爱健美</a></li>
							<li><a href="<?php echo U('Intro/ad');?>">广告投放与品牌推广</a></li>
							<li><a href="<?php echo U('Intro/privacy');?>">隐私政策</a></li>
						</ul>
					</div>
					<div class="f_list">
						<h4>更多</h4>
						<ul id="teach">					
							<li><a href="<?php echo U('Intro/app');?>">下载IOS客户端</a></li>
							<li><a href="<?php echo U('Intro/app');?>">下载Android客户端</a></li>
							<li><a href="<?php echo U('Intro/links');?>">友情链接</a></li>
						</ul>
					</div>
					<div class="f_list login" >
						<h4>关注我们</h4>
						<ul id="about">
							<li class="sina"><a href="http://weibo.com/aijianmei?topnav=1&wvr=5" target="_blank">新浪微博</a></li>
							<li class="tencent"><a href="http://t.qq.com/aijianmeiweibo" target="_blank">腾讯微博</a></li>
							<li class="netease"><a href="http://t.163.com/aijianmei" target="_blank">网易微博</a></li>
							<li class="public"><a href="#" target="_blank">公共主页</a></li>
							<li class="qZone"><a href="http://user.qzone.qq.com/2816973844/main#home" target="_blank">QQ空间</a></li>
							<li class="douban"><a href="#" target="_blank">豆瓣</a></li>
						</ul>		
					</div>
				</div><!--Footer End-->
				<div id="lower_footer">
					<span>广州加伦信息科技有限公司- 粤ICP备12085654号</span>
					<a href="http://www.aijianmei.com" target="_blank">www.aijianmei.com</a>
				</div>
			</div>
			<script type="text/javascript" src="../Public/js/jquery.js"></script>
			<script type="text/javascript" src="../Public/js/public.js"></script>
			<?php if($module_name == 'Index'): ?><script type="text/javascript" src="../Public/js/index.js"></script><?php endif; ?>
			<?php if($module_name == 'Training'): ?><script type="text/javascript" src="../Public/js/training.js"></script><?php endif; ?>
			<?php if($module_name == 'Add'): ?><script type="text/javascript" src="../Public/js/add.js"></script><?php endif; ?>
			<?php if($module_name == 'Nutri'): ?><script type="text/javascript" src="js/nutri.js"></script><?php endif; ?>
			
			<?php if(($module_name == 'Plan') OR ($module_name == 'Store') ): ?><script type="text/javascript" src="../Public/js/plan.js"></script><?php endif; ?>
			<?php if($module_name == 'Article'): ?><script type="text/javascript" src="js/article.js"></script><?php endif; ?>
			<?php if($module_name == 'Store'): ?><script type="text/javascript">
				getaction('char_pro',{'choicecolor':'#789CC1','choiceborderwidth':'2px'})
				changecolor('pro_name','#1791E6','white')
				changecolor('pro_price','#b10001')
				//show_all
				$(".show_all").click(function(){
					$(".hidden").toggleClass("hide");
				})
			</script><?php endif; ?>
		</body>
	</html>