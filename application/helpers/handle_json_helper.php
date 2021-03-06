<?php

function get_jsonAll($link, $rowName)
{
	$json_cont = file_get_contents($link);
	$json_cont = iconv('gbk', 'utf-8', $json_cont);
	$json_de = json_decode($json_cont, true);
	$json_rows = $json_de[$rowName];
	
	return $json_rows;
}

function get_jsons($link, $rowName, $num)
{
	$json_cont = file_get_contents($link);
	$json_cont = iconv('gbk', 'utf-8', $json_cont);
	$json_de = json_decode($json_cont, true);
	
	if ($json_de['total'] < $num) {
		$num = $json_de['total'];
	}
	$json_rows = $json_de[$rowName];
	$row = array_slice($json_rows, 0, $num);
	return $row;
}

function get_json_pageList($link, $rowName, $curPage = 1, $pageSize = 10)
{
	$link = str_replace('[@curPage]', $curPage, $link);
	$link = str_replace('[@pageSize]', $pageSize, $link);
	
	$json_cont = file_get_contents($link);
	$json_cont = iconv('gbk', 'utf-8', $json_cont);
	$json_de = json_decode($json_cont, true);
	
	$json['total'] = $json_de['total'];
	$json['pageCount'] = $json_de['pageCount'];
	$json['rows'] = $json_de[$rowName];var_dump($json);exit;
	
	return $json;
}

function get_json_createLink($baseUrl, $curPage, $pageCount, $linkNum)
{
	$pageLinks = '';
	
	$start = (($curPage - $linkNum) > 0) ? $curPage - ($linkNum) : 1;
	$end = (($curPage + $linkNum) < $pageCount) ? $curPage + $linkNum : $pageCount;
	
	for ($i = $start; $i <= $end; $i ++) {
		if ($i == $curPage) {
			$pageLinks .= '<span class="page_now">' . $i . '</span>';
		} else {
			$pageLinks .= '<a href="' . $baseUrl . $i . '">' . $i . '</a>';
		}
	}
	
	if ($curPage > 1) {
		$pageLinks = '<a class="prev" href="' . $baseUrl . ($curPage - 1) . '">上一页</a>' . $pageLinks;
	}
	
	if ($curPage < $pageCount) {
		$pageLinks = $pageLinks . '<a class="next" href="' . $baseUrl . ($curPage + 1) . '">下一页</a>';
	}
	
	return $pageLinks;
}