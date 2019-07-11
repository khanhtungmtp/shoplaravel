<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Carbon;
use Modules\Admin\Http\Requests\AdminCheckoutRequest;

class ShoppingCartController extends Controller
{
    /**
     * thêm mới sản phẩm vào giỏ hàng
     */
    public function addToCart($id)
    {
        $product = Product::select('id', 'name', 'price', 'price_sale', 'image', 'quantity')->find($id);
        if (!$product)
        {
            return redirect()->route('home');
        }
        $price      = $product->price;
        $price_sale = $product->price_sale;
        if ($price_sale)
        {
            $price = $price * (100 - $price_sale) / 100;
        }
        $cart = [
            'id'      => $id,
            'name'    => $product->name,
            'price'   => $price,
            'qty'     => 1,
            'options' => [
                'image'      => $product->image,
                'price_sale' => $price_sale,
                'price_old'  => $price,
            ],
        ];
        Cart::add($cart);
        return back()->with('Thêm sản phẩm vào giỏ thành công');
    }

    /**
     * trang danh sách giỏ hàng
     */
    public function index()
    {
        $carts = Cart::content();
        return view('cart.index', compact('carts'));
    }

    /**
     * trang thanh toán
     */
    public function getFormCheckout()
    {
        $products = Cart::content();
        return view('cart.checkout', compact('products'));
    }

    /**
     * Lưu thông tin giỏ hàng
     */
    public function saveInfoShoppingCart(AdminCheckoutRequest $request)
    {
        $total_price    = str_replace(',', '', Cart::subtotal(0, 3));
        $transaction_id = Transaction::insertGetId([
            'user_id'    => get_data_user('web'),
            'phone'      => $request->phone,
            'address'    => $request->address,
            'note'       => $request->note,
            'total'      => (int)$total_price,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        if ($transaction_id)
        {
            $carts = Cart::content();
            foreach ($carts as $cart)
            {
                Order::insert([
                    'transaction_id' => $transaction_id,
                    'product_id'     => $cart->id,
                    'quantity'       => $cart->qty,
                    'price'          => $cart->options->price_old,
                    'price_sale'     => $cart->options->price_sale,
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'Vui lòng điền đầy đủ thông tin nhận hàng');
        }
        Cart::destroy();
        return redirect()->route('home');
    }

    /**
     * Xóa sản phẩm trong giỏ hàng
     */
    public function delete($key)
    {
        Cart::remove($key);
        return redirect()->back()->with('message', 'Xóa sản phẩm ra khỏi giỏ thành công');
    }
}
