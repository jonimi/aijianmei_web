<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript">
//小名片组件
(function($){
$.fn.userCard = function(options){
	var defaults = {
		status: 'on',
		//小名片模版
		cardTpl:'<div class="card_layer"><div class="bg"><div class="effect">'+
				'<table><tbody><tr><td>'+
				'<div class="card_content">'+
					'<div class="card_name clearfix">'+
						'<dl class="name clearfix">'+
							'<dt><img class="picborder_r" title="{uname}" uid="{uid}" imgtype="head" src="{face}"></dt>'+
							'<dd>'+
							'<p>{space_link}</p>'+
							'<p>{location}</p>'+
							'<div>'+
								'<ul class="userdata">'+
								'<li><a href="{following_url}">关注</a>({followed_count})</li>'+
								'<li><a href="{follower_url}">粉丝</a>({followers_count})</li>'+
								'<li><a href="{space_url}">微博</a>({weibo_count})</li>'+
								'</ul>'+
							'</div>'+
							'</dd>'+
						'</dl>'+
						'<dl class="info clearfix">'+
						'<dt></dt>'+
						'<dd>'+
						'<ul>'+
						'<li></li>'+
						'</ul>'+
						'</dd>'+
						'<dd>个人标签：{tags}</dd>'+
					  '</dl>'+
						'<div class="links clearfix" id="space_card_toolbar"><br /></div>'+
					'</div>'+
				'</div>'+
				'</td></tr></tbody></table>'+
				'<div id="space_card_arrow" class="arrow arrow_b"></div></div></div></div>'
	}
	var options = $.extend(defaults, options);
	var windows = $(window).width();	
	var _this = this;
	var element;
	_this.t = null;
	_this.v = null;
	
	//初始化小名片
	if( !element ){
		element = $("<div/>")
		.css({display:'none',position:'absolute','background-color':'white','z-index':9999999})
		.attr('id','space_card_content')
		.appendTo(document.body).bind('mouseenter',function(){
			clearTimeout( _this.v );
		}).bind('mouseleave',function(){
			$(this).hide();
		}).show();
	}

	//小名片展示
	var userInfoList = [],postion;
	$(this).live('mouseover',function(){
		
		//如果链接的class含有 nocard 则不弹出小名片.
		if($(this).attr('class').indexOf('nocard') >= 0) 
			return false;

		clearTimeout(_this.v);
		var width = $(this).width();
		var height = $(this).height();
		var position = $(this).offset();
		position.width = width;
		position.height = height;

		uid  = $(this).attr('uid');
		if( !uid ) return ;
		_this.t = setTimeout(function(){ 
			$('#space_card_content').html('<div class="card_layer"><img src="'+  _PUBLIC_ +'/js/tbox/images/icon_waiting.gif" width="20"></div>').show();	
			if( uid ){
				//if( userInfoList[uid] ){
				//	_this.parseShow(userInfoList[uid],position.top);
				//}else{
					_this.ajax = $.getJSON( U('home/Space/showSpaceCard',['uid='+uid]) , function(result){
						if( result.status ){
							userInfoList[uid] = result.data;
							_this.parseShow(userInfoList[uid],position);
						}
					});
				//}
			}; 
		}, 200); 
	}).live('mouseout',function(event){
		clearTimeout(_this.t);
		_this.v = setTimeout(function(){
			if( _this.ajax ) _this.ajax.abort();
			element.hide();
		},100);
	});
	
	_this.parseShow = function(data,position){

		//渲染小名片
		parseHtml = options['cardTpl'].replace(/\{(.+?)}/gi, function(s,t){
		var type = s.replace('{','').replace('}','');
			return data[type];
		}); 
		$('#space_card_content').html(parseHtml);

		//小名片的位置.在顶端朝下.在右侧朝左.
		var scrollTop = $(document).scrollTop();
		var windowWidth = $(window).width();	
		//当前元素距离顶部的距离
		var cardTop = position.top - scrollTop;
		//当前元素距离右侧的距离
		var cardRight = windowWidth - position.left;
		//设置小名片位置 - 朝左
		if(cardRight<400) {
			element.css({top:position.top + 145, left:position.left - 320}).show();
			$('#space_card_arrow').removeClass('arrow_b').addClass('arrow_r');
		//设置小名片位置 - 朝下
		} else if (cardTop<300){
			element.css({top:position.top + 155 + position.height, left:position.left+5}).show();
			$('#space_card_arrow').removeClass('arrow_b').addClass('arrow_t');
		//设置小名片位置 - 朝上
		} else {
			element.css({top:position.top, left:position.left}).show();
		}

		var isLogin = "<?php echo $isLogin;?>";
		if(isLogin) {
			//渲染关注按钮
			if( data['follow_state'] =='unfollow' ){
				$('#space_card_toolbar').html('<span><a href="javascript:;" class="btn_b" onclick="space_card_dofollow(\'dofollow\','+uid+',\''+data['uname']+'\')">加关注</a></span><?php if(!$data['fu_state']){ ?> <a href="javascript:void(0);" onclick="ui.sendmessage('+uid+');$(\'#space_card_content\').hide();">发私信</a><?php } ?>');
			}else if(data['follow_state'] =='havefollow'){
				$('#space_card_toolbar').html('<span>已关注 | <a href="javascript:;" onclick="space_card_dofollow(\'unflollow\','+uid+',\''+data['uname']+'\')">取消</a></span> <a href="javascript:void(0)" onclick="weibo.quickpublish(\'@' + data['uname'] +'\');$(\'#space_card_content\').hide();">@TA</a><?php if(!$data['black'] && $data['fu_state']){ ?><i class="vline">|</i><a href="javascript:void(0);" onclick="ui.sendmessage('+uid+');$(\'#space_card_content\').hide();">发私信</a><?php } ?>');
			}else if(data['follow_state'] =='eachfollow'){
				$('#space_card_toolbar').html('<span>互相关注 | <a href="javascript:;" onclick="space_card_dofollow(\'unflollow\','+uid+',\''+data['uname']+'\')">取消</a></span> <a href="javascript:void(0)" onclick="weibo.quickpublish(\'@' + data['uname'] +'\');$(\'#space_card_content\').hide();">@TA</a><?php if(!$data["black"]){ ?><i class="vline">|</i> <a href="javascript:void(0);" onclick="ui.sendmessage('+uid+');$(\'#space_card_content\').hide();">发私信</a><?php } ?>');
			}
		}
	}
};
})(jQuery);

