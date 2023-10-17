<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function findBasedOnCategory(Category $categorySlug)
    {
        $advertisements = $categorySlug->ads;
        $filterBySubcategory = Subcategory::where('category_id', $categorySlug->id)->get();
        return view('product.category', compact('advertisements', 'filterBySubcategory'));
    }

    public function findBasedOnSubcategory(
        Request $request,
        $categorySlug,
        Subcategory $subcategorySlug
    ) {

        $advertisementBasedOnFilter = Advertisement::where(
            'subcategory_id',
            $subcategorySlug->id
        )->when($request->minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->get();

        $advertisementWithoutFilter = $subcategorySlug->ads;
        $filterByChildCategories = $subcategorySlug->ads->unique('childcategory_id');

        $advertisements = $request->minPrice || $request->maxPrice ?
            $advertisementBasedOnFilter : $advertisementWithoutFilter;

        return view(
            'product.subcategory',
            compact('filterByChildCategories', 'advertisements')
        );
    }

    public function findBasedOnChildcategory(
        $categorySlug,
        Subcategory $subcategorySlug,
        Childcategory $childCategorySlug,
        Request $request

    ) {
        $advertisementBasedOnFilter = Advertisement::where(
            'childcategory_id',
            $childCategorySlug->id
        )->when($request->minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($request->maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->get();

        $advertisementWithoutFilter = $childCategorySlug->ads;
        $filterByChildCategories = $subcategorySlug->ads->unique('childcategory_id');

        $advertisements = $request->minPrice || $request->maxPrice ?
            $advertisementBasedOnFilter : $advertisementWithoutFilter;

        return view('product.childcategory', compact(
            'advertisements',
            'filterByChildCategories'
        ));
    }
}
