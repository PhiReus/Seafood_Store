<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use App\Models\User;
use App\Models\Group;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(1);
        // $this->authorize('viewAny', User::class);
        $users = User::all();
        $param = [
            'users' => $users
        ];
        return view('admin.users.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showAdmin()
    {
        $admins = Group::get();
        $param = [
            'admins' => $admins,
        ];
        return view('users.admin', $param);
    }
    public function create()
    {
        // $this->authorize('create', User::class);
        $groups = Group::all();
        $param = [
            'groups' => $groups
        ];
        return view('admin.users.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUser $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();


        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];

        $notification = [
            'message' => 'Đăng ký thành công!',
            'alert-type' => 'success'
        ];
        alert()->success('Thêm thành công!');
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $param = [
            'user' => $user,
        ];
        return view('admin.users.profile', $param);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $this->authorize('view', User::class);
        $user = User::find($id);
        $groups = Group::get();
        $param = [
            'user' => $user,
            'groups' => $groups
        ];
        return view('admin.users.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->group_id = $request->group_id;
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extenshion = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $user->image = $path;
        }
        $user->save();


        $data = [
            'name' => $request->name,
            'pass' => $request->password,
        ];

        $notification = [
            'message' => 'Chỉnh sửa thành công!',
            'alert-type' => 'success'
        ];
        alert()->success('Cập nhật thành công!');
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->Delete();
        alert()->success('Xóa thành công!');
        return redirect()->route('users.index');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('products.index');
        }
        $users = User::where('name', 'LIKE', '%' . $search . '%')->paginate(2);
        return view('admin.users.index', compact('users'));
    }
}
