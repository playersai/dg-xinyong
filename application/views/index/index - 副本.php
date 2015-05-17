<script src="/public/index/js/flexigrid.js"></script>
<script>
$(document).ready(function(){
	$("#tousuGrid").flexigrid({
		url: '/index.php/ajax/tousu',
		dataType: 'json',
		colModel : [ 
			{display: '来件标题', name : 'fTopic', width : 200, sortable : false, align: 'left'},
			{display: '类别', name : 'fType', width : 70, sortable : false, align: 'center'},
			{display: '处理期限', name : 'fRDate', width : 70, sortable : false, align: 'center'},
			{display: '受理状态', name : 'fState', width : 70, sortable : false, align: 'center'}
		],
		//sortname: "fRDate",
		//sortorder: "desc",
		usepager: true,
		useRp: true,
		rp: 10,
		showTableToggleBtn: true,
		resizable: false,
		width: 477,
		height: 144
	});   
 });
</script>
<div class="floor_1">
	<div class="news_play">
		<div id="hotpic">
			<div id="NewsPic">
	       		<?php foreach($thumbs as $thkey=>$thval):?>
				  <?php if($thkey==0):?>
	         	  <a target="_blank" href="/index.php/open_goverment/view/article/<?php echo $thval->aid; ?>" style="visibility: visible; display: block;"> <img width="350px" height="260px" src="<?php echo $thval->thumb; ?>" class="Picture" alt="<?php echo htmlspecialchars($thval->title); ?>" title="<?php echo htmlspecialchars($thval->title); ?>" /></a>
	       		  <?php else:?>  
	         	  <a style="visibility: hidden; display: none;" target="_blank" href="/index.php/open_goverment/view/article/<?php echo $thval->aid; ?>"> <img class="Picture" src="<?php echo $thval->thumb; ?>" style="width: 350px; height: 260px;" alt="<?php echo htmlspecialchars($thval->title); ?>" title="<?php echo htmlspecialchars($thval->title); ?>" /></a>
	       		  <?php endif;?>
	       		<?php endforeach;?>     
       
          		<div class="Nav">
          			<?php for($i=1;$i<=count($thumbs);$i++){ ?>
			    	<span <?php if($i==1):?>class="Cur" style="width:60px;"<?php else:?>class="Normal"<?php endif;?>><?php echo $i;?></span>
			    	<?php }?>
				</div>
				<div id="NewsPicTxt" style="width: 370px; overflow: hidden">
					<a target="_blank" href="/index.php/open_goverment/view/article/<?php echo $thumbs[0]->aid; ?>"><?php echo $thumbs[0]->title; ?></a>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="/public/index/js/jquery.litenav.js"></script>
		<script type="text/javascript">
        $('#hotpic').liteNav(2000);
      </script>
	</div>
	<!--news_play end-->
	<div class="center_news_list">
		<div class="center_news_list_first">
			<a href="/index.php/open_goverment/view/article/<?php echo $index_top->aid; ?>" target="_blank"><?php echo htmlspecialchars($index_top->title); ?></a>
		</div>
		<div class="news_list">
			<ul class="tabs" id="tabs">
				<li><a href="/index.php/open_goverment/nlists/news/5">板芙新闻</a></li>
				<li><a href="/index.php/open_goverment/nlists/news/6">部门动态</a></li>
				<li><a href="/index.php/open_goverment/nlists/news/7">媒体聚焦</a></li>
				<li><a href="/index.php/open_goverment/nlists/news/zsyw">中山要闻</a></li>
			</ul>
			<div class="news_list_more">
				<a href="/index.php/open_goverment/nlists/news" target="_blank">更多&gt;&gt;</a>
			</div>
			<ul class="tab_conbox" id="tab_conbox">
			<?php if(count($bf_news) > 0):?>
				<li class="tab_con">
			  	<?php foreach($bf_news as $key=>$row_item):?>
                <span class="<?php if($key < 2){ ?>news_list_hot<?php } ?>"><font><?php echo date("m-d",$row_item->addtime); ?></font><a target="_blank" href="<?php if($row_item->is_redirect){ echo $row_item->redirect_url;} else {?>/index.php/open_goverment/view/article/<?php echo $row_item->aid; }?>"><?php echo htmlspecialchars($row_item->title); ?></a></span>
			  	<?php endforeach;?>
              	</li>
            <?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>

            <?php if(count($bm_news) > 0):?>
				<li class="tab_con">
			  	<?php foreach($bm_news as $key=>$row_item):?>
				<span class="<?php if($key < 2){ ?>news_list_hot<?php } ?>"><font><?php echo date("m-d",$row_item->addtime); ?></font><a target="_blank" href="<?php if($row_item->is_redirect){ echo $row_item->redirect_url;} else {?>/index.php/open_goverment/view/article/<?php echo $row_item->aid; }?>"><?php echo htmlspecialchars($row_item->title); ?></a></span>
				<?php endforeach;?>
    			</li>
    		<?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>

            <?php if(count($jjmt_news) > 0):?>
				<li class="tab_con">
			    <?php foreach ($jjmt_news as $key => $row_item):?>
                <span class="<?php if($key < 2){ ?>news_list_hot<?php } ?>"><font><?php echo date("m-d",$row_item->addtime); ?></font><a target="_blank" href="<?php if($row_item->is_redirect){ echo $row_item->redirect_url;} else {?>/index.php/open_goverment/view/article/<?php echo $row_item->aid; }?>"><?php echo htmlspecialchars($row_item->title); ?></a></span>
				<?php endforeach;?>
				</li>
			<?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>

            <?php if(count($zsyw) > 0):?>
				<li class="tab_con">
			  	<?php foreach ($zsyw as $key => $row_item):?>
                <span class="<?php if($key < 2){?>news_list_hot<?php } ?>"><font><?php echo date("m-d",strtotime($row_item['date'])); ?></font><a target="_blank" href="/index.php/open_goverment/view/zsyw/<?php echo $row_item['id']; ?>" target="_blank"><?php echo $row_item['title']; ?></a></span>
				<?php endforeach;?>
 				</li>
 			<?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>
			</ul>
		</div>
		<!--news_list end-->
	</div>
	<!--center_news_list end-->
	<div class="right_inform_list">
		<ul class="tabs2" id="tabs2">
			<li><a href="/index.php/open_goverment/nlists/notice/9">通知公告</a></li>
			<li><a href="index.php/open_goverment/nlists/notice/sjtz">市级通知</a></li>
		</ul>
		<ul class="tab_conbox2" id="tab_conbox2">
		<?php if(count($tzgg_news) > 0):?>
			<li class="tab_con2">
         	<?php foreach ($tzgg_news as $key => $row_item):?>
                <span><font><?php echo date("m-d",$row_item->addtime); ?></font><a target="_blank" href="<?php if($row_item->is_redirect){ echo $row_item->redirect_url;} else {?>/index.php/open_goverment/view/article/<?php echo $row_item->aid; }?>"><i>&middot;</i><?php echo htmlspecialchars($row_item->title); ?></a></span>
				<?php if($key==3){echo '<div class="right_inform_list_spance"></div>';}?>
			<?php endforeach;?>          
         	</li>
         <?php else:?>
            <li class="tab_con2"><span>暂无数据</span></li>
         <?php endif;?>

			<li class="tab_con2">
			<?php foreach ($sjtz as $key => $row_item):?>
				<span><font><?php echo date("m-d",strtotime($row_item['date']));; ?></font><a target="_blank" href="/index.php/open_goverment/view/sjtz/<?php echo $row_item['id']; ?>" target="_blank"><i>&middot;</i><?php echo $row_item['title']; ?></a></span>
			   	<?php if($key==3){echo '<div class="right_inform_list_spance"></div>';}?>
			<?php endforeach;?>
			</li>
		</ul>
	</div>
	<!--right_inform_list end-->
