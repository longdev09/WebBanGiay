<?php 
    include "../Config/config.php";
    session_start();

    $maSP = $_POST["masanPham"];
    $soLuongMua = $_POST["SL"];
    $size = $_POST["size"];

    $query_LaySanPham = "SELECT * FROM sanpham WHERE ma_san_pham = $maSP";

    $result = mysqli_query($conn,$query_LaySanPham);

    while($row = mysqli_fetch_assoc($result)) {
        $tensanpham = $row['ten_san_pham'];
        $giaban = $row['gia'];
        $slton = $row['so_luong_trong_kho'];
        $anh = $row['url_anh'];
    }

    

    $found = false;
    // san pham co trong gio hang r
    if($soLuongMua < $slton)
    {
        if(isset($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as &$cart_item) {
                if($cart_item['maSP'] === $maSP && $cart_item["size"] === $size) {
                    $cart_item['soLuong'] += $soLuongMua;
                    $found = true;
                    break;  
                }
            }
        }
        if(!$found) {
            // Sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $cart_item_sanPham = array(
                'maSP' => $maSP,
                'tensanpham' => $tensanpham,
                'giaban' => $giaban,
                'anh' => $anh,
                'soLuong' => $soLuongMua,
                'size' =>  $size
                
            );
            $_SESSION['cart'][] = $cart_item_sanPham;  
        }
        $response = array(
            "status" => 1,
            "message" => 'Thêm giỏ hàng thành công',
            'sanPham' => $_SESSION['cart']
        );

    }
    else{
        $response = array(
            "status" => 0,
            "message" => 'Thêm giỏ hàng thất bại'
        );

    }
    echo json_encode($response);


?>