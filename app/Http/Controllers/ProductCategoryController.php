<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;


class ProductCategoryController extends Controller
{
    use AbstractControllerTrait;

    protected $folderName = 'ProductCategories';
    protected $routeName = 'product-categories';
    protected $modelClass = ProductCategory::class;
    protected $validationRules;

    public function __construct() {
        $this->validationRules = [
            'name' => 'required',
        ];
    }

}
