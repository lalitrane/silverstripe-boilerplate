<?php

namespace Origami;

use PageController;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FormAction;

use SilverStripe\Control\HTTP;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\ArrayList;

use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;





use SilverStripe\ORM\PaginatedList;
use SilverStripe\View\ArrayData;

class ResourceSearchPageController extends PageController
{
    public function init()
    {
        parent::init();
    }

    private static $allowed_actions = [
        'ResourceSearchForm',
    ];



    public function index(HTTPRequest $request)
    {

        $resources = Resource::get();
        $activeFilters = ArrayList::create();
        if ($search = $request->getVar('Keywords')) {
            $activeFilters->push(ArrayData::create([
                'Label' => "'$search'"
            ]));

            $resources = $resources->filterAny([
                'extractedtext:PartialMatch' => $search,
                'Title:PartialMatch' => $search,
            ]);
        }

        if ($search = $request->getVar('ResourceType')) {
            $activeFilters->push(ArrayData::create([
                'ResourceType' => ResourceType::get()->filter(['ID'=>$search])->first()->Title
            ]));

            $resources = $resources->filter([
                'ResourceType.ID' => $search,
                
            ]);
        }


        if ($search = $request->getVar('ResourceTopic')) {
            $activeFilters->push(ArrayData::create([
                'ResourceTopic' => ResourceTopic::get()->filter(['ID'=>$search])->first()->Title
            ]));

            $resources = $resources->filter([
                'ResourceTopic.ID' => $search,
                
            ]);
        }

        $paginatedVideos = PaginatedList::create(
            $resources,
            $request
        )->setPageLength(12)->setPaginationGetVar('s');

        $data = [
            'Results' => $paginatedVideos,
            'ActiveFilters' => $activeFilters
        ];

        return $data;
    }


    public function ResourceSearchForm()
    {


        $form = Form::create(
            $this,
            'ResourceSearchForm',
            FieldList::create(
                TextField::create(
                    'Keywords'
                )->setAttribute('placeholder', 'Search')
                ->addExtraClass('d-inline-block')
               ,
                DropdownField::create('ResourceType','ResourceType',ResourceType::get()->map('ID','Title'))
                ->setEmptyString('File type')
                ->addExtraClass('d-inline-block ps-3'),
                
                DropdownField::create('ResourceTopic','ResourceTopic',ResourceTopic::get()->map('ID','Title'))
                ->setEmptyString('Topic')
                ->addExtraClass('d-inline-block ps-3'),
                FormAction::create('Search', 'Search')
                ->addExtraClass('btn btn-light ms-3')
            
            ),
       

            
            // FieldList::create(
            // ->addExtraClass('d-inline-block')
            // )
        );

        $form->setFormMethod('GET')
            ->setFormAction($this->Link())
            ->disableSecurityToken()
            ->loadDataFrom($this->request->getVars());
        return $form;
    }
    public function SQustring()
    {
        return $this->getRequest()->getVar('Keywords');
    }
}
