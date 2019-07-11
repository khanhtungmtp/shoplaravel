<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name', 'product:id,name')->paginate(10);
        return view('admin::rating.index', compact('ratings'));
    }

    /**
     *
     * @return Response
     */
    public function action($action, $id)
    {
        if ($action){
            $rating = Rating::find($id);
            switch ($action){
                case 'delete':
                    $rating->delete();
                    return redirect()->back()->with('message', 'Xóa đánh giá thành công');
                    break;
            }
        }
    }

}