</div>
<!--floor_1 end-->
<div class="floor_2">
	<div class="inf_disclosure">
		<div class="inf_disclosure_tit">政府信息公开栏</div>
		<ul class="tabs3">
			<li><a class="inf_disclosure_con_1" href="/index.php/open_goverment/lists/gkzn" target="_blank">信息公开指南</a></li>
			<li><a class="inf_disclosure_con_2" href="/index.php/open_goverment/lists/gkgd" target="_blank">信息公开规定</a></li>
			<li><a class="inf_disclosure_con_3" href="/index.php/open_goverment/lists/gkbg" target="_blank">公开年度报告</a></li>
			<li><a class="inf_disclosure_con_4" href="/index.php/open_goverment/lists/sqgk" target="_blank">依申请公开</a></li>
		</ul>
		<ul class="tab_conbox3">
			<li class="tab_con3">
				<a href="/index.php/open_goverment/view/page/154" target="_blank"><i>&middot;</i>领导之窗</a> 
				<a href="/index.php/open_goverment/organize" target="_blank"><i>&middot;</i>组织机构</a> 
				<a href="/index.php/open_goverment/nlists/news" target="_blank"><i>&middot;</i>板芙动态</a> 
				<a href="/index.php/open_goverment/nlists/notice" target="_blank"><i>&middot;</i>公告信息</a> 
				<a href="/index.php/open_goverment/lists/zcwj" target="_blank"><i>&middot;</i>政策文件</a> 
				<a href="/index.php/open_goverment/lists/rsxx" target="_blank"><i>&middot;</i>人事信息</a> 
				<a href="/index.php/open_goverment/lists/fzjh" target="_blank"><i>&middot;</i>发展计划</a> 
				<a href="/index.php/open_goverment/lists/tjsj" target="_blank"><i>&middot;</i>统计数据</a> 
				<a href="/index.php/open_goverment/lists/zsyz" target="_blank"><i>&middot;</i>招商引资</a> 
				<a href="/index.php/open_goverment/lists/75" target="_blank"><i>&middot;</i>重大项目</a> 
				<a href="/index.php/open_goverment/lists/czxx" target="_blank"><i>&middot;</i>财政信息</a> 
				<a href="/index.php/topic_page/lists" target="_blank"><i>&middot;</i>热点专题</a></li>
		</ul>
	</div>
	<!--inf_disclosure end-->
	<div class="center_news_list">
		<div class="news_list">
			<ul class="tabs" id="tabs4">
				<li><a href="/index.php/open_goverment/lists/zcwj" target="_blank">政策文件</a></li>
				<li><a href="/index.php/open_goverment/lists/fzjh" target="_blank">发展计划</a></li>
				<li><a href="/index.php/open_goverment/lists/rsxx" target="_blank">人事信息</a></li>
				<li><a href="/index.php/open_goverment/lists/zsyz" target="_blank">招商引资</a></li>
			</ul>
			<div class="news_list_more">
				<a href="/index.php/open_goverment/lists/zcwj" target="_blank">更多&gt;&gt;</a>
			</div>
			<ul class="tab_conbox" id="tab_conbox4">
			<?php if(count($zcwj) > 0):?>
				<li class="tab_con">
			   <?php foreach ($zcwj as $row_item):?>
                <span><font><?php echo date("m-d",strtotime($row_item['date'])); ?></font><a href="/index.php/open_goverment/view/zcwj/<?php echo $row_item['id']; ?>" target="_blank"><?php echo $row_item['title']; ?></a></span>
				<?php endforeach;?>
              	</li>
            <?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>

            <?php if(count($fzjh) > 0):?>
				<li class="tab_con">
                <?php foreach ($fzjh as $row_item):?>
                <span><font><?php echo date("m-d",strtotime($row_item['date'])); ?></font><a href="/index.php/open_goverment/view/fzjh/<?php echo $row_item['id']; ?>" target="_blank"><?php echo $row_item['title']; ?></a></span>
				<?php endforeach;?>
              	</li>
            <?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>

            <?php if(count($rsxx) > 0):?>
				<li class="tab_con">
                <?php foreach ($rsxx as $row_item):?>
                <span><font><?php echo date("m-d",strtotime($row_item['date'])); ?></font><a href="/index.php/open_goverment/view/rsxx/<?php echo $row_item['id']; ?>" target="_blank"><?php echo $row_item['title']; ?></a></span>
				<?php endforeach;?>
				</li>
		    <?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>

            <?php if(count($zsyz) > 0):?>
				<li class="tab_con">
                <?php foreach ($zsyz as $row_item):?>
                <span><font><?php echo date("m-d",strtotime($row_item['date'])); ?></font><a href="/index.php/open_goverment/view/zsyz/<?php echo $row_item['id']; ?>" target="_blank"><?php echo $row_item['title']; ?></a></span>
				<?php endforeach;?>
				</li>
			<?php else:?>
            	<li class="no_data" style="margin-top:100px;">暂无数据</li>
            <?php endif;?>
			</ul>
		</div>
		<!--tabbox end -->
		<!--news_list end-->
	</div>
	<!--center_news_list end-->
	<div class="hot_subject">
		<div class="tit">
			热点专题<a href="/index.php/topic_page/index/" target="_blank">更多&gt;&gt;</a>
		</div>
		<div class="con">
			<div id="fsD1" class="focus">
				<div id="D1pic1" class="fPic">  
		  		<?php foreach ($topic_rows as $tpval):?>
            		<div class="fcon" style="display: none;">
						<a href="/index.php/topic_page/index/<?php echo $tpval->cat_id; ?>" target="_blank"><img src="<?php echo $tpval->cat_thumb; ?>" style="opacity: 1;"></a>
					</div>  
				<?php endforeach;?>      
          </div>
				<div class="fbg">
					<div class="D1fBt" id="D1fBt">
						<a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>1</i></a> <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a> <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>3</i></a> <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>4</i></a>
					</div>
				</div>
				<span class="prev"></span> <span class="next"></span>
			</div>
			<script type="text/javascript">
            Qfast.add('widgets', { path: "/public/index/js/terminator2.2.min.js", type: "js", requires: ['fx'] });  
            Qfast(false, 'widgets', function () {
                K.tabs({
                    id: 'fsD1',       //焦点图包裹id  
                    conId: "D1pic1",  //** 大图域包裹id  
                    tabId:"D1fBt",  
                    tabTn:"a",
                    conCn: '.fcon',   //** 大图域配置class       
                    auto: 1,          //自动播放 1或0
                    effect: 'fade',   //效果配置
                    eType: 'click',   //** 鼠标事件
                    pageBt:true,      //是否有按钮切换页码
                    bns: ['.prev', '.next'], //** 前后按钮配置class                          
                    interval: 4000    //** 停顿时间  
                }) 
            })  
        	</script>
			<div class="hot_subject_list">
		 	<?php foreach ($topic_rows as $tpval):?>
         	<a href="/index.php/topic_page/index/<?php echo $tpval->cat_id; ?>" target="_blank"><i>&middot;</i><?php echo htmlspecialchars($tpval->name); ?></a><font><?php echo date("m-d",$tpval->addtime); ?></font>
		 	<?php endforeach;?>
        	</div>
		</div>
		<!--con end-->
	</div>
	<!--hot_subject end-->
</div>
<!--floor_2 end-->
<div class="excessive_pic">
  <?php if (isset($middle_ad)):?>
  <img src="<?php echo $middle_ad->thumb; ?>" height="80" width="1140" />
  <?php endif; ?>
  </div>
