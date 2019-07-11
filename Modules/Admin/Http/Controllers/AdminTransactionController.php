<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(10);
        return view('admin::transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function action($action, $id)
    {
        if ($action)
        {
            $transaction = Transaction::find($id);
            switch ($action)
            {
                case 'status':
                    $transaction->status = $transaction->status ? 0 : 1;
                    $transaction->save();
                    return redirect()->back()->with('message', 'Cập nhập trạng thái đơn hàng thành công');
                    break;
                case 'delete':
                    $transaction->delete();
                    return redirect()->back()->with('message', 'Xóa đơn hàng thành công');
                    break;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
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
     * Hiển thị chi tiết đơn hàng của khách
     * @param int $id
     * @return Response trả về json cho ajax
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax())
        {
            $orders = Order::with('product')->where('transaction_id', $id)->get();
            $html   = view('admin::order.view', compact('orders'))->render();
            return response()->json($html);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
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
        //
    }
}
