<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
		<head>
			<meta charset="utf-8"/>
			<title>爱健美</title>
			<link rel="stylesheet" href="../Public/css/public.css" />
			<link rel="stylesheet" href="../Public/css/index.css" />
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
							<a href="retrieve.html" class="forget">忘记密码</a>
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
						<li><a href="/sns/index.php?app=home&mod=Public&act=register">注册 </a>|</li>
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
						<li class="home"><a href="__APP__"><span>首页</span></a></li>
						<li class="store"><a href="__APP__/store"><span>商店</span></a></li>
						<li><a href="__APP__/plan">健身计划</a></li>
						<li><a href="__APP__/training">锻炼</a></li>
						<li><a href="__APP__/nutri">营养</a></li>
						<li><a href="__APP__/add">补充</a></li>
						<li><a href="activity.html">论坛</a></li>
						<li><a href="__ROOT__/sns">交友互动</a></li>
					</ul>
					<span class="position">爱健美/首页</span>
				</div>
				
				<div id="banner">
					<ul>
						<li><a href="#"><img src="../Public/images/banner.jpg" alt=""/></a></li>
						<li><a href="#"><img src="../Public/images/2.gif" alt="" /></a></li>
						<li><a href="#"><img src="../Public/images/3.gif" alt="" /></a></li>
						<li><a href="#"><img src="../Public/images/2.gif" alt="" /></a></li>
					</ul>
				</div>
				<div id="content">
					<h1>天天锻炼<span class="hr"></span></h1>
					<div class="part clearfix">
						<div class="classify">						
							<a href="every.html">
								<img src="../Public/images/mr_01.jpg" />
								<span>上班族健身</span>
							</a>
							<ul class="expend">
								<li>
									<a>2.文字</a>
								</li>
								<li>
									<a>3.文字</a>
								</li>
								<li>
									<a>4.文字</a>
								</li>
								<li>
									<a>5.文字</a>
								</li>
							</ul>
						</div>
						<div class="classify">
							<a href="every.html">
								<img src="../Public/images/mr_02.jpg" />
								<span>日常健身</span></a>
							<ul class="expend">
								<li>
									<a>2.文字</a>
								</li>
								<li>
									<a>3.文字</a>
								</li>
								<li>
									<a>4.文字</a>
								</li>
								<li>
									<a>5.文字</a>
								</li>
							</ul>
						</div>
						<div class="classify">
							<a href="every.html">
								<img src="../Public/images/mr_03.jpg" />
								<span>专业运动员</span></a>
							<ul class="expend">
								<li>
									<a>2.文字</a>
								</li>
								<li>
									<a>3.文字</a>
								</li>
								<li>
									<a>4.文字</a>
								</li>
								<li>
									<a>5.文字</a>
								</li>
							</ul>
						</div>
						<div class="classify spe">
							<a href="every.html">
							<img src="../Public/images/mr_04.jpg" />
							<span>健美运动员</span></a>
							<ul class="expend">
								<li>
									<a>2.文字</a>
								</li>
								<li>
									<a>3.文字</a>
								</li>
								<li>
									<a>4.文字</a>
								</li>
								<li>
									<a>5.文字</a>
								</li>
							</ul>
						</div>
					</div>

					<h1>网站精选<span class="hr"></span></h1>
					<div class="part clearfix">
						<div class="classify">
							<a href="app.html">
								<img src="../Public/images/APP.jpg" class="mod" />
								<span>我们的APP</span>
							</a>
						</div>
						<div class="classify">
							<a href="article.html">
								<img src="../Public/images/5.png" class="mod" />
								<span>最新文章</span>
							</a>
						</div>
						<div class="classify">
							<a href="video.html">
								<img src="../Public/images/eg.jpg" class="mod" />
								<span>最新视频</span>
							</a>
						</div>
						<div class="classify spe">
							<a href="teach.html">
								<img src="../Public/images/jl.jpg" class="mod" />
								<span>最新教练</span>
							</a>
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