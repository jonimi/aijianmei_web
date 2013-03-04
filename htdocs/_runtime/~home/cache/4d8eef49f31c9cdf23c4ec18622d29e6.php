<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
					<div class="left">
						<div class="grouping">
							<?php if(!empty($follow_group_list)){ ?>
			                  <div class="dropmenu">
			                        <dl class="Att_list">
			                            <?php if(is_array($follow_group_list)): ?><?php $i = 0;?><?php $__LIST__ = $follow_group_list?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo U('home/user/index',array('type'=>UserAction::INDEX_TYPE_WEIBO,'weibo_type'=>$weibo_type,'follow_gid'=>$vo['follow_group_id']));?>"><?php echo ($vo["title"]); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
			                        </dl>
			                  </div>
			                 <?php } ?>
							<h4 class="left_sort">分组</h4>
							<ul class="classify">
							<?php foreach($groups as $g) { ?>
								<li class="group"><a href=""><?php echo ($g['title']); ?></a></li>
							<?php } ?>
								<!-- <li class="group"><a href="">分组2</a></li>
								<li class="group"><a href="">分组3</a></li>
								<li class="group"><a href="">分组4</a></li>
								<li class="group"><a href="">分组5</a></li> -->
							</ul>
							<button class="open">展开</button>
						</div>
						<div class="scaning">
							<h4 class="left_sort">别人都在看</h4>
							<ul>
								<li  class="scan">
									<a class="scan_pic" href="">
										<img class="scan_pic_img" src="../Public/images/pal/v1.jpg" alt="" />
										<span class="scan_pic_name">胸肌、手臂训练范例</span>
									</a>
								</li>
								<li class="scan" >
									<a class="scan_pic" href="">
										<img class="scan_pic_img" src="../Public/images/pal/v2.jpg" alt="" />
										<span class="scan_pic_name">腹肌、手臂训练范例</span>
									</a>
								</li>
								<li class="scan" >
									<a class="scan_pic" href="">
										<img class="scan_pic_img" src="../Public/images/pal/v3.jpg" alt="" />
										<span class="scan_pic_name">腹肌、手臂训练范例</span>
									</a>
								</li>
								<li class="scan"><a class="scan_art" href="">别人都在看的文章1</a></li>
								<li class="scan"><a class="scan_art" href="">别人都在看的文章2</a></li>
								<li class="scan"><a class="scan_art" href="">别人都在看的文章3</a></li>
								<li class="scan"><a class="scan_art" href="">别人都在看的文章4</a></li>
								<li class="scan"><a class="scan_art" href="">别人都在看的文章5</a></li>
								<li class="scan"><a class="scan_art" href="">别人都在看的文章6</a></li>
							</ul>
						</div>
						<div class="recommand">
							<h4 class="left_sort">推荐</h4>
							<ul>
								<li class="command">
									<a class="command_ad" href="">
										<img class="command_ad_pic" src="../Public/images/pal/ad.jpg" alt="" />
										<span class="command_ad_word">广告语广告语</span>
									</a>
								</li>
								<li class="command">
									<a class="command_ad" href="">
										<img class="command_ad_pic" src="../Public/images/pal/ad1.jpg" alt="" />
										<span class="command_ad_word">广告语广告语</span>
									</a>
								</li>
								<li class="command">
									<a class="command_ad" href="">
										<img class="command_ad_pic" src="../Public/images/pal/ad2.jpg" alt="" />
										<span class="command_ad_word">广告语广告语</span>
									</a>
								</li>
							</ul>
						</div>
					</div><!--End Left-->
					<div class="right">
						<div class="user clearfix">
							<dl class="user_info clearfix">
								<dt>
									<a href="personal.html" class="about_user">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="user_img" />
									</a>
								</dt>
								<dd>
									<a href="personal.html" class="user_name"><?php echo ($userInfo['uname']); ?></a>
								</dd>
								<dd><a class="user_name user_rank"></a></dd>
							</dl>
							<ul class="user_atten">
								<li class="attentions"><a href="fans.html"><span class="atten_amount"><?php echo ($userInfo['followers_count']); ?></span>关注</a></li>
								<li class="fans"><a href="fans.html"><span class="atten_amount"><?php echo ($userInfo['followed_count']); ?></span>粉丝</a></li>
								<li class="weibo"><a href="personal.html"><span class="atten_amount"><?php echo ($userInfo['weibo_count']); ?></span>微博</a></li>
							</ul>
						</div>
						<div class="review">
							<p class="your_weibo">
								<a href=""><span class="hot">回顾你的微博点滴</span></a>
							</p>	
						</div>
						<div class="member clearfix">
							<h4>最活跃的会员</h4>
							<?php foreach($members as $m) { ?>
							<dl class="member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="member_img" />
									</a>
								</dt>
								<dd class="member_name">
									<a href=""><?php echo ($m['uname']); ?></a>
								</dd>
							</dl>
							<?php } ?>
							<!-- <dl class="member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="member_img" />
									</a>
								</dt>
								<dd class="member_name">
									<a href="">member</a>
								</dd>
							</dl>
							<dl class="member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="member_img" />
									</a>
								</dt>
								<dd class="member_name">
									<a href="">member</a>
								</dd>
							</dl>
							<dl class="member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="member_img" />
									</a>
								</dt>
								<dd class="member_name">
									<a href="">member</a>
								</dd>
							</dl> -->
						</div>
						<div class="member clearfix">
							<h4>最新会员</h4>
							<?php foreach($members as $m) { ?>
							<dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href=""><?php echo ($m['uname']); ?></a>
								</dd>
							</dl>
							<?php } ?>
							<!-- <dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href="">name</a>
								</dd>
							</dl>
							<dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href="">name</a>
								</dd>
							</dl>
							<dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href="">name</a>
								</dd>
							</dl>
							<dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href="">name</a>
								</dd>
							</dl>
							<dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href="">name</a>
								</dd>
							</dl>
							<dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href="">name</a>
								</dd>
							</dl>
							<dl class="new_member_info clearfix">
								<dt>
									<a href="" class="about_member">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="new_member_img" />
									</a>
								</dt>
								<dd class="new_member_name">
									<a href="">name</a>
								</dd>
							</dl> -->
						</div>
						<?php echo W('RelatedUser', array('mid'=>$mid));?>
						
						<!-- <div class="member">
							<h4>推荐会员</h4>
							<dl class="recommend_info clearfix">
								<dt>
									<a href="" class="about_recommend">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="recommend_img" />
									</a>
								</dt>
								<dd>
									<a href="" class="recommend_name">member name</a>
								</dd>
							</dl>
							<dl class="recommend_info clearfix">
								<dt>
									<a href="" class="about_recommend">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="recommend_img" />
									</a>
								</dt>
								<dd>
									<a href="" class="recommend_name">member name</a>
								</dd>
							</dl>
							<dl class="recommend_info clearfix">
								<dt>
									<a href="" class="about_recommend">
										<img src="../Public/images/pal/ad1.jpg" alt="" class="recommend_img" />
									</a>
								</dt>
								<dd>
									<a href="" class="recommend_name">member name</a>
								</dd>
							</dl>
						</div> -->
						<div class="member">
							<h4>公告栏</h4>
							<p class="notice">公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容</p>
							<a href="" class="view_detail">查看详情>></a>
						</div>
					</div><!--End Right-->
					<div class="middle">
						<div class="main_top clearfix">
							<div class="title">
								<img src="../Public/images/pal/send_weibo.png" alt="" />
							</div>
						</div>
						<div class="enter">
							<form id="fb" action="<?php echo U('weibo/Operate/publishWeibo');?>" method="post" oncomplete="false">
								<input type="hidden" name="publish_type" value="0">
								<input type="hidden" name="weibo_content_type" id="weibo_content_type" value="0" />
								<ul class="btn clearfix">
									<li class="select s1 f_b" onclick="weibo_content_type.value='0'">微博</li>
									<li class="select s2" onclick="weibo_content_type.value='1'">爱问</li>
									<li class="select s3" onclick="weibo_content_type.value='2'">预约</li>
								</ul>
								<div class="dialog">
									<p class="dl_time">
										<label for="datepicker">日期: </label><input type="text" id="datepicker" name="start_date" />
										<label for="start_time">开始时间：</label><input type="text" id="start_time" name="start_time" class="timepicker"/>
										<label for="end_time">结束时间：</label><input type="text" id="end_time" name="end_time" class="timepicker" />
									</p>
									<p class="dl_type">
										类型：
										<input type="radio" name="dialog" value="减肥"  id="loss"/><label for="loss">减肥</label>
										<input type="radio" name="dialog" value="增肌"  id="build" /><label for="build">增肌</label>
										<input type="radio" name="dialog" value="瑜伽"  id="yoga"  /><label for="yoga">瑜伽</label>
										<input type="radio" name="dialog" value="瘦身"  id="slim" /><label for="slim">瘦身</label>
										<input type="radio" name="dialog" value="其他"  id="other" /><label for="other">其他</label>
									</p>
									<div class="tp">
										<div class="ui_title">请选择时间段</div>
										<div class="ui_tip">请选择开始时间和结束时间</div>
										<ul class="ui_timepicker">
											<li class="timelist"><a class="hours">1:00</a></li>
											<li class="timelist"><a class="hours">2:00</a></li>
											<li class="timelist"><a class="hours">3:00</a></li>
											<li class="timelist"><a class="hours">4:00</a></li>
											<li class="timelist"><a class="hours">5:00</a></li>
											<li class="timelist"><a class="hours">6:00</a></li>
											<li class="timelist"><a class="hours">7:00</a></li>
											<li class="timelist"><a class="hours">8:00</a></li>
											<li class="timelist"><a class="hours">9:00</a></li>
											<li class="timelist"><a class="hours">10:00</a></li>
											<li class="timelist"><a class="hours">11:00</a></li>
											<li class="timelist"><a class="hours">12:00</a></li>
											<li class="timelist"><a class="hours">13:00</a></li>
											<li class="timelist"><a class="hours">14:00</a></li>
											<li class="timelist"><a class="hours">15:00</a></li>
											<li class="timelist"><a class="hours">16:00</a></li>
											<li class="timelist"><a class="hours">17:00</a></li>
											<li class="timelist"><a class="hours">18:00</a></li>
											<li class="timelist"><a class="hours">19:00</a></li>
											<li class="timelist"><a class="hours">20:00</a></li>
											<li class="timelist"><a class="hours">21:00</a></li>
											<li class="timelist"><a class="hours">22:00</a></li>
											<li class="timelist"><a class="hours">23:00</a></li>
											<li class="timelist"><a class="hours">24:00</a></li>
										</ul>
									</div>
								</div>
								<textarea name="content" id="enter"></textarea>
								<input type="button" class="send" value="发布" onclick="fb.submit()" />
								
							</form>
						</div>
						<div id="publish_type_content_before" class="kind">
		                  <?php echo Addons::hook('home_index_middle_publish_type',array('position'=>'index'));?>
		                </div>
						<!-- <div class="icons">
							<ul>
								<li class="icon_list"><button title="表情" class="icon express" target_set="content_publish" onclick="ui.emotions(this)"></button></li>
								<li class="icon_list"><button title="图片" class="icon picture" onclick="weibo.reset();weibo.plugin.image.click(this)"></button></li>
								<li class="icon_list"><button title="话题" class="icon topic" onclick="weibo.addtheme()"></button></li>
								<li class="icon_list">同步到</li>
								<li class="icon_list"><button title="QQ空间" sync="false" class="icon sync_qzone"></button></li>
								<li class="icon_list"><button title="新浪微博" sync="false"  class="icon sync_sina"></button></li>
								<li class="icon_list"><button title="腾讯微博" sync="false"  class="icon sync_tencent"></button></li>
							</ul>
							
						</div> -->
						<div class="ad">
							<button title="关闭" class="close_ad"></button>
							<a href=""><img src="../Public/images/pal/banner.jpg" alt="" /></a>
						</div>
						<div class="sort clearfix">
							<ul class="grade clearfix">
								<li class="grade_item current">全部</li>
								<li class="grade_item">初学者</li>
								<li class="grade_item">运动员</li>
								<li class="grade_item">健美者</li>
								<li class="grade_item">减肥者</li>
								<li class="grade_item">模特</li>
							</ul>
							<div class="search_adv">
								<form action="">
									<input class="inner_search" type="text" value="查找作者、内容或标签"/>
									<input class="inner_button" type="button" />
								</form>
							</div>
						</div>
						<div class="weibo">
							<ul class="clearfix">
								<li class="wb_item curr_sort"><a href="">全部</a></li>
								<li class="wb_item"><a href="">原创</a></li>
								<li class="wb_item"><a href="">图片</a></li>
								<li class="wb_item"><a href="">视频</a></li>
								<li class="wb_item"><a href="">音乐</a></li>
							</ul>
						</div>
						<div class="data">
							<!-- <div class="wb_face">
								<a href=""><img class="user_face" src="../Public/images/pal/ad1.jpg" alt="" /></a>
							</div> -->
							<?php if(!empty($weibo_menu)){ ?>
				              <a href="javascript:void(0)" class="right  ico_show_<?php echo ($typeClass); ?>" onclick='weibo.showAndHideMenu("MenuSub", this, "ico_show_off", "ico_show_on");'></a>
				              <?php } ?>
				              <?php if(is_array($weibo_menu)): ?><?php $i = 0;?><?php $__LIST__ = $weibo_menu?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a id="feed_all_item" rel="all" class="<?php if(($weibo_type)  ==  $key): ?>on<?php endif; ?> feed_item" href="<?php echo U('home/User/index',array('follow_gid'=>$group_now['follow_group_id'],'type'=>$type,'weibo_type'=>$key));?>"><span><?php echo ($vo); ?></span></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
							<?php if($gid){ ?>
								<?php echo W('WeiboList', array('mid'=>$mid, 'list'=>$list['data'], 'insert'=>1,'simple'=>1));?>
							<?php }else{ ?>
								<?php echo W('WeiboList', array('mid'=>$mid, 'list'=>$list['data'], 'insert'=>1));?>
							<?php } ?>														
							
							<?php if(ACTION_NAME=="index"){ ?>
							<?php if($list['data']){ ?>
							<p class="moreFoot">
								<a id="loadMoreDiv" href="javascript:void(0)"><span class="ico_morefoot"></span>更多</a>
							</p>
							<?php }else{ ?>
								<p class="moreFoot">没有任何数据</p>
							<?php } ?>
							<?php }else{ ?>
								<div class="page"><?php echo ($list['html']); ?></div>
							<?php } ?>
							<!-- <div class="wb_content">
								<a class="wb_user" href="">User</a>
								<div class="wb_text">
									<p>testing testing 内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
								</div>
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
									</div>
								</div>
							</div> -->
						</div>
					
					</div><!-- End Middle-->
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
			
			<script type="text/javascript" src="../Public/js/public.js"></script>
			<script type="text/javascript" src="../Public/js/jquery-ui.js"></script>
			<script type="text/javascript" src="../Public/js/weibo.js"></script>
		</body>
	</html>