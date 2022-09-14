<?php

namespace Modules\Isite\Traits;

use Illuminate\Support\Str;
use Modules\Isite\Entities\Tokenable as Token;

trait Tokenable
{
  public function generateToken($expiresAt = null, $unique = 0)
  {
    $expiresAt = $expiresAt ?? setting('isite::timeExpiredToken');
    $today = date("Y-m-d h:i:s");
    $expiresAt = date("Y-m-d h:i:s", strtotime($today . '+ ' . $expiresAt . ' days'));
    $token = Str::random(32);

    //Clear tokens
    $this->clearTokens();

    //Create and return the token
    return Token::create(array(
      'token' => $token,
      'expires_at' => $expiresAt,
      'entity_id' => $this->id,
      'entity_type' => $this->entity,
      'unique' => $unique,
    ));
  }

  public function validateToken($token, $selfThrow = false)
  {
    //Search the token
    $token = Token::where("token", $token)->first();

    //Instance the default response
    $response = false;

    //If exist the token
    if ($token) {
      //Validate if token expires
      $today = date("Y-m-d h:i:s");
      if ($token->expires_at >= $today) $response = true;

      //Validate when delete the token
      if (!$response || $token->unique == 1) Token::where("token", $token->token)->forceDelete();
    }

    //Clear tokens
    $this->clearTokens();

    if (!$response && $selfThrow) throw new \Exception(trans('isite::common.messages.tokensValidate'), 403);

    //Response
    return $response;
  }

  /** Delete token by token column */
  public function clearTokens()
  {
    $today = date("Y-m-d h:i:s");
    Token::whereDate("expires_at", '<', $today)->forceDelete();
  }
}