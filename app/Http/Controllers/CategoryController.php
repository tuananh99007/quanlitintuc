<?php

namespace App\Http\Controllers;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $inputcategoryRepository)
    {
        $this->categoryRepository = $inputcategoryRepository;
    }

    public function list()
    {
        $categorysList = $this->categoryRepository->categorysList();
        return view('admin.category.list', compact('categorysList'));
    }

    public function add()
    {
        $userLogin = Auth::guard('admin')->user();
        if ($userLogin->role != 9) {
            abort(403);
        } else {
            return view('admin.category.add');
        }
    }

    public function postAdd(Request $request)
    {

        $this->validateName($request);
        $userLogin = Auth::guard('admin')->user();
        if ($userLogin->role != 9) {
            abort(403);
        } else {
            $name = $request->input('name', null);
            $hot_flag = $request->input('hot_flag', null);
            $this->categoryRepository->categoryInsert($name, $hot_flag);
            return redirect()->route('admin.category.list');
        }
    }

    private function validateName($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'hot_flag' => 'max:255'
        ]);
    }

    public function update(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        if ($userLogin->role != 9) {
            abort(403);
        } else {
            $id = $request->input('id', null);
            $categoryID = $this->categoryRepository->categoryId($id);
            return view('admin.category.update', compact('categoryID'));
        }
    }

    public function postUpdate(Request $request)
    {
        $this->validateName($request);
        $userLogin = Auth::guard('admin')->user();
        if ($userLogin->role != 9) {
            abort(403);
        } else {
            $id = $request->input('id', null);
            $name = $request->input('name', null);
            $hot_flag = $request->input('hot_flag', null);
            $this->categoryRepository->categoryUpdate($id, $name, $hot_flag);
            return redirect()->route('admin.category.list');
        }
    }

    public function detail(Request $request)
    {
        $id = $request->input('id', null);
        $categoryID =  $this->categoryRepository->categoryId($id);
        return view('admin.category.detail', compact('categoryID'));
    }

    public function delete(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        if ($userLogin->role != 9) {
            abort(403);
        } else {
            $id = $request->input('id', null);
            $this->categoryRepository->categoryDelete($id);
            return redirect()->route('admin.category.list');
        }
    }
}
