  <div class="breadcrumb">您所在的位置：<a href="/">首页</a> &gt;&gt; <a href="/index.php/interaction">交流互动</a> &gt;&gt; 
  <a href="/index.php/interaction/type<?php echo $now_nav2->cat_type_id; ?>/<?php echo $now_nav2->cat_id; ?>/<?php echo $now_nav2->parent_id; ?>/1"><?php echo $now_nav2->name; ?></a> &gt;&gt; 
    <span class="active"><?php echo $votes->title; ?></span>
  
  </div>
  <!--breadcrumb end-->
  <div class="clear"></div>
  <div class="left_side">
    <div class="left_menu"> <img src="/public/index/images/left_menu_tit_interaction.png" />
      <ul>
        <?php
	  if(isset($left_navs)){
	
	  foreach($left_navs as $lnkey=>$lnval){
	  
	  if(is_array($lnval)){
	  foreach($lnval as $lnnkey=>$lnnval){
	  ?>
        <li><a  <?if($lnnkey==$left_navs_selected){?>style="background: #0067ad;color: #FFF;";<?php }else{?>href="<?php echo $lnnval['url']; ?>"<?php } ?>><?php echo $lnnval['name']; ?></a></li>
		
		<?php 
		}
		}
		}
		}
		?>
      </ul>
    </div>
    <div class="clear2"></div>
    <a href="/index.php/interaction/type1/148/"><img src="/public/index/images/online_interview.jpg" /></a> </div>
  <!--left_side end-->
  
  <div class="right_side">
    <div class="border_box">
      <h1><?php echo htmlspecialchars($votes->title); ?></h1>
      <div class="content_info">开始时间：<?php echo date("Y-m-d",$votes->start_time); ?>&nbsp;&nbsp;&nbsp;&nbsp;结束时间：<?php echo date("Y-m-d",$votes->exp_time); ?></div>
      <?php echo $votes->content; ?>
	  <br />
	  <br /> <p style="width:96%;border-bottom:1px #ddd dashed;margin:0 auto;"></p> <br />
      <p align="center"></p>
     
	<?php if(time() > $votes->exp_time){ ?>
	<tr>
	  <td>本调查已结束！</\br />
	    <input type="button" value="查看结果" class="submit2" onclick="javascript:location.href='/index.php/interaction/vote_result/<?php echo $vote_id;?>/<?php echo $votes->cat_id;?>'"/> 
	  </td>
	</tr>
	<?php }elseif(time() < $votes->start_time){ ?>
		<tr><td>本调查还没开始，请稍候参与调查!</td></tr>
	<?php }else{ ?>
      <form id="form1" name="form1" method="post" action="/index.php/interaction/vote_handle/<?php echo $vote_id;?>/<?php echo $votes->cat_id;?>" style=" text-indent:30px; margin:0 auto; line-height:24px;"> 
	  <?php $i=0;$xxtype[1]='单选';$xxtype[2]='多选';$xxtype[3]='文本回复';$type2string='';?>
	  
      <?php foreach($question['qt'] as $q_key=>$q_row){ ?>
      <H3 style="margin-left:-2px;float:left;width:100%;"><?php echo htmlspecialchars($q_row->title); ?>
        <span style="font-weight:300;font-size:12px;">
        (<?php echo $xxtype[$q_row->xx_type]; ?>) </span></H3>
     
        <?php if($q_row->xx_type==1){ $i++;?>
		<div style="float:left;width:100%;">
		 <?php foreach($question['op'][$q_key] as $op_row): ?>
	 
		  <p style="width:<?php echo (100/ (int)$q_row->colspan) ?>%;float:left;">
        <input type="hidden" name="type1str[<?php echo $i;?>]" value="1" />
       
        <input id="radio_<?php echo $op_row->q_id?>" type="radio" style="margin-left:12px;" name="type1[<?php echo $op_row->q_id?>]" value="<?php echo $op_row->op_id?>" />
        <label><?php echo htmlspecialchars($op_row->title);?></label>
		</p>
		
        <?php endforeach; ?>
		</div>
        <?php }?>
        <?php if($q_row->xx_type==2): ?>
		<div style="float:left;width:100%;">
        <?php foreach($question['op'][$q_key] as $op_row): ?>
        <p style="width:<?php echo (100/ (int)$q_row->colspan) ?>%;float:left;">
	   <input type="hidden" name="type2str[<?php echo $op_row->q_id; ?>]" value="<?php echo $op_row->q_id; ?>" />
        <label style="margin-left:12px;"> <input id="checkbox_<?php echo $op_row->q_id?>" type="checkbox" name="type2[<?php echo $op_row->op_id?>]" value="<?php echo $op_row->q_id?>" class="checkbox" /> <?php echo htmlspecialchars($op_row->title);?> </label>
      </p>
	  <?php endforeach; ?>
	  </div>
      <?php endif; ?>
      <?php if($q_row->xx_type==3):?>
	  <div style="float:left;width:100%;">
      <?php foreach($question['op'][$q_key] as $opkey3=>$opval3): ?>
	  
      <p style="width:<?php echo (100/ (int)$q_row->colspan) ?>%;float:left;">
        <textarea name="type3[<?php echo $opkey3; ?>]" cols="60" rows="8" style="border:1px #ddd solid;border-radius:4px;margin-left:0px; "> </textarea>
      </p>
	 
      <?php endforeach; ?>
	   </div>
      <?php endif; ?>
      <p style="height:12px;"></p>
      <?php } ?>

      <p>&nbsp;</P>
	  <p align="center" style="float: left;width: 100%;margin-top: 30px;">	
	  	<span style="margin-left:-20px; width: 130px"><input name="yzm" type="text" maxlength="4" id="Check" class="inputbox checkbox" value="输入验证码" onblur="if (this.value ==''){this.value='输入验证码'}" onfocus="if (this.value =='输入验证码'){this.value =''}" /></span>
	    <span style="padding-left: 4px;"><img title="看不清楚？点击图片刷新" src="/public/ValidateCode.php" onclick="this.src='/public/ValidateCode.php?'+new Date().getTime()" style="width: 67px; vertical-align: middle" /> </span>
	  </p>		
      <p align="center" style="float: left;width: 100%;margin-top: 30px;">	  
	  <input id="btnSubmit" type="submit" value="提&nbsp;&nbsp;交" class="submit1"/> <input type="button" value="&nbsp;查看结果&nbsp;" class="submit2" onclick="javascript:location.href='/index.php/interaction/vote_result/<?php echo $vote_id;?>/<?php echo $votes->cat_id;?>'"/> </p>   
      </form>
      <script type="text/javascript" language="javascript">
	      	
	      function checkForm() {
			  var val;
			  $.ajax({
				type: "POST",
				dataType: "json",
				url: "/index.php/interaction/vote_handle_dateCode",
				data: 'yzm=' + $("#Check").val(),
				async:false,//取消异步请求	
				success: function(rel){
				 
					if(rel=='1'){
						alert("请输入正确的验证码");
						val=1;
					 }else{
					    val=0;
					 }
					 
				}
				});
			 
				if(val==1){
				    return false;
				}else{
				    return true;
				} 
		      
		  }
	  	  $(function(){ 
			 $("#btnSubmit").click(function(){  			
		    	<?php foreach($question['qt'] as $q_row): ?>
		    	
		    	<?php if($q_row->xx_type==1){ ?>
			 	var radio_<?php echo $q_row->q_id?>=$('input:radio[id="radio_<?php echo $q_row->q_id?>"]:checked').val();
				if(radio_<?php echo $q_row->q_id?>==null){
					alert("请选择调查问题：”<?php echo $q_row->title?>“ 的对应答案！");
					return false;
				}
				<?php } ?>	

				<?php if($q_row->xx_type==2){ ?>
			 	var checkbox_<?php echo $q_row->q_id?>=$("input:checkbox[id=checkbox_<?php echo $q_row->q_id?>]:checked").length;
				if(checkbox_<?php echo $q_row->q_id?>==0){
					alert("请选择调查问题：”<?php echo $q_row->title?>“ 的对应答案！");
					return false;
				}
				<?php } ?>	
								
				<?php endforeach; ?> 
               
								
			 });
		 });
	</script>
	<?php } ?>
	</div>
  </div>
</div>
<!--warper end-->