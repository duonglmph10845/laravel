<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    //
    public function index()
    {
        $listComments = DB::table('comments')->select('comments.id', 'comments.noi_dung', 'comments.product_id', 'comments.ngay_bl', 'products.image')->join('products', 'comments.product_id', '=', 'products.id')->paginate(10);
        return view('admin/comments/index', [
            'data' => $listComments,
        ]);
    }
    public function getComment($id)
    {
        $listComments = DB::table('comments')->select('comments.id', 'comments.noi_dung', 'comments.product_id', 'comments.ngay_bl', 'products.image')->join('products', 'comments.product_id', '=', 'products.id')->where('product_id', $id)->paginate(10);
        return view('admin/comments/ct_comment', [
            'data' => $listComments,
        ]);
    }
    public function commentCt($id)
    {
        $cate_id = Product::Where('category_id',);
        $product_list = Product::find($id);
        $cate_id = $product_list->categories->id;
        $listComments = DB::table('comments')->select('comments.id as cmt_id', 'comments.noi_dung', 'comments.product_id', 'comments.ngay_bl', 'users.id as id_cmt', 'users.name')->join('users', 'comments.user_id', '=', 'users.id')->join('products', 'comments.product_id', '=', 'products.id')->where('comments.product_id', $id)->paginate(10);
        $splq = Product::Where('category_id', $cate_id)->paginate(4);
        return view('ctproduct', compact('product_list', 'listComments', 'splq'));
        // return view('ctproduct', [
        //     'data' => $product_list,

        // ], [
        //     'splqs' => $splq
        // ], );
    }
    public function add_comment(Request $request, $id)
    {

        if (Auth::check()) {
            $data = Comment::create([
                'noi_dung' => $request->commentPro,
                'product_id' => $id,
                'user_id' => auth()->id(),
                'ngay_bl' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d')
            ]);
            return redirect()->back();
        } else {
            abort(404);
        }
    }
    public function remove_comment(Request $request, $id)
    {
        $id_comment = Comment::find($id);
        $id_comment->delete();
        return redirect()->back();
    }
}
