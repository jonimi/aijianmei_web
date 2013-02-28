$(function(){
	//tab键切换
	$(".tab_mune li").mouseover(function(){
		var index = $(this).index()
		$(".tab_mune li").removeClass("add").eq(index).addClass("add");
		$(".ct").addClass("none").eq(index).removeClass("none")
	})

	//点击图片，呈现图片相应的tab
	$(".each_pic").click(function(){
		var index = $(this).parent().index() + 1;
		$(".tab_mune li").removeClass("add").eq(index).addClass("add");
		$(".ct").addClass("none").eq(index).removeClass("none")
	})

	//为产品模块添加动态边框效果
	$(".produce").hover(
		function(){
			var index = $(this).index();
			$(this).css({'border':'3px solid #D273FF'})
			$(".produce .price").eq(index).css({'background':'#D273FF','color':'white'})
		},
		function(){
			var index = $(this).index();
			$(this).css({'border':'3px solid transparent'})
			$(".produce .price").eq(index).css({'background':'#ccc','color':''})
		}
	)
})