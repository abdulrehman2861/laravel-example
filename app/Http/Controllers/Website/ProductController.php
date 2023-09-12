<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{

    private $productRepository;

    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function quickView($id): View|string
    {
        $product =  $this->productRepository->findProduct($id);

        return view('common.modal.quick-product-view', compact('product'));
    }

}
