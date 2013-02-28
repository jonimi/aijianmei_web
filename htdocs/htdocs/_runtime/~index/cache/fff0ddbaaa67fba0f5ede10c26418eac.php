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
						<h1 class="video_all">视频</h1>
						<ul>
							<li class="each_video all">
								计划
							</li>
							<li class="each_video">
								<a href="add_1.html">找到一个计划</a>
							</li>
							<li class="each_video">
								<a href="add_1.html">脂肪损失</a>
							</li>
							<li class="each_video">
								<a href="add_1.html">肌肉建设</a>
							</li>
							<li class="each_video">
								<a href="add_11.html">寻找教练</a>
							</li>
							<li class="each_video">
								<a href="add_11.html">寻找健身房</a>
							</li>
							<li class="each_video">
								<a href="add_11.html">每日锻炼</a>
							</li>
						</ul>
					</div>
				</div>
				<span class="corner_bottom"></span>
			</div>

			<div class="content">
				<h2>每天锻炼</h2>
				<?php foreach($info as $i) { ?>
				<div class="module_1">
					<p class="show_time"><?php echo ($i['article']['ctime']); ?></p>	
					<div class="package clearfix">			
						<div class="part_1">
							<h3 class="nowaday"><?php echo ($i['article']['title']); ?></h3>
							<?php echo (htmlspecialchars_decode($i['article']['content'])); ?>
							<div class="show_pic">
								<a><img src="/public/images/article/<?php echo ($i['article']['img']); ?>" alt="no" /></a>
								<a>enlarge image</a>
							</div>
							<div class="vidio">
								<h2>锻炼视频示范</h2>
								<ul class="video_list">
								<?php foreach($i['video'] as $v) { ?>
									<li>
										<a href="/index.php?app=index&mod=Train&act=videoDetail&from=daily&id=<?php echo ($v['id']); ?>">
											<img src="<?php echo ($v['img']); ?>" width="150" />
										</a>
																				
									</li>
								<?php } ?>
									<!-- <li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_13.jpg" />
										</a>
									</li>
									<li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_14.jpg" />
										</a>
									</li> -->
								</ul>
								<span>发布时间  <span>5:00pm</span></span>
								<a class="video_commit">评论(13)</a>
							</div>
							<a href="<?php echo U('index/Index/daily', array('id'=>$i['article']['id']));?>" class="checking">查看</a>
						</div>
						<div class="part_2 clearfix">
							<div class="expand_1">
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
							</div>
							<div class="expand_2">
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
								<a class="sprite_8"><span class="praise">100</span></a>
								<a class="sprite_9"><span class="praise">100</span></a>			
							</div>
							<div class="expand_3 clearfix">
								<div class="check_comment">
									<a class="comment_1">全部评论(0)</a>
									<a class="comment_2 comment_3">精选评论</a>
								</div>
								<?php foreach($i['comments'] as $c) { ?>
								<div class="cm_bottom">
									<div class="target clearfix">
										<div class="target_pic">
											<img src="<?php echo ($c['userInfo']['face']); ?>" alt="no" />
											<span class="care">关注</span>
										</div>
										<div class="target_ct">
											<a class="name"><?php echo ($c['userInfo']['uname']); ?></a>
											<p><?php echo ($c['content']); ?></p>
											<p class="bottom_ms">
												<span class="to">
													<a>转发<span>(0)</span></a>
													<a>回复<span>(0)</span></a>
												</span>	
												<span>22个小时前</span>
												<span>来自<em></em></span>
											</p>
										</div>
									</div>
								</div>
								<?php } ?>
								<!-- <div class="cm_bottom">
									<div class="target clearfix">
										<div class="target_pic">
											<img src="../Public/images/every/mrlb_02.png" alt="no" />
											<span class="care">关注</span>
										</div>
										<div class="target_ct">
											<a class="name">huifei</a>
											<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的.</p>
											<p class="bottom_ms">
												<span class="to">
													<a>转发<span>(0)</span></a>
													<a>回复<span>(0)</span></a>
												</span>	
												<span>22个小时前</span>
												<span>来自<em></em></span>
											</p>
										</div>
									</div>
								</div> -->	
								<a href="arm.html" class="check_more">查看所有评论</a>
							</div>
							<div class="border_comment">
								<span class="word_num">0/300</span>
								<span>登录</span>|
								<span>注册</span>
								
								<div class="textarea"><textarea class="comment_inp" name="comment" id="comment">有什么感想，来说说吧</textarea></div>
								<a class="comment" href="javascript:void(0)" onclick="comments(comment.value, <?php echo ($i['article']['id']); ?>, 'Daily')">发表评论</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<!-- <div class="module_1">
					<p class="show_time">2012 12 21</p>	
					<div class="package clearfix">			
						<div class="part_1">
							<h3 class="nowaday">friday 121207</h3>
							<span>for time:</span>
							<p>95 pound overhead squat,30 reps 7 muscle-ups</p>
							<span>post times to comments</span>
							<div class="show_pic">
								<a><img src="../Public/images/every/mrlb_08.jpg" alt="no" /></a>
								<a>enlarge image</a>
							</div>
							<div class="vidio">
								<h2>锻炼视频示范</h2>
								<ul class="video_list">
									<li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_12.jpg" />
										</a>
									</li>
									<li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_13.jpg" />
										</a>
									</li>
									<li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_14.jpg" />
										</a>
									</li>
								</ul>
								<span>发布时间  <span>5:00pm</span></span>
								<a class="video_commit">评论(13)</a>
							</div>
							<a href="arm.html" class="checking">查看</a>
						</div>
						<div class="part_2 clearfix">
							<div class="expand_1">
								<span class="relay">转发到</span>
								<a class="sprite_1"></a>
								<a class="sprite_2"></a>
								<a class="sprite_3"></a>
								<a class="sprite_4"></a>
								<a class="sprite_5"></a>
								<a class="sprite_6"></a>
							</div>
							<div class="expand_2">
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
								<a class="sprite_8"><span class="praise">100</span></a>
								<a class="sprite_9"><span class="praise">100</span></a>			
							</div>
							<div class="expand_3 clearfix">
								<div class="check_comment">
									<a class="comment_1">全部评论(0)</a>
									<a class="comment_2 comment_3">精选评论</a>
								</div>
								<div class="cm_bottom">
									<div class="target clearfix">
										<div class="target_pic">
											<img src="../Public/images/every/mrlb_02.png" alt="no" />
											<span class="care">关注</span>
										</div>
										<div class="target_ct">
											<a class="name">huifei</a>
											<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的.</p>
											<p class="bottom_ms">
												<span class="to">
													<a>转发<span>(0)</span></a>
													<a>回复<span>(0)</span></a>
												</span>	
												<span>22个小时前</span>
												<span>来自<em></em></span>
											</p>
										</div>
									</div>
								</div>
								<div class="cm_bottom">
									<div class="target clearfix">
										<div class="target_pic">
											<img src="../Public/images/every/mrlb_02.png" alt="no" />
											<span class="care">关注</span>
										</div>
										<div class="target_ct">
											<a class="name">huifei</a>
											<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的.</p>
											<p class="bottom_ms">
												<span class="to">
													<a>转发<span>(0)</span></a>
													<a>回复<span>(0)</span></a>
												</span>	
												<span>22个小时前</span>
												<span>来自<em></em></span>
											</p>
										</div>
									</div>
								</div>	
								<a href="arm.html" class="check_more">查看所有评论</a>
							</div>
							<div class="border_comment">
								<span class="word_num">0/300</span>
								<span>登录</span>|
								<span>注册</span>
								
								<div class="textarea"><textarea class="comment_inp" name="comment">有什么感想，来说说吧</textarea></div>
								<a class="comment">发表评论</a>
							</div>
						</div>
					</div>
				</div> -->
				<!-- <div class="module_1">
					<p class="show_time">2012 12 21</p>	
					<div class="package clearfix">			
						<div class="part_1">
							<h3 class="nowaday">friday 121207</h3>
							<span>for time:</span>
							<p>95 pound overhead squat,30 reps 7 muscle-ups</p>
							<span>post times to comments</span>
							<div class="show_pic">
								<a><img src="images/every/mrlb_08.jpg" alt="no" /></a>
								<a>enlarge image</a>
							</div>
							<div class="vidio">
								<h2>锻炼视频示范</h2>
								<ul class="video_list">
									<li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_12.jpg" />
										</a>
									</li>
									<li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_13.jpg" />
										</a>
									</li>
									<li>
										<a href="v.html">
											<img src="../Public/images/every/mrlb_14.jpg" />
										</a>
									</li>
								</ul>
								<span>发布时间  <span>5:00pm</span></span>
								<a class="video_commit">评论(13)</a>
							</div>
							<a href="arm.html" class="checking">查看</a>
						</div>
						<div class="part_2 clearfix">
							<div class="expand_1">
								<span class="relay">转发到</span>
								<a class="sprite_1"></a>
								<a class="sprite_2"></a>
								<a class="sprite_3"></a>
								<a class="sprite_4"></a>
								<a class="sprite_5"></a>
								<a class="sprite_6"></a>
							</div>
							<div class="expand_2">
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
								<a class="sprite_8"><span class="praise">100</span></a>
								<a class="sprite_9"><span class="praise">100</span></a>			
							</div>
							<div class="expand_3 clearfix">
								<div class="check_comment">
									<a class="comment_1">全部评论(0)</a>
									<a class="comment_2 comment_3">精选评论</a>
								</div>
								<div class="cm_bottom">
									<div class="target clearfix">
										<div class="target_pic">
											<img src="../Public/images/every/mrlb_02.png" alt="no" />
											<span class="care">关注</span>
										</div>
										<div class="target_ct">
											<a class="name">huifei</a>
											<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的.</p>
											<p class="bottom_ms">
												<span class="to">
													<a>转发<span>(0)</span></a>
													<a>回复<span>(0)</span></a>
												</span>	
												<span>22个小时前</span>
												<span>来自<em></em></span>
											</p>
										</div>
									</div>
								</div>
								<div class="cm_bottom">
									<div class="target clearfix">
										<div class="target_pic">
											<img src="../Public/images/every/mrlb_02.png" alt="no" />
											<span class="care">关注</span>
										</div>
										<div class="target_ct">
											<a class="name">huifei</a>
											<p>高兴是人类最原始的最求，只能让大家高兴，管他是那个国家的.</p>
											<p class="bottom_ms">
												<span class="to">
													<a>转发<span>(0)</span></a>
													<a>回复<span>(0)</span></a>
												</span>	
												<span>22个小时前</span>
												<span>来自<em></em></span>
											</p>
										</div>
									</div>
								</div>	
								<a href="arm.html" class="check_more">查看所有评论</a>
							</div>
							<div class="border_comment">
								<span class="word_num">0/300</span>
								<span>登录</span>|
								<span>注册</span>
								
								<div class="textarea"><textarea class="comment_inp" name="comment">有什么感想，来说说吧</textarea></div>
								<a class="comment">发表评论</a>
							</div>
						</div>
					</div>
				</div> -->
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