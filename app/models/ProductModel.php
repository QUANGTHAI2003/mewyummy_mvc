<?php

use App\Core\Query as DB;

class ProductModel {

    public function getProduct() {
        $keyword      = $_GET['keyword'] ?? '';
        $category     = $_GET['category'] ?? null;
        $category     = (int)$category;
        $minPrice     = $_GET['minPrice'] ?? null;
        $minPrice     = (int)$minPrice;
        $maxPrice     = $_GET['maxPrice'] ?? null;
        $maxPrice     = (int)$maxPrice;
        $sortName     = $_GET['sort'] ?? null;
        $sortName     = getParamRadio($sortName);
        $nameSort     = $sortName[0] ?? '';
        $nameSortType = $sortName[1] ?? '';
        $data         = DB::table('products')
                          ->where('category_id', '=', $category)
                          ->where('name', 'like', "'%$keyword%'")
                          ->where('regular_price', '>=', $minPrice)
                          ->where('regular_price', '<=', $maxPrice)
                          ->orderBy($nameSort, $nameSortType)
                          ->select()
                          ->get();

        return $data;
    }

    public function getDetail($id)
    : bool|array {
        $data = DB::table('products')
                  ->where('id', '=', $id)
                  ->select()
                  ->get();

        return $data;
    }

    // get product relate product category in detail page
    public function getRelateCategoryProduct($cateId, $proId)
    : bool|array {
        $data = DB::table('products')
                  ->where('category_id', '=', $cateId)
                  ->where('id', '!=', $proId)
                  ->limit(5)
                  ->select()
                  ->get();

        return $data;
    }

    public function getCategory()
    : bool|array {
        $data = DB::table('categories')->get();

        return $data;
    }

    public function getSearchData($keyword)
    : bool|array {
        $data = DB::table('products')
                  ->where('name', 'like', "'%$keyword%'")
                  ->limit(5)
                  ->select()
                  ->get();

        return $data;
    }
}
