<?php
include '../share/headerAdmin.php';
include '../Config/config.php';

$query_LayHoaDon = "SELECT ma_don_hang, ten_khach_hang, ngay_dat_hang, phuong_thuc_thanh_toan, trang_thai, tong_tien FROM donhang,khachhang WHERE donhang.ma_khach_hang=khachhang.ma_khach_hang";

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $query_LayHoaDon .= " AND (ma_don_hang LIKE '%$keyword%' OR ten_khach_hang LIKE '%$keyword%' OR ngay_dat_hang LIKE '%$keyword%' OR phuong_thuc_thanh_toan LIKE '%$keyword%' OR trang_thai LIKE '%$keyword%' OR tong_tien LIKE '%$keyword%')";
}
$dsHoaDon = mysqli_query($conn, $query_LayHoaDon);

if (isset($_POST['ma_don_hang'])) {
    $ma_don_hang = $_POST['ma_don_hang'];
    $query_cthd = "SELECT ma_don_hang,url_anh,ten_san_pham,so_luong,sanpham.gia FROM mathangtrongdonhang,sanpham   WHERE mathangtrongdonhang.ma_san_pham=sanpham.ma_san_pham and ma_don_hang = '$ma_don_hang'";
    $dsCTHoaDon = mysqli_query($conn, $query_cthd);
}
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
        <p class="title">Quản Lý Hóa Đơn</p>
    </div>
    <div class="menu-function">
        <ul>
            <form method="POST">
            <li>
                
                    <input type="text" style="margin-right: 12px; padding: 20px; height: 30px;"name="keyword" placeholder="Tìm kiếm...">
                    <button type="submit" style="width: 100px;color: #fff; background-image: linear-gradient(to right, #36D1DC 0%, #5B86E5 100%);">Tìm kiếm</button>
               
            </li> 
        </form>
        </ul>
    </div>
    <div class="table-content">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Mã Đơn Hàng</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Ngày Đặt Hàng</th>
                    <th scope="col">Phương Thức Thanh Toán</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Xem Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($dsHoaDon)) { ?>
                    <tr>
                        <td><?php echo $row['ma_don_hang']; ?></td>
                        <td><?php echo $row['ten_khach_hang']; ?></td>
                        <td><?php echo $row['ngay_dat_hang']; ?></td>
                        <td><?php echo $row['phuong_thuc_thanh_toan']; ?></td>
                        <td><?php echo $row['trang_thai']; ?></td>
                        <td><?php echo $row['tong_tien']; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="ma_don_hang" value="<?php echo $row['ma_don_hang']; ?>" />
                                <button type="submit" class="btn btn-primary btn-sm">Xem chi tiet don</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php if (isset($dsCTHoaDon)) { ?>
        <div class="table-content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã Đơn Hàng</th>
                        <th scope="col">Ảnh Sản Phẩm</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($dsCTHoaDon)) { ?>
                        <tr>
                            <td><?php echo $row['ma_don_hang']; ?></td>
                            <td><img style="width: 45px; height: 45px;" src="../Assets/img/img_SanPham/SanPham_adidas/<?php echo $row['url_anh'] ?>" alt=""></td>
                            <td><?php echo $row['ten_san_pham']; ?></td>
                            <td><?php echo $row['so_luong']; ?></td>
                            <td><?php echo $row['gia']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</main>
<?php include '../share/footerAdmin.php'; ?>
