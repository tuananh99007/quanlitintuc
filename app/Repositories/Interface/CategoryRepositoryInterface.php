<?php

namespace App\Repositories\Interface;

interface CategoryRepositoryInterface
{
    public function categorysList();
    public function categoryInsert($name,$hot_flag);
    public function categoryId($id);
    public function categoryUpdate($id,$name,$hot_flag);
    public function categoryDelete($id);
}