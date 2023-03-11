<?php
namespace App\Model;
use App\Core\Query as DB;

class ProductModel
{
    public function getProduct()
    {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : null;
        $category = (int)$category;
        $minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : null;
        $minPrice = (int)$minPrice;
        $maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : null;
        $maxPrice = (int)$maxPrice;
        $sortName = isset($_GET['sortName']) ? $_GET['sortName'] : 'ten_hh ASC';
        $sortPrice = isset($_GET['sortPrice']) ? $_GET['sortPrice'] : 'don_gia DESC';
        $sortTime = isset($_GET['sortTime']) ? $_GET['sortTime'] : null;
        $data = DB::table('products')
            ->where('category_id', '=', $category)
            ->where('name', 'like', "'%$keyword%'")
            ->where('regular_price', '>=', $minPrice)
            ->where('regular_price', '<=', $maxPrice)
            ->orderBy('name', 'asc')
            ->select() 
            ->get();
        return $data;
    }

    public function getDetail($id)
    {
        $data = DB::table('products')
            ->where('id', '=', $id)
            ->select()
            ->get();
        return $data;
    }   

    // get product relate product category in detail page
    public function getRelateCategoryProduct($cateId, $proId)
    {
        $data = DB::table('products')
            ->where('category_id', '=', $cateId)
            ->where('id', '!=', $proId)
            ->select()
            ->get();
        return $data;
    }

    public function getCategory()
    {
        $data = DB::table('categories')->get();
        return $data;
    }
}
