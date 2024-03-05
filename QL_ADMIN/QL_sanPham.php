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
        <p class="font-weight-bold">SẢN PHẨM</p>
    </div>
    <div class="main-content">
        <div class="menu-function">
            <form action="QL_sanPham.php" method="get">
                <ul>
                    <li><button id="themSanPham" style="color: #fff; background-image: linear-gradient(to right, #36D1DC 0%, #5B86E5 100%);"><a href="../QL_ADMIN/themsp.php">Thêm sản phẩm</a></button></li>
                    <li style="margin-left: 12px; display: flex">
                        <input name="txt_timkiem" type="text" style="margin-right: 12px; padding: 20px; height: 30px;">
                        <button name="timkiem" style="color: #fff; background-image: linear-gradient(to right, #36D1DC 0%, #5B86E5 100%);">Tìm kiếm</button>
                    </li>
                </ul>
            </form>
        </div>
        <div class="table-content">
            <table class="table align-middle">
                <thead class="bg-light">
                    <tr style="color: #5B86E5">
                        <th>Mã</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Kích thước</th>
                        <th>Màu sắc</th>
                        <th>SL</th>
                        <th>Hãng</th>
                        <th>Trình trạng</th>
                        <th>Chức năng</th>
                       
                    </tr>

                </thead>
<?php 
    include "../Config/config.php";
    if(isset($_GET["timkiem"]))
    {
        $tensp=$_GET["txt_timkiem"];
        $query_loaddanhsachsanpham = "SELECT ma_san_pham,ten_san_pham,mo_ta,gia,url_anh,kich_thuoc,mau_sac,so_luong_trong_kho,ten_loai,Tinh_Trang FROM sanpham,loaisanpham where sanpham.ma_loai_san_pham=loaisanpham.ma_loai_san_pham and ten_san_pham like '%$tensp%'";
        $dssp=mysqli_query($conn,$query_loaddanhsachsanpham);
    }
    else{
    $query_loaddanhsachsanpham = "SELECT ma_san_pham,ten_san_pham,mo_ta,gia,url_anh,kich_thuoc,mau_sac,so_luong_trong_kho,ten_loai,Tinh_Trang FROM sanpham,loaisanpham where sanpham.ma_loai_san_pham=loaisanpham.ma_loai_san_pham";
    $dssp=mysqli_query($conn,$query_loaddanhsachsanpham);
    }
?>                
                <tbody id="product">
                    <?php
                        while($row = mysqli_fetch_assoc($dssp))
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
                    ?>
                    <tr>
                            <td><?php echo $ma_san_pham ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img style="width: 45px; height: 45px;" src="../Assets/img/img_SanPham/<?php echo $url_anh?>" alt="">
                                    <div class="ms-3">
                                        <?php echo $ten_san_pham ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php echo $mo_ta ?>
                            </td>

                            <td>
                            <?php echo $gia ?>
                            </td>
                            <td>
                            <?php echo $kich_thuoc ?>
                            </td>
                            <td>
                            <?php echo $mau_sac ?>
                            </td>
                            <td>
                            <?php echo $so_luong_trong_kho ?>
                            </td>
                            <td>
                            <?php echo $ten_loai ?>
                            </td>
                            <td>
                            <?php echo $tinh_trang ?>
                            </td>
                            <td>
                            
                            <button class="btn btn-success"><a class="text-light" href="suasp.php?masp=<?php echo $ma_san_pham?>">Update</a></button>

                           
                            </td>


                        </tr>
                    <?php
                      }
                    ?>
                </tbody>
            </table>
            

        </div>
    </div>
</main>
<!-- End Main -->
<?php
include '../share/footerAdmin.php'
?>