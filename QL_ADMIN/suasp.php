<?php
include '../share/headerAdmin.php'
?>

<style>
    :root {
        --main-color: #DD2F6E;
        --color-dark: #1D2231;
        --text-grey: #8390A2;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        list-style-type: none;
        text-decoration: none;
    }

    ul {
        padding: 0px !important;
        margin: 0px !important;
    }

    .menu-function {
        padding: 15px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .07), 0 4px 6px -2px rgba(0, 0, 0, .05) !important;
        background-color: #fff;
        border-radius: 10px;
    }

    .menu-function ul {
        display: flex;
        align-items: center;
    }

    .menu-function li {}

    .menu-function li button {
        background-color: #2fdd8f;
        border: none;
        width: 100%;
        height: 100%;
        padding: 10px;
        border-radius: 12px;
        cursor: pointer;
    }

    .table-content {
        margin-top: 20px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .07), 0 4px 6px -2px rgba(0, 0, 0, .05) !important;
        border-radius: 13px;
        background-color: #fff;
    }

    th,
    td {
        padding: 20px !important;
    }
</style>

<main class="main-container">
    <div class="main-title">
        <p class="font-weight-bold">UPDATE SẢN PHẨM</p>
    </div>

    <?php 
        include "../Config/config.php";
        if(isset($_GET["masp"]))
        {
            $masp = $_GET["masp"];
            $query_loadsp="SELECT ma_san_pham,ten_san_pham,mo_ta,gia,url_anh,kich_thuoc,mau_sac,so_luong_trong_kho,sanpham.ma_loai_san_pham,ten_loai,Tinh_Trang FROM sanpham,loaisanpham where sanpham.ma_loai_san_pham=loaisanpham.ma_loai_san_pham and ma_san_pham = '$masp'";
            $sanpham=mysqli_query($conn,$query_loadsp);

        while($row = mysqli_fetch_assoc($sanpham))
        {
            $ma_san_pham=$row["ma_san_pham"];
            $ten_san_pham=$row["ten_san_pham"];
            $mo_ta=$row["mo_ta"];
            $gia=$row["gia"];
            $url_anh=$row["url_anh"];
            $kich_thuoc=$row["kich_thuoc"];
            $mau_sac=$row["mau_sac"];
            $so_luong_trong_kho=$row["so_luong_trong_kho"];
            $ten_loai=$row["ten_loai"];
            $tinh_trang=$row["Tinh_Trang"];
            $ma_loai_san_pham=$row["ma_loai_san_pham"];
        }

        $query_loadtinhtrang = "SELECT Tinh_Trang, ma_san_pham FROM sanpham GROUP BY Tinh_Trang";
        
        $tinhtrang = mysqli_query($conn, $query_loadtinhtrang);
    
        $query_loadhang = "SELECT ten_loai, ma_loai_san_pham FROM loaisanpham GROUP BY ten_loai";
        
        $hang = mysqli_query($conn, $query_loadhang);
    }
    
        if (isset($_FILES['hinh'])) {
            $file = $_FILES['hinh'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileDestination = '../Assets/img/img_SanPham/SanPham_adidas/' . $fileName;
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "Hình đã được tải lên thành công.";
            } else {
                echo "Không thể tải lên hình.";
            }
        }

        if (isset($_POST['loai_'])) {
            $loai = $_POST['loai_'];
        }

        if (isset($_POST['tinhtrang_'])) {
            $tt = $_POST['tinhtrang_'];
        }

        if (isset($_POST["btn_luu"])) 
        {
            $masanpham = $_POST["maSanPham"];
            $tensp = $_POST["tenSanPham"];
            $hinh = $fileName;
            $soLuong = $_POST["soLuong"];
            $gia = $_POST["gia"];
            $mau = $_POST["mau"];
            $kichthuoc = $_POST["kichthuoc"];
            $mota = $_POST["mota"];      
            $loaisp = $loai;
            $tinhtrangsp = $tt;
            $query_luu = "UPDATE sanpham SET ten_san_pham='$tensp',mo_ta='$mota',gia='$gia',url_anh='$hinh',kich_thuoc='$kichthuoc',mau_sac='$mau',so_luong_trong_kho='$soLuong',ma_loai_san_pham='$loaisp',Tinh_Trang='$tinhtrangsp' where ma_san_pham = $masanpham";
            $luu = mysqli_query($conn, $query_luu);
            if ($luu) {
                
                echo "lưu thành công";
            } else {
                echo "lưu thất bại";
            }
        }
    ?>

    <tbody id="product">
        <form method="post" action="suasp.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>Mã sản phẩm</label>
                <input type="text" class="form-control" id="maSP" name="maSanPham" value="<?php echo  $masp?>" />
            </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" id="tenSP" name="tenSanPham" value="<?php echo $ten_san_pham?>" />
            </div>
            <div class="form-group">
                <label>Hình</label>
                <input type="file" class="form-control" id="hinh" name="hinh" value="<?php echo $url_anh ?>"/>
            </div>
            <div class="form-group">
                <label>Số lượng</label>
                <input type="text" class="form-control" id="sl" name="soLuong" value="<?php echo $so_luong_trong_kho ?>"/>
            </div>
            <div class="form-group">
                <label>Đơn giá</label>
                <input type="text" class="form-control" id="dg" name="gia" value="<?php echo $gia ?>"/>
            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <input type="text" class="form-control" id="mauSac" name="mau" value="<?php echo $mau_sac ?>"/>
            </div>
            <div class="form-group">
                <label>Kích Thước</label>
                <input type="text" class="form-control" id="kichThuoc" name="kichthuoc" value="<?php echo $kich_thuoc ?>"/>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <input type="text" class="form-control" id="mota" name="mota" value="<?php echo $mo_ta ?>"/>
            </div>
            <div class="form-group">
                <label>Hãng</label>
                <select class="form-select" id="loai_" name="loai_" aria-label="Default select example">
                    <?php 
                    $loai = ""; // Khởi tạo biến $loai trước khi gán giá trị
                    while ($row = mysqli_fetch_assoc($hang)) {
                        $ma_loai = $row["ma_loai_san_pham"];
                        $ten_loai = $row["ten_loai"];

                        // Kiểm tra nếu giá trị đã được chọn
                        if (isset($_POST['loai_']) && $_POST['loai_'] == $ma_loai) {
                            $loai = $ma_loai; // Gán giá trị vào biến $loai
                        }
                        ?>
                        <option value="<?php echo $ma_loai ?>" <?php if ($ma_loai_san_pham == $ma_loai) echo "selected" ?>><?php echo $ten_loai ?></option>
                        <?php
                    }                  
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tình trạng</label>
                <select class="form-select" id="tinhtrang_" name="tinhtrang_" aria-label="Default select example">
                    <?php 
                    $tt = ""; // Khởi tạo biến $tinhtrang trước khi gán giá trị
                    while ($row = mysqli_fetch_assoc($tinhtrang)) {
                        $ma_sp = $row["ma_san_pham"];
                        $tinh_trang1 = $row["Tinh_Trang"];

                        // Kiểm tra nếu giá trị đã được chọn
                        if (isset($_POST['tinhtrang_']) && $_POST['tinhtrang_'] == $ma_sp) {
                            $tt = $tinh_trang1; // Gán giá trị vào biến $tinhtrang
                        }
                        ?>
                        <option value="<?php echo $tinh_trang1 ?>" <?php if ($tinh_trang == $tinh_trang1) echo "selected" ?>><?php echo $tinh_trang1 ?></option>
                        <?php
                    }                  
                    ?>
                </select>
            </div>
            <button name="btn_luu" class="btn btn-success"><a class="text-light" >LƯU THAY ĐỔI</a></button>
        </form>
    </tbody>
</main>

<?php
include '../share/footerAdmin.php'
?>
