<?php
include "./Config/config.php";

session_start();
// danh sach loai  san pham
$sqlDsLSP = "SELECT * FROM loaisanpham";
$dsLSP  = mysqli_query($conn, $sqlDsLSP);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- bootstrap-icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- style -->
    <!-- pc -->
    <link rel="stylesheet" href="./Assets/style/css.css">
    <link rel="stylesheet" href="./Assets/style/AllProduct.css">
    <link rel="stylesheet" href="./Assets/style/product_Details.css">
    <link rel="stylesheet" href="./Assets/ThuVien/Toast/toastr.min.css">
    <!-- mobile -->
    <!-- slick -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Index</title>
</head>

<body>
    <div id="main">
        <header class="header">
            <div class="header-wrap">
                <div class="header_wrap-item container-fluid">
                    <div class="header_wrap-content d-flex justify-content-end ">
                        <p class="name">
                            <a href="" class="">
                                Shop Giày
                            </a>
                        </p>
                        <p class="check">
                            <a href="./TraCuuDonHang.php">
                                <i class="bi bi-truck-front"></i>
                                Tra cứu đơn vận
                            </a>
                        </p>
                        <p class="hotline">
                            <a href="">

                                <i class="bi bi-telephone-fill phone_hotline"></i>
                                <span class="phone_hotline">Hotline : </span>
                                0366734760
                            </a>
                        </p>

                    </div>
                </div>

            </div>
            <hr>
            <nav class="header-nav">
                <div class="container-fluid d-flex">
                    <div class="header_nav-logo " style="width: 15%;">
                        <a href="TrangChu.php">
                            <img class="img-fluid" style="width: 200px; padding: 12px;" src="https://kingshoes.vn/data/upload/media/cu%CC%9B%CC%89a-ha%CC%80ng-gia%CC%80y-sneaker-chi%CC%81nh-ha%CC%80ng-uy-ti%CC%81n-nha%CC%82%CC%81t-de%CC%82%CC%81n-king-shoes-authenti-hcm-6.png" alt="">
                        </a>
                    </div>
                    <div class="header_nav-menu d-flex justify-content-center" style="width: 55%;">
                        <ul class="nav-list d-flex align-items-center ">
                            <li class="nav-item"><a href="TrangChu.php" class="nav_item-link">
                                    Giới Thiệu
                                </a>

                            </li>

                            <?php
                            while ($row = mysqli_fetch_assoc($dsLSP)) {
                                $maLoai = $row["ma_loai_san_pham"];
                                $tenLoai = $row["ten_loai"];
                            ?>
                                <li class="nav-item"><a href="ChiTietSanPhamTheoLoai.php?maloai=<?php echo $maLoai ?>" class="nav_item-link">
                                        <?php echo $tenLoai ?>
                                    </a>

                                </li>

                            <?php
                            }
                            ?>

                            <!-- <li class="nav-item"><a href="" class="nav_item-link">
                                AdiDas
                            </a></li>
                            <li class="nav-item"><a href="" class="nav_item-link">
                                Jordan
                            </a></li>
                            <li class="nav-item"><a href="" class="nav_item-link">
                                Yeezy
                            </a></li>
                            <li class="nav-item"><a href="" class="nav_item-link">
                                    
                            </a></li>
                            <li class="nav-item"><a href="" class="nav_item-link">
                                Phụ Kiện Giày
                            </a></li> -->

                        </ul>
                    </div>
                    <div class="header_nav-function  d-flex align-items-center justify-content-end" style="width: 30%;">
                        <form action="" class="form-control d-flex align-items-center mg-lr-header w-50 position-relative">
                            <input type="text" placeholder="Tìm kiếm...." class="border-0 custum-input w-100">
                            <button class="custum-btn">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                        <div class="cart-func mg-lr-header">

                            <?php
                            if (isset($_SESSION['cart'])) {
                            ?>
                                <a href="./ChiTietGioHang.php">
                                    <i class="bi bi-cart"></i>
                                    <span class="cart-count" style="font-size: 12px;"><?php echo count($_SESSION['cart']) ?></span>
                                </a>


                            <?php

                            } else {
                            ?>
                                <a href="./ChiTietGioHang.php">
                                    <i class="bi bi-cart"></i>
                                    <span class="cart-count" style="font-size: 12px;">0</span>
                                </a>

                            <?php
                            }
                            ?>




                        </div>
                        <div class="login-register mg-lr-header" style="font-size: 14px; position: relative;">

                            <?php
                            if (isset($_SESSION["dangNhap"])) {
                            ?>
                                <a href="#" class="">
                                    <?php echo $_SESSION['dangNhap']['ten_khach_hang'] ?>
                                </a>
                                <?php
                                if ($_SESSION['dangNhap']['quyen'] == "Admin") {
                                ?>
                                    <div class="header_sub-nav" style="top: 24px">
                                        <ul class="sub_nav" style="padding: 20px;">
                                            <li class="sub_nav-item">
                                                <a href="/User/capNhatTtAccount" class="sub_nav-link">Tài Khoản</a>
                                            </li>
                                            <li class="sub_nav-item">
                                                <a href="./QL_ADMIN/TrangChu.php" class="sub_nav-link">Admin</a>
                                            </li>

                                            <li class="sub_nav-item">
                                                <a href="./dangXuat.php" class="sub_nav-link">Đăng Xuất</a>
                                            </li>
                                        </ul>
                                    </div>

                                <?php
                                }
                                else{
                                    ?>
                                    <div class="header_sub-nav" style="top: 24px">
                                        <ul class="sub_nav" style="padding: 20px;">
                                            <li class="sub_nav-item">
                                                <a href="/User/capNhatTtAccount" class="sub_nav-link">Tài Khoản</a>
                                            </li>
                                            <li class="sub_nav-item">
                                                <a href="./dangXuat.php" class="sub_nav-link">Đăng Xuất</a>
                                            </li>
                                        </ul>
                                    </div>


                                    <?php
                                }


                                ?>

                            <?php

                            } else {
                            ?>
                                <a href="./NguoiDung.php" class="">Đăng Nhập</a>
                            <?php
                            }
                            ?>


                        </div>


                    </div>

                </div>
            </nav>


        </header>
        <hr>