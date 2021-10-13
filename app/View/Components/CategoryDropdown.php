<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        $categories = Category::orderBy('name')->get();
        $category = Category::firstWhere('slug', request('category'));
        return view('components.category-dropdown', compact('categories', 'category'));
    }
}
