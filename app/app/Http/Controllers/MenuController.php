<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuItems = MenuItem::with('children')
            ->mainMenu()
            ->active()
            ->get();

        return response()->json($menuItems);
    }

    /**
     * Display all menu items (for admin management)
     */
    public function all()
    {
        $menuItems = MenuItem::with('children', 'parent')
            ->orderBy('sort_order')
            ->get();

        return response()->json($menuItems);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'url' => 'nullable|string|max:500',
                'parent_id' => 'nullable|exists:menu_items,id',
                'sort_order' => 'required|integer|min:0',
                'icon' => 'nullable|string|max:100',
                'description' => 'nullable|string|max:1000'
            ]);

            // Handle boolean fields separately with default values
            $validatedData['is_active'] = $request->has('is_active') ? filter_var($request->get('is_active'), FILTER_VALIDATE_BOOLEAN) : true;
            $validatedData['opens_new_tab'] = $request->has('opens_new_tab') ? filter_var($request->get('opens_new_tab'), FILTER_VALIDATE_BOOLEAN) : false;
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        }

        // Check depth limit for new items
        if ($validatedData['parent_id']) {
            $proposedParent = MenuItem::find($validatedData['parent_id']);
            if ($proposedParent && $proposedParent->getDepth() >= 2) {
                return response()->json(['error' => 'Maximum nesting depth (3 levels) would be exceeded'], 422);
            }
        }

        $menuItem = MenuItem::create($validatedData);
        return response()->json($menuItem, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menuItem = MenuItem::with('children', 'parent')->findOrFail($id);
        return response()->json($menuItem);
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
        $menuItem = MenuItem::findOrFail($id);

        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'url' => 'nullable|string|max:500',
                'parent_id' => 'nullable|exists:menu_items,id',
                'sort_order' => 'required|integer|min:0',
                'icon' => 'nullable|string|max:100',
                'description' => 'nullable|string|max:1000'
            ]);

            // Handle boolean fields separately with default values
            $validatedData['is_active'] = $request->has('is_active') ? filter_var($request->get('is_active'), FILTER_VALIDATE_BOOLEAN) : true;
            $validatedData['opens_new_tab'] = $request->has('opens_new_tab') ? filter_var($request->get('opens_new_tab'), FILTER_VALIDATE_BOOLEAN) : false;
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'details' => $e->errors()
            ], 422);
        }

        // Prevent circular references
        if ($validatedData['parent_id'] == $id) {
            return response()->json(['error' => 'A menu item cannot be its own parent'], 422);
        }

        // Prevent setting a child/descendant as parent
        if ($validatedData['parent_id']) {
            $proposedParent = MenuItem::find($validatedData['parent_id']);
            if ($proposedParent && $this->isDescendantOf($menuItem, $proposedParent)) {
                return response()->json(['error' => 'Cannot set a descendant as parent (would create circular reference)'], 422);
            }

            // Check depth limit
            if ($proposedParent && $proposedParent->getDepth() >= 2) {
                return response()->json(['error' => 'Maximum nesting depth (3 levels) would be exceeded'], 422);
            }
        }

        $menuItem->update($validatedData);
        return response()->json($menuItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);

        // Check if this item has children
        if ($menuItem->hasChildren()) {
            return response()->json([
                'error' => 'Cannot delete menu item that has child items. Delete child items first.'
            ], 422);
        }

        $menuItem->delete();
        return response()->json(['message' => 'Menu item deleted successfully']);
    }

    /**
     * Get available parent menu items for dropdown
     */
    public function getParentOptions()
    {
        // Get all menu items ordered properly with their relationships
        $allItems = MenuItem::with('parent')
            ->orderBy('parent_id')
            ->orderBy('sort_order')
            ->get();

        $parentOptions = collect();

        // Build hierarchical structure for display
        $this->buildParentOptionsHierarchy($allItems, $parentOptions, null, 0);

        return response()->json($parentOptions->values());
    }

    /**
     * Recursively build parent options hierarchy
     */
    private function buildParentOptionsHierarchy($allItems, &$parentOptions, $parentId, $depth)
    {
        $items = $allItems->where('parent_id', $parentId)->sortBy('sort_order');

        foreach ($items as $item) {
            // Only include items that can have children (depth < 2)
            if ($item->canHaveChildren()) {
                $prefix = '';

                // Add visual indicators for depth
                if ($depth == 1) {
                    $prefix = '── ';
                }

                $parentOptions->push([
                    'id' => $item->id,
                    'title' => $prefix . $item->title,
                    'depth' => $depth
                ]);
            }

            // Recursively add children (but only up to depth 1 since depth 2 can't have children)
            if ($depth < 1) {
                $this->buildParentOptionsHierarchy($allItems, $parentOptions, $item->id, $depth + 1);
            }
        }
    }

    /**
     * Reorder menu items
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:menu_items,id',
            'items.*.sort_order' => 'required|integer|min:0'
        ]);

        foreach ($request->items as $item) {
            MenuItem::where('id', $item['id'])
                ->update(['sort_order' => $item['sort_order']]);
        }

        return response()->json(['message' => 'Menu items reordered successfully']);
    }

    /**
     * Check if an item is a descendant of another item
     */
    private function isDescendantOf($potentialAncestor, $item)
    {
        $current = $item;

        while ($current->parent) {
            if ($current->parent->id === $potentialAncestor->id) {
                return true;
            }
            $current = $current->parent;
        }

        return false;
    }
}
