# Tumblr API Client For CodeIgniter
## Installation
Download tumblr.php file and upload to libraries folder. Create new controller and load tumblr.php file. Look more examples below.
## Examples
Image file upload:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload(array('data' => array( file_get_contents('file_name.jpg')), 'type' => 'photo', 'tags' => '', 'caption' => ''));
    print_r($answer) ;
  }
}
```
Image file upload from url:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload(array('source' => array('https://cerebrovortex.files.wordpress.com/2014/10/dust-hands.jpg'), 'type' => 'photo', 'tags' => '', 'caption' => ''));
    print_r($answer) ;
  }
}
```
Image gallery from uploaded files:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload(array('data' => array( file_get_contents('a.jpg'),file_get_contents('a.jpg')), 'type' => 'photo', 'tags' => '', 'caption' => '')); 
    print_r($answer) ;
  }
}
```
Image gallery from uploaded files by url:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload(array('source' => array('https://cerebrovortex.files.wordpress.com/2014/10/dust-hands.jpg', 'https://cerebrovortex.files.wordpress.com/2014/10/dust-hands.jpg'), 'type' => 'photo', 'tags' => '', 'caption' => '')); 
    print_r($answer) ;
  }
}
```
Video file upload:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload( array( 'data' => array( file_get_contents('a.mp4')), 'type' => 'video', 'tags' => '', 'caption' => '' )) ; 
    print_r($answer) ;
  }
}
```
Embed video code:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload( array('embed'=>'<iframe width="560" height="315" src="https://www.youtube.com/embed/N2KGQv0hX7o" frameborder="0" allowfullscreen></iframe>', 'data' => '', 'type' => 'video', 'tags' => '', 'caption' => '' )); 
    print_r($answer) ;
  }
}
```
Text:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload( array( 'title'=>'test','body' => 'test text', 'type' => 'text', 'tags' => '', 'caption' => '' )) ; 
    print_r($answer) ;
  }
}
```
Text post create:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload( array( 'title'=>'test','body' => 'test text', 'type' => 'text', 'tags' => '', 'caption' => '' )) ; 
    print_r($answer) ;
  }
}
```
Link create:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload( array('title'=>'test','description'=>'test','url' => 'https://soundcloud.com/littlesimz/little-simz-e-d-g-e-04-devour', 'type' => 'link', 'tags' => '', 'caption' => '' )) ;
    print_r($answer) ;
  }
}
```
Quote create:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload(array('quote' => 'test', 'source' => 'http://google.lt', 'type' => 'quote', 'tags' => '', 'caption' => ''));
    print_r($answer) ;
  }
}
```
Audio file upload:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload(array('data' => file_get_contents('song_name.mp3'), 'type' => 'audio', 'tags' => '', 'caption' => ''));
    print_r($answer) ;
  }
}
```
Audio file upload from url:
```php
<?php
defined('BASEPATH') OR exit ('No direct script access allowed') ;
class Example extends CI_Controller
{
  public function __construct()
  {
    parent::__construct() ;
  }
  public function index()
  {
    $this->load->library('tumblr') ;
    $this->tumblr->config('consumer_key', 'consumer_secret', 'token', 'token_secret', 'example.tumblr.com') ;
    $answer = $this->tumblr->upload(array('external_url' => 'http://picosong.com/media/songs/40c528831b4101bd70ff23eac99b79c9.mp3', 'type' => 'audio', 'tags' => '', 'caption' => ''));
    print_r($answer) ;
  }
}
```
More information about API: https://www.tumblr.com/docs/en/api/v2
