<?php
if(@$_GET['uamulti']||@$_GET['urlx']||@$_GET['cookie']||@$_GET['datax']||@$_GET['proxy']){
    print action(1,@$_GET['uamulti'],@$_GET['urlx'],@$_GET['cookie'],@$_GET['datax'],@$_GET['proxy']);
}
     //Proxy Login 
     $loginpassw = '1n2UT3:mmdKcF';
     //Proxy Ip Address
      $proxy = '45.32.117.124';
     // Proxy Port Address
      $proxy_port = '41180';

function curl($url, $data=null, $useragent=null, $cookie=null, $proxy=null) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    if($data != null){
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    if($cookie != null){
        curl_setopt($c, CURLOPT_COOKIE, $cookie);
    }
    if($useragent != null){
        curl_setopt($c, CURLOPT_USERAGENT, $useragent);
    }
    if($proxy != null){
        curl_setopt($c, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
        curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $loginpassw);
    }
    $hmm = curl_exec($c);
    curl_close($c);
    return $hmm;
}

function action($ighost, $useragent, $url, $cookie = 0, $data = 0, $httpheader = array(), $proxy = 0){
    $url = $ighost ? 'https://i.instagram.com/api/v1/' . $url : $url;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
     if($proxy):
      curl_setopt($ch, CURLOPT_PROXY, $proxy);
      curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
      curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
      curl_setopt($ch, CURLOPT_PROXYUSERPWD, $loginpassw);
    endif;
    if($httpheader) curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    if($cookie) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    if ($data):
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    endif;
     $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch);
    if(!$httpcode) return false; else{
      $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
      $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
      curl_close($ch);
      return $body;
    }
  }
 
  
  $status='{"status":"ready"}';
  echo $status;