<div class="floor_3">
	<div class="title_3"></div>
	<div class="public_service">
		<div class="tit">
			公共服务<a href="/index.php/online_services/state/23" target="_blank">更多&gt;&gt;</a>
		</div>

		<div class="con">
			<ul>
				<li><a href="/index.php/online_services/state/23" class="service_pic_1" target="_blank"><font>教育文化</font></a></li>
				<li><a href="/index.php/online_services/state/24" class="service_pic_2" target="_blank"><font>社保服务</font></a></li>
				<li><a href="/index.php/online_services/state/25" class="service_pic_3" target="_blank"><font>就业服务</font></a></li>
				<li><a href="/index.php/online_services/state/26" class="service_pic_4" target="_blank"><font>招商引资</font></a></li>
				<li><a href="/index.php/online_services/state/27" class="service_pic_5" target="_blank"><font>医疗服务</font></a></li>
				<li><a href="/index.php/online_services/state/28" class="service_pic_6" target="_blank"><font>住房服务</font></a></li>
				<li><a href="/index.php/online_services/state/29" class="service_pic_7" target="_blank"><font>交通出行</font></a></li>
				<li><a href="/index.php/online_services/state/30" class="service_pic_8" target="_blank"><font>企业开办</font></a></li>
			</ul>
		</div>
	</div>
	<!--public_service end-->
	<div class="center_service">
		<div class="service_list">
			<ul class="tabs5" id="tabs5">
				<li><a href="/index.php/online_services/service/20" target="_blank">个人服务</a></li>
				<li><a href="/index.php/online_services/service/21" target="_blank">企业服务</a></li>
				<li><a href="/index.php/online_services/service/22" target="_blank">三农服务</a></li>
			</ul>
			<ul class="tab_conbox5" id="tab_conbox5">
				<li class="tab_con5"><span><a href="/index.php/online_services/service/20/211/315" target="_blank">&gt; 生育收养</a></span> <span><a href="/index.php/online_services/service/20/212/317" target="_blank">&gt; 户籍证件</a></span> <span><a href="/index.php/online_services/service/20/213/" target="_blank">&gt; 教 育</a></span> <span><a href="/index.php/online_services/service/20/214/" target="_blank">&gt; 文 化</a></span> <span><a href="/index.php/online_services/service/20/215/" target="_blank">&gt; 婚 姻</a></span> <span><a href="/index.php/online_services/service/20/216/" target="_blank">&gt; 劳动就业</a></span> <span><a href="/index.php/online_services/service/20/217/" target="_blank">&gt; 社会保障</a></span> <span><a href="/index.php/online_services/service/20/218/" target="_blank">&gt; 住宅房产</a></span> <span><a href="/index.php/online_services/service/20/219/" target="_blank">&gt; 纳 税</a></span> <span><a href="/index.php/online_services/service/20/220/" target="_blank">&gt; 医疗卫生</a></span> <span><a
						href="/index.php/online_services/service/20/221/" target="_blank">&gt; 交通出行</a></span> <span><a href="/index.php/online_services/service/20/222/" target="_blank">&gt; 公用事业</a></span> <span><a href="/index.php/online_services/service/20/223/" target="_blank">&gt; 出境入境</a></span> <span><a href="/index.php/online_services/service/20/224/" target="_blank">&gt; 司法公安</a></span> <span><a href="/index.php/online_services/service/20/225/" target="_blank">&gt; 养 老</a></span> <span><a href="/index.php/online_services/service/20/226/" target="_blank">&gt; 死亡殡葬</a></span> <span><a href="/index.php/online_services/service/20/227/" target="_blank">&gt; 综合其他</a></span></li>
				<li class="tab_con5"><span><a href="/index.php/online_services/service/21/228/" target="_blank">&gt; 准营设立</a></span> <span><a href="/index.php/online_services/service/21/229/" target="_blank">&gt; 社会保障</a></span> <span><a href="/index.php/online_services/service/21/230/" target="_blank">&gt; 年审年检</a></span> <span><a href="/index.php/online_services/service/21/231/" target="_blank">&gt; 土地房产</a></span> <span><a href="/index.php/online_services/service/21/232/" target="_blank">&gt; 财税金融</a></span> <span><a href="/index.php/online_services/service/21/233/" target="_blank">&gt; 商务活动</a></span> <span><a href="/index.php/online_services/service/21/234/" target="_blank">&gt; 环保绿化</a></span> <span><a href="/index.php/online_services/service/21/235/" target="_blank">&gt; 卫生质监</a></span> <span><a href="/index.php/online_services/service/21/236/" target="_blank">&gt; 对外交流</a></span> <span><a href="/index.php/online_services/service/21/237/" target="_blank">&gt; 规划建设</a></span> <span><a
						href="/index.php/online_services/service/21/238/" target="_blank">&gt; 科技专利</a></span> <span><a href="/index.php/online_services/service/21/239/" target="_blank">&gt; 物流采购</a></span> <span><a href="/index.php/online_services/service/21/240/" target="_blank">&gt; 新闻传播</a></span> <span><a href="/index.php/online_services/service/21/241/" target="_blank">&gt; 司法公正</a></span> <span><a href="/index.php/online_services/service/21/242/" target="_blank">&gt; 安全防护</a></span> <span><a href="/index.php/online_services/service/21/243/" target="_blank">&gt; 物资认证</a></span> <span><a href="/index.php/online_services/service/21/244/" target="_blank">&gt; 变更注销</a></span></li>
				<li class="tab_con5" style="display: list-item;"><span><a href="/index.php/online_services/service/22/245/" target="_blank">&gt; 农民服务</a></span> <span><a href="/index.php/online_services/service/22/246/" target="_blank">&gt; 农业服务</a></span> <span><a href="/index.php/online_services/service/22/247/" target="_blank">&gt; 林业服务</a></span> <span><a href="/index.php/online_services/service/22/248/" target="_blank">&gt; 渔业服务</a></span></li>
			</ul>
			<!--tabbox end -->
		</div>
		<!--service_list end-->
		<div class="event_query">
			<dl>
				<dt>办理事项查询</dt>
				<dd>
					<input id="ipt_query" class="search_box" name="query" type="text" /> <select id="sel_deptName" name="deptName" class="select" onmouseover="FixWidth(this)">
						<option value="" selected="selected">请选部门</option>
						<option value="中山市政府办公室">中山市政府办公室</option>
						<option value="发展和改革局">发展和改革局</option>
						<option value="安监局">安全生产监督管理局</option>
						<option value="保密局">保密局</option>
						<option value="编委办">编委办</option>
						<option value="财政局">财政局</option>
						<option value="残联">残联</option>
						<option value="城管执法局">城管执法局</option>
						<option value="档案局">档案局</option>
						<option value="地税局">地税局</option>
						<option value="法制局">法制局</option>
						<option value="工商局">工商局</option>
						<option value="公安边防支队">公安边防支队</option>
						<option value="公安交警支队">公安交警支队</option>
						<option value="公安局">公安局</option>
						<option value="公安消防支队">公安消防支队</option>
						<option value="公共汽车公司">公共汽车公司</option>
						<option value="公路局">公路局</option>
						<option value="供电局">供电局</option>
						<option value="规划局">规划局</option>
						<option value="国税局">国税局</option>
						<option value="国土资源局">国土资源局</option>
						<option value="海事局">海事局</option>
						<option value="海洋与渔业局">海洋与渔业局</option>
						<option value="航道局">航道局</option>
						<option value="红十字会">红十字会</option>
						<option value="环保局">环保局</option>
						<option value="检察院">检察院</option>
						<option value="住房和城乡建设局">住房和城乡建设局</option>
						<option value="交通运输局">交通运输局</option>
						<option value="教育局">教育局</option>
						<option value="经信局">经信局</option>
						<option value="科技局">科技局</option>
						<option value="人力资源和社会保障局">人力资源和社会保障局</option>
						<option value="林业局">林业局</option>
						<option value="旅游局">旅游局</option>
						<option value="民政局">民政局</option>
						<option value="民族宗教事务局">民族宗教事务局</option>
						<option value="农业局">农业局</option>
						<option value="气象局">气象局</option>
						<option value="人口和计划生育局">人口和计划生育局</option>
						<option value="审改办">审改办</option>
						<option value="食品药品监督管理局">食品药品监督管理局</option>
						<option value="检察院">检察院</option>
						<option value="市投诉中心">市投诉中心</option>
						<option value="水务局">水务局</option>
						<option value="司法局">司法局</option>
						<option value="台湾事务局">台湾事务局</option>
						<option value="体育局">体育局</option>
						<option value="统计局">统计局</option>
						<option value="外经贸局">外经贸局</option>
						<option value="外事局">外事局</option>
						<option value="卫生局">卫生局</option>
						<option value="文化广电新闻出版局">文化广电新闻出版局</option>
						<option value="无管办">无管办</option>
						<option value="无委办">无委办</option>
						<option value="物价局">物价局</option>
						<option value="烟草专卖局">烟草专卖局</option>
						<option value="盐务局">盐务局</option>
						<option value="邮政局">邮政局</option>
						<option value="知识产权局">知识产权局</option>
						<option value="质监局">质监局</option>
						<option value="中山电信">中山电信</option>
						<option value="中山广播电视台">中山广播电视台</option>
						<option value="中山市人民防空办公室">中山市人民防空办公室</option>
						<option value="中山海关">中山海关</option>
						<option value="总工会">总工会</option>
					</select> <select id="sel_type" name="type" class="select">
						<option value="0" selected="selected">事项类别</option>
						<option value="1">行政许可</option>
						<option value="2">非行政许可</option>
						<option value="3">服务事项</option>
						<option value="4">查询事项</option>
					</select> <input id="btn_search" class="service_search_btn" name="service_search_btn" type="button" value="搜索" />
					<script src="/public/index/js/base64.js" type="text/javascript"></script>
					<script>
			          $("#btn_search").click(function() {
			              var base64 = new Base64();
			              var queryStr = $('#sel_type').val() + "@" + $('#ipt_query').val() + "@" + $('#sel_deptName').val();
				          queryStr = base64.encode(queryStr);  
				          queryStr = queryStr.replace(/\+/g, "-");
				          queryStr = queryStr.replace(/\//g, "_");
				          window.open("/index.php/online_services/search/all/" + queryStr);
			          });
			        </script>
				</dd>
			</dl>
		</div>
		<!--event_query end-->
		<div class="results_query">
			<dl>
				<dt>办理结果查询</dt>
				<dd>
					<form method="post" action="http://www.zs.gov.cn/main/services/results/index.action" onsubmit="document.charset='gbk'" target="_blank" id="1363871720">
						<input type="text" name="query" id="" value="" onclick="javascript:if (this.value=='请输入关键字') {this.value='';}" class="service_search_box2" style="width: 330px;"> <input type="submit" value="搜索" class="service_search_btn">
					</form>
				</dd>
			</dl>
		</div>
		<!--results_query end-->
		<div class="center_service_btn">
			<ul>
				<li><a class="center_service_btn1" href="/index.php/online_services/service" target="_blank">办事指南</a></li>
				<li><a class="center_service_btn2" href="/index.php/online_services/form" target="_blank">表格下载</a></li>
				<li><a class="center_service_btn3" href="/index.php/online_services/utility" target="_blank">实用查询</a></li>
				<li><a class="center_service_btn4" href="/index.php/online_services/legal" target="_blank">执法依据</a></li>
			</ul>
		</div>
	</div>
	<!--center_service end-->
	<div class="fast_channel">
		<div class="tit">快速通道</div>
		<div class="con">
			<a href="http://www.zs.gov.cn/main/zwgk/open/dept/index.action?pubcode=1-04C-20" target="_blank"><img src="/public/index/images/fast_channel_pic.jpg" border="0"></a>
			<div class="fast_channel_focus">
				<script language="javascript" type="text/javascript">
        var _t1   = 0; //打开页面时等待图片载入的时间，单位为秒，可以设置为0
        var _t2   = 5; //图片轮转的间隔时间
        var _tnum = 2; //焦点图个数
        var _tn   = 1; //当前焦点
        var _tl   = null;
        var tt1 = setTimeout('change_img()', _t1*1000);
                                     
        function change_img(){
            setFocus(_tn);
            _tt1 = setTimeout('change_img()', _t2*1000);
            }
            function setFocus(i) {
                if(i>_tnum) { _tn=1; i=1; }
                _tl ? document.getElementById('focusPic'+_tl).style.display ='none' : '';
                document.getElementById('focusPic'+i).style.display = 'block';
                _tl = i;
                _tn++;
                }
        </script>
				<!--焦点图1开始-->
				<div id="focusPic1" style="display: block;">
					<a href="http://www.zsbicycle.com/zsbicycle/" class="fpic" target="_blank"><img src="/public/index/images/focus_pic3.png" alt=""><br />公共自行车</a> <a href="http://www.12306.cn/mormhweb/" class="fpic" target="_blank"><img src="/public/index/images/focus_pic2.png" alt=""><br />广珠城轨</a> <a href="http://113.106.13.198/skin/Hospital/Hospital.html" class="fpic" target="_blank"><img src="/public/index/images/focus_pic1.png" alt=""><br />预约挂号</a>
					<div id="img_button">
						<strong class="gdbsdot1"></strong> <a onmouseover="setFocus(2)" href="javascript:setFocus(2);" class="gdbsdot2"></a>

					</div>
				</div>
				<!--焦点图1结束-->
				<!--焦点图2开始-->
				<div id="focusPic2" style="display: none;">
					<a href="http://www.zs.gov.cn/main/zmhd/talk/index.action" class="fpic" target="_blank"><img src="/public/index/images/focus_pic4.png" alt=""><br />热点面对面</a> <a href="http://www.zsemail.com/index.html" class="fpic" target="_blank"><img src="/public/index/images/focus_pic5.png" alt=""><br />市民邮箱</a> <a href="http://zsbs.zs.gov.cn/citizen/home/index.action" class="fpic" target="_blank"><img src="/public/index/images/focus_pic6.png" alt=""><br />公民网页</a>
					<div id="img_button">
						<a onmouseover="setFocus(1)" href="javascript:setFocus(1);" class="gdbsdot2"></a> <strong class="gdbsdot1"></strong>

					</div>
				</div>
				<!--焦点图2结束-->
				<!--焦点图3开始-->


				<!--焦点图3结束-->
			</div>
			<!--fast_channel_focus end-->
		</div>
		<!--con end-->
	</div>
	<!--fast_channel end-->
	<!--total_search start-->

	<div class="total_search">
		<ul class="tabs6" id="tabs6">
			<img src="/public/index/images/total_search_pic.png">
			<li class="thistab"><a class="total_search_ico01" href="">公众教育</a></li>
			<li><a class="total_search_ico02" href="">医疗卫生</a></li>
			<li><a class="total_search_ico03" href="">社会保险</a></li>
			<li><a class="total_search_ico04" href="">交通出行</a></li>
			<li><a class="total_search_ico05" href="">公用事业</a></li>
			<li><a class="total_search_ico06" href="">价格收费</a></li>
			<li><a class="total_search_ico07" href="">公积金房产</a></li>
			<li><a class="total_search_ico08" href="">气象水文</a></li>
			<li><a class="total_search_ico09" href="">财税金融</a></li>
			<li><a class="total_search_ico10" href="">公安司法</a></li>
		</ul>
		<ul class="tab_conbox6" id="tab_conbox6">
			<li class="tab_con6" style="display: list-item;"><span><a href="http://dt.zsedu.net/" target="_blank" title="中山三维学区查询"><i>·</i>中山三维学区查询</a></span> <span><a href="http://yj.zsedu.net/zw05-3.html" target="_blank" title="中山市托儿所一览表"><i>·</i>托儿所一览表</a></span> <span><a href="http://www.zsedu.net/gov/school.html" target="_blank" title="中小学校一览表"><i>·</i>中小学校一览表</a></span> <span><a href="http://yj.zsedu.net/zw05-2.html" target="_blank" title="中山市幼儿园一览表"><i>·</i>幼儿园一览表</a></span> <span><a href="http://www.zs.gov.cn/UserFiles//File/mbxx.xls" target="_blank" title="中山市民办学校一览表"><i>·</i>民办学校一览表</a></span> <span><a href="http://www.zs.gov.cn/main/services/hotview/index.action?id=105477" target="_blank" title="中山市特殊教育学校一览表"><i>·</i>特殊教育学校一览表</a></span> <span><a href="http://www.zs.gov.cn/main/services/hotview/index.action?id=105452" target="_blank" title="中山市中等职业学校一览表"><i>·</i>中等职业学校一览表</a></span> <span><a href="http://www.chsi.com.cn/xlcx/" target="_blank" title="高教学历证书查询"><i>·</i>高教学历证书查询</a></span>
				<span><a href="http://score.zsedu.net/students.html" target="_blank" title="高中学生成绩查询"><i>·</i>高中学生成绩查询</a></span> <span><a href="http://219.128.51.232/htm/cx.htm" target="_blank" title="教师继续教育号查询"><i>·</i>教师继续教育号查询</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.zsws.gov.cn/main/netservice/srvorgan/index.action" target="_blank" title="中山市医疗机构"><i>·</i>中山市医疗机构</a></span> <span><a href="http://myt.zsemail.com/" target="_blank" title="中山市医疗专家"><i>·</i>中山市医疗专家</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/myprofile/index.action?did=1" target="_blank" title="个人医疗帐户查询"><i>·</i>个人医疗帐户查询</a></span> <span><a href="http://www.zs.gov.cn/main/services/content/index.action?id=1504" target="_blank" title="计划生育服务机构"><i>·</i>计划生育服务机构</a></span> <span><a href="http://app1.sfda.gov.cn/" target="_blank" title="食品药品监督信息"><i>·</i>食品药品监督信息</a></span> <span><a href="http://app1.sfda.gov.cn/datasearch/face3/base.jsp?tableId=25&amp;tableName=TABLE25&amp;title=%B9%FA%B2%FA%D2%A9%C6%B7&amp;bcId=118102890099723943731486814455" target="_blank" title="药品信息查询"><i>·</i>药品信息查询</a></span> <span><a
					href="http://app1.sfda.gov.cn/datasearch/face3/base.jsp?tableId=30&amp;tableName=TABLE30&amp;title=%B9%FA%B2%FA%B1%A3%BD%A1%CA%B3%C6%B7&amp;bcId=118103385532690845640177699192" target="_blank" title="保健食品信息查询"><i>·</i>保健食品信息查询</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/service/view/index.action?id=1415" target="_blank" title="医保定点药店"><i>·</i>医保定点药店</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/service/view/index.action?id=1221" target="_blank" title="医保定点医疗机构"><i>·</i>医保定点医疗机构</a></span> <span><a href="http://www.zswjj.gov.cn/UserFiles/img/1302657072781.xls" target="_blank" title="医疗服务价格查询"><i>·</i>医疗服务价格查询</a></span> <span><a href="http://app1.sfda.gov.cn/datasearch/face3/base.jsp?tableId=26&amp;tableName=TABLE26&amp;title=%B9%FA%B2%FA%C6%F7%D0%B5&amp;bcId=118103058617027083838706701567" target="_blank" title="医疗器械信息查询"><i>·</i>医疗器械信息查询</a></span> <span><a href="http://www.zs.gov.cn/UserFiles//main/upfile/jz.xls" target="_blank" title="中山市接种单位名录"><i>·</i>接种单位名录</a></span>
				<span><a href="http://www.zs.gov.cn/UserFiles/main//file/yd.xls" target="_blank" title="中山市零售、连锁药店"><i>·</i>零售、连锁药店</a></span> <span><a href="http://www.zs.gov.cn/UserFiles/main//file/ypsc.xls" target="_blank" title="中山市药品生产企业"><i>·</i>中山市药品生产企业</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.gdzs.si.gov.cn/main/myprofile/index.action?did=1" target="_blank" title="个人养老帐户查询"><i>·</i>个人养老帐户查询</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/myprofile/index.action?did=1" target="_blank" title="个人医疗帐户查询"><i>·</i>个人医疗帐户查询</a></span> <span><a href="http://www.gdzs.lss.gov.cn:8011/ggfwweb/" target="_blank" title="工伤个人业务查询"><i>·</i>工伤个人业务查询</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/myprofile/index.action?did=1" target="_blank" title="退休养老帐户查询"><i>·</i>退休养老帐户查询</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/myprofile/index.action?did=3" target="_blank" title="单位征收数据查询"><i>·</i>单位征收数据查询</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/myprofile/index.action?did=3" target="_blank" title="未平帐数据查询"><i>·</i>未平帐数据查询</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/service/view/index.action?id=1415" target="_blank" title="医疗保险定点药店"><i>·</i>医疗保险定点药店</a></span> <span><a
					href="http://www.gdzs.si.gov.cn/main/service/view/index.action?id=1221" target="_blank" title="医疗保险定点医疗机构"><i>·</i>医保定点医疗机构</a></span> <span><a href="http://www.gdzs.si.gov.cn/main/service/view/index.action?did=41&amp;id=1499" target="_blank" title="中山市基本医疗保险的药品目录、诊疗项目、医疗服务设施"><i>·</i>基本医疗保险的药品目录、诊疗项目、医疗服务设施</a></span> <span><a href="http://www.zsmz.gov.cn/display.php?id=908" target="_blank" title="中山市养老机构名录"><i>·</i>中山市养老机构名录</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.0760js.com/wfcx/" target="_blank" title="交通违法查询"><i>·</i>交通违法查询</a></span> <span><a href="http://www.12306.cn/mormhweb/kyfw/" target="_blank" title="广珠城轨车次查询"><i>·</i>广珠城轨车次查询</a></span> <span><a href="http://211.139.216.188:30380/" target="_blank" title="中山市实时路况"><i>·</i>中山市实时路况</a></span> <span><a href="http://www.zsbus.cn" target="_blank" title="中山市公交线路查询"><i>·</i>中山市公交线路查询</a></span> <span><a href="http://www.zhongshantong.net/zhongshantong/company.asp?comid=23" target="_blank" title="中山通IC卡办理网点"><i>·</i>中山通IC卡办理网点</a></span> <span><a href="http://www.zsbicycle.com/zsbicycle/cx.asp" target="_blank" title="公共自行车借车记录"><i>·</i>公共自行车借车记录</a></span> <span><a href="http://www.zsbicycle.com/zsbicycle/map.asp" target="_blank" title="公共自行车站点信息"><i>·</i>公共自行车站点信息</a></span> <span><a href="http://www.ctrip.com/supermarket/Flight/SuperFlightSearch.asp" target="_blank" title="飞机航班查询"><i>·</i>飞机航班查询</a></span> <span><a
					href="http://wap.zspd.cn/parking/parkingdetail.aspx?sz_corpid=34&amp;sz_businid=34001&amp;ua=Mozilla&amp;token=&amp;userid=&amp;pt=wap" target="_blank" title="车位查询"><i>·</i>车位查询</a></span> <span><a href="/main/zwgk/newsview/index.action?id=106863" target="_blank" title="闯红灯自动记录电子警察系统点位清单"><i>·</i>自动记录闯红灯点位</a></span> <span><a href="/main/zwgk/newsview/index.action?id=106864" target="_blank" title="已启用电子警察监控系统的单行道路"><i>·</i>电子警察监控单行道</a></span> <span><a href="http://www.zsnet.com/fly/" target="_blank" title="中山候机楼汽车班次"><i>·</i>中山候机楼汽车班次</a></span> <span><a href="http://www.zhongshanbus.com/query.php" target="_blank" title="市汽车总站汽车班次"><i>·</i>市汽车总站汽车班次</a></span> <span><a href="http://www.zspassenger.com.cn/zh-CN/search.html" target="_blank"><i>·</i>中港客运班船表</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.gdzs.csg.cn/service/business.do?act=input&amp;type=cost" target="_blank" title="电费查询"><i>·</i>电费查询</a></span> <span><a href="http://www.gdzs.csg.cn/powercut/list.do" target="_blank" title="停电信息查询"><i>·</i>停电信息查询</a></span> <span><a href="http://zhongshan.towngas.com.cn/JV/zs/03custom/index_5.htm" target="_blank" title="港华煤气收费事宜"><i>·</i>港华煤气收费事宜</a></span> <span><a href="http://gd.10086.cn/services/BillSearch/index.jsp" target="_blank" title="移动账单查询"><i>·</i>移动账单查询</a></span> <span><a href="http://www.10010.com/menuengine/turntodestination.action?menuId=002001" target="_blank" title="联通账单查询"><i>·</i>联通账单查询</a></span> <span><a href="http://info.10010.com/lt/profile/city/sd/file4.jsp?id=&amp;arno=000100040004" target="_blank" title="中山联通营业网点查询"><i>·</i>中山联通营业网点</a></span> <span><a href="http://gd.ct10000.com/service/bill/fyjg.jsp?query_type=BillQry" target="_blank" title="电信账单查询"><i>·</i>电信账单查询</a></span> <span><a
					href="http://gd.ct10000.com/support/self_h_p2.jsp" target="_blank" title="中山电信营业网点查询"><i>·</i>电信营业网点查询</a></span> <span><a href="http://gd.ct10000.com/support/domesticnum_query.jsp" target="_blank" title="电话区号查询"><i>·</i>电话区号查询</a></span> <span><a href="http://www.shpost.com.cn/customer/customer_bianmachaxun.php" target="_blank" title="邮政编码查询"><i>·</i>邮政编码查询</a></span> <span><a href="http://www.zs.gov.cn/main/services/content/index.action?id=1515" target="_blank" title="体育设施名录"><i>·</i>体育设施名录</a></span> <span><a href="http://www.zs.gov.cn/main/services/content/index.action?id=1516" target="_blank" title="文化设施名录"><i>·</i>文化设施名录</a></span> <span><a href="http://www.wh3351.com/wykx/yzyx.php" target="_blank" title="一周影讯"><i>·</i>一周影讯</a></span> <span><a href="http://www.zsbtv.com.cn/" target="_blank" title="中山广播电视节目时间表"><i>·</i>广播电视节目时间表</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=56&amp;pid=2" target="_blank" title="中山市成品油最高销售价格"><i>·</i>成品油价格</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=55&amp;pid=2" target="_blank" title="中山市城区居民用户管道天然气价格"><i>·</i>天然气价格</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=108&amp;pid=2" target="_blank" title="中山市城市生活垃圾处理费"><i>·</i>生活垃圾处理费</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=104&amp;pid=2" target="_blank" title="中山市城镇公共汽车线路票价"><i>·</i>公共汽车票价</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=109&amp;pid=2" target="_blank" title="中山市出租车收费标准"><i>·</i>出租车收费标准</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=57&amp;pid=2" target="_blank" title="中山市电价"><i>·</i>中山市电价</a></span> <span><a
					href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=51&amp;pid=2" target="_blank" title="中山市机动车停放保管服务收费"><i>·</i>机动车停放保管收费</a></span> <span><a href="http://www.zswjj.gov.cn/UserFiles/img/1303805407430.xls" target="_blank" title="中山市客运票价"><i>·</i>中山市客运票价</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=113&amp;pid=2" target="_blank" title="中山市路桥收费"><i>·</i>中山市路桥收费</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=107&amp;pid=2" target="_blank" title="中山市瓶装液化石油气价格"><i>·</i>液化石油气价格</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=58&amp;pid=2" target="_blank" title="中山市污水处理费"><i>·</i>污水处理费</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=50&amp;pid=2" target="_blank" title="中山市物业服务收费"><i>·</i>物业服务收费</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=106&amp;pid=2" target="_blank" title="中山市有线电视收费"><i>·</i>有线电视收费</a></span>
				<span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=54&amp;pid=2" target="_blank" title="中山市自来水价格"><i>·</i>自来水价格</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.zsjs.gov.cn/view_content.asp?uid=4539" target="_blank" title="中山市保障性安居工程项目查询"><i>·</i>保障性安居项目查询</a></span> <span><a href="http://www.zsfdc.gov.cn/housefrom.aspx" target="_blank" title="中山市新建商品房房源信息查询"><i>·</i>新建房房源信息查询</a></span> <span><a href="http://www.zsfdc.gov.cn/pub_ProjectQuery.aspx" target="_blank" title="中山市新建商品房项目信息查询"><i>·</i>新建房项目信息查询</a></span> <span><a href="http://www.zsfdc.gov.cn/dangan/" target="_blank" title="中山市土地房产产权查询"><i>·</i>土地房产产权查询</a></span> <span><a href="http://www.zsfdc.gov.cn/zsfdczjnj.aspx" target="_blank" title="中山市房地产中介机构"><i>·</i>房地产中介机构</a></span> <span><a href="http://www.zsfdc.gov.cn/Broker.aspx" target="_blank" title="中山市房地产经纪人信息"><i>·</i>房地产经纪人信息</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=110&amp;pid=2" target="_blank" title="房地产中介收费标准"><i>·</i>房地产中介收费标准</a></span> <span><a href="http://www.zszfgjj.gov.cn/?con=wsfw&amp;ac=gjjsearch"
					target="_blank" title="个人公积金查询"><i>·</i>个人公积金查询</a></span> <span><a href="http://www.zszfgjj.gov.cn/?con=wsfw&amp;ac=dkjd" target="_blank" title="公积金贷款进度查询"><i>·</i>公积金贷款进度查询</a></span> <span><a href="http://www.zszfgjj.gov.cn/?con=gdy&amp;ac=edjsq" target="_blank" title="公积金贷款额度计算器"><i>·</i>公积金贷款额度计算器</a></span> <span><a href="http://www.zszfgjj.gov.cn/?con=gdy&amp;ac=dkjsq" target="_blank" title="公积金贷款计算器"><i>·</i>公积金贷款计算器</a></span> <span><a href="http://yuyue.zszfgjj.gov.cn/Modules/PrintJczm/Jczm.aspx" target="_blank" title="公积金缴存证明查询打印"><i>·</i>公积金缴存证明查询打印</a></span> <span><a href="http://gjjdk.zszfgjj.gov.cn/Login.aspx?ReturnUrl=%2fdefault.aspx" target="_blank" title="公积金贷款网上办公平台"><i>·</i>公积金贷款网上办公平台</a></span> <span><a href="http://yuyue.zszfgjj.gov.cn/Booking/Booking.aspx" target="_blank" title="公积金网上预约平台"><i>·</i>公积金网上预约平台</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.zsqx.gov.cn/weather/" target="_blank" title="天气预报"><i>·</i>天气预报</a></span> <span><a href="http://aqi.zsepb.gov.cn/" target="_blank" title="空气质量预报"><i>·</i>空气质量预报</a></span> <span><a href="http://www.zswater.gov.cn/main/netservice/weather9/" target="_blank" title="台风路径查询"><i>·</i>台风路径查询</a></span> <span><a href="http://www.zswater.gov.cn/main/netservice/weather11/" target="_blank" title="天气雷达图"><i>·</i>天气雷达图</a></span> <span><a href="http://www.zswater.gov.cn/main/netservice/weather10/index.htm" target="_blank" title="卫星云图"><i>·</i>卫星云图</a></span> <span><a href="http://www.zsepb.gov.cn/" target="_blank" title="饮用水质月报、周报"><i>·</i>饮用水质月报、周报</a></span> <span><a href="http://www.zswater.gov.cn/main/netservice/weather1/index.action" target="_blank" title="实时水情信息查询"><i>·</i>实时水情信息查询</a></span> <span><a href="http://www.zswater.gov.cn/main/netservice/weather4/index.action" target="_blank" title="实时雨情信息查询"><i>·</i>实时雨情信息查询</a></span>
				<span><a href="http://www.zswater.gov.cn/main/netservice/weather7/index.action" target="_blank" title="实时咸情信息查询"><i>·</i>实时咸情信息查询</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://app.gd-n-tax.gov.cn/wssw/showReport.do?falcon_falconId=561018AB10D10FF6010D10D1107D0004&amp;falcon_method=method.postRestrict&amp;firstFlag=1&amp;falcon_report_restrict_swjgbm=4420000000" target="_blank" title="企业国税税务登记查询"><i>·</i>国税税务登记查询</a></span> <span><a href="http://app.gd-n-tax.gov.cn/wssw/showReport.do?falcon_falconId=561018AB10D0A412010D10D0A5D90010&amp;falcon_method=method.postRestrict&amp;firstFlag=1&amp;falcon_report_restrict_swjgbm=4420000000" target="_blank" title="企业国税申报情况查询"><i>·</i>国税申报情况查询</a></span> <span><a href="http://app.gd-n-tax.gov.cn/wssw/jsp/common/query/fpcy.jsp" target="_blank" title="国税发票查验"><i>·</i>国税发票查验</a></span> <span><a href="http://app.gd-n-tax.gov.cn/wssw/showReport.do?falcon_falconId=561018AB10D0A412010D10D0A5EC0017&amp;falcon_method=method.postRestrict&amp;firstFlag=1" target="_blank" title="国税发票遗失声明查询"><i>·</i>国税发票遗失声明</a></span> <span><a
					href="http://app.gd-n-tax.gov.cn/wssw/showReport.do?falcon_falconId=C0A800801073A5E701071073A6AE0003&amp;falcon_method=method.postRestrict&amp;firstFlag=1" target="_blank" title="商品退税率查询"><i>·</i>商品退税率查询</a></span> <span><a href="http://etax.zstax.gov.cn/bmfw_easyperInq_Login2.jsp" target="_blank" title="纳税户涉税查询"><i>·</i>纳税户涉税查询</a></span> <span><a href="http://etax.zstax.gov.cn/bmfw/wsjycx.do?method=showWSYZQueryPage" target="_blank" title="纳税证明验证查询"><i>·</i>纳税证明验证查询</a></span> <span><a href="http://etax.zstax.gov.cn/bmfw/easyPersonLogin.do?method=showSwryPage" target="_blank" title="税管员查询"><i>·</i>税管员查询</a></span> <span><a href="http://www.gdltax.gov.cn/portal/zs/N6A0TAHTPQVAP6Z04TVY39M11YVIPKBI.htm" target="_blank" title="“南粤金税”发票抽奖查询"><i>·</i>地税发票抽奖</a></span> <span><a href="http://etax.zstax.gov.cn/bmfw/easyPersonLogin.do?method=showCCSQueryPage" target="_blank" title="车船完税查询"><i>·</i>车船完税查询</a></span> <span><a
					href="http://www.gdltax.gov.cn/portal/zs/MGH3TLUM4391QZ2PPKZI7PF0Z1ISAEEH.htm" target="_blank" title="地税发票信息查询"><i>·</i>地税发票信息查询</a></span> <span><a href="http://etax.zstax.gov.cn/bmfw_easyperInq_Login.jsp" target="_blank" title="个人所得税查询"><i>·</i>个人所得税查询</a></span> <span><a href="http://www.zsjs.gov.cn/new/index.asp?FileType=%D5%FE%B8%AE%B9%AB%CE%C4" target="_blank" title="工程建设招标查询"><i>·</i>工程建设招标查询</a></span></li>
			<li class="tab_con6" style="display: none;"><span><a href="http://www.gdga.gov.cn/sfzbl/queryHzyw.do" target="_blank" title="广东省户政业务审批结果查询"><i>·</i>广东省户政业务审批结果查询</a></span> <span><a href="http://www.gdga.gov.cn/sfzbl/search.do" target="_blank" title="广东省居民身份证办理进度查询"><i>·</i>广东省居民身份证办理进度查询</a></span> <span><a href="http://jj.gdga.gov.cn/cx/wzss/wzss.do" target="_blank" title="广东省交通违法查询系统"><i>·</i>广东省交通违法查询系统</a></span> <span><a href="http://www.0760js.com/wfcx/" target="_blank" title="中山本地交通违法查询"><i>·</i>中山本地交通违法查询</a></span> <span><a href="http://jj.gdga.gov.cn/acdfile/searchacdfile.jsp" target="_blank" title="交通事故查询"><i>·</i>交通事故查询</a></span> <span><a href="http://jj.gdga.gov.cn/cx/vehicle/vehicle.do" target="_blank" title="车辆核实查询"><i>·</i>车辆核实查询</a></span> <span><a href="http://jj.gdga.gov.cn/vehicle/vehiclesearch.jsp" target="_blank" title="驾驶证核实查询"><i>·</i>驾驶证核实查询</a></span> <span><a href="http://jj.gdga.gov.cn/drivinglicense/drivinglicensesearch.jsp" target="_blank"
					title="广东省常住户口居民出入境审批进度查询"><i>·</i>广东省常住户口居民出入境审批进度查询</a></span> <span><a href="http://110.gdga.gov.cn/newwebsite/main.jsp?id=4420&amp;adir=&amp;wy=1" target="_blank" title="中山网警业务办理进度查询"><i>·</i>中山网警业务办理进度查询</a></span> <span><a href="http://110.gdga.gov.cn/newwebsite/main.jsp?id=4420&amp;adir=&amp;wy=1" target="_blank" title="网站备案审核结果查询"><i>·</i>网站备案审核结果查询</a></span> <span><a href="http://wsbs.gdfire.gov.cn/index.aspx?AspxAutoDetectCookieSupport=1#" target="_blank" title="公安消防业务查询"><i>·</i>公安消防业务查询</a></span> <span><a href="http://www.zssf.gov.cn/?op=show_news&amp;id=955" target="_blank" title="各镇区法律援助工作站一览表"><i>·</i>各镇区法律援助工作站一览表</a></span> <span><a href="http://www.zsnews.cn/zt/zslx/showindex_1785.shtml" target="_blank" title="中山市律师事务所查询"><i>·</i>中山市律师事务所查询</a></span> <span><a href="http://www.zswjj.gov.cn/JumpManage?action=tolist&amp;id=111&amp;pid=2" target="_blank" title="律师服务收费标准"><i>·</i>律师服务收费标准</a></span></li>
		</ul>
	</div>
	<!--total_search end-->
</div>
<!--floor_3 end-->
<div class="floor_4">
	<div class="title_4"></div>
	<div class="gov_weibo">
		<div class="tit">
			政务微博<a href="http://www.zs.gov.cn/main/zmhd/weibo/index.action" target="_blank">进入政务微博广场&gt;&gt;</a>
		</div>
		<div class="con">
			<iframe width="100%" height="264" class="share_self" frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=264&fansRow=2&ptype=1&speed=100&skin=1&isTitle=0&noborder=0&isWeibo=1&isFans=0&uid=3506393293&verifier=c1806245&colors=ffffff,ffffff,666666,0082cb,ecfbfd&dpc=1"></iframe>
		</div>
	</div>
	<!--gov_weibo end-->
	<div class="mayor_mail">
		<div class="con">
			<div class="mayor_mail_btn">
				<ul>
					<li><a class="mayor_mail_btn1" href="/index.php/interaction/Mayor_mail" target="_blank">镇长信箱</a></li>
					<li><a class="mayor_mail_btn2" href="/index.php/interaction/complaint_form" target="_blank">我要投诉</a></li>
					<li><a class="mayor_mail_btn3" href="/index.php/interaction/Consulting_work" target="_blank">我要咨询</a></li>

				</ul>
			</div>
			<!--mayor_mail_btn end-->
			<div class="mayor_mail_tab">
				<script charset="utf-8" src="/public/formvalid/valid.js"></script>
				<script type="text/javascript">
					function checkdata(){
						document.myform.handle_id.value = trim(document.myform.handle_id.value);
						if(document.myform.handle_id.value=="") {
							alert("受理编号不能为空！");
							document.myform.handle_id.focus();
							return false;
						}


						if(document.myform.password.value.length!=6) {
							alert("请输入6位查询密码！");
							document.myform.password.focus();
							return false;
						}
					}
				</script>
				<form name="myform" method="post" action="/index.php/interaction/search/index/" target="_blank" onsubmit="return checkdata()">
					受理编号： <input type="text" name="handle_id" maxlength="13" id="seria" value="" class="mayor_mail_input" placeholder="请输入13位受理编号" title="请输入13位受理编号"> 
					查询密码： <input type="password" name="password" maxlength="6" id="pwd" value="" class="mayor_mail_input" placeholder="请输入6位查询密码" title="请输入6位查询密码"> 
					<input type="submit" value="搜索" class="mayor_mail_submit">
				</form>
				<!--mayor_mail copy需要调试-->

				<table class="flex" name="tousuGrid" id="tousuGrid" height="126" cellpadding="0" cellspacing="0" border="0">

				</table>

				<!--mayor_mail copy需要调试-->
			</div>
			<!--mayor_mail_tab end-->
		</div>
	</div>
	<!--mayor_mail end-->
	<div class="survey_and_collect">
		<ul class="tabs7" id="tabs7">
			<li><a target="_blank" href="/index.php/interaction/type5/105/22/1">网上调查</a></li>
			<li><a target="_blank" href="/index.php/interaction/type6/37/24/1">网上征集</a></li>
		</ul>
		<ul class="tab_conbox7" id="tab_conbox7">
			<li class="tab_con7">
			<?php foreach ($vote_rows as $vtval):?>
          	<span><font><?php echo date("m-d",$vtval->addtime); ?></font><a href="/index.php/interaction/vote/<?php echo $vtval->vote_id.'/'.$vtval->cat_id; ?>" target="_blank"><i>&middot;</i><?php echo htmlspecialchars($vtval->title); ?></a></span>
		 	<?php endforeach;?> 
			</li>

			<li class="tab_con7">
         	<?php foreach ($feedback_rows as $fbval):?>
          	<span><font><?php echo date("m-d",$fbval->addtime); ?></font><a href="/index.php/interaction/feedback/<?php echo $fbval->f_id.'/'.$fbval->cat_id; ?>" target="_blank"><i>&middot;</i><?php echo htmlspecialchars($fbval->title); ?></a></span>
		 	<?php endforeach;?> 
        </li>
		</ul>
	</div>
	<!--survey_and_collect end-->
	<div class="online_interview">
		<a href="/index.php/interaction/type1/148/" target="_blank"><img src="/public/index/images/online_interview.jpg" /></a>
	</div>
</div>
<!--floor_4 end-->
<?php if (isset($ad135)):?>
<div class="excessive_pic">
	<img src="<?php echo $ad135->thumb; ?>" height="80" width="1140" />
</div>
<?php endif;?>
<div class="floor_5">
	<div class="title_5"></div>
	<div class="ect_map">
		<div class="tit">
			电子地图<a href="http://j.map.baidu.com/QlKnv" target="_blank">更多&gt;&gt;</a>
		</div>
		<div class="con">
			<!--百度地图容器-->
			<div style="width: 348px; height: 180px;" id="dituContent"></div>
			<script type="text/javascript">
		    //创建和初始化地图函数：
		    function initMap(){
		        createMap();//创建地图
		        setMapEvent();//设置地图事件
		        addMapControl();//向地图添加控件
		        addMarker();//向地图中添加marker
		    }
		    
		    //创建地图函数：
		    function createMap(){
		        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
		        var point = new BMap.Point(113.328863,22.422794);//定义一个中心点坐标
		        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
		        window.map = map;//将map变量存储在全局
		    }
		    
		    //地图事件设置函数：
		    function setMapEvent(){
		        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
		        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
		        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
		        map.enableKeyboard();//启用键盘上下左右键移动地图
		    }
		    
		    //地图控件添加函数：
		    function addMapControl(){
		        //向地图中添加缩放控件
			var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_ZOOM});
			map.addControl(ctrl_nav);
		                }
		    
		    //标注点数组
		    var markerArr = [{title:"板芙镇政府",content:"中山市板芙镇板芙北路25号",point:"113.328872|22.422694",isOpen:0,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
				 ];
		    //创建marker
		    function addMarker(){
		        for(var i=0;i<markerArr.length;i++){
		            var json = markerArr[i];
		            var p0 = json.point.split("|")[0];
		            var p1 = json.point.split("|")[1];
		            var point = new BMap.Point(p0,p1);
					var iconImg = createIcon(json.icon);
		            var marker = new BMap.Marker(point,{icon:iconImg});
					var iw = createInfoWindow(i);
					var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
					marker.setLabel(label);
		            map.addOverlay(marker);
		            label.setStyle({
		                        borderColor:"#808080",
		                        color:"#333",
		                        cursor:"pointer"
		            });
					
					(function(){
						var index = i;
						var _iw = createInfoWindow(i);
						var _marker = marker;
						_marker.addEventListener("click",function(){
						    this.openInfoWindow(_iw);
					    });
					    _iw.addEventListener("open",function(){
						    _marker.getLabel().hide();
					    })
					    _iw.addEventListener("close",function(){
						    _marker.getLabel().show();
					    })
						label.addEventListener("click",function(){
						    _marker.openInfoWindow(_iw);
					    })
						if(!!json.isOpen){
							label.hide();
							_marker.openInfoWindow(_iw);
						}
					})()
		        }
		    }
		    //创建InfoWindow
		    function createInfoWindow(i){
		        var json = markerArr[i];
		        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
		        return iw;
		    }
		    //创建一个Icon
		    function createIcon(json){
		        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
		        return icon;
		    }
		    
		    initMap();//创建和初始化地图
		</script>
		</div>
	</div>
	<!--ect_map end-->
	<div class="bf_namecard">
		<div class="con">
			<div class="bf_namecard_pic">
				<a href="/index.php/landscape/type4/53/54" target="_blank"><img src="/public/index/images/bf_namecard_pic.jpg" border="0" /></a>
				<div class="bf_namecard_video">
					<a href="/index.php/landscape/type4/53/54" target="_blank">板芙视界</a>
				</div>
			</div>
			<!--bf_namecard_pic end-->
			<div class="tit">我想了解：</div>
			<div class="bf_namecard_list">
				<a href="/index.php/open_goverment/nlists/news/5" target="_blank"><i>&middot;</i>板芙最近发生了什么？</a> 
				<a href="/index.php/open_goverment/nlists/news/6" target="_blank"><i>&middot;</i>政府最近工作热点</a> 
				<a href="/index.php/open_goverment/organize" target="_blank"><i>&middot;</i>了解板芙镇政府机构</a> 
				<a href="/index.php/landscape/view/48/51" target="_blank"><i>&middot;</i>如何在板芙投资？</a> 
				<a href="/index.php/landscape/view/48/52" target="_blank"><i>&middot;</i>了解板芙镇企业</a>
			</div>
			<!--bf_namecard_list end-->
		</div>
	</div>
	<!--bf_namecard end-->
	<div class="recruiting">

		<ul class="tabs8" id="tabs8">
			<div class="recruiting_btn">
				<a href="/index.php/landscape/type2add/1" target="_blank">发布信息&gt;&gt;</a>
			</div>
			<li><a href="/index.php/landscape/type2/48/113" target="_blank">企业招聘</a></li>
			<li><a href="/index.php/landscape/type2/48/114" target="_blank">个人应聘</a></li>
		</ul>
		<ul class="tab_conbox8" id="tab_conbox8">
			<li class="tab_con8">
			<?php foreach ($qyzp_news as $qyval):?>
          	<span><font><?php echo date("m-d",$qyval->addtime); ?></font><a href="/index.php/landscape/article/<?php echo $qyval->aid.'/'.$qyval->cat_id; ?>" target="_blank"><i>&middot;</i><?php echo htmlspecialchars($qyval->title); ?></a></span>
			<?php endforeach;?>
        	</li>
        	
			<li class="tab_con8">
         	<?php foreach ($grqzh_news as $grqzhval):?>
          	<span><font><?php echo date("m-d",$grqzhval->addtime); ?></font><a href="/index.php/landscape/article/<?php echo $grqzhval->aid.'/'.$grqzhval->cat_id; ?>" target="_blank"><i>&middot;</i><?php echo htmlspecialchars($grqzhval->title); ?></a></span>
		  	<?php endforeach;?>
        </li>
		</ul>
	</div>
	<!--recruiting end-->
	<div class="organ_menus">
		<!-- centerwell 开始 -->
		<ul id="centerwell">
			<li class="centerwell" id="centerwell_1">
				<h3></h3>
				<div class="centerwell_con">
					<div class="centerwell_pic">
					<?php foreach ($bottomad1 as $btval1):?>
             		<span><a href="<?php echo $btval1->link==''?'/index.php/landscape':$btval1->link; ?>"><img src="<?php echo $btval1->thumb; ?>" width="150" height="100" /></a></span>
					<?php endforeach;?>
		            </div>
		            
					<div class="centerwell_text">&nbsp;&nbsp;&nbsp;&nbsp;
					<?php echo mb_substr(htmlspecialchars($bt_page1->content),0,155); ?>...</div>
					<div class="centerwell_tab">
						<ul class="tabs9">
							<li><a href="/index.php/landscape/view/3/14" target="_blank">【历史沿革】</a></li>
							<li><a href="/index.php/landscape/view/3/15" target="_blank">【社会发展】</a></li>
							<li><a href="/index.php/landscape/view/3/12" target="_blank">【经济发展】</a></li>
							<li><a href="/index.php/landscape/view/3/16" target="_blank">【自然资源】</a></li>
							<li><a href="/index.php/landscape/view/3/18" target="_blank">【人文风俗】</a></li>
						</ul>
						<ul class="tab_conbox9">
							<li class="tab_con9">
							<?php foreach ($btsqjw_news as $btval):?>
                  			<span><a href="/index.php/landscape/article/<?php echo $btval->aid.'/'.$btval->cat_id; ?>" target="_blank"><i>&middot;</i><?php echo htmlspecialchars($btval->title); ?></a></span>
							<?php endforeach;?>
             				</li>
						</ul>
					</div>
				</div>
			</li>
			<li class="centerwell" id="centerwell_2">
				<h3></h3>
				<div class="centerwell_con">
					<div class="centerwell_pic">
					<?php foreach ($bottomad2 as $btval2):?>
             		<span><a href="<?php echo $btval2->link==''?'/index.php/landscape':$btval2->link; ?>"><img src="<?php echo $btval2->thumb; ?>" width="150" height="100" /></a></span>
					<?php endforeach;?>
            		</div>
            		
					<div class="centerwell_text">&nbsp;&nbsp;&nbsp;&nbsp;
					<?php echo mb_substr(htmlspecialchars($bt_page2->content),0,155); ?>...</div>
					<div class="centerwell_tab">
						<ul class="tabs9_pic">
							<li><a href="/index.php/landscape/view/20/21" target="_blank"><img src="public/index/images/landscape_index_ico1.png" /><br /> <font>医疗卫生</font></a></li>
							<li><a href="/index.php/landscape/view/20/25" target="_blank"><img src="public/index/images/landscape_index_ico2.png" /><br /> <font>教育培训</font></a></li>
							<li><a href="/index.php/landscape/view/20/44" target="_blank"><img src="public/index/images/landscape_index_ico3.png" /><br /> <font>环境保护</font></a></li>
							<li><a href="/index.php/landscape/view/20/46" target="_blank"><img src="public/index/images/landscape_index_ico4.png" /><br /> <font>出行交通</font></a></li>
							<li><a href="/index.php/landscape/type2/20/146" target="_blank"><img src="public/index/images/landscape_index_ico5.png" /><br /> <font>房产置业</font></a></li>
						</ul>
					</div>
				</div>
			</li>
			<li class="centerwell" id="centerwell_3">
				<h3></h3>
				<div class="centerwell_con">
					<div class="centerwell_pic">
					<?php foreach ($bottomad3 as $btval3):?>
              		<span><a href="<?php echo $btval3->link==''?'/index.php/landscape':$btval3->link; ?>" target="_blank"><img src="<?php echo $btval3->thumb; ?>" width="150" height="100" /></a></span>
			  		<?php endforeach;?>
					</div>
					
					<div class="centerwell_text">&nbsp;&nbsp;&nbsp;&nbsp;
					<?php echo mb_substr(htmlspecialchars($bt_page3->content),0,155); ?> </div>
					<div class="centerwell_tab">
						<ul class="tabs9_pic">
							<li><a href="/index.php/landscape/type4/53/54" target="_blank"><img src="public/index/images/landscape_index_ico6.png" /><br /> <font>板芙影像</font></a></li>
							<li><a href="/index.php/landscape/view/53/55" target="_blank"><img src="public/index/images/landscape_index_ico7.png" /><br /> <font>旅游景点</font></a></li>
							<li><a href="/index.php/landscape/view/53/56" target="_blank"><img src="public/index/images/landscape_index_ico8.png" /><br /> <font>板芙美食</font></a></li>
							<li><a href="/index.php/landscape/view/53/57" target="_blank"><img src="public/index/images/landscape_index_ico9.png" /><br /> <font>酒店住宿</font></a></li>
							<li><a href="http://map.baidu.com/?shareurl=1&poiShareUid=c1fc21f9253760affd0eb057" target="_blank"><img src="public/index/images/landscape_index_ico10.png" /><br /> <font>电子地图</font></a></li>
						</ul>
					</div>
				</div>
			</li>
			<li class="centerwell" id="centerwell_4">
				<h3></h3>
				<div class="centerwell_con">
					<div class="centerwell_pic">
		            <?php foreach ($bottomad4 as $btval4):?>
              		<span><a href="<?php echo $btval4->link==''?'/index.php/landscape':$btval4->link; ?>" target="_blank"><img src="<?php echo $btval4->thumb; ?>" width="150" height="100" /></a></span>
					<?php endforeach;?>
            		</div>
            		
					<div class="centerwell_text">&nbsp;&nbsp;&nbsp;&nbsp;
					<?php echo mb_substr(htmlspecialchars($bt_page4->content),0,155); ?>... </div>
					<div class="centerwell_tab">
						<ul class="tabs9_pic">
							<li><a href="/index.php/landscape/type2/48/138" target="_blank"><img src="public/index/images/landscape_index_ico11.png" /><br /> <font>投资动态</font></a></li>
							<li><a href="/index.php/landscape/view/48/51" target="_blank"><img src="public/index/images/landscape_index_ico12.png" /><br /> <font>投资项目</font></a></li>
							<li><a href="/index.php/landscape/view/48/52" target="_blank"><img src="public/index/images/landscape_index_ico13.png" /><br /> <font>企业名录</font></a></li>
							<li><a href="/index.php/landscape/type2/48/113" target="_blank"><img src="public/index/images/landscape_index_ico14.png" /><br /> <font>企业招聘</font></a></li>
							<li><a href="/index.php/landscape/type2/48/114" target="_blank"><img src="public/index/images/landscape_index_ico15.png" /><br /> <font>个人应聘</font></a></li>
						</ul>
					</div>
				</div>
			</li>

		</ul>
		<!-- centerwell 结束 -->
	</div>
	<!-- organ_menus end  -->
</div>
<!--floor_5 end-->
</div>
<!--warper end-->

