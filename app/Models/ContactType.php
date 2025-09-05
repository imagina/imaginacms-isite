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
        'icon' => 'fa-solid fa-phone'
      ],
      self::ADDRESS => [
        'id' => self::ADDRESS,
        'title' => itrans('isite::contacttype.address'),
        'icon' => 'fa-solid fa-location-dot'
      ],
      self::EMAIL => [
        'id' => self::EMAIL,
        'title' => itrans('isite::contacttype.email'),
        'icon' => 'fa-solid fa-envelope'
      ],
      self::FACEBOOK => [
        'id' => self::FACEBOOK,
        'title' => itrans('isite::contacttype.facebook'),
        'icon' => 'fa-brands fa-facebook'
      ],
      self::TWITTER => [
        'id' => self::TWITTER,
        'title' => itrans('isite::contacttype.twitter'),
        'icon' => 'fa-brands fa-x-twitter'
      ],
      self::INSTAGRAM => [
        'id' => self::INSTAGRAM,
        'title' => itrans('isite::contacttype.instagram'),
        'icon' => 'fa-brands fa-instagram'
      ],
      self::TIKTOK => [
        'id' => self::TIKTOK,
        'title' => itrans('isite::contacttype.tiktok'),
        'icon' => 'fa-brands fa-tiktok'
      ],
      self::YOUTUBE => [
        'id' => self::YOUTUBE,
        'title' => itrans('isite::contacttype.youtube'),
        'icon' => 'fa-brands fa-youtube'
      ],
      self::LINKEDIN => [
        'id' => self::LINKEDIN,
        'title' => itrans('isite::contacttype.linkedin'),
        'icon' => 'fa-brands fa-linkedin'
      ],
      self::GOOGLE => [
        'id' => self::GOOGLE,
        'title' => itrans('isite::contacttype.google'),
        'icon' => 'fa-brands fa-google'
      ],
      self::PINTEREST => [
        'id' => self::PINTEREST,
        'title' => itrans('isite::contacttype.pinterest'),
        'icon' => 'fa-brands fa-pinterest'
      ],
      self::FLICKR => [
        'id' => self::FLICKR,
        'title' => itrans('isite::contacttype.flickr'),
        'icon' => 'fa-brands fa-flickr'
      ],
    ];
  }
}
