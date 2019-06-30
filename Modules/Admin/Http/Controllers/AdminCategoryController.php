<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Entities\AdminCategory;
use Modules\Admin\Http\Requests\AdminCategoryRequest;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = AdminCategory::select('id', 'name', 'slug', 'active')->get();
        return view('admin::category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(AdminCategoryRequest $request)
    {
        $this->createOrUpdate($request);
        return back()->with(['message' => 'Thêm mới danh mục thành công']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::category.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = AdminCategory::find($id);
        return view('admin::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int     $id
     * @return Response
     */
    public function update(AdminCategoryRequest $request, $id)
    {
        $this->createOrUpdate($request, $id);
        return redirect()->route('admin.get.list.category')->with(['message' => 'Cập nhập danh mục thành công']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = AdminCategory::find($id);
        $category->delete();
        return redirect()->route('admin.get.list.category')->with(['message' => 'Xóa danh mục thành công']);
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
            $category = AdminCategory::find($id);
            switch ($action)
            {
                case 'delete':
                    $category->delete();
                    break;
            }
        }
        return redirect()->route('admin.get.list.category')->with(['message' => 'Xóa danh mục thành công']);
    }

    /**
     * Tạo mới hoặc update danh mục
     * @param int $id = null
     * @return Response
     */
    public function createOrUpdate($request, $id = '')
    {
        $data = new  AdminCategory();
        if ($id)
        {
            $data = AdminCategory::find($id);
        }
        $data->name      = $request->name;
        $data->slug      = str_slug($request->name);
        $data->icon      = str_slug($request->icon);
        $data->title_seo = $request->title_seo ? $request->title_seo : $request->name;
        $data->active    = $request->active == 'on' ? 1 : 0;
        $data->save();
    }

}
