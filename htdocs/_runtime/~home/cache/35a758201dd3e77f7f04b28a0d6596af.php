<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8"/>
			<title>爱健美</title>
			<link rel="stylesheet" href="../Public/css/public.css" />
			<link rel="stylesheet" href="../Public/css/<?php echo ($cssFile); ?>.css" />
			
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
						<li><a hrefhref="javascript:void(0);" onclick="alert('正在建设中')">论坛</a></li>
						<li><a hrefhref="javascript:void(0);" onclick="alert('正在建设中')">交友互动</a></li>
					</ul>
					<span class="position">爱健美/首页</span>
				</div>

<script type="text/javascript" src="/public/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.form.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/public/js/tbox/box.js"></script>
<script type="text/javascript" src="/public/js/common.js"></script>
<script src="../Public/js/slides.min.jquery.js"></script>
<script src="/public/js/weibo.js" type="text/javascript"></script>

				<div class="sub_nav">
					<ul class="wb_nav clearfix">
						<li class="wb_nav_list"><a href="<?php echo U('home/User/index');?>">首页</a></li>
						<li class="wb_nav_list"><a href="<?php echo U('home/User/personal');?>">个人主页</a></li>
					</ul>
				</div>
				<div class="content clearfix">
					<div class="total_info clearfix">
						<div class="cover"></div>
						<div class="info0 clearfix">
							<div class="rank">
								<div class="rank_info">
									<span class="js_rank"></span>
									<p class="person"><span class="daren">高级达人 </span> 积分： <span class="score"><?php echo ($data['user']['credit']['score']); ?></span></p>
									<p class="person">兴趣： <span class="intr"> 健身 </span><span class="intr"> 健美 </span> </p>
								</div>
							</div>
							<div class="user_info">
								<div class="style_info">
									<span class="name"><?php echo ($data['user']['uname']); ?></span>
									<span class="grade_icon"></span>
									<a href="http://www.aijianmei.com">http://www.aijianmei.com</a>
								</div>
								<p class="sign">aijianmei</p>
								<div class="fans">
									<ul>
										<li class="fan_info"><span class="gz_amount"><?php echo ($data['user']['following']); ?></span>关注</li>
										<li class="fan_info"><span class="fs_amount"><?php echo ($data['user']['follower']); ?></span>粉丝</li>
										<li class="fan_info"><span class="wb_amount"><?php echo ($data['user']['miniNum']); ?></span>微博</li>
									</ul>
								</div>
								<a href="<?php echo U('home/User/myinfo');?>"><button class="edit">编辑个人资料</button></a>
							</div>
						</div>
						<div class="face_info">
							<img src="images/pal/ad1.jpg" alt="" class="face" />
						</div>
					</div>
					<!--End total info-->
					<div class="main_info">
						<div class="main_nav">
							<ul class="main_header clearfix">
								<li class="main_p"><a href="<?php echo U('home/User/personal');?>">我的主页</a></li>
								<li class="main_p"><a href="<?php echo U('home/User/myinfo');?>">个人资料</a></li>
								<li class="main_p"><a href="<?php echo U('home/User/album');?>">相册</a></li>
							</ul>
						</div>
						<div class="fans_area clearfix">
							<div class="person">
								<div class="sort clearfix">
									<ul class="grade clearfix">
										<li class="grade_item">全部</li>
										<li class="grade_item">微博</li>
									</ul>
									<div class="search_adv">
										<form action="">
											<input class="inner_search" type="text" value="搜索我说的话"/>
											<input class="inner_button" type="button" />
										</form>
									</div>
								</div>
								<div class="weibo">
									<ul class="clearfix">
									<?php foreach($data['weibo_menu'] as $m) { ?>
										<li class="wb_item curr_sort"><a href=""><?php echo ($m); ?></a></li>
									<?php } ?>
										<!-- <li class="wb_item"><a href="">原创</a></li>
										<li class="wb_item"><a href="">图片</a></li>
										<li class="wb_item"><a href="">视频</a></li>
										<li class="wb_item"><a href="">音乐</a></li> -->
									</ul>
								</div>
								<div class="wb_feed">
									<!-- <div class="wb_feed_list">
										<div class="wb_text">转发微博</div>
										<div class="wb_expand">
											<div class="wb_expand_text">
												<a class="wb_user" href="">User</a>
												<div class="wb_text">
													<p>testing testing 内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
													<div><img src="images/pal/ad2.jpg" alt="" /></div>
												</div>
												<p class="info com_detail">
													<span class="C_time">12月17日 23：00</span>
													来自<a href="" class="feed_from">微博聊天</a>
													<span class="func"><a href="" class="reply">转发 </a>|<a href="" class="reply"> 评论</a></span>
												</p>
											</div>
										</div>wb_expand
										<div class="clearfix">
											<a class="time" href=""><span>1</span>分钟前</a>
											<ul class="clearfix">
												<li class="function">|&nbsp; 
													<a class="wb_func comment" > 评论<span>(1)</span></a>
												</li>
												<li class="function">|&nbsp;
													<a class="wb_func collect"> 收藏</a>
													<div class="func2">
														<button title="关闭" class="close_sc">×</button>
														<p class="seccess">收藏成功！</p>
														<div class="tag"><input type="text" /></div>
														<p class="tag_tip">最多两个标签，用空格分隔</p>
														<p class="sc_btn">
															<button class="sc">收藏</button>
															<button class="qx">取消</button>
														</p>
													</div>
												</li>
												<li class="function">
													<a class="wb_func transmit">转发</a>
													<div class="covering"></div>
													<div class="func3" style="top:-50px;left:-400px;" id='pop-editor'>
														<h5 class="transmit_h" onmousedown='down(event)' onmouseup='up()' >转发微博<button title="关闭" class="close_zf">×</button></h5>
														<div class="transmit_c">
															<p class="transmit_wb">
																@aijianmei:aijianmei
															</p>
															<textarea name="" id="comment_area"></textarea>
															<ul class="func1_icon">
																<li class="icon_list"><button title="表情" class="icon express"></button></li>
																<li class="icon_list">
																	<input type="checkbox" id="sync_pl" />
																	<label for="sync_pl">同时评论给 <span>aijianmei </span> </label>
																</li>
																<li class="icon_list"> 同步到</li>
																<li class="icon_list"><button title="QQ空间" sync="false" class="icon sync_qzone"></button></li>
																<li class="icon_list"><button title="新浪微博" sync="false"  class="icon sync_sina"></button></li>
																<li class="icon_list"><button title="腾讯微博" sync="false"  class="icon sync_tencent"></button></li>
															</ul>
															<button class="comment_btn">转发</button>
														</div>
													</div>
												</li>
											</ul>
											<div class="func1">
												<div class="clearfix">
													<textarea name="" id="comment_area"></textarea>
													<ul class="func1_icon">
														<li class="icon_list"><button title="表情" class="icon express"></button></li>
														<li class="icon_list">
															<input type="checkbox" id="sync_opt" />
															<label for="sync_opt">同时转发到我的微博</label>
														</li>
														<li class="icon_list">同步到</li>
														<li class="icon_list"><button title="QQ空间" sync="false" class="icon sync_qzone"></button></li>
														<li class="icon_list"><button title="新浪微博" sync="false"  class="icon sync_sina"></button></li>
														<li class="icon_list"><button title="腾讯微博" sync="false"  class="icon sync_tencent"></button></li>
													</ul>
													<button class="comment_btn">评论</button>
												</div>
												<div class="func_comment_list clearfix">
													<a class="comment_list_face" href="">
														<img src="images/pal/ad1.jpg" width="30" height="30" alt="" />
													</a>
													<p class="comment_content">
														<a href="">nickName</a>:comment(1分钟前)
														<span class="response">
															<a href="">删除 </a> | <a href=""> 回复</a>
														</span>
													</p>
												</div>
											</div>评论
										</div>
									</div> --><!--wb_feed_list-->
									<?php foreach($data['list']['data'] as $d) { ?>
									<div class="wb_feed_list">
										<div class="wb_text"><?php echo ($d['content']); ?></div>
										<div class="clearfix">
											<a class="time" href=""><span>1</span>分钟前</a>
											<ul class="clearfix">
												<li class="function">|&nbsp; 
													<a class="wb_func" > 评论<span>(<?php echo ($d['comment']); ?>)</span></a>
												</li>
												<li class="function">|&nbsp;
													<a class="wb_func"> 收藏</a>
													
												</li>
												<li class="function">
													<a class="wb_func">转发</a>
												</li>
											</ul>											
										</div>
									</div><?php } ?><!--wb_feed_list-->
								</div><!--wb_feed-->
								
								<div class="catalog">
									<button class="prev_page">上一页</button>
									<span class="pages current_page">1</span><span class="pages">2</span><span class="pages">3</span>
									<button class="next_page">下一页</button>
								</div>
							</div><!--Left-->
							<div class="other_fans">
								<div class="other_top clearfix">
									<dl>
										<dt class="my_face">
											<a href=""><img width="40" height="40" src="images/pal/ad1.jpg" alt="" /></a>
										</dt>
										<dd class="other_header">
											<p class="tit">关注/粉丝</p>
											<span>我的关注和粉丝</span>
										</dd>
									</dl>
								</div>
								<div class="others clearfix">
									<h4 class="others_title">推荐关注</h4>
									<a href="" class="re_more">更多>></a>
									<?php echo W('RelatedUser', array('mid'=>$mid));?>
									<!-- <dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl>
									<dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl>
									<dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl>
									<dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl> -->
								</div>
								<div class="others clearfix">
									<h4 class="others_title">可能认识</h4>
									<a href="" class="re_more">更多>></a>
									<?php echo W('RelatedUser', array('mid'=>$mid));?>
									<!-- <dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl>
									<dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl>
									<dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl>
									<dl class="o_fans">
										<dt class="other_face">
											<a href=""><img width="50" height="50" src="images/pal/ad2.jpg" alt="" /></a>
										</dt>
										<dd><a href="" class="other_name">aijianmeiaijianmei</a>...</dd>
									</dl> -->
								</div>
								<div class="scanning clearfix">
									<h4 class="left_sort">别人都在看</h4>
									<ul>
										<li  class="scan">
											<a class="scan_pic" href="">
												<img class="scan_pic_img" src="images/pal/v1.jpg" alt="" />
												<span class="scan_pic_name">胸肌、手臂训练范例</span>
											</a>
										</li>
										<li class="scan" >
											<a class="scan_pic" href="">
												<img class="scan_pic_img" src="images/pal/v2.jpg" alt="" />
												<span class="scan_pic_name">腹肌、手臂训练范例</span>
											</a>
										</li>
										<li class="scan" >
											<a class="scan_pic" href="">
												<img class="scan_pic_img" src="images/pal/v3.jpg" alt="" />
												<span class="scan_pic_name">腹肌、手臂训练范例</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="scanning clearfix">
									<h4 class="left_sort">推荐</h4>
									<ul>
										<li  class="scan">
											<a class="scan_pic" href="">
												<img class="scan_pic_img" src="images/pal/ad1.jpg" alt="" />
												<span class="scan_pic_name">广告语 广告语</span>
											</a>
										</li>
										<li class="scan" >
											<a class="scan_pic" href="">
												<img class="scan_pic_img" src="images/pal/ad2.jpg" alt="" />
												<span class="scan_pic_name">广告语 广告语</span>
											</a>
										</li>
									</ul>
								</div>
							</div><!--Right-->
						</div>
					</div><!-- End main info-->
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
				</div>
				<!--Footer End-->
				<div id="lower_footer">
					<span>广州加伦信息科技有限公司- 粤ICP备12085654号</span>
					<a href="intro.html">www.aijianmei.com</a>
				</div>
			<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
			<script type="text/javascript" src="../Public/js/public.js"></script>
			<script type="text/javascript" src="../Public/js/jquery-ui.js"></script>
			<script type="text/javascript" src="../Public/js/weibo.js"></script>
			<script type="text/javascript">
				$(function(){
					$(".close_ad").click(function(){
						$(this).parent().hide("slow");
					});

					$(".sync_qzone,.sync_sina,.sync_tencent").click(function(){
							var y = parseFloat( $(this).css("background-position-y"));
							sync = $(this).attr("sync")
							console.log(sync);
							if(!sync){
								y -= 26;
								$(this).attr("sync") = "true";
							}
							else{
								y += 26;
								$(this).attr("sync") = false;
							}
							
							$(this).css("background-position-y",y);
					})
				})
			</script>
		</body>
	</html>