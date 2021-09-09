<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $ListProducts = DB::table('products')->select('products.id','products.name as name_products','products.image','products.price' ,'products.quantity', 'categories.name')->join('categories', 'products.category_id', '=', 'categories.id')->paginate(10);
        return view('/admin/products/index', [
            'data' => $ListProducts,
        ]);
    }
    public function create()
    {
        $listCategories = Category::all();
        return view('admin/products/create', [
            'data' => $listCategories,
        ]);
    }
    public function store(StoreRequest $request)
    {
        $data = request()->except('_token');
        $result = Product::create($data);
        return redirect()->route('admin.products.index');
    }
    public function edit(Product $product)
    {
        $listCategories = Category::all();
        return view('admin/products/edit', [
            'data' => $product,
        ], [
            'datat' => $listCategories,
        ]);
    }
    public function update(UpdateRequest $request, Product $product)
    {
        $data = request()->except('_token');
        $product->update($data);

        return redirect()->route('admin.products.index');
    }
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
    public function home($id)
    {
        $product_list = Product::find($id);
        $cate_id = $product_list->categories->id;
        $listComments = DB::table('comments')->select('comments.id as cmt_id','comments.noi_dung','comments.product_id','comments.ngay_bl', 'users.id as id_cmt', 'users.name')->join('users', 'comments.user_id', '=', 'users.id')->join('products','comments.product_id', '=', 'products.id')->where('comments.product_id', $id)->paginate(10);
        $splq = Product::Where('category_id', $cate_id)->paginate(4);
        return view('ctproduct', compact('product_list', 'listComments','splq'));
        // return view('ctproduct', [
        //     'data' => $product_list,
            
        // ], [
        //     'splqs' => $splq
        // ], );
        
    }
    public function products($id){
        $name_cate = Category::find($id);
        $product = Product::Where('category_id', $id)->orderBy('id', 'DESC')->get();
        return view('products', [
            'data' => $product,
        ], [
            'name_cate' => $name_cate
        ]);
    }
}
