<?php namespace App\MFA\Extensions;

use OTPHP\TOTPInterface;
use SilverStripe\Core\Extension;
use SilverStripe\Security\Member;

class MyTOTPRegisterHandlerExtension extends Extension
{
    public function updateTotp(TOTPInterface $totp, Member $member)
    {
        $totp->setLabel($member->getCustomTOTPLabel());
        $totp->setIssuer('My web project');
    }
}