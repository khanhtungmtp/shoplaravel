<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Modules\Admin\Entities\AdminCategory;
use Modules\Admin\Entities\AdminProduct;

class CategoryController extends Controller
{
    /**
     * share category cho toan bo trang
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $categories = AdminCategory::all();
        View::share('categories', $categories);
    }
    /**
     *  cat $url ra lấy tham số {slug}-{id} của route : samsung-1
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        $id  = array_pop($url);
        if ($id)
        {
            $products = AdminProduct::where([
                'id'     => $id,
                'active' => AdminProduct::STATUS_PUBLIC
            ])->orderByDesc('id')->paginate(10);
            $category = AdminCategory::find($id);
            return view('product.index', compact('products', 'category'));
        }
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
