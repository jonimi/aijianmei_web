<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($ts['site']['site_name']); ?>管理后台</title>
<link href="__PUBLIC__/admin/style.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/js/tbox/box.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	var _UID_ = "<?php echo ($uid); ?>";
	var _PUBLIC_ = "__PUBLIC__";	
</script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/tbox/box.js"></script>
</head>
<body>
<div class="so_main">
  
  <div class="page_tit">视频管理</div>
  <div class="Toolbar_inbox">
	<a href="<?php echo U('admin/Article/addVideo');?>" class="btn_a"><span>添加视频</span></a>
    <a href="javascript:void(0);" class="btn_a" onclick="deleteAd();"><span>删除视频</span></a>
  </div>
  <div class="list">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th style="width:30px;">
        <input type="checkbox" id="checkbox_handle" onclick="checkAll(this)" value="0">
        <label for="checkbox"></label>
    </th>
    <th class="line_l">ID</th>
    <th class="line_l">标题</th>
    <th class="line_l">分类</th>
    <th class="line_l">URL</th>
    <th class="line_l">简介</th>
    <th class="line_l">操作</th>
  </tr>
  <?php if(is_array($videos)): ?><?php $i = 0;?><?php $__LIST__ = $videos?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><tr overstyle='on' id="<?php echo ($vo["id"]); ?>">
        <td><input type="checkbox" name="checkbox" id="checkbox2" onclick="checkon(this)" value="<?php echo ($vo["id"]); ?>"></td>
        <td><?php echo ($vo["id"]); ?></td>
        <td><?php echo ($vo["title"]); ?></td>
        <td><?php echo ($vo["category"]); ?></td>
        <td><?php echo ($vo["link"]); ?></td>
        <td><?php echo ($vo["brief"]); ?></td>
        <td>
			<a href="<?php echo U('admin/Article/editVideo',array('id'=>$vo['id']));?>">编辑</a>
			<a href="javascript:void(0);" onclick="deleteAd('<?php echo ($vo["id"]); ?>')">删除</a>
		</td>
      </tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </table>
  </div>
  <div class="Toolbar_inbox">
	<a href="<?php echo U('admin/Content/addAd');?>" class="btn_a"><span>添加视频</span></a>
    <a href="javascript:void(0);" class="btn_a" onclick="deleteAd();"><span>删除视频</span></a>
  </div>
</div>

<script>
    //鼠标移动表格效果
    $(document).ready(function(){
        $("tr[overstyle='on']").hover(
          function () {
            $(this).addClass("bg_hover");
          },
          function () {
            $(this).removeClass("bg_hover");
          }
        );
    });
    
    function checkon(o){
        if( o.checked == true ){
            $(o).parents('tr').addClass('bg_on') ;
        }else{
            $(o).parents('tr').removeClass('bg_on') ;
        }
    }
    
    function checkAll(o){
        if( o.checked == true ){
            $('input[name="checkbox"]').attr('checked','true');
            $('tr[overstyle="on"]').addClass("bg_on");
        }else{
            $('input[name="checkbox"]').removeAttr('checked');
            $('tr[overstyle="on"]').removeClass("bg_on");
        }
    }

    //获取已选择用户的ID数组
    function getChecked() {
        var ids = new Array();
        $.each($('table input:checked'), function(i, n){
            ids.push( $(n).val() );
        });
        return ids;
    }
    
    function deleteAd(ids) {
    	var length = 0;
    	if(ids) {
    		length = 1;
    	}else {
    		ids    = getChecked();
    		length = ids[0] == 0 ? ids.length - 1 : ids.length;
            ids    = ids.toString();
    	}
    	if(ids=='') {
    		ui.error('请先选择一个视频');
    		return ;
    	}
    	if(confirm('您将删除'+length+'条记录，删除后无法恢复，确定继续？')) {
    		$.post("<?php echo U('admin/Article/doDeleteVideo');?>",{ids:ids},function(res){
    			if(res=='1') {
    				ui.success('删除成功');
    				removeItem(ids);
    			}else {
    				ui.error('删除失败');
    			}
    		});
    	}
    }
    
    function removeItem(ids) {
    	ids = ids.split(',');
        for(i = 0; i < ids.length; i++) {
            $('#'+ids[i]).remove();
        }
    }

	function move(ad_id, direction) {
		var baseid  = direction == 'up' ? $('#'+ad_id).prev().attr('id') : $('#'+ad_id).next().attr('id');
		if(!baseid) {
			direction == 'up' ? ui.error('已经是最前面了') : ui.error('已经是最后面了');
		}else {
			$.post("<?php echo U('admin/Content/doAdOrder');?>", {ad_id:ad_id, baseid:baseid}, function(res){
				if(res == '1') {
					//交换位置
					direction == 'up' ? $('#'+ad_id).insertBefore('#'+baseid) : $("#"+ad_id).insertAfter('#'+baseid);
					ui.success('保存成功');
				}else {
					ui.error('保存失败');
				}
			});
		}
	}
</script>
</body>
</html>