﻿
$(function() {
//大图自动切换，左右切换，选择切换
	var sWidth = $("#banner").width(); //获取焦点图的宽度（显示面积）
	var len = $("#banner ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	
	//添加按钮,上一页、下一页两个按钮
	var btn = "<div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	
	$("#banner").append(btn);
	

	//为小按钮添加鼠标点击事件，以显示相应的内容
	$("#banner .btn span").css("background","url(images/dian.png)").click(function() {
		index = $("#banner .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("click");

	//上一页、下一页按钮透明度处理
	$("#banner .preNext").css("opacity",0).hover(function() {
		$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0"},300);
	});

	//上一页按钮
	$("#banner .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//下一页按钮
	$("#banner .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//左右滚动，外围ul元素的宽度
	$("#banner ul").css("width",sWidth * (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#banner").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},3000);
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$("#banner ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		$("#banner .btn span").css("background","url(images/dian.png)")
							 .eq(index).css("background","url(images/landian.png)"); //为当前的按钮切换到选中的效果
	}

});


