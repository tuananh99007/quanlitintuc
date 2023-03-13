<?php

namespace App\Repositories;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function categorysList()
    {
        return
            DB::table('category')
            ->select('*')
            ->where('is_deleted', 0)
            ->paginate(2);
    }

    public function categoryInsert($name,$hot_flag){
        return
        DB::table('category')
                ->insert([
                    'name' => $name,
                    'hot_flag' => $hot_flag
                ]);
    }

    public function categoryId($id){
        return
        DB::table('category')
                ->where('id', $id)
                ->first();
    }

    public function categoryUpdate($id,$name,$hot_flag){
        return
        DB::table('category')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'hot_flag' => $hot_flag,
                ]);
    }

    public function categoryDelete($id){
        return
        DB::table('category')
                ->where('id', $id)
                ->delete();
    }
}
