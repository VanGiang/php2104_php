<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $modelProduct;
    protected $modelCategory;

    public function __construct(Product $product, Category $category)
     {
         $this->modelProduct = $product;
         $this->modelCategory = $category;
     }
    public function index()
    {
        $products = $this->modelProduct
            ->orderby('id', 'desc')
            ->paginate(config('product.paginate_admin'));
        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->modelCategory
            ->where('is_public', 1)
            ->pluck('name', 'id')
            ->toArray();
        return view('admin.products.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //$validated = $request->validated();

        $data = $request->only([
            'categories_id',
            'name',
            'quantity',
            'description',
            'price',
            'sale_off',
            'image',
            'is_public',
            
        ]);
        
        $file = $request->file('image');

        $data['categories_id'] = (int) $data['categories_id'];
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();

        try {
            if ($file) {
                $file->store('public/products');
                $data['image_name'] = $file->getClientOriginalName();
                $data['image'] = $file->hashName();
            }

            $product = $this->modelProduct->create($data);
            $msg = 'Create product success.';

            return redirect()
                ->route('adminproducts.show', ['product' => $product->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('adminproducts.index')
            ->with('error', $error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->modelProduct->findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->modelProduct->findOrFail($id);

        $categories = $this->modelCategory
            ->where('is_public', 1)
            ->pluck('name', 'id')
            ->toArray();

        return view('admin.products.edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = $this->modelProduct->findOrFail($id);

        $data = $request->only([
            'categories_id',
            'name',
            'quantity',
            'description',
            'price',
            'sale_off',
            'image',
            'is_public',
        ]);

        $file = $request->file('image');

        $data['categories_id'] = (int) $data['categories_id'];
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();

        try {

            if ($file) {
                $file->store('public/products');
                $file->getClientOriginalName();
                $data['image_name'] = $file->getClientOriginalName();
                $data['image'] = $file->hashName();
            }
            $product->update($data);
            $msg = 'Update product success.';

            return redirect()
                ->route('adminproducts.show', ['product' => $product->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('adminproducts.index')
            ->with('error', $error);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = $this->modelProduct->findOrFail($id);
        try {
            $product->delete();
            $msg = 'xóa thành công.';

            return redirect()
                ->route('adminproducts.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error("$e");
        }
        $error = 'đã có lỗi.';
        return redirect()
            ->route('adminproducts.index')
            ->with('error', $error);
    }
}