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
			<div class="leftsidebar">
				<div class="choice_register">
					<a class="method email choice_me_1">电子邮箱注册</a>
					<a class="method telephone">手机号码注册</a>
				</div>
				<form class="formest" action="/index.php?app=index&mod=Index&act=doRegister" method="post" id="form1">
					<div class="box box_1">
						<label class="items" for="text_1"><span class="show_state state_1">*</span>注册邮箱</label>
						<input type="text" class="text" name="email" id="text_1" value="">
						<div class="prompt_box_1 same_prompt"></div>
					</div>
					<div class="box box_2">
						<label class="items" for="text_2"><span class="show_state">*</span>创建密码</label>
						<input type="password" name="password" class="text" id="text_2">
						<div class="prompt_box_2">
						</div>
					</div>
					<div class="box box_3">
						<label class="items" for="text_3"><span class="show_state">*</span>再次输入密码</label>
						<input type="password" name="repassword" class="text" id="text_3">
						<div class="prompt_box_3"></div>
					</div>
					<div class="box box_4">
						<label class="items" for="text_4"><span class="show_state">*</span>昵称</label>
						<input type="text" class="text" name="nickname" id="text_4">
						<div class="prompt_box_4"></div>
					</div>
					<div class="box box_5">
						<div class="items"><span class="show_state">*</span>性别</div>
						<div class="sex_box">
							<label for="male">男</label>
							<input type="radio" name="sex" id="male" class="sex_1" value="0" checked>
							<label for="female">女</label>
							<input type="radio" name="sex" id="female" value="1">
						</div>
					</div>
					<div class="box box_6">
						<div class="province_box_1">
							<select class="choice_province" size="value" name="province">
						  		<option value="">广东</option>
						 		<option value="saab">北京</option>
						  		<option value="opel">上海</option>
						  		<option value="audi">福建</option>
						  		<option value="saab">河南</option>
						  		<option value="opel">香港</option>
						  		<option value="audi">广西</option>
							</select>
						</div>
						<div class="province_box_2">
							<select class="choice_province" size="value" name="city">
						  		<option value="">广州</option>
						 		<option value="saab">汕头</option>
						  		<option value="opel">深圳</option>
						  		<option value="audi">潮州</option>
						  		<option value="saab">韶关</option>
						  		<option value="opel">东莞</option>
						  		<option value="audi">汕尾</option>
							</select>
						</div>
					</div>
					<div class="box box_7">
						<label class="items" for="text_7">详细地址</label>
						<input type="text" class="text" id="text_7" name="address">
						<div class="prompt_box_7">您的详细地址有助于更快捷的帮您找到您喜欢的内容
						</div>
					</div>
					<!-- 增加目的块 -->
					<div class="box box_5">
						<div class="items">目的</div>
						<div class="sex_box">
							<label for="one">减肥</label>
							<input type="radio" name="goal" id="one" class="sex_1" value="减肥" checked>
							<label for="two">健身</label>
							<input type="radio" name="goal" id="two" class="sex_1" value="健身">
							<label for="third">瑜伽</label>
							<input type="radio" name="goal" id="third" class="sex_1" value="瑜伽">
							<label for="four">增肌</label>
							<input type="radio" name="goal" id="four" class="sex_1" value="增肌">
						</div>
					</div>
					<div class="box box_5">
						<div class="items">我是</div>
						<div class="sex_box">
							<label for="one">初学者</la员bel>
							<input type="radio" name="begin" id="one" class="sex_1" value="初学者" checked>
							<label for="two">运动</label>
							<input type="radio" name="begin" id="two" class="sex_1" value="运动">
							<label for="third">健身者</label>
							<input type="radio" name="begin" id="third" class="sex_1" value="健身者">
							<label for="four">减肥者</label>
							<input type="radio" name="begin" id="four" class="sex_1" value="减肥者">
						</div>
					</div>
					<!-- -end- -->
					<div class="box box_8">
						<label class="items" for="text_8"><span class="show_state">*</span>验证码</label>
						<input type="text" class="text proven_box" id="text_8">
						<div class="prompt_box_8">
							<a class="proven_pic"></a><a class="forchange">换一换</a>
						</div>
					</div>
					<div class="box box_9">
						<input type="checkbox" class="protect_box">
						<span>我已阅读协议<a class="linktoprotect">《爱健美服务使用协议》</a></span>
					</div>
					<div class="box_10"><a href="javascript:void(0)" onclick="form1.submit()" class="submit_1"><span class="open">立即开通</span></a></div>
				</form>
				<form class="formest_1">
					<div class="box box_1">
						<label class="items" for="text_11"><span class="show_state state_1">*</span>手机号</label>
						<input type="text" class="text" id="text_11" value="">
						<div class="prompt1_box_1"></div>
					</div>
					<div class="box box_2">
						<label class="items" for="text_22"><span class="show_state">*</span>创建密码</label>
						<input type="password" class="text" id="text_22">
						<div class="prompt1_box_2">
						</div>
					</div>
					<div class="box box_3">
						<label class="items" for="text_33"><span class="show_state">*</span>再次输入密码</label>
						<input type="password" class="text" id="text_33">
						<div class="prompt1_box_3"></div>
					</div>
					<div class="box box_4">
						<label class="items" for="text_44"><span class="show_state">*</span>昵称</label>
						<input type="text" class="text" id="text_44">
						<div class="prompt1_box_4"></div>
					</div>
					<div class="box box_5">
						<div class="items"><span class="show_state">*</span>性别</div>
						<div class="sex_box">
							<label for="male">男</label>
							<input type="radio" name="sex" id="male" class="sex_1" value="male" checked>
							<label for="female">女</label>
							<input type="radio" name="sex" id="female" value="male">
						</div>
					</div>
					<div class="box box_6">
						<div class="province_box_1">
							<select class="choice_province" size="value">
						  		<option value="">广东</option>
						 		<option value="saab">北京</option>
						  		<option value="opel">上海</option>
						  		<option value="audi">福建</option>
						  		<option value="saab">河南</option>
						  		<option value="opel">香港</option>
						  		<option value="audi">广西</option>
							</select>
						</div>
						<div class="province_box_2">
							<select class="choice_province" size="value">
						  		<option value="">广州</option>
						 		<option value="saab">汕头</option>
						  		<option value="opel">深圳</option>
						  		<option value="audi">潮州</option>
						  		<option value="saab">韶关</option>
						  		<option value="opel">东莞</option>
						  		<option value="audi">汕尾</option>
							</select>
						</div>
					</div>
					<div class="box box_7">
						<label class="items" for="text_17">详细地址</label>
						<input type="text" class="text" id="text_17">
						<div class="prompt_box_7">您的详细地址有助于更快捷的帮您找到您喜欢的内容
						</div>
					</div>
					<!-- 增加目的块 -->
					<div class="box box_5">
						<div class="items">目的</div>
						<div class="sex_box">
							<label for="one">减肥</label>
							<input type="radio" name="goal" id="one" class="sex_1" value="male" checked>
							<label for="two">健身</label>
							<input type="radio" name="goal" id="two" class="sex_1" value="male">
							<label for="third">瑜伽</label>
							<input type="radio" name="goal" id="third" class="sex_1" value="male" checked>
							<label for="four">增肌</label>
							<input type="radio" name="goal" id="four" class="sex_1" value="male">
						</div>
					</div>
					<div class="box box_5">
						<div class="items">我是</div>
						<div class="sex_box">
							<label for="one">初学者</la员bel>
							<input type="radio" name="begin" id="one" class="sex_1" value="male" checked>
							<label for="two">运动</label>
							<input type="radio" name="begin" id="two" class="sex_1" value="male">
							<label for="third">健身者</label>
							<input type="radio" name="begin" id="third" class="sex_1" value="male" checked>
							<label for="four">减肥者</label>
							<input type="radio" name="begin" id="four" class="sex_1" value="male">
						</div>
					</div>
					<!-- -end- -->
					<div class="box box_8">
						<label class="items" for="text_18"><span class="show_state">*</span>验证码</label>
						<input type="text" class="text proven_box" id="text_18">
						<div class="prompt_box_8">
							<a class="proven_pic"></a><a class="forchange">换一换</a>
						</div>
					</div>
					<div class="box box_9">
						<input type="checkbox" class="protect_box">
						<span>我已阅读协议<a class="linktoprotect">《爱健美服务使用协议》</a></span>
					</div>
					<div class="box_10"><a class="submit_1 for_submit_2"><span class="open_1">立即开通</span></a></div>
				</form>
			</div>
			<div class="rightsidebar">
					<div class="A_login">
						<p>已有爱健美帐号?</p>
						<a href="/index.php?app=index&mod=Index&act=login" class="loginbutton">登录</a>
					</div>
					<div class="user_part">
						<a href="/index.php?app=index&mod=Index&act=registerGym" class="user">
							v  健身房注册
						</a>
						<a href="/index.php?app=index&mod=Index&act=registerCoach" class="user">
							v  教练注册
						</a>
					</div>
					<div class="cooperate_target">
						<p>使用合作网站帐号登录</p>
						<div class="websibe">
							<a class="cooperate web_1"></a>
							<a class="cooperate web_2"></a>
							<a class="cooperate web_3"></a>
							<a class="cooperate web_4"></a>
							<a class="cooperate web_5"></a>
							<a class="cooperate web_6"></a>
						</div>
					</div>
					<div class="A_intro">
						<h1 class="intro_topic">爱健美</h1>
						<p class="intro_conduct">具有人气的健美产品，先拥有1536人用户，拥有500家健身</p>
					</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>	
	<script type="text/javascript" src="js/public.js"></script>	
	<script type="text/javascript" src="js/register.js"></script>
</body>
</html>