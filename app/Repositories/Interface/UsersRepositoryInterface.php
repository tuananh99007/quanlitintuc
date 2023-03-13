<?php

namespace App\Repositories\Interface;

interface UsersRepositoryInterface
{
    public function usersList();
    public function usersInsert($name,$email,$password,$avatar,$role);
    public function usersId($id);
    public function usersUpdate($id,$name,$email,$password,$urlAvatar);
    public function usersDelete($id);
}
