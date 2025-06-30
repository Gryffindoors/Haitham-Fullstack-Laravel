<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = MenuCategory::with('parent') // assumes relation defined
            ->orderBy('name')
            ->get()
            ->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'name_ar' => $category->name_ar,
                    'parent' => $category->parent ? [
                        'name' => $category->parent->name,
                        'name_ar' => $category->parent->name_ar,
                    ] : null,
                ];
            });

        return response()->json($categories);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategory $menu_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategory $menu_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, $menu_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuCategory $menu_categories)
    {
        //
    }
}
