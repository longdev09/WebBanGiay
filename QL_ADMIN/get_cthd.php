<?php
    include '../Config/config.php';

    $query_LayHoaDon = "SELECT ma_don_hang, ten_khach_hang, ngay_dat_hang, phuong_thuc_thanh_toan, trang_thai, tong_tien FROM donhang,khachhang WHERE donhang.ma_khach_hang=khachhang.ma_khach_hang";

    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $query_LayHoaDon .= " AND (ma_don_hang LIKE '%$keyword%' OR ten_khach_hang LIKE '%$keyword%' OR ngay_dat_hang LIKE '%$keyword%' OR phuong_thuc_thanh_toan LIKE '%$keyword%' OR trang_thai LIKE '%$keyword%' OR tong_tien LIKE '%$keyword%')";
    }
    $dsHoaDon = mysqli_query($conn, $query_LayHoaDon);

    // Xử lý hiển thị thông tin chi tiết hóa đơn
    if (isset($_POST['ma_don_hang'])) {
        $ma_don_hang = $_POST['ma_don_hang'];
        $query_cthd = "SELECT ma_don_hang, url_anh, ten_san_pham, so_luong, sanpham.gia FROM mathangtrongdonhang, sanpham WHERE mathangtrongdonhang.ma_san_pham = sanpham.ma_san_pham AND ma_don_hang = '$ma_don_hang'";
        $dsCTHoaDon = mysqli_query($conn, $query_cthd);

        if ($dsCTHoaDon) {
            if (mysqli_num_rows($dsCTHoaDon) > 0) {
                while ($row = mysqli_fetch_assoc($dsCTHoaDon)) {
                    $ma = $row["ma_don_hang"];
                    $tenSP = $row["ten_san_pham"];
                    $anh = $row["url_anh"];
                    $SL = $row["so_luong"];
                    $gia = $row["gia"];
                    echo "<tr>";
                    echo "<td>" . $ma . "</td>";
                    echo '<td><img style="width: 45px; height: 45px;" src="../Assets/img/img_SanPham/SanPham_adidas/' . $anh . '" alt=""></td>';
                    echo "<td>" . $tenSP . "</td>";
                    echo "<td>" . $SL . "</td>";
                    // echo "<td>" . $gia . "</td>";
                    echo "<td>" . number_format($gia) . "₫" . "</td>";
                    echo "</tr>";
                }
            } else {
                echo '<tr><td colspan="5">Không có dữ liệu chi tiết hóa đơn</td></tr>';
            }
        } else {
            echo '<tr><td colspan="5">Không có dữ liệu chi tiết hóa đơn</td></tr>';
        }
    }
?>