<?php 


    session_start();

    function them1HoaDon(){

        include "../Config/config.php";
        $ngayHeThong = date('Y-m-d');
        $khachHangDangNhap = $_SESSION["dangNhap"]["ma_khach_hang"];
        $htngNhan = $_POST["ht"];
        $sdtNguoiNhan = $_POST["sdt"];
        $dc = $_POST["dc"];
        $ptTT = $_POST["ptTT"];

        $thangTien = 0;
        foreach($_SESSION["cart"] as $item){
            $tong = $item["giaban"] * $item["soLuong"];
            $thangTien += $tong;

        }

        $queryThemDonHang = "INSERT INTO `donhang`(`ma_khach_hang`, `hoTenNguoiNhan`, `soDtNguoiNhan`, 
        `DiaChi`, `ngay_dat_hang`, `phuong_thuc_thanh_toan`, `trang_thai`, `tong_tien`)
        VALUES ($khachHangDangNhap,'$htngNhan','$sdtNguoiNhan','$dc',
        '$ngayHeThong','$ptTT','Đang giao hàng',$thangTien)";


        



        $result = mysqli_query($conn, $queryThemDonHang);

        

        if($result)
        {
            $response = array(
                "status" => 1,
                "message" => 'Đặt hàng thành công'
            );
            
            $maHD = mysqli_insert_id($conn);

            foreach($_SESSION["cart"] as $itemCT){

                $maSP_CT = $itemCT["maSP"];
                $sl_CT = $itemCT["soLuong"];
                $size_CT = $itemCT["size"];
                $gia_CT = $itemCT["giaban"] * $itemCT["soLuong"];

                $queryThemCT = "INSERT INTO `mathangtrongdonhang`(`ma_don_hang`, `ma_san_pham`, `so_luong`, `size`, `gia`)
                VALUES ('$maHD', $maSP_CT, $sl_CT ,'$size_CT','$gia_CT')";
                mysqli_query($conn,$queryThemCT);

                $queryLaySLSP = "SELECT so_luong_trong_kho FROM `sanpham` WHERE ma_san_pham =  $maSP_CT";
                $rs = mysqli_query($conn,$queryLaySLSP);
                $row = mysqli_fetch_assoc($rs);
                $slConLai = $row["so_luong_trong_kho"] -  $sl_CT;
                // tien hanh cap nhat lai so soLuong
                $queryCapNhatSoLuong = "UPDATE sanpham SET so_luong_trong_kho = $slConLai WHERE ma_san_pham = '$maSP_CT'";
                mysqli_query($conn,$queryCapNhatSoLuong);
            }
            unset($_SESSION["cart"]);
    
           

        }
        else{
            $response = array(
                "status" => 0,
                "message" => 'Đặt hàng thất bại'
            );

        }
        echo json_encode($response);



    }


    function layDsDonHang(){
        $khachHangDangNhap = $_SESSION["dangNhap"]["ma_khach_hang"];

        include "../Config/config.php";
        $queryLayDSHD = "SELECT * FROM `donhang` WHERE 	ma_khach_hang =  $khachHangDangNhap";
        
        $result = mysqli_query( $conn,$queryLayDSHD);
        $dsdonHang = array();
        while($row = mysqli_fetch_assoc($result) )
        {

            $dsdonHang[] = $row;
        }
        $response = array(
            'status' =>1,
            'dsdonHang' => $dsdonHang
        );
        echo json_encode($response);
    }

    function layCTHD(){
        include "../Config/config.php";
        $maHDXemCT = $_POST["maHD"];
        var_dump($_POST);
        $queryCTHD = "SELECT sanpham.ten_san_pham, sanpham.url_anh, mathangtrongdonhang.so_luong, mathangtrongdonhang.gia, mathangtrongdonhang.size FROM mathangtrongdonhang, sanpham WHERE mathangtrongdonhang.ma_san_pham = sanpham.ma_san_pham AND mathangtrongdonhang.ma_don_hang = $maHDXemCT";

        $resultCTHD = mysqli_query($conn, $queryCTHD);
        
        $dsCT = array();
        while($row = mysqli_fetch_assoc($resultCTHD))
        {
            $dsCT[] =$row;
        }
        $responsess = array(
            'status' =>1,
            'dsCTs' => $dsCT
        );
        echo json_encode($responsess);

        
    
    }











    if(isset($_GET["action"]))
        {
            if ($_GET['action'] === 'them1HoaDon') {
                them1HoaDon();
            } 
            else if($_GET['action'] === 'layDsDonHang') {
                layDsDonHang();

            }
            else if($_GET['action'] === 'layCTHD') {
                layCTHD();

            }

            
            

        }

?>