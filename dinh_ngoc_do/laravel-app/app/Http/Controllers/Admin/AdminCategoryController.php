<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\ResourceRegistrar;
use App\Http\Requests\FormCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class AdminCategoryController extends Controller
{
    protected $categoryModel;

    public function __construct(Category $category)
    {
        $this->categoryModel = $category; 
    }

    public function index()
    {
        $categories = $this->categoryModel
            ->paginate(5);

        /* dd($categories); */

        return view('admin.category.admin-category', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.category.admin-create-category');
    }

    public function store(FormCategoryRequest $request)
    {
        $data = $request->only([
            'name',
            'is_public',
        ]);

        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;

        try {
            $file = $request->file('image');

            if ($file) {
                $file->store('public/products');
                $data['image'] = $file->hashName();
            }
            
            $category = $this->categoryModel->create($data);
            $msg = 'Create Category Successfully';

            return redirect()
                ->route('admin.category.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);

            $error = 'Something went wrong. Please try againt!';

            return redirect()
                ->route('admin.category.index')
                ->with('error', $error);
        }

    }

    public function edit($id)
    {
        $category = $this->categoryModel->findOrFail($id);

        return view('admin.category.admin-edit-category', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'name',
            'image',
            'is_public',
        ]);

        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;

        try {
            $file = $request->file('image');

            if ($file) {
                $file->store('public/products');
                $data['image'] = $file->hashName();
            }

            $category = $this->categoryModel->findOrFail($id)->update($data);

            $msg = 'Update Category Successfully';

            return redirect()
                ->route('admin.category.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);

            $error = 'Something went wrong. Please try againt!';

            return redirect()
                ->route('admin.category.index')
                ->with('error', $error);
        }
    }

    public function destroy($id) {
        $category = $this->categoryModel->findOrFail($id);

        try {
            $category->delete();
            $msg = 'Delete Category Successfully';

            return redirect()
                ->route('admin.category.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);

            $error = 'Something went wrong. Please try againt!';

            return redirect()
                ->route('admin.category.index')
                ->with('msg', $error);
        }
    }
}
