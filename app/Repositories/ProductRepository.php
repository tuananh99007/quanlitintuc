<?php

namespace App\Repositories;

use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductRepository implements ProductRepositoryInterface
{
    public function productList()
    {
        return
            DB::table('product')
            ->select('*')
            ->where('flag', 1)
            ->where('is_deleted', 0)
            ->paginate(5);
    }

    public function confirm()
    {
        return
            DB::table('product')
            ->select('*')
            ->where('flag', 0)
            ->where('is_deleted', 0)
            ->paginate(5);
    }

    public function updateConfirm($id){
        return
        DB::table('product')
                ->where('id', $id)
                ->update([
                    'flag' => 1
                ]);
    }

    public function productIntert($category_id,$name,$title,$content,$user_id,$urlImage){
        return
        DB::table('product')->insert([
            'category_id' => $category_id,
            'name' => $name,
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id,
            'image' => $urlImage,
        ]);
    }

    public function productId($id){
        return
        DB::table('product')
            ->select(
                'product.id',
                'product.title',
                'product.content',
                'product.is_deleted',
                'product.image',
                'product.user_id',
                'product.name',
            )
            ->where('product.id', $id)
            ->first();
    }

    public function productUpdate($id,$name,$title,$content,$user_id,$urlImage){
        return
        DB::table('product')->where('id', $id)->update([
            'name' => $name,
            'title' => $title,
            'content' => $content,
            'user_id' => $user_id,
            'image' => $urlImage,

        ]);
    }

    public function productDelete($id){
        return
        DB::table('product')
                ->where('id', $id)
                ->delete();
    }
}
