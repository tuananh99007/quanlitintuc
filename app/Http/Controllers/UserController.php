<?php

namespace App\Http\Controllers;

use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $usersRepository;

    public function __construct(UsersRepositoryInterface $inputusersRepository)
    {
        $this->usersRepository = $inputusersRepository;
    }

    public function list()
    {
        $usersList = $this->usersRepository->usersList();
        return view('admin.users.list', compact('usersList'));
    }

    public function add()
    {
        $usersLogin = Auth::guard('admin')->user();
        if ($usersLogin->role != 9) {
            abort(403);
        } else {
            return view('admin.users.add', compact('usersLogin'));
        }
    }

    public function postAdd(Request $request)
    {
        $this->validatePostADD($request);
        $usersLogin = Auth::guard('admin')->user();
        if ($usersLogin->role != 9) {
            abort(403);
        } else {
            $name = $request->input('name', null);
            $password = $request->input('password', null);
            $avatar = $request->file('avatar');
            if ($avatar == null) {
                $avatar = asset('assets/admin/images/avatar.webp');
            }
            $email = $request->input('email', null);
            $role = $request->input('role', null);
            $this->usersRepository->usersInsert($name, $email, $password, $avatar, $role);
            return redirect()->route('admin.users.list');
        }
    }

    private function validatePostADD($request)
    {
        $request->validate([
            'email' => 'unique:users|min:1|max:255',
            'name' => 'required|min:1|max:255',
            'password' => 'required|confirmed|min:1|max:255',
        ]);
    }

    public function update(Request $request)
    {
        $usersLogin = Auth::guard('admin')->user();
        if ($usersLogin->role != 9) {
            abort(403);
        } else {
            $id = $request->input('id', null);
            $userID = $this->usersRepository->usersId($id);
            return view('admin.users.update', compact('userID'));
        }
    }

    public function postUpdate(Request $request)
    {
        $this->validatePostUpdate($request);
        $usersLogin = Auth::guard('admin')->user();
        if ($usersLogin->role != 9) {
            abort(403);
        } else {
            $id = $request->input('id', null);
            $userID = $this->usersRepository->usersId($id);
            $name = $request->input('name', null);
            $email = $request->input('email', null);
            if ($email == null) {
                $email = $userID->email;
            }
            $password = $request->input('password', null);
            $avatar = $request->file('avatar');
            if (empty($avatar) != true) {
                Storage::delete($userID->avatar);
                $nameAvatar = $avatar->hashName();
                $urlAvatar = "/upload/users/" . $nameAvatar;
                $avatar->store('upload/users');
            } else {
                $urlAvatar = $userID->avatar;
            }
            if ($password == null) {
                $password = $userID->password;
            } else {
                $password = Hash::make($password);
            }
            $this->usersRepository->usersUpdate($id, $name, $email, $password, $urlAvatar);
            return redirect()->back()->withInput();
        }
    }

    private function validatePostUpdate($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'min:1|max:255|',
            'password' => 'confirmed|max:255',
        ]);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id', null);
        $userID = $this->usersRepository->usersId($id);
        return view('admin.users.detail', compact('userID'));
    }

    public function delete(Request $request)
    {
        $usersLogin = Auth::guard('admin')->user();
        if ($usersLogin->role != 9) {
            abort(403);
        } else {
            $id = $request->input('id', null);
            $this->usersRepository->usersDelete($id);
            return redirect()->route('admin.users.list');
        }
    }
}
