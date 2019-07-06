<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin::user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::user.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::user.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int     $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.get.list.user')->with('message', 'Xóa thành công tài khoản');
    }

    public function action($action, $id)
    {
        if ($action)
        {
            $user = User::find($id);
            switch ($action){
                case 'active':
                    $user->active = $user->active ? 0 : 1 ;
                    $user->save();
                    return back()->with('message', 'Cập nhập trạng thành công');
                    break;
                case 'delete':
                    $user->delete();
                    return redirect()->route('admin.get.list.user')->with(['message' => 'Xóa tài khoản thành công']);
                    break;
            }
        }
    }
}
