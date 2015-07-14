<?php
if ( !defined('BASEPATH'))
  exit ('No direct script access allowed') ;
class Tumblr
{
  private $consumer_key = null ;
  private $consumer_secret = null ;
  private $token = null ;
  private $token_secret = null ;
  private $blog_url = null ;
  public function config($consumer_key, $consumer_secret, $token, $token_secret, $blog_url)
  {
    $this->consumer_key = $consumer_key ;
    $this->consumer_secret = $consumer_secret ;
    $this->token = $token ;
    $this->token_secret = $token_secret ;
    $this->blog_url = $blog_url ;
  }
  public function upload($params)
  {
    $headers = array('Host' => 'http://api.tumblr.com/', 'Content-type' => 'application/x-www-form-urlencoded', 'Expect' => '') ;
    $this->oauth_gen('POST', 'http://api.tumblr.com/v2/blog/' . $this->blog_url . '/post', $params, $headers) ;
    $ch = curl_init() ;
    curl_setopt($ch, CURLOPT_URL, 'http://api.tumblr.com/v2/blog/' . $this->blog_url . '/post') ;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Authorization: ' . $headers['Authorization'], 'Content-type: ' . $headers['Content-type'], 'Expect: ')) ;
    $params = http_build_query($params) ;
    curl_setopt($ch, CURLOPT_POST, true) ;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params) ;
    return json_decode(curl_exec($ch),true) ;
  }
  public function oauth_gen($method, $url, $params, & $headers)
  {
    $params['oauth_consumer_key'] = $this->consumer_key ;
    $params['oauth_nonce'] = strval( time()) ;
    $params['oauth_signature_method'] = 'HMAC-SHA1' ;
    $params['oauth_timestamp'] = strval( time()) ;
    $params['oauth_token'] = $this->token ;
    $params['oauth_version'] = '1.0' ;
    $params['oauth_signature'] = $this->oauth_sig($method, $url, $params) ;
    $oauth_header = array() ;
    foreach ($params as $key => $value)
    {
      if ( strpos($key, 'oauth') !== false )
      {
        $oauth_header[] = $key . '=' . $value ;
      }
    }
    $oauth_header = 'OAuth ' . implode(',', $oauth_header) ;
    $headers['Authorization'] = $oauth_header ;
  }
  public function oauth_sig($method, $uri, $params)
  {
    $parts[] = $method ;
    $parts[] = rawurlencode($uri) ;
    $new_params = array() ;
    ksort($params) ;
    foreach ($params as $key => $data)
    {
      if ( is_array($data))
      {
        $count = 0 ;
        foreach ($data as $val)
        {
          $n = $key . '[' . $count . ']' ;
          $new_params[] = $n . '=' . rawurlencode($val) ;
          $count++;
        }
      }
      else
      {
        $new_params[] = rawurlencode($key) . '=' . rawurlencode($data) ;
      }
    }
    $parts[] = rawurlencode( implode('&', $new_params)) ;
    $sig = implode('&', $parts) ;
    return base64_encode( hash_hmac('sha1', $sig, $this->consumer_secret . '&' . $this->token_secret, true)) ;
  }
}