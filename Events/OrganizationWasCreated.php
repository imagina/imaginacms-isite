<?php


namespace Modules\Isite\Events;


class OrganizationWasCreated
{
    public $organization;
    public $user;
    
    //Case OTP
    public $fakePassword;

    public function __construct($organization,$user = null, $fakePassword = null)
    {
        $this->organization = $organization;
        $this->user = $user;
        $this->fakePassword = $fakePassword;
    }

}
