  <div class="breadcrumb">您所在的位置：<a href="/index.php">首页</a> &gt;&gt; <a href="/index.php/online_services">网上服务</a> &gt;&gt; <a href="/index.php/online_services/form">表格下载</a> &gt;&gt;
    <span class="active">搜索结果</span>
  </div>
  <!--breadcrumb end-->
  <div class="clear"></div>
  <div class="full_list">
    <div class="news_list2">
      <ul class="tab_conbox">
      <div class="search_info"><font>找到&nbsp;</font><span style="color:#f00;"><?php echo htmlspecialchars($query);?></span><font>&nbsp;相关信息共</font><span style="color:#f00;">&nbsp;<?php echo $total;?>&nbsp;</span><font>条</font></div>
        <div class="clear"></div>
        <li class="tab_con">
        <?php foreach ($rows as $row_item): ?>
        <span><font><?php echo $row_item['dept']?></font><a href="http://www.zs.gov.cn/ajax/infoFlowDownload.action?id=<?php echo $row_item['id']?>"><?php echo str_replace($query, '<sapn style="color:red">'.$query.'</sapn>', $row_item['name']);?></a></span>
        <?php endforeach;?>
        <div class="clear"></div>
        <div class="page">共<span style="color:#f00;"><?php echo $total;?></span>条记录，分<span style="color:#f00;"><?php echo $pageCount;?></span>页显示 <?php echo $pageLink; ?></div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--warper end-->
<div class="inside_foot">
  <div class="foot_info">
    <div class="foot_nav"> <a href="">网站地图</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">联系方式</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">免责声明</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">使用帮助</a> </div>
    广东省中山市板芙镇人民政府&nbsp;&nbsp;&copy;2014 粤ICP备09060159号-1&nbsp;&nbsp;联系电话：0760-86502999&nbsp;&nbsp;传真：0760－86501168&nbsp;&nbsp;邮编：528459&nbsp;&nbsp;电子邮箱：info@banfu.gov.cn </div>
</div>
<div class="inside_foot_bg"></div>
</body>
</html>
