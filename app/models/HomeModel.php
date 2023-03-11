<?php

use App\Core\Query as DB;

class HomeModel
{
    public function getProductSale()
    {
        $data = DB::table('products')
            ->where('sale_price', '>=', 1)
            ->select()
            ->get();
        return $data;
    }

    public function getProductMeat()
    {
        $data = DB::table('products')
            ->where('category_id', '=', 1)
            ->select()
            ->get();
        return $data;
    }

    public function getProductSeafood()
    {
        $data = DB::table('products')
            ->where('category_id', '=', 2)
            ->select()
            ->get();
        return $data;
    }

    public function getProductVegetable()
    {
        $data = DB::table('products')
            ->where('category_id', '=', 3)
            ->select()
            ->get();
        return $data;
    }

    public function getVideos()
    {
        $data = [
            [
                "title" => "Thịt Heo Chiên Nước Mắm Cực Ngon Cực Đơn Giản, Bạn Đã Thử Làm Chưa?",
                "thumbnail_video" => "video1.webp",
                "data_video" => "Rd1HkzReshw"
            ],
            [
                "title" => "Cách Làm Mực Chiên Nước Mắm Đơn Giản mà siêu ngon",
                "thumbnail_video" => "video2.webp",
                "data_video" => "756hQQQmAbQ"
            ],
            [
                "title" => "Cùng Mew thực hiện nấu LẨU THÁI ngon chuẩn vị nhờ Bí Quyết gia vị rất đơn giản",
                "thumbnail_video" => "video3.webp",
                "data_video" => "GpHFyY0_qj4"
            ],
            [
                "title" => "Vào bếp với MewYummy cùng món ĐẬU HŨ cực ngon mà lạ",
                "thumbnail_video" => "video4.webp",
                "data_video" => "NszhDnxuoFM"
            ],
        ];
        return $data;
    }

    public function getBlogs()
    {
        $data = [
            [
                "title" => "Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình",
                "desc" => "Lợi ích của cá hồi trong bữa cơm gia đình hàng ngày So với nhiều mặt hàng thực phẩm tươi sống khác hiện nay, cá hồi có giá thành phải chăng, không quá đắt đỏ. Thịt cá hồi có giá trị dinh dưỡng rất cao, các nghiên cứu khoa học đã chứng minh ăn cá hồi hàng ngày, đặc biệt là&nbsp;cá hồi sốt&nbsp;sẽ giúp bạn: Bổ sung axit béo Omega-3 giúp giảm viêm, hạ huyết áp và hạn chế nhiều bệnh nguy hiểm khác. Omega3, vitamin D, selen trong thịt cá hồi cũng hỗ trợ cơ thể kiểm soát lượng insulin, hạ thấp...",
                "thumbnail_blog" => "blog1.webp",
                "day" => "06",
                "month_year" => "07/2022",
            ],
            [
                "title" => "Tổng hợp những món ngon từ thịt bò giúp nồi cơm luôn sạch veo",
                "desc" => "Tổng hợp những món ngon từ thịt bò giúp nồi cơm luôn sạch veo Thịt bò được xem như loại thịt đỏ tốt cho sức khỏe. Với những công thức món ngon từ thịt bò nhanh gọn lẹ dưới đây, các bà nội trợ sẽ lại có cơ hội trổ tài để mang đến những bữa ăn dinh dưỡng cho gia đình. Công thức những món ngon từ thịt bò sanphamtin_thit-trung 1. Bò kho củ cải Nguyên liệu: - Thịt bò: 450g - Củ cải trắng: 250g - Gia vị: muối, bột nêm, đường, nước màu, gừng, tiêu, dầu ăn Cách làm: - Thịt bỏ rửa sạch bằng nước...",
                "thumbnail_blog" => "blog2.webp",
                "day" => "23",
                "month_year" => "12/2021",
            ],
            [
                "title" => "Hướng dẫn 05 cách chế biến cá bò thơm ngon hấp dẫn cho cả gia đình",
                "desc" => "05 cách chế biến cá bò ngon nhất Trước khi&nbsp;chế biến cá bò, bạn cần sơ chế cá. Cá bò da nguyên con, làm sạch (lột bỏ da, bỏ ruột) khi cần ăn có thể lấy ra rã đông dùng ngay. Tùy sở thích và khẩu vị mà&nbsp; mỗi gia đình có cách chế biến khác nhau nhưng ngon và thơm nhất vẫn là món nướng. Cá bò nướng có vị ngọt đậm đà, hấp dẫn. Cá bò nướng có thể nướng các kiểu như:&nbsp;Cá bò nướng muối ớt, cá bò nướng tiêu, cá bò nướng than, cá bò nướng giấy bạc,...",
                "thumbnail_blog" => "blog3.webp",
                "day" => "23",
                "month_year" => "12/2021",
            ],
            [
                "title" => "TOP 30+ món thịt bò ngon nhất vừa dễ làm lại tiết kiệm",
                "desc" => "Thịt bò là nguyên liệu giàu protein, có giá trị dinh dưỡng cung cấp cho cơ thể những dưỡng chất cần thiết để khỏe mạnh. Trong&nbsp;cẩm nang đầu bếp&nbsp;thì thịt bò là loại thực phẩm hàng ngày nên bạn có thể chế biến thành các món ăn ngon từ thịt bò khác nhau. Dưới đây là TOP 30+ món thịt bò ngon nhất được làm từ thịt bò vừa dễ làm lại tiết kiệm để mọi người cùng tham khảo. BA CHỈ BÒ CUỘN MỸ Thịt Ba chỉ bò Mỹ có tỷ lệ nạc và mỡ vừa phải nên khi chế biến món...",
                "thumbnail_blog" => "blog4.webp",
                "day" => "06",
                "month_year" => "07/2022",
            ],
        ];
        return $data;
    }
}
