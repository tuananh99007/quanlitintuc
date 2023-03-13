<?php

namespace App\Repositories;

use App\Repositories\Interface\UsersRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersRepository implements UsersRepositoryInterface
{


    public function usersList()
    {
        return
            DB::table('users')
            ->select('*')
            ->where('is_deleted', 0)
            ->paginate(2);
    }

    public function usersInsert($name, $email, $password, $avatar, $role)
    {
        return
            DB::table('users')
            ->insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'avatar' => $avatar,
                'role' => $role,
            ]);
    }

    public function usersId($id)
    {
        return
            DB::table('users')->select('*')->where('id', $id)->first();
    }

    public function usersUpdate($id, $name, $email, $password, $urlAvatar)
    {
        return
            DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'avatar' => $urlAvatar,
            ]);
    }

    public function usersDelete($id)
    {
        return
            DB::table('users')->select('*')->where('id', $id)->delete();
    }
}
