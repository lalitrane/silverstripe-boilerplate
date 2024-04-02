<?php


namespace Origami;

use PageController;

class ProductPageController extends PageController
{




    public function DisplayProducts()
    {

        return Product::get();





    }

    public function getDomestic() {
        return (Product::get()->filter(['Type.ID' => [1]]));

    }
    public function getCommercial() {
        return (Product::get()->filter(['Type.ID' => [2]]));

    }

    public function getRisk() {
        return (Product::get()->filter(['Type.ID' => [3]]));

    }
    public function getOther() {
        return (Product::get()->filter(['Type.ID' => [4]]));

    }

//     public function DisplayFilteredProducts(){

//     $tags = BlogTag::get()
//     ->setQueriedColumns(['ID', 'Title', 'Count(*)'])
//     ->leftJoin('BlogPost_Tags','bpt.BlogTagID = BlogTag.ID','bpt')
//     ->sort('Count(*) DESC')

//     return $tags;
// }
}


