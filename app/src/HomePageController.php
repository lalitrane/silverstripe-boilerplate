<?php

namespace Galactic;

use PageController;
use SilverStripe\UserForms\Control\UserDefinedFormController;
use SilverStripe\UserForms\Model\UserDefinedForm;
use SilverStripe\Dev\Debug;
use SilverStripe\Dev\Backtrace;

class HomePageController extends PageController
{


    public function init()
    {
        parent::init();
    }

    public function FeaturedBanners()
    {
        return Banner::get()->sort('Sort', 'ASC')
            ->limit(5);
    }

    public function getVendors()
    {
        // return BlogPost::get();

        return Vendor::get();

        // ->limit(4);

    }

    // public function Form(){
    //     $page = UserDefinedForm::get()->filter(['URLSegment' => 'enquiries'])->First();
    //     $form = (new UserDefinedFormController($page))->Form();            
    //     return $form;
    // }

}
