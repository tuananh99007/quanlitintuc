<?php

namespace App\Http\Controllers;

use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $productRepository;
    private $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $inputproductRepository,
        CategoryRepositoryInterface $inputcategoryRepository
    ) {
        $this->productRepository = $inputproductRepository;
        $this->categoryRepository = $inputcategoryRepository;
    }


    public function list()
    {
        $usersLogin = Auth::guard('admin')->user();
        $productsList = $this->productRepository->productList();
        return view('admin.product.list', compact('productsList', 'usersLogin'));
    }

    public function confirm()
    {
        $usersLogin = Auth::guard('admin')->user();
        $productsList = $this->productRepository->confirm();
        return view('admin.product.confirm', compact('productsList', 'usersLogin'));
    }

    public function updateConfirm(Request $request)
    {
        $usersLogin = Auth::guard('admin')->user();
        if ($usersLogin->role != 0) {
            $id = $request->input('id', null);
            $this->productRepository->updateConfirm($id);
            return redirect()->back()->withInput();
        } else {
            abort(403);
        }
    }

    public function add()
    {
        $usersLogin = Auth::guard('admin')->user();
        $categorysList =  $this->categoryRepository->categorysList();
        return view('admin.product.add', compact('usersLogin', 'categorysList'));
    }

    public function postAdd(Request $request)
    {
        $this->validatePostAdd($request);
        $usersLogin = Auth::guard('admin')->user();
        $category_id = $request->input('category_id', null);
        $name = $request->input('name', null);
        $title = $request->input('title', null);
        $content = $request->input('content', null);
        $user_id = $request->input('user_id', null);
        if ($user_id == null) {
            $user_id = $usersLogin->id;
        }
        $image = $request->file('image', null);
        if (empty($image) != true) {
            $nameImage = $image->hashName();
            $urlImage = "/upload/products/" . $nameImage;
            $image->store('upload/products');
        }
        $this->productRepository->productIntert($category_id, $name, $title, $content, $user_id, $urlImage);
        return redirect()->route('admin.product.list');
    }

    private function validatePostAdd($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:255',
            'content' => 'required|min:1|max:1000',
            'image' => 'required',
        ]);
    }

    public function update(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $productId = $this->productRepository->productId($id);
        if ($userLogin->id == $productId->user_id) {
            return view('admin.product.update', compact('productId', 'userLogin'));
        } else {
            abort(403);
        }
    }

    public function postUpdate(Request $request)
    {
        $this->validatePostUpdate($request);
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $title = $request->input('title', null);
        $productId = $this->productRepository->productId($id);
        $content = $request->input('content', null);
        if (empty($content) == true) {
            $content = $productId->content;
        }
        $user_id = $request->input('user_id', null);
        if (empty($user_id)) {
            $user_id = $userLogin->id;
        }
        $image = $request->file('image');
        if (empty($image) != true) {
            // Storage::delete($productId->image);
            $nameImage = $image->hashName();
            $urlImage = "/upload/products/" . $nameImage;
            $image->store('upload/products');
        } else {
            $urlImage = $productId->image;
        }

        $this->productRepository->productUpdate($id, $name, $title, $content, $user_id, $urlImage);
        return redirect()->back()->withInput();
    }

    private function validatePostUpdate($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:255',
        ]);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id', null);
        $productId = $this->productRepository->productId($id);
        return view('admin.product.detail', compact('productId',));
    }

    public function delete(Request $request)
    {
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $productId = $this->productRepository->productId($id);
        if ($userLogin->id == $productId->user_id) {
            $this->productRepository->productDelete($id);
            return redirect()->route('admin.product.list');
        } else {
            abort(403);
        }
    }
}
