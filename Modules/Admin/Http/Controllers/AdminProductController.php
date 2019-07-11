<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminProductRequest;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::with('category:id,name');
        if ($request->name) $products->where('name','like','%'.$request->name.'%');
        if ($request->cate) $products->where('category_id',$request->cate);

        $products = $products->orderByDesc('id')->paginate(10);
        $categories = $this->getAllCategories();
        return view('admin::product.index', compact('products', 'categories'));
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
        $data   = new Product();
        if ($id)
        {
            $update  = 1;
            $product = Product::find($id);
        }
        $data                = $request->all();
        $data['slug']        = str_slug($request->name);
        $data['active']      = $request->active =='on' ? 1 : 0 ;
        $data['title_seo']   = $request->title_seo ? $request->title_seo : $request->name;
        $data['keyword_seo'] = $request->keyword_seo ? $request->keyword_seo : '';
        if ($request->hasFile('image')){
            $file = upload_image('image','products');
            if (isset($file['name'])) {
                $data['image'] = $file['name'];
            }
        }
        if ($update == 0)
        {
            Product::create($data);

        } else
        {
            $product->update($data);
        }
    }

    /**
     * lấy tất cả category
     * @param int $id
     * @return Response
     */
    public function getAllCategories()
    {
        return Category::all();
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
        $product    = Product::find($id);
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
            $product = Product::find($id);
            switch ($action)
            {
                case 'delete':
                    $product->delete();
                    return redirect()->route('admin.get.list.product')->with(['message' => 'Xóa sản phẩm thành công']);
                    break;
                case 'active':
                    $product->active = $product->active ? 0 : 1;
                    $product->save();
                    return redirect()->route('admin.get.list.product')->with(['message' => 'Cập nhập trạng thái sản phẩm thành công']);
                    break;

                case 'hot':
                    $product->hot = $product->hot ? 0 : 1;
                    $product->save();
                    return redirect()->route('admin.get.list.product')->with(['message' => 'Cập nhập sản phẩm nổi bật thành công']);
                    break;
            }

        }
       }
}
