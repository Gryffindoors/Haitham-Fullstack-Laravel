<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;


class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:menu_categories,id',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/menu', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $item = MenuItem::create($data);

        return response()->json(['message' => 'Menu item created successfully', 'data' => $item]);
    }


    /**
     * Display the specified resource.
     */
    public function show(menuItem $menu_items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menuItem $menu_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'name_ar' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0',
            'category_id' => 'sometimes|exists:menu_categories,id',
            'image' => 'nullable|image|mimes:webp,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/menu', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $menuItem->update($data);

        return response()->json(['message' => 'Menu item updated successfully', 'data' => $menuItem]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menuItem $menuItem)
    {
        $menuItem->delete();

        return response()->json(['message' => 'Menu item deleted successfully']);
    }
}
