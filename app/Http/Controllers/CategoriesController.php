<?php

namespace App\Http\Controllers;

use App\Core\Categories\ICategory;
use App\Core\Services\Alert;
use App\Core\Services\Log;
use App\DCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{

    private $_category;

    public function __construct(ICategory $category)
    {
        $this->_category = $category;
    }

    public function index() {
        $active_categories = $this->_category->getCategoriesByActive(true);
        $disabled_categories = $this->_category->getCategoriesByActive(false);
        return view('admin.categories.index', compact('active_categories', 'disabled_categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $data = [
            'name' => $request->name,
            'summary' => $request->summary,
            'details' => $request->details,
            'logo_url' => $request->logo_url,
            'image_url' => $request->image_url
        ];
        $response = $this->_category->createCategory($data);
        if (isset($response['data'])) {
            Log::info("Category was created - ".$request->name);

            return Redirect::route('categories.index')
                    ->with('success', Alert::format('Completed!', 'Category was created.'));
        } else {
            Log::info("Category was not created - ".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function edit(DCategory $category) {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(DCategory $category, Request $request) {
        $data = [
            'name' => $request->name,
            'summary' => $request->summary,
            'details' => $request->details,
            'logo_url' => $request->logo_url,
            'image_url' => $request->image_url
        ];
        $response = $this->_category->updateCategory($category, $data);
        if (isset($response['data'])) {
            Log::info("Category was updated - ".$request->name);

            return Redirect::route('categories.index')
                    ->with('success', Alert::format('Completed!', 'Category was updated.'));
        } else {
            Log::info("Category was not updated - 0".$response['error']);

            return Redirect::back()
                    ->with('error', Alert::format('Error!', $response['error']))
                    ->withInput();
        }
    }

    public function disable(DCategory $category) {
        $this->_category->disable($category);
        Log::info("Category was disabled - ".$category->name);

        return Redirect::route('categories.index')
                ->with('success', Alert::format('Completed!', 'Category was disabled.'));
    }

    public function enable(DCategory $category) {
        $this->_category->enable($category);
        Log::info("Category was enabled - ".$category->name);

        return Redirect::route('categories.index')
                ->with('success', Alert::format('Completed!', 'Category was enabled.'));
    }

}
