
$(function(){
	//页面选择
	$(".lay_page a").click(function(){
		$(".lay_page a").removeClass("choice_page")
		$(this).addClass("choice_page")
		if($(".lay_page a").index(this) == 0){
			$(".pre_page").css({'color':'#ccc'})
		}
		else{
			$(".pre_page").css({'color':'#656565','cursor':'pointer'})
		}
		if($(".lay_page a").index(this) == 4){
			$(".next_page").css({'color':'#ccc','cursor':'default'})
		}
		else{
			$(".next_page").css({'color':'#656565'})
		}
	})

	//下一页、上一页//4==$(".tab_2 .lay_page a").length-1
	$(".next_page").click(function(){
		var index = $(".choice_page").index();
		if(index != 4){
			index++;
			$(".pre_page").css({'color':'#656565','cursor':'pointer'})
			$(".lay_page a").removeClass("choice_page")
			$(".lay_page a").eq(index).addClass("choice_page")
		}
		if(index == 4){
			$(".next_page").css({'color':'#ccc','cursor':'default'})
		}
	})
	$(".pre_page").click(function(){
		var index = $(".choice_page").index();
		if(index != 0){
			index--;
			$(".next_page").css({'color':'#656565','cursor':'pointer'})
			$(".lay_page a").removeClass("choice_page")
			$(".lay_page a").eq(index).addClass("choice_page")
		}
		if(index == 0){
			$(".pre_page").css({'color':'#ccc','cursor':'default'})
		}
	})

	//全部评论
	$(".comment_1").click(
		function(){
			$(".comment_2").removeClass("comment_3")
			$(this).addClass("comment_3")
			$(".tab_1").css("display","block")
			$(".tab_2").css("display","none")
		}
	)
	$(".comment_2").click(
		function(){
			$(".comment_1").removeClass("comment_3")
			$(this).addClass("comment_3")
			$(".tab_2").css("display","block")
			$(".tab_1").css("display","none")
		}
	)

	//praise
	$(".sprite_8").add(".sprite_9").click(function(){
		var time = parseInt($(this).children().text());
		time++;
		$(this).children().html(time);
		
		var action = $(this).className == 'sprite_8' ? 'addArticleLikeCount' : 'addArticleUnlikeCount';
		var id = $(this).attr('aid');
		$.post('http://www.aijianmei.com/index.php?app=index&mod=Index&act='+action, {'id':id, 'count':time}, function(msg) {
			ui.success('投票成功');
		})		
	})

	//页面下拉列表
	$(".read_time").hover(
		function(){
			$(".page_times").css("display","block")
		},
		function(){
			$(".page_times").css("display","none")
		}
	)

	//textarea focus()
	$(".comment_inp").click(function(){
		$(this).html("");
	})

	
})
function comments(comment, aid, act) {
	if(!USER.id) {alert('请登录'); return false;}
	var action = 'add'+act+'Comment';
	$.post('/index.php?app=index&mod=Index&act='+action, {'comment':comment, 'aid':aid}, function(msg) {
		//ui.success('success');
		location.reload();
	})
}

var today = function(){
	var time = document.getElementsByClassName("time")[0],
		date = new Date();
	if(!time) return false;
		time.innerHTML = [date.getFullYear(),'-',date.getMonth(),'-',date.getDate(),"&nbsp;&nbsp;",date.toLocaleTimeString()].join("");
}
setInterval('today()',1000);
