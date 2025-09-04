<?php

namespace Modules\Isite\Models;

use Imagina\Icore\Models\CoreStaticModel;

class ContactType extends CoreStaticModel
{
  const PHONE = 0;
  const ADDRESS = 1;
  const EMAIL = 2;
  const FACEBOOK = 3;
  const TWITTER = 4;
  const INSTAGRAM = 5;
  const TIKTOK = 6;
  const YOUTUBE = 7;
  const LINKEDIN = 8;
  const GOOGLE = 9;
  const PINTEREST = 10;
  const FLICKR = 11;


  public function __construct()
  {
    $this->records = [
      self::PHONE => [
        'id' => self::PHONE,
        'title' => itrans('isite::contacttype.phone'),
        'icon' => 'material-symbols:call'
      ],
      self::ADDRESS => [
        'id' => self::ADDRESS,
        'title' => itrans('isite::contacttype.address'),
        'icon' => 'material-symbols:location-on'
      ],
      self::EMAIL => [
        'id' => self::EMAIL,
        'title' => itrans('isite::contacttype.email'),
        'icon' => 'material-symbols:mail-outline'
      ],
      self::FACEBOOK => [
        'id' => self::FACEBOOK,
        'title' => itrans('isite::contacttype.facebook'),
        'icon' => 'ic:baseline-facebook'
      ],
      self::TWITTER => [
        'id' => self::TWITTER,
        'title' => itrans('isite::contacttype.twitter'),
        'icon' => 'line-md:twitter-x'
      ],
      self::INSTAGRAM => [
        'id' => self::INSTAGRAM,
        'title' => itrans('isite::contacttype.instagram'),
        'icon' => 'mdi:instagram'
      ],
      self::TIKTOK => [
        'id' => self::TIKTOK,
        'title' => itrans('isite::contacttype.tiktok'),
        'icon' => 'ic:baseline-tiktok'
      ],
      self::YOUTUBE => [
        'id' => self::YOUTUBE,
        'title' => itrans('isite::contacttype.youtube'),
        'icon' => 'line-md:youtube-filled'
      ],
      self::LINKEDIN => [
        'id' => self::LINKEDIN,
        'title' => itrans('isite::contacttype.linkedin'),
        'icon' => 'mdi:linkedin'
      ],
      self::GOOGLE => [
        'id' => self::GOOGLE,
        'title' => itrans('isite::contacttype.google'),
        'icon' => 'mynaui:brand-google-solid'
      ],
      self::PINTEREST => [
        'id' => self::PINTEREST,
        'title' => itrans('isite::contacttype.pinterest'),
        'icon' => 'mdi:pinterest'
      ],
      self::FLICKR => [
        'id' => self::FLICKR,
        'title' => itrans('isite::contacttype.flickr'),
        'icon' => 'mdi:flickr'
      ],
    ];
  }
}
