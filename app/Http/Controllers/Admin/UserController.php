<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Requests\Register\RegisterRequest;
use App\Models\Category;
use Illuminate\Auth\Access\Gate;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $ListUser = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            $ListUser = User::where('email', 'LIKE', "%$keyword%")->paginate(10);
        } else {
            $ListUser = User::paginate(10);
        }
        $ListUser->load(['invoices']);
        $user = $ListUser->first();
        // dd($user->invoices()->count());
        return view('/admin/users/index', [
            'data' => $ListUser,
        ]);
    }
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user,
        ]);
    }
    public function create()
    {
        // if(Gate::allows('create-user') == false){
        //     abort(403);
        // }
        return view('admin/users/create');
    }
    public function store(StoreRequest $request)
    {
        $data = request()->except('_token');
        $result = User::create($data);
        return redirect()->route('admin.users.index');
    }
    public function edit(User $user)
    {
        return view('admin/users/edit', [
            'data' => $user,
        ]);
    }
    public function update(UpdateRequest $request, User $user)
    {
        $data = request()->except('_token');
        $user->update($data);

        return redirect()->route('admin.users.index');
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    public function view(){
        $ListCategories = Category::all();
        return view('dang_ky', [
            'datat' => $ListCategories,
        ]);
    }
    public function register(RegisterRequest $request){
        $data = request()->except('_token');
        $result = User::create($data);
        return redirect()->route('index')->with('success', 'Đăng ký thành công');
    }
}
