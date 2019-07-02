<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\AdminCategory;
use Modules\Admin\Entities\AdminProduct;
use Modules\Admin\Http\Requests\AdminProductRequest;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $products = AdminProduct::with('category:id,name')->paginate(10);
        return view('admin::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = $this->getAllCategories();
        return view('admin::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AdminProductRequest $request)
    {
        $this->insertOrUpdate($request);
        return back()->with(['message' => 'Thêm mới sản phẩm thành công']);
    }

    /**
     * tạo mới hoặc update bản ghi
     * @param int $id
     * @return Response
     */
    public function insertOrUpdate($request, $id = '')
    {
        $update = 0;
        $data   = new AdminProduct();
        if ($id)
        {
            $update  = 1;
            $product = AdminProduct::find($id);
        }
        $data                = $request->all();
        $data['slug']        = str_slug($request->name);
        $data['active']      = 1;
        $data['title_seo']   = $request->title_seo ? $request->title_seo : $request->name;
        $data['keyword_seo'] = $request->keyword_seo ? $request->keyword_seo : '';
        if ($update == 1)
        {
            $product->update($data);
        } else
        {
            AdminProduct::create($data);
        }
    }

    /**
     * lấy tất cả category
     * @param int $id
     * @return Response
     */
    public function getAllCategories()
    {
        return AdminCategory::all();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::product.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->getAllCategories();
        $product    = AdminProduct::find($id);
        return view('admin::product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int     $id
     * @return Response
     */
    public function update(AdminProductRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        return back()->with(['message' => 'Cập nhập sản phẩm thành công']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * get action: delete,...
     * @param int $id
     * @return Response
     */
    public function action($action, $id)
    {
        if ($action)
        {
            $product = AdminProduct::find($id);
            switch ($action)
            {
                case 'delete':
                    $product->delete();
                    break;
            }
        }
        return redirect()->route('admin.get.list.product')->with(['message' => 'Xóa sản phẩm thành công']);
    }
}
