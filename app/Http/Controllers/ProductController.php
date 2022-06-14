<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    
    use AbstractControllerTrait;
    protected $folderName = 'Products';
    protected $routeName = 'products';
    protected $modelClass = Product::class;
    protected $validationRules;

    public function __construct() {
        $this->validationRules = [
            'name' => 'required',
            'price' => 'required',
        ];
    }
    
}
