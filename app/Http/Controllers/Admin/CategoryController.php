<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\View\Components\Recursive;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $ListCategories = Category::paginate(10);
        return view('/admin/categories/index', [
            'data' => $ListCategories,
        ]);
    }
    public function getCate($parent_id)
    {
        $data = Category::all();
        $recursive = new Recursive($data);
        $htmlOptions = $recursive->categoryRecursive($parent_id);
        return $htmlOptions;
    }

    public function create()
    {
        $htmlOptions = $this->getCate($parent_id = '');
        return view('admin/categories/create', ['htmlOptions' => $htmlOptions]);
    }
    public function store(StoreRequest $requets)
    {
        $data = request()->except('_token');
        $result = Category::create($data);
        return redirect()->route('admin.categories.index');
    }
    public function edit($id)
    {
        $data = Category::find($id);
        $htmlOptions = $this->getCate($data->parent_id);
        return view('admin/categories/edit', compact('data', 'htmlOptions'));
    }
    public function update($id)
    {
        $data = request()->except('_token');
        $user = Category::find($id);
        $user->update($data);

        return redirect()->route('admin.categories.index');
    }
    public function delete($id)
    {
        $user = Category::find($id);
        $user->delete();
        return redirect()->route('admin.categories.index');
    }
}
