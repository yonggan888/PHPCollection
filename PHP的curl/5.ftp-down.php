<?php
/**
 * 从FTP服务器下载一个文件到本地
 */
$curlobj = curl_init();
curl_setopt($curlobj, CURLOPT_URL, "ftp://192.168.1.100/downloaddemo.txt");
curl_setopt($curlobj, CURLOPT_HEADER, 0);
curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlobj, CURLOPT_TIMEOUT, 300); // times out after 300s
curl_setopt($curlobj, CURLOPT_USERPWD, "peter.zhou:123456");//FTP用户名：密码
// 设置文件
$outfile = fopen('dest.txt', 'wb');//保存到本地的文件名
curl_setopt($curlobj, CURLOPT_FILE, $outfile);

$rtn = curl_exec($curlobj);
fclose($outfile);
if(!curl_errno($curlobj)){
    // $info = curl_getinfo($curlobj);
    // print_r($info);
    echo "RETURN: " . $rtn;
} else {
    echo 'Curl error: ' . curl_error($curlobj);
}
curl_close($curlobj);
?>