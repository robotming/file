<?php

//获取文章发布时间
function timeFormat($content_time)
{
	$duration = time() - strtotime($content_time);
	if ($duration < 60)
		return '刚刚';
	elseif ($duration < 3600)
		return floor($duration / 60) . '分钟前';
	elseif ($duration < 86400)
		return floor($duration / 3600) . '小时前';
	elseif ($duration < 86400 * 31)
		return floor($duration / 86400) . '天前';
	else
		return $content_time;
}

function curlGet($url){
    $beginTime = microtime(true);
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$response = curl_exec($ch);
	$err = curl_error($ch);
	if($err){
		//做调试
	}
	curl_close($ch);
	//-------请求为空
	if (empty($response) ){
		return null;
	}

    $endTime = microtime(true);
    if ($endTime - $beginTime > 2) {
        $queryTime = round($endTime - $beginTime, 4) . 's';
        Log::alert('curlGet：查询时间：' . $queryTime . '，request_url：' . $url . '，current_url：' . url()->current() . '，时间' . date('Y-m-d H:i:s'));
    }

	return $response;
}

function curlPost($url, $keysArr, $header=array(), $flag = 0){
    $beginTime = microtime(true);

    $ch = curl_init();
	if (!$flag) {
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	}
	if(count($header) > 0) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $keysArr);
	curl_setopt($ch, CURLOPT_URL, $url);
	$ret = curl_exec($ch);
	$err = curl_error($ch);
	if($err){
		//??????
	}
	curl_close($ch);

    $endTime = microtime(true);
    if ($endTime - $beginTime > 2) {
        $queryTime = round($endTime - $beginTime, 4) . 's';
        Log::alert('curlPost：查询时间：' . $queryTime . '，request_url：' . $url . '，postdata：' . json_encode($keysArr) . '，current_url：' . url()->current() . '，时间' . date('Y-m-d H:i:s'));
    }
	return $ret;
}

/**
 * 对象转数组
 * @param $object
 * @return mixed
 */
function objectToArray($object)
{
    //先编码成json字符串，再解码成数组
    return json_decode(json_encode($object), true);
}

//文本处理
function subtext($text, $length)
{
    if(mb_strlen($text, 'utf8') > $length) {
        return mb_substr($text, 0, $length, 'utf8').'...';
    } else {
        return $text;
    }

}

/**
 * 插入数组中间
 * @param $array
 * @param $position
 * @param $insert_array
 * @return array
 */
function arrayAppend(&$array, $position, $insert_array)
{
    $first_array = array_splice ($array, 0, $position);
    $array = array_merge ($first_array, $insert_array, $array);
    return $array;
}


function getMenus(){
    return [
        ['title' => 'home', 'url' => '/'],
        ['title' => '文件', 'url' => '/file/list'],
    ];
}

