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

<!-- 编辑器样式文件 -->
<link href="__PUBLIC__/js/editor/editor/theme/base-min.css" rel="stylesheet"/>
<!--[if lt IE 8]>
<link href="__PUBLIC__/js/editor/editor/theme/cool/editor-pkg-sprite-min.css" rel="stylesheet"/>
<![endif]-->
<!--[if gte IE 8]><!-->
<link href="__PUBLIC__/js/editor/editor/theme/cool/editor-pkg-min-datauri.css" rel="stylesheet"/>
<!--<![endif]-->

<?php
// 读取附件大小的配置
$_editor_system_default = model('Xdata')->lget('attach');
$_editor_size_limit = empty($_editor_system_default['attach_max_size']) ? 2 : $_editor_system_default['attach_max_size']; // 默认2M
$_editor_size_limit = floatval($_editor_size_limit) * 1000; // K
?>

<!-- 引入编辑器相关的JS文件 -->
<script src="__PUBLIC__/js/editor/kissy-min.js?t=20120401"></script>
<script src="__PUBLIC__/js/editor/uibase-min.js?t=20120401"></script>
<script src="__PUBLIC__/js/editor/dd-min.js?t=20120401"></script>
<script src="__PUBLIC__/js/editor/component-min.js?t=20120401"></script>
<script src="__PUBLIC__/js/editor/overlay-min.js?t=20120401"></script>
<script src="__PUBLIC__/js/editor/editor/editor-all-pkg-min.js?t=20120401"></script>
<script src="__PUBLIC__/js/editor/editor/biz/ext/editor-plugin-pkg-min.js?t=20120401"></script>
<script>
<?php echo "var limitSize = '".$_editor_size_limit."';"; ?>
var _KISSY_ = {};

function loadEditor(textareaId){
	setTimeout("_loadEditor('"+textareaId+"')",100);}
function _loadEditor(textareaId) {
    KISSY.Editor.Config.base = "__PUBLIC__/js/editor/editor/plugins/";
    KISSY.use('editor', function() {
        var KE = KISSY.Editor;
        var EDITER_UPLOAD = "<?php echo U('home/Attach/kissy'); ?>";
        //编辑器内弹窗 z-index 底限，防止互相覆盖
        KE.Config.baseZIndex = 999999;
        var cfg = {
            attachForm:true,
            baseZIndex:10000,
            focus:false,
            pluginConfig: {
                "image":{
                    upload:{
                        serverUrl:EDITER_UPLOAD,
                        surfix:"png,jpg,jpeg,gif,bmp",
                        sizeLimit:limitSize
                    }
                },
                "flash":{
                    defaultWidth:"300",
                    defaultHeight:"300"
                },
                "resize":{
                    direction:["y"]
                }
            }
        };
        _KISSY_[textareaId] = KE("#"+textareaId, cfg);
        _KISSY_[textareaId].use(
            "font,link,image,flash,xiami-music,smiley");
    });
}

function getEditorContent(textareaId)
{
    return _KISSY_[textareaId].getData();
}

function setEditorContent(textareaId,html)
{
    return _KISSY_[textareaId].setData(html);
}

function getEditorWordCount() {
	var count = 0;
	return count;
}
</script>

<div class="so_main">
  <div id="editTpl_div">
  	<div class="page_tit"><?php if(($type)  ==  "edit"): ?>编辑<?php else: ?>添加<?php endif; ?>分类</div>
	<div class="form2">
	<form method="post" action="<?php echo U('admin/Article/addCategory');?>" enctype="multipart/form-data">
	<?php if(($type)  ==  "edit"): ?><input type="hidden" name="cate_id" value="<?php echo ($cate_id); ?>"><?php endif; ?>
    <dl class="lineD">
      <dt>分类名称：</dt>
      <dd>
        <input name="name" type="text" value="<?php echo ($name); ?>"> *
	  </dd>
    </dl>
    
    <dl class="lineD">
    	<dt>上级分类：</dt>
    	<dd>
    		<select name="parent">
    			<option value="0">无</option>
    			<?php foreach($categories as $c) { ?>
    			<option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
    			<?php } ?>
    		</select>
    	</dd>
    </dl>
    
    <dl class="lineD">
    	<dt>所属栏目：</dt>
    	<dd>
    		<select name="channel">
    			<option value="1">健身计划</option>
    			<option value="2">锻炼</option>
    			<option value="3">营养</option>
    			<option value="4">补充</option>
    		</select><span>分别对应于前台的健身计划、锻炼、营养、补充页面</span>
    	</dd>
    </dl>
    
    <dl class="lineD">
    	<dt>内容属性：</dt>
    	<dd>
    		<input type="radio" name="content" value="1" />文章
    		<input type="radio" name="content" value="2" />视频
    	</dd>
    </dl>
    <div class="page_btm">
      <input type="submit" class="btn_b" value="确定" />
    </div>
	</form>
  </div>
  </div>
</div>


</body>
</html>