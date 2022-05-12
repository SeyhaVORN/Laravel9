<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
// use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        Category::create($request->validated());
        // send notification
        //

        return redirect()
            ->route('categories.index')
            ->with('message', 'Category added successfully');
    }

    public function show(Category $category)
    {
        return view('admin.category.index', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();
        $category = Category::find($category_id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;

        if ($request->hasFile('image')) {
            $destination = 'uploads/category/' . $category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;

        $category->navbar_status = $request->navbar_status ? 1 : 0;
        $category->status = $request->status ? 1 : 0;
        $category->created_by = Auth::id();
        $category->update();

        return redirect()
            ->route('categories.index')
            ->with('message', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        if ($category) {
            $destination = 'uploads/category/' . $category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $category->delete();
            return redirect()
                ->route('categories.index')
                ->with('message', 'Category has been deleted');
        } else {
            return redirect()
                ->route('categories.index')
                ->with('message', 'No category Id found');
        }
    }
}