function space_card_dofollow(type,uid,username){
	var html = '';
	$('#space_card_toolbar').html( '<img src="'+ _THEME_+'/images/icon_waiting.gif" width="15">' );
	$.post( U('weibo/Operate/follow') ,{uid:uid,type:type},function(txt){
		if(txt=='12'){
			$('#space_card_toolbar').html('<span>已关注 | <a href="javascript:;" onclick="space_card_dofollow(\'unflollow\','+uid+',\''+username+'\')">取消</a></span> <a href="javascript:void(0)" onclick="weibo.quickpublish(\'@' + username +'\');$(\'#space_card_content\').hide();">@TA</a><i class="vline">|</i> <a href="javascript:void(0);" onclick="ui.sendmessage('+uid+');$(\'#space_card_content\').hide();">发私信</a>');
			//userInfoList[uid]['follow_state'] = 'havefollow';
				followGroupSelectorBox(uid);
		}else if(txt=='13'){
			$('#space_card_toolbar').html('<span>互相关注 | <a href="javascript:;" onclick="space_card_dofollow(\'unflollow\','+uid+',\''+username+'\')">取消</a></span>  <a href="javascript:void(0)" onclick="weibo.quickpublish(\'@' + username +'\');$(\'#space_card_content\').hide();">@TA</a><i class="vline">|</i><a href="javascript:void(0);" onclick="ui.sendmessage('+uid+');$(\'#space_card_content\').hide();">发私信</a>');
			//userInfoList[uid]['follow_state'] = 'eachfollow';
				followGroupSelectorBox(uid);
		}else if(txt=='01'){
			$('#space_card_toolbar').html('<span><a href="javascript:;" class="btn_b" onclick="space_card_dofollow(\'dofollow\','+uid+',\''+username+'\')">加关注</a></span>');
			//userInfoList[uid]['follow_state'] = 'unfollow';
		}else if(txt == '14'){
			ui.error('关注人数已超过配置最大数量，关注失败！');
		}else{
			ui.error('系统错误，请稍后再试！');
		}
	});
}
//绑定如下格式的a标签-可以显示小名片 <a href="#" rel="face" uid="1">##</a>
$(document).ready(function(){
	$("a[rel='face']").userCard();
})
</script>