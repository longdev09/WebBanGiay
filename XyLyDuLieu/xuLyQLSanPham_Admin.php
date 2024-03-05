<?php 

    
   


    function xlLoadDsSanPham(){
        include "../Config/config.php";
        $query = "SELECT ma_san_pham, ten_san_pham, mo_ta, gia, kich_thuoc,so_luong_trong_kho, mau_sac, loaisanpham.ten_loai, url_anh FROM sanpham, loaisanpham WHERE sanpham.ma_loai_san_pham = loaisanpham.ma_loai_san_pham";
        $result = mysqli_query($conn,$query);
        $sanPham = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $sanPham[]  = $row;
        }
        $response = array(
            'status' =>1,
            'sanPham' => $sanPham
        );
        echo json_encode($response);
    }
    
    function xlThemSamPham()
    {
        include "../Config/config.php";

        $tenSP = $_POST["tenSP"];
        $soLuong= $_POST["soLuong"];
        $donGia = $_POST["donGia"];
        $mauSac = $_POST["mauSac"];
        $kichThuoc= $_POST["kichThuoc"];
        $loai = $_POST["loai"];
        $mota = $_POST["mota"];
        $fileName = $_FILES["hinh"]["name"];

        $queryThemSanPham = "INSERT INTO `sanpham`(`ten_san_pham`, `mo_ta`, `gia`, `url_anh`, `kich_thuoc`, `mau_sac`, `so_luong_trong_kho`, `ma_loai_san_pham`) 
        VALUES ('$tenSP',' $mota','$donGia','$fileName','$kichThuoc',' $mauSac','$soLuong','$loai')";

        
        $targetDirectory = "../Assets/img/img_SanPham/"; // Đường dẫn thư mục lưu trữ hình ảnh
        $targetFile = $targetDirectory . basename($_FILES["hinh"]["name"]); // Đường dẫn và tên tệp tin đích
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo "Chỉ cho phép tải lên các tệp tin JPG, JPEG, PNG.";
            // Có thể thêm xử lý khi loại tệp không hợp lệ
        } else {
            // Di chuyển tệp tin tạm vào đích lưu trữ trên máy chủ
            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $targetFile)) {
                echo "Tệp tin đã được tải lên thành công.";
                // Có thể thêm xử lý khi tệp tin được tải lên thành công
            } else {
                echo "Đã xảy ra lỗi trong quá trình tải lên tệp tin.";
                // Có thể thêm xử lý khi có lỗi xảy ra
            }
        }

        $resultThemSanPham = mysqli_query($conn,$queryThemSanPham);
        
        if ($resultThemSanPham) {
            $response = array(
                "status" => 1,
                "message" => 'Thêm thành công'
            );
        } else {
            $response = array(
                "status" => 0,
                "message" => 'Thêm thất bại'
            );
        }
        echo json_encode($response);
        

    }
    



    if(isset($_GET["action"]))
    {
        if ($_GET['action'] === 'xlLoadDsSanPham') {
            xlLoadDsSanPham();
        } 
        else if($_GET['action'] === 'xlThemSamPham') {
            xlThemSamPham();

        }

        
        

    }
?>