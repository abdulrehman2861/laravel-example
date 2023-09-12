<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CartRepositoryInterface;

class CartController extends Controller
{
    private $cartRepository;

    /**
     * __construct
     *
     * @param  mixed $carRepository
     * @return void
     */
    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request){
        return view('shopingcart');
    }

    /**
     * add to cart
     *
     * @return View
     */
    public function addToCart(Request $request, $item_id, $fitting_id)
    {
        $this->cartRepository->addProducttoCart($item_id, $request->has('qty') ? $request->qty : 1, $fitting_id);

        session()->flash('success', 'Product added to cart.');

        return redirect()->route('shopingCart');
    }

    /**
     * update cart
     *
     * @return View
     */
    public function updateCart(Request $request)
    {
        $this->cartRepository->updateCart($request->all());

        session()->flash('success', 'Cart updated successfully');

        return redirect()->route('shopingCart');
    }

    /**
     * delete product
     *
     * @return View
     */
    public function deleteProduct($item_id)
    {
        $this->cartRepository->deleteCartProduct($item_id);

        session()->flash('success', 'Item deleted successfully');

        return redirect()->route('shopingCart');
    }



}
