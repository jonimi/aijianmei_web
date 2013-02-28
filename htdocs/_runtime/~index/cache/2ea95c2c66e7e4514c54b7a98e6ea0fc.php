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


<div id="content">
			<div class="content_left clearfix">
				<h1 class="title_1">爱健美文章</h1>
				<?php $keywords = split(',', $article['keyword']);foreach($keywords as $k) { ?>
				<span class="goal"><?php echo ($k); ?></span>
				<?php } ?>
				<!-- <span class="goal_part">腰部 XX XX</span> -->
				<div class="essay_ct">
					<h2 class="title_2"><?php echo ($article['title']); ?></h2>
					<div class="web_expend_1">
						<a class="sprite_7">1343</a>
						<span class="prompt"><?php echo ($article['author']); ?></span>
						<span><?php echo ($article['source']); ?></span>			
						<span>我要分享</span>
						<!-- JiaThis Button BEGIN -->
						<div class="jiathis_style">
							<a class="jiathis_button_qzone"></a>
							<a class="jiathis_button_tsina"></a>
							<a class="jiathis_button_tqq"></a>
							<a class="jiathis_button_renren"></a>
							<a class="jiathis_button_kaixin001"></a>
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
						</div>
						<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1359878070244822" charset="utf-8"></script>
						<!-- JiaThis Button END -->
						<!-- <a class="sprite_1"></a>
						<a class="sprite_2"></a>
						<a class="sprite_3"></a>
						<a class="sprite_4"></a>
						<a class="sprite_5"></a>
						<a class="sprite_6"></a> -->
						
					</div>
					<div class="video clearfix">
						<a><img src="../Public/images/article/4.png" alt="no" class="video_pic" /></a>
						<div class="detail">
						<p><?php echo ($article['brief']); ?></p>
							<!-- <p>教你如何能“吃”去脂肪</p>
							<p>食用以下事物，可有效地抑制因摄取</p>
							<p>脂肪较多而引起的多种病症</p> -->
						</div>
					</div>
					<?php echo (htmlspecialchars_decode($article['content'])); ?>
					<!-- <div class="food_pic">
						<a href="store_5.html"><img src="../Public/images/article/5.png" alt="no" border="0" /></a>
						<p class="food_ms">对瘦身有帮助的食物</p>
					</div>
					<div class="article">
						<h3 class="title_3">1、食用以下食物，可有效地抑制因摄取脂肪较多而引起的多种病症。</h3>
						<p>洋葱：含前列腺素Ａ，有舒张血管，降低血压等功能；还含有烯丙基三硫化合物及少量
							硫氨基酸，可降血脂，预防动脉硬化。40岁以上者更要常吃。
						</p>
						<p>苹果：因富含果胶、纤维素、维生素C等，有非常好的降脂作用。如果每天吃两个苹果，
							坚持一个月，大多数人血液中导致对心血管有害的低密度脂蛋白胆固醇会大大降低，而对心
						</p>
						<p>大蒜：含硫化合物，可减少血液中的胆固醇，可阻止血栓的形成，有助于增加高密度脂
							蛋白，保护心脏动脉。	
						</p>
						<p>牛奶：含较多的乳清酸和钙质，这些物质既能抑制胆固醇积于动脉血管壁，能抑制人体
							内胆固醇合成酶的活性，还可减少胆固醇的吸收。
						</p>
						<h3>2、食用以下食物，可有效地抑制因摄取脂肪较多而引起的多种病症。</h3>
						<p>洋葱：含前列腺素Ａ，有舒张血管，降低血压等功能；还含有烯丙基三硫化合物及少量
							硫氨基酸，可降血脂，预防动脉硬化。40岁以上者更要常吃。
						</p>
						<p>苹果：因富含果胶、纤维素、维生素C等，有非常好的降脂作用。如果每天吃两个苹果，
							坚持一个月，大多数人血液中导致对心血管有害的低密度脂蛋白胆固醇会大大降低，而对心
						</p>
						<p>大蒜：含硫化合物，可减少血液中的胆固醇，可阻止血栓的形成，有助于增加高密度脂
							蛋白，保护心脏动脉。	
						</p>
						<p>牛奶：含较多的乳清酸和钙质，这些物质既能抑制胆固醇积于动脉血管壁，能抑制人体
							内胆固醇合成酶的活性，还可减少胆固醇的吸收。
						</p>
					</div> -->
					<div class="web_expend_2">
						<span class="read_time">
							<a style="height:16px;width:52px;line-height:16px;background:0;">
								<span>阅读</span>
								<span>0</span>
								<span class="triangle"></span>
							</a>
							<div class="page_times" style="postion:absolute;display:none;right:0px;width:50px; background:white;line-height:20px;border:1px solid #ccc;">
								<p>页面1</p>
								<p>页面1</p>	
							</div>
						</span>
						<a class="sprite_8" aid="<?php echo ($artilcle['id']); ?>"><span class="praise"><?php echo ($article['like']); ?></span></a>
						<a class="sprite_9" aid="<?php echo ($artilcle['id']); ?>"><span class="praise"><?php echo ($article['unlike']); ?></span></a>
						<span class="relay">转发到</span>
						<!-- JiaThis Button BEGIN -->
						<div class="jiathis_style">
							<a class="jiathis_button_qzone"></a>
							<a class="jiathis_button_tsina"></a>
							<a class="jiathis_button_tqq"></a>
							<a class="jiathis_button_renren"></a>
							<a class="jiathis_button_kaixin001"></a>
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
						</div>
						<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1359878070244822" charset="utf-8"></script>
						<!-- JiaThis Button END -->
						<!-- <a class="sprite_1"></a>
						<a class="sprite_2"></a>
						<a class="sprite_3"></a>
						<a class="sprite_4"></a>
						<a class="sprite_5"></a>
						<a class="sprite_6"></a> -->
						<a class="collect">收藏</a>
						
						
					</div>
					<div class="border_comment">
						<span class="word_num">0/300</span>
						<span>登录</span>|
						<span>注册</span>
						
						<div class="textarea"><textarea class="comment_inp" name="comment" id="comment">有什么感想，来说说吧</textarea></div>
						<a class="comment" href="javascript:void(0);" onclick="comments(comment.value, <?php echo ($article['id']); ?>, 'Article')" aid="<?php echo ($article['id']); ?>">发表评论</a>
					</div>
					<div class="check_comment">
						<a class="comment_1">全部评论(0)</a>
						<a class="comment_2 comment_3">精选评论</a>
					</div>
					<div class="cm_content tab_2">
						<div class="cm_top">
							<span class="page_1">
								<span class="lay_page">
									<a class="choice_page">1</a>
									<a>2</a>
									<a>3</a>
									<a>4</a>
									<a>5</a>
								</span>
								<a class="pre_page">上一页</a>
								<a class="next_page">下一页</a>
							</span>
							<span>第0页</span>  <span>第0条</span>
							
						</div>
						<div class="cm_bottom">
							<h5 class="title_5">推荐精华</h5>
							<?php foreach($comments as $c) { ?>
							<div class="target">
								<div class="target_pic">
									<img src="<?php echo ($c['user']['face']); ?>" alt="no" />
									<span class="care">关注</span>
								</div>
								<a class="name"><?php echo ($c['user']['uname']); ?></a>
								<p><?php echo ($c['content']['content']); ?></p>
								<p class="bottom_ms">
									<span class="to">
										<a>转发<span>(0)</span></a>
										<a>回复<span>(0)</span></a>
									</span>	
									<span>22个小时前</span>
									<span>来自<em></em></span>
									
								</p>
							</div>
							<?php } ?>
						</div>	
					</div>
					<div class="cm_content tab_1">
						<div class="cm_top">
							<span class="page_1">
								<span class="lay_page">
									<a class="choice_page">1</a>
									<a>2</a>
									<a>3</a>
									<a>4</a>
									<a>5</a>
								</span>
								<a class="pre_page">上一页</a>
								<a class="next_page">下一页</a>
							</span>
							<span>第0页</span>  <span>第0条</span>
							
						</div>
						<div class="cm_bottom">
							<h5 class="title_5">全部推荐</h5>
							<?php foreach($comments as $c) { ?>
							<div class="target">
								<div class="target_pic">
									<img src="<?php echo ($c['user']['face']); ?>" alt="no" />
									<span class="care">关注</span>
								</div>
								<a class="name"><?php echo ($c['user']['uname']); ?></a>
								<p><?php echo ($c['content']['content']); ?></p>
								<p class="bottom_ms">
									<span class="to">
										<a>转发<span>(0)</span></a>
										<a>回复<span>(0)</span></a>
									</span>	
									<span>22个小时前</span>
									<span>来自<em></em></span>
									
								</p>
							</div>
							<?php } ?>
							<!-- <div class="target">
								<div class="target_pic">
									<img src="../Public/images/article/9.png" alt="no" />
									<span class="care">关注</span>
								</div>
								<a class="name">huifei</a>
								<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的。中国人为什么总被排挤在潮流之外，其实都是中国人自己造成的，当别人都在高兴的时候，中国人则是在旁边指指点点，这不好，那不好，好像只有这样才能显出自己的高人一等。</p>
								<p class="bottom_ms">
									<span class="to">
										<a>转发<span>(0)</span></a>
										<a>回复<span>(0)</span></a>
									</span>
									<span>22个小时前</span>
									<span>来自<em></em></span>
										
								</p>
							</div> -->
						</div>
					</div>
					<div class="relation">
						<h5 class="title_6"><a class="add_relation">相关推荐</a></h5>
						<!-- <p>计划生育实施之后、、</p>
						<p>计划生育实施之后、、</p>
						<p>计划生育实施之后、、</p>
						<p>计划生育实施之后、、</p> -->
					</div>
				</div>
			</div>
			<div class="content_right">
				<a href="store_5.html"><img src="../Public/images/article/1.png" alt="no" border="0" /></a>
				<h4 class="title_4">精华推荐</h4>
					<div class="recommend">
						<a><img src="../Public/images/article/2.png" alt="no" border="0" /></a>
						<p class="intro">新闻百科：为什么大陆同胞赴美不用、、、</p>
					</div>
					<div class="recommend">
						<a><img src="../Public/images/article/2.png" alt="no" border="0" /></a>
						<p class="intro">新闻百科：为什么大陆同胞赴美不用、、、</p>
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