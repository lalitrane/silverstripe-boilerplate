<?php

namespace {

    use SilverStripe\Blog\Model\BlogPost;
    use SilverStripe\CMS\Controllers\ContentController;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }


        //   function topTabbers() {
        //     $whereStatement = "ShowInFooterMenu = 1 AND ShowInMenus = 1";
        //     return Page::get("Page", $whereStatement);
        //     }
        function topmenus()
        {
            $whereStatement = "ShowInCTAMenu = 1";
            return Page::get("Page", $whereStatement);
        }

        function footermenu_first()
        {
            $whereStatement = "FooterCol1 = 1";
            return Page::get("Page", $whereStatement);
        }

        function footermenu_second()
        {
            $whereStatement = "FooterCol2 = 1";
            return Page::get("Page", $whereStatement);
        }

        function CopyrightCTA()
        {
            $whereStatement = "FooterCopyrightCTA = 1";
            return Page::get("Page", $whereStatement);
        }


        //    public function Form(){
        //     $page = UserDefinedForm::get()->filter(['URLSegment' => 'contact-us'])->First();
        //     $form = (new UserDefinedFormController($page))->Form();            
        //     return $form;
        // }

        public function AllBlogPosts()
        {
            // return BlogPost::get();

            return BlogPost::get()->sort('PublishDate', 'DESC')
                ->excludeAny(array('Categories.ID' => '1'));
            // ->limit(4);

        }
    }
}
