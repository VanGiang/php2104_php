<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoriesController extends Controller
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
        $categories = $this->modelCategory
            ->orderby('id', 'desc')
            ->paginate(config('product.paginate_admin'));
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'is_public',
        ]);
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;

        try {
            $category = $this->modelCategory->create($data);
            $msg = 'Create category success.';

            return redirect()
                ->route('admincategories.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('admincategories.index')
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->modelCategory->findOrFail($id);

        return view('admin.categories.edit', [
            'categories' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->modelCategory->findOrFail($id);
        $data = $request->only([
            'name',
            'is_public',
        ]);
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;

        try {
            $category->update($data);
            $msg = 'update category success.';

            return redirect()
                ->route('admincategories.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('admincategories.index')
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
        $category = $this->modelCategory->findOrFail($id);
        try {
            $category->delete();
            $msg = 'xóa thành công.';

            return redirect()
                ->route('admincategories.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }
        $error = 'đã có lỗi.';
        return redirect()
            ->route('admincategories.index')
            ->with('error', $error);
    }
}
