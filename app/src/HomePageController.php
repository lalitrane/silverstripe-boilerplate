<?php

namespace Galactic;

use PageController;
use SilverStripe\UserForms\Control\UserDefinedFormController;
use SilverStripe\UserForms\Model\UserDefinedForm;
use SilverStripe\Dev\Debug;
use SilverStripe\Dev\Backtrace;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
class HomePageController extends PageController
{


    public function init()
    {
        parent::init();
    }

    public function FeaturedBanners()
    {
        $banners = Banner::get()->sort('Sort', 'ASC')->limit(5);
        $indexedBanners = new ArrayList();
    
        $index = 0;
        foreach ($banners as $banner) {
            $indexedBanners->push(new ArrayData([
                'Title' => $banner->Title,
                'Description' => $banner->Description,
                'PrimaryPhoto' => $banner->PrimaryPhoto,
                'MobilePhoto' => $banner->MobilePhoto,
                'TopLayeredPhoto' => $banner->TopLayeredPhoto,
                'TextVariation' => $banner->TextVariation,
                'HideText' => $banner->HideText,
                'SlideIndex' => $index // Assign index properly
            ]));
            $index++;
        }
    
        return $indexedBanners;

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
