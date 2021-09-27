<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    protected $productmodel;
    protected $categorymodel;

    public function __construct(Product $product, Category $category)
    {
        $this->productmodel = $product;
        $this->categorymodel = $category;
    }

    public function index()
    {
        //return view get data
        $products = $this->productmodel->paginate(10);
        return view('admin.products.index',['products'=>$products]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $product = $this->productmodel->findOrFail($id);

        return view('admin.products.show',['product'=>$product]);
    }

    public function edit($id)
    {
        $product = $this->productmodel->findOrFail($id);
        $categories = $this->categorymodel->all();

        return view('admin.products.edit',[
            'product'=>$product,
            'categories'=>$categories,
        ]);
    }


    public function update(Request $request, $id)
    {
        
        $product = $this->productmodel->findOrFail($id);

        $data = $request->all();
        
        $product['name'] = $data['name'];
        $product['sale_off'] = $data['sale_off'];
        $product['price'] = $data['price'];
        $product['category_id'] = $data['category_id'];
        $product['is_public'] = $data['is_public'];
        $product['description'] = $data['description'];
        $product->update();

        return redirect()
            ->route('products.index')
            ->with('msg','update success full');
    }


    public function destroy($id)
    {
        $product = $this->productmodel->findOrFail($id);
        $msg = '';

        try {
            $product->delete();
            $msg = 'Delete Success';
            return redirect()
            ->route('products.index')
            ->with('msg',$msg)
            ;
        } catch (\Exception $e) {
            \Log::error($e);
            
        }
        $error = 'Some thing went wrong. delete fail';
        return redirect()
            ->route('products.index')
            ->with('error',$error)
            ;
        
    }
}
