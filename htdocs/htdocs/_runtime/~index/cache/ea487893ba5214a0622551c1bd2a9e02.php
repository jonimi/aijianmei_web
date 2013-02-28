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
			<div>
				<h3 class="title_main"><?php echo ($video['title']); ?></h3>
				<div class="video_content clearfix">
					<span class="bn_right"></span>
					<div class="v_area">
						
						<embed src="<?php echo ($videoInfo['swf']); ?>" quality="high" width="634" height="450" align="middle" allownetworking="all" allowscriptaccess="always" type="application/x-shockwave-flash">
						<!-- <img src="../Public/images/v/111.jpg" alt="no" width="634px" height="450px" /> -->
						<!-- <iframe height=450 width=634 src="<?php echo ($video['url']); ?>" frameborder=0 allowfullscreen></iframe> --> 
					</div>
					<div class="v_re">
						<span class="bn_left"></span>
						<ul class="v_nav clearfix">
							<li>视频信息</li>
							<li class="tabclass">推荐视频</li>
						</ul>
						<div class="tab">
							<div class="v_infro1">
								<span>分类:<span>男</span></span>
								<span>手臂<span style="color:#6380FF;">  某某动作</span></span>
								<p>发布时间:<span><?php echo ($video['create_time']); ?></span></p>
								<div class="v_infro2">
									<h3>视频简介:</h3>
									<ul>
										<li>主要肌肉:<span>xxxxxx</span></li>
										<li>二级肌肉:<span>xxxxxx</span></li>
										<li>运动类型:<span>xxxxxx</span></li>
										<li>装备:<span>xxxxxx</span></li>
										<li>力学:<span>xxxxxx</span></li>
										<li>力:<span>xxxxxx</span></li>
										<li>等级:<span>xxxxxx</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="tab block">
							<ul class="cf_all">
								<li class="v_cf clearfix">
									<a><img src="../Public/images/v/02.jpg" class="video_pic"></a>
									<div class="video_ct">
										<p class="control_c">向文波：三个起诉奥巴马准备打持久战</p>
										<p>播放:123</p>
										<p>时长:2342s</p>
									</div>
								</li>
								<li class="v_cf clearfix">
									<a><img src="../Public/images/v/01.jpg" class="video_pic"></a>
									<div class="video_ct">
										<p class="control_c">向文波：三个起诉奥巴马准备打持久战</p>
										<p>播放:123</p>
										<p>时长:2342s</p>
									</div>
								</li>
								<li class="v_cf clearfix">
									<a><img src="../Public/images/v/03.jpg" class="video_pic"></a>
									<div class="video_ct">
										<p class="control_c">向文波：三个起诉奥巴马准备打持久战</p>
										<p>播放:123</p>
										<p>时长:2342s</p>
									</div>
								</li>
								<li class="v_cf clearfix">
									<a><img src="../Public/images/v/04.jpg" class="video_pic"></a>
									<div class="video_ct">
										<p class="control_c">向文波：三个起诉奥巴马准备打持久战</p>
										<p>播放:123</p>
										<p>时长:2342s</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="v_bottom clearfix">
					<div class="bottom_part_left">
							<div class="web_expend_2">
								<a class="sprite_8"><span class="praise"><?php echo ($video['like']); ?></span></a>
								<a class="sprite_9"><span class="praise"><?php echo ($video['unlike']); ?></span></a>
								<span class="relay">转发到</span>
								<a class="sprite_1"></a>
								<a class="sprite_2"></a>
								<a class="sprite_3"></a>
								<a class="sprite_4"></a>
								<a class="sprite_5"></a>
								<a class="sprite_6"></a>
								<a class="collect">收藏</a>
								<span class="read_time">
									<a style="height:16px;width:56px;line-height:16px;background:0;">
										<span>阅读</span>
										<span>0</span>
										<span class="triangle"></span>
									</a>
									<div class="page_times" style="postion:absolute;display:none;right:0px;width:50px; background:white;line-height:20px;border:1px solid #ccc;">
										<p>页面1</p>
										<p>页面1</p>	
									</div>
								</span>						
							</div>
							<div class="border_comment">
								<span class="word_num">0/300</span>
								<span>登录</span>|
								<span>注册</span>
								
								<div class="textarea"><textarea class="comment_inp" name="comment">有什么感想，来说说吧</textarea></div>
								<a class="comment">发表评论</a>
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
									<div class="target clearfix">
										<div class="target_pic">
											<img src="" alt="no" />
											<span class="care">关注</span>
										</div>
										<div class="cm_left">
											<a class="name">huifei</a>
											<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的。中国人为什么总被排挤在潮流之外，其实都是中国人自己造成的，当别人都在高兴的时候，中国人则是在旁边指指点点，这不好，那不好，好像只有这样才能显出自己的高人一等。</p>
											<p class="bottom_ms">
												<span class="to">
													<a>转发<span>(0)</span></a>
													<a>回复<span>(0)</span></a>
												</span><!-- 解决在ie6~7中浮动行内元素的bug -->
												<span>22个小时前</span>
												<span>来自<em></em></span>
													
											</p>
										</div>
									</div>
								</div>	
							</div>
							<div class="cm_content tab_1">
								<div class="cm_top">
									<span>第0页</span>  <span>第0条</span>
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
								</div>
								<div class="cm_bottom">
									<h5 class="title_5">全部推荐</h5>
									<div class="target">
										<div class="target_pic">
											<img src="" alt="no" />
											<span class="care">关注</span>
										</div>
										<a class="name">huifei</a>
										<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的。中国人为什么总被排挤在潮流之外，其实都是中国人自己造成的，当别人都在高兴的时候，中国人则是在旁边指指点点，这不好，那不好，好像只有这样才能显出自己的高人一等。</p>
										<p class="bottom_ms">
											<span>22个小时前</span>
											<span>来自<em></em></span>
											<span class="to">
												<a>转发<span>(0)</span></a>
												<a>回复<span>(0)</span></a>
											</span>	
										</p>
									</div>
									<div class="target">
										<div class="target_pic">
											<img src="" alt="no" />
											<span class="care">关注</span>
										</div>
										<a class="name">huifei</a>
										<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的。中国人为什么总被排挤在潮流之外，其实都是中国人自己造成的，当别人都在高兴的时候，中国人则是在旁边指指点点，这不好，那不好，好像只有这样才能显出自己的高人一等。</p>
										<p class="bottom_ms">
											<span>22个小时前</span>
											<span>来自<em></em></span>
											<span class="to">
												<a>转发<span>(0)</span></a>
												<a>回复<span>(0)</span></a>
											</span>	
										</p>
									</div>
								</div>
							</div>
							<div class="relation">
								<h5 class="title_6"><a class="add_relation">相关推荐</a></h5>
								<p>计划生育实施之后、、</p>
								<p>计划生育实施之后、、</p>
								<p>计划生育实施之后、、</p>
								<p>计划生育实施之后、、</p>
							</div>
					</div>
					<div class="bottom_part_right">
						<div class="re">
							<h4 class="show_re">相关视频</h4>
							<ul class="cream">
								<li class="sp clearfix">
									<a><img class="re_pic" src="../Public/images/v/02.jpg" alt="no" /></a>
									<div class="re_ct">
										<p>视频名称:<span>XXX</span></p>
										<p>小标语:<span>XXX</span></p>
										<p>播放:<span>XXX</span></p>
										<p>时长:<span>XXX</span></p>
									</div>
								</li>
								<li class="clearfix">
									<a><img class="re_pic" src="../Public/images/v/03.jpg" alt="no" /></a>
									<div class="re_ct">
										<p>视频名称:<span>XXX</span></p>
										<p>小标语:<span>XXX</span></p>
										<p>播放:<span>XXX</span></p>
										<p>时长:<span>XXX</span></p>
									</div>
								</li>
							</ul>
						</div>
						<a><img src="../Public/images/v/01.png" class="adv"></a>
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