<?php

namespace App\Repositories\Interface;

interface ProductRepositoryInterface
{
    public function productList();
    public function confirm();
    public function updateConfirm($id);
    public function productIntert($category_id,$name,$title,$content,$user_id,$urlImage);
    public function productId($id);
    public function productUpdate($id,$name,$title,$content,$user_id,$urlImage);
    public function productDelete($id);
}
    