﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title>cms</title>
<link rel="stylesheet" href="/public/manage/css/style.css" type="text/css" />
<link rel="stylesheet" path="/public/manage/css/" type="text/css" id="skinCss" />
<script type="text/javascript" src="/public/manage/js/jquery.js"></script>
<script type="text/javascript" src="/public/manage/js/panel.js"></script>
<link rel="stylesheet" href="/public/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="/public/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="/public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/public/kindeditor/lang/zh-CN.js"></script>
<script charset="utf-8" src="/public/kindeditor/plugins/code/prettify.js"></script>

<script charset="utf-8" src="/public/My97DatePicker/WdatePicker.js"></script>
<script charset="utf-8" src="/public/formvalid/valid.js"></script>

<script>
	KindEditor.ready(function(K) {
		var editor1 = K.create('textarea[name="content1"]', {
			cssPath : '/public/kindeditor/plugins/code/prettify.css',
			uploadJson : '/public/kindeditor/php/upload_json.php',
			fileManagerJson : '/public/kindeditor/php/file_manager_json.php',
			allowFileManager : true,
			afterCreate : function() {
				var self = this;
				K.ctrl(document, 13, function() {
					self.sync();
					K('form[name=example]')[0].submit();
				});
				K.ctrl(self.edit.doc, 13, function() {
					self.sync();
					K('form[name=example]')[0].submit();
				});
			}
		});
		prettyPrint();
	});
</script>

<script language="javascript">
	function checkdata() {
		document.myform.title.value = trim(document.myform.title.value);
		if(document.myform.title.value==""){
			alert("文章标题不能为空!");
			document.myform.title.focus();
			return false;
		}

		document.myform.thumb.value = trim(document.myform.thumb.value);	
		if(document.myform.thumb.value!="") {
			var url = document.myform.thumb.value;
			if(!check_isRelativePath(url) && !check_isURL(url)) {
				alert("封面图填写的路径无效，填写的路径必需以 http:// 或 / 开头！");
				document.myform.thumb.focus();
				return false;
			}
		}else{
			alert("封面图不能为空！");
			document.myform.thumb.focus();
			return false;
		}

		if(document.myform.sorter.value!="") {
			if(!check_isIntger(document.myform.sorter.value) || document.myform.sorter.value<0) {
				alert("排序必需填写大于或等于0的整数!");
				document.myform.sorter.focus();
				return false;
			}
		}

		if(document.myform.stats.value!="") {
			if(!check_isIntger(document.myform.stats.value) || document.myform.stats.value<0) {
				alert("阅读数必需填写大于或等于0的整数!");
				document.myform.stats.focus();
				return false;
			}
		}
	}
</script>
</head>

