<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<title>爱健美</title>
			<link rel="stylesheet" href="../Public/css/public.css" />
			<link rel="stylesheet" href="../Public/css/<?php echo ($cssFile); ?>.css" />
			<link rel="stylesheet" href="../Public/css/jquery-ui.css" />
			
		</head>
<body>
		<div class="body"></div>
		<div class="sheet">
				<div class="log">
					<button class="close_btn"></button>
					<h3>登陆爱健美</h3>
					<div class="ai_account">
						<form action="/index.php?app=home&mod=Public&act=doLogin" method="post">
							<h4 class="tit">使用注册邮箱登陆</h4>
							<div class="text_input">
								<label for="mail">爱健美注册邮箱</label>
								<input type="text" id="email" name="email" />
								<span class="tip">请输入正确的邮箱地址</span>
							</div>
							<div class="text_input">
								<label for="psd">密码</label>
								<input type="password" id="password" name="password" />
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
					<?php if(getMid()) { ?>
					<li><span>欢迎你，<?php echo getUserName(getMid()) ?></span>
					<?php } else { ?>
						<li><a href="javascript:;" id="login">登陆 </a>|</li>
						<li><a href="/index.php?app=index&mod=Index&act=register">注册 </a>|</li>
					<?php } ?>
						<li class="more"><a href="#">消息<span class="triangle"></span> </a>|
							<ul class="message">
								<li><a href="/index.php?app=home&mod=message&act=index">查看私信</a></li>
								<li><a href="/index.php?app=home&mod=user&act=comments">查看评论</a></li>
								<li><a href="/index.php?app=home&mod=user&act=atme">查看@我</a></li>
								<li><a href="/index.php?app=home&mod=space&act=follow&type=follower&uid=<?php echo ($uid); ?>">查看粉丝</a></li>
								<li><a href="/index.php?app=home&mod=message&act=notify">查看通知</a></li>
								<li><a href="order.html">查看预约</a></li>
							</ul>
						</li>
						<li class="more"><a href="">帐号<span class="triangle"></span> </a>
							<ul class="account">
								<li><a href="/index.php?app=home&mod=Account&act=index">个人资料</a></li>
								<li><a href="/index.php?app=home&mod=Account&act=address">收货地址</a></li>
								<li><a href="mod_face.html">修改头像</a></li>
								<li><a href="/index.php?app=home&mod=Account&act=bind">绑定帐号</a></li>
								<li><a href="/index.php?app=home&mod=Public&act=logout">退出帐号</a></li>
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
						<a href="index.hmtl">
							<img src="../Public/images/logo.png" alt="aijianmei" />
						</a>
					</div>
					<ul id="nav">
						<li class="home"><a href="/index.php?app=index"><span>首页</span></a></li>
						<li class="store"><a href="javascript:void(0);" onclick="alert('正在建设中')"><span>商店</span></a></li>
						<li><a href="/index.php?app=index&mod=Plan">健身计划</a></li>
						<li><a href="/index.php?app=index&mod=Train">锻炼</a></li>
						<li><a href="/index.php?app=index&mod=Nutri">营养</a></li>
						<li><a href="/index.php?app=index&mod=Append">补充</a></li>
						<li><a href="javascript:void(0);" onclick="alert('正在建设中')">论坛</a></li>
						<li><a href="<?php echo U('home/User/index');?>">交友互动</a></li>
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
						<h1 class="video_all">补充</h1>
						<ul>
						<?php foreach($categories as $c) { ?>
							<?php if($c['name']) { ?>
							<li class="each_video all">
								<a href="/index.php?app=index&mod=Append&act=articleList&id=<?php echo ($c['id']); ?>"><?php echo ($c['name']); ?></a>
							</li>
							<?php } ?>
							<?php foreach($c['children'] as $child) { ?>
							<li class="each_video">
								<a href="/index.php?app=index&mod=Append&act=articleList&id=<?php echo ($child['id']); ?>"><?php echo ($child['name']); ?></a>
							</li>
							<?php } ?>
						<?php } ?>
							<!-- <li class="each_video">
								<a href="add_1.html">肌肉大厦</a>
							</li>
							<li class="each_video">
								<a href="add_1.html">减肥</a>
							</li>
							<li class="each_video">
								<a href="add_11.html">一般卫生与健康</a>
							</li>
							<li class="each_video">
								<a href="add_11.html">菜谱成分</a>
							</li> -->
						</ul>
					</div>
				</div>
				<span class="corner_bottom"></span>
			</div>


			<div class="right_sider">

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">最畅销的保健品</h1>
						<div class="tr_top clearfix">
							<a href="article.html" class="store.html"><img src="images/add/01.jpg" alt="no" class="supple_pic" /></a>
							<div>
								<a href="article.html" class="detail">超过10000的订单</a>
								<p>最好的选择，最快的运输和订单超过450元的免费礼物</p>
								<a href="article.html" class="purchase">点击购买</a>
							</div>
						</div>
						<ul class="clearfix">
							<li class="classify">
								<a href="classify.html" class="lay_cf">
									
										<img src="images/add/02.jpg" alt="" class="best" />
										<p>最畅销分类一：XX蛋白粉</p>
										<p class="price"></p>
									
								</a>
							</li>
							<li class="classify">
								<a href="classify.html" class="lay_cf">
									<div>
										<img src="images/add/02.jpg" alt="" class="best" />
										<p>最畅销分类一：XX蛋白粉</p>
										<p class="price"></p>
									</div>
								</a>
							</li>
							<li class="classify">
								<a href="classify.html" class="lay_cf">
									<div>
										<img src="images/add/02.jpg" alt="" class="best" />
										<p>最畅销分类一：XX蛋白粉</p>
										<p class="price"></p>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<span class="corner_bottom"></span>
				</div>

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">最佳十篇文章</h1>
						<ul>
						<?php foreach($articles as $a) { ?>
							<li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3"><?php echo ($a['title']); ?></a>
									<p><?php echo (formatComment(getShort(htmlspecialchars_decode($a['content']),20))); ?></p>
								</div>
							</li>
						<?php } ?>
							<!-- <li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/06.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/07.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/06.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/07.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li> -->
						</ul>
						<a class="expend">更多</a>
					</div>
					<span class="corner_bottom"></span>
				</div>

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">最近补充品文章</h1>
						<ul>
						<?php foreach($articles as $a) { ?>
							<li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3"><?php echo ($a['title']); ?></a>
									<p><?php echo (formatComment(getShort(htmlspecialchars_decode($a['content']),20))); ?></p>
								</div>
							</li>
						<?php } ?>
							<!-- <li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/06.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/07.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a href="article.html" class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/06.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/07.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li>
							<li class="article clearfix">
								<a href="article.html" class="article_pic"><img src="images/add/05.jpg" alt="no" /></a>
								<div class="article_content">
									<a class="title_3">5 healthy lunch ideas</a>
									<p>dont ieave your child's nutnition up to wonding machines and piayfore trades serd him ir</p>
								</div>
							</li> -->
						</ul>
						<a class="expend">更多</a>
					</div>
					<span class="corner_bottom"></span>
				</div>

				<div class="part_top clearfix">
					<span class="corner_left"></span>
					<div class="lay_top clearfix">
						<h1 class="public_title">目录</h1>
						<h2 class="title_4">全部</h2>
						<ul class="re_nav">
							<li>
								<a href="training_1.html">补充基础知识</a>
							</li>
							<li>
								<a>肌肉大厦</a>
							</li>
							<li>
								<a>减肥</a>
							</li>
							<li>
								<a>一般卫生与健康</a>
							</li>
							<li>
								<a>菜谱成分</a>
							</li>
						</ul>
					</div>
					<span class="corner_bottom"></span>
				</div>

			</div>
		</div>

				<div id="footer">
					<div class="f_list">
						<h4>发现爱健美</h4>
						<ul id="app">	
							<li><a href="store.html">爱健美商店</a></li>
							<li><a href="training.html">锻炼</a></li>
							<li><a href="plan.html">健身计划</a></li>
							<li><a href="nutri.html">营养</a></li>
							<li><a href="add.html">补充</a></li>
							<li><a href="pal.html">交友互动</a></li>
						</ul>
					</div>
					<div class="f_list">
						<h4>获取帮助</h4>
						<ul id="article">						
							<li><a href="help.html">新手指南</a></li>
							<li><a href="direct.html">社区指导原则</a></li>
							<li><a href="feedback.html">意见反馈</a></li>
						</ul>
					</div>
					<div class="f_list">
						<h4>关于我们</h4>
						<ul id="video">						
							<li><a href="about_us.html">关于爱健美</a></li>
							<li><a href="contact.html">联系我们</a></li>
							<li><a href="join.html">加入爱健美</a></li>
							<li><a href="ad.html">广告投放与品牌推广</a></li>
							<li><a href="privacy.html">隐私政策</a></li>
						</ul>
					</div>
					<div class="f_list">
						<h4>更多</h4>
						<ul id="teach">					
							<li><a href="app.html">下载IOS客户端</a></li>
							<li><a href="app.html">下载Android客户端</a></li>
							<li><a href="links.html">友情链接</a></li>
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
					<a href="intro.html">www.aijianmei.com</a>
				</div>
			</div>
			<script type="text/javascript">
			var USER = {
					'id' : <?php echo $uid ? $uid : '0' ?>,
					'name' : '',
			}
			</script>
			<script type="text/javascript" src="../Public/js/jquery.js"></script>
			<script type="text/javascript" src="../Public/js/public.js"></script>
			<script type="text/javascript" src="../Public/js/<?php echo ($cssFile); ?>.js"></script>
			<script type="text/javascript">
			function comments(comment, aid, act) {
				if(!USER.id) {alert('请登录'); return false;}
				var action = 'add'+act+'Comment';
				$.post('/index.php?app=index&mod=Index&act='+action, {'comment':comment, 'aid':aid}, function(msg) {
					//ui.success('success');
					location.reload();
				})
			}
			</script>
		</body>
	</html>