<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class  CommentsFacebook extends Component
{
  public $url;
  public $FacebookAppId;
  public $nonce;
  public $lang;
  public $urlSrc;
  public $numComments;
  public $classNames;

  public function __construct(
    $lang = 'es_LA',
    $numComments = 5,
    $classNames = ''
  )
  {
    $this->url = url()->current();
    $this->FacebookAppId = setting('isite::facebookAppId');
    $allowedCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $this->nonce = substr(str_shuffle($allowedCharacters), 0, 8);
    $this->lang = $lang;
    $this->numComments = $numComments;
    $this->classNames = $classNames;

    $this->urlSrc = 'https://connect.facebook.net/' . $this->lang . '/sdk.js#xfbml=1&version=v20.0';
    if (!empty($this->FacebookAppId)) {
      $this->urlSrc .= '&appId=' . $this->FacebookAppId;
    }
  }

  public function render()
  {
    return view("isite::frontend.components.comments-facebook");
  }
}