<body>
<div class="wrap">
<form name="myform" method="post" action="/index.php/admin_photo/add_handle/" class="ajax_form" onsubmit="return checkdata()">
  <table cellspacing="1" class="myform">
    <tr>
      <th colspan="2">添加图片集</th>
    </tr>
    <tr>
      <td align="right">所属分类：</td>
      <td>
        <select name="cat_id">
	    <?php foreach($cats['parent'] as $pkey=>$pval){ ?>
			 <option value="<?php echo $pval->cat_id; ?>" <?php echo $selected_catid==$pval->cat_id?'selected':''; ?> disabled="disabled"><?php echo $pval->name; ?></option>
				<?php if(is_array($cats['son']) and isset($cats['son'][$pval->cat_id])){
				foreach($cats['son'][$pval->cat_id] as $skey=>$sonval){
				?>
				 <option value="<?php echo $sonval->cat_id; ?>" disabled="disabled"  <?php echo $selected_catid==$sonval->cat_id?'selected':''; ?>>&nbsp;&nbsp;||--&nbsp;<?php echo $sonval->name; ?></option>
				<?php 
				if(is_array($cats['sonson'][$sonval->cat_id]) and isset($cats['sonson'][$sonval->cat_id]) ){
				foreach($cats['sonson'][$sonval->cat_id] as $sonsonval){
				?>
				 <option value="<?php echo $sonsonval->cat_id; ?>" <?php if($sonsonval->cat_type_id!==$category[0]->cat_type_id){ echo 'disabled="disabled"';} ?>  <?php echo $selected_catid==$sonsonval->cat_id?'selected':''; ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|||--&nbsp;<?php echo $sonsonval->name; ?></option>
				<?php }} 
				}
				}
				?>
		<?php }  ?>
        </select> 
      </td>
    </tr>
    
    <tr>
      <td align="right"><font color="red">*&nbsp;</font>标题：</td>
      <td><input type="text" name="title" class="input" dataType="require" title="请输入标题，输入长度不能超过50个字符" value="" style="width:360px;" /></td>
    </tr>
    
    <tr>
      <td align="right">发布日期：</td>
      <td><input  name="rel_date" class="Wdate" type="text" onClick="WdatePicker()" dataType="require" title="请输入发布日期" value="<?php echo date('Y-m-d',time()); ?>" style="width:360px;" readonly /></td>
    </tr>
    
    <tr>
      <td align="right"><font color="red">*&nbsp;</font>封面图：</td>
      <td>
        <input type="text" name="thumb" class="input" dataType="require" title="请上传封面图或输入封面图地址" value="" style="width:360px;" />
	    <iframe frameborder="0" src="/public/upload.php?upname=thumb&forname=myform" width="390" height="22" scrolling="no" align="middle"></iframe>
	  </td>
    </tr>
	
    <tr>
      <td align="right">图片集介绍：</td>
      <td>
	    <textarea name="content1" style="width:700px;height:290px;visibility:hidden;"></textarea>
      </td>
    </tr>
	
	<tr>
      <td align="right">图片地址：</td>
      <td style="height:300px;">
	    <p style="color:red">为了保证浏览效果，建议图片尺寸大于640 x 480 px</p>
		<ul id="xx">
		<?php $ii=16; for($i=1;$i <= $ii;$i++){?>
		<li style="display:block;width:550px;margin:6xp 0;height:35px;padding:16px;">
		  <label style="width:39px;text-align:right;display:block;float:left;">图片<?php echo $i; ?></label>
		  <span style="width:85%">
		    <div style="float:left;">
		      <input type="text" name="thumbs<?php echo $i?>" value="" style="width:210px;float:left;height:32px;">
		    </div>
		  </span>
		  
		  <div style="width:288px;float:left;vertical-align:middle;background-color:#fff;padding-left:6px;"> 
            <iframe frameborder="0" src="/public/upload.php?upname=thumbs<?php echo $i; ?>&forname=myform" width="360" height="39" scrolling="no" align="middle"></iframe>
          </div>
		  
		  <div style="clear:both;padding:3px 0"></div>
		  
		  <p style="margin:6px 0;">
		    <label style="width:39px;text-align:right;display:block;float:left;">简介<?php echo $i; ?></label>
		    <span style="width:85%">
		      <textarea style="width:360px;float:left;height:50px;" name="t_content[<?php echo $i; ?>]"></textarea>
		    </span>
		    <label style="width:39px;text-align:right;display:block;float:left;">序号</label>
		    <input type="text" size="6" name="sort[<?php echo $i; ?>]" style="float:left;" >
		  </p>
		   <div style="clear:both;padding:3px 0"></div>
		   <p style="margin:6px 0;">
		    <label style="width:50px;text-align:right;display:block;float:left;">友情链接</label>
		    <input type="text" size="60" name="f_link[<?php echo $i; ?>]" style="float:left;">
		  </p>
		</li>
		<div style="clear:both;padding:6px 0;border-bottom:1px dashed #ddd;"></div>
		<?php } ?>
		</ul>
      </td>
    </tr>

	<tr>
      <td align="right"><font color="red">*&nbsp;</font>排序：</td>
      <td>
        <input type="text" name="sorter" maxlength="8" size="6" class="input" value="0" />
	  </td>
    </tr>
	
    <tr>
      <td align="right"><font color="red">*&nbsp;</font>阅读数：</td>
      <td><input type="text" name="stats" maxlength="8" size="6" class="input" value="0" /></td>
    </tr>
	
    <tr>
      <td align="right">发布状态：</td>
      <td>
        <?php if($_SESSION['group_id']=='1'): ?>
        <input type="radio" name="status" value="1" style="vertical-align: middle;margin-right:3px;" ><label>显示</label> 
        <input type="radio" name="status" value="0" style="vertical-align: middle;margin-right:3px;" checked ><label>待审</label>
	    <?php else:?>
	    <label>待审</label>
	    <font color="red">&nbsp;（待超级管理员审核通过后，当前内容方可显示）</font>
	    <?php endif;?></td>
    </tr>
    
    <tr>
      <td align="right"></td>
      <td>
        <input type="submit" value="提 交" class="btn ajax_btn" />
		<input type="button" value="返 回" class="btn ajax_btn" onclick="history.go(-1)" />
      </td>
    </tr>
	
  </table>
</form>
</div>
</body>


</html>

