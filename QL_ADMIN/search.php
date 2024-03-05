<?php
include '../Config/config.php';

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];

    // Câu truy vấn tìm kiếm
    $query = "SELECT ma_don_hang, ten_khach_hang, ngay_dat_hang, phuong_thuc_thanh_toan, trang_thai, tong_tien FROM donhang, khachhang WHERE donhang.ma_khach_hang = khachhang.ma_khach_hang AND (ma_don_hang LIKE '%$keyword%' OR ten_khach_hang LIKE '%$keyword%' OR ngay_dat_hang LIKE '%$keyword%')";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ma = $row["ma_don_hang"];
            $tenKH = $row["ten_khach_hang"];
            $ngayDat = $row["ngay_dat_hang"];
            $phuongThucTT = $row["phuong_thuc_thanh_toan"];
            $trangThai = $row["trang_thai"];
            $tongTien = $row["tong_tien"];

            echo "<tr>";
            echo "<td>" . $ma . "</td>";
            echo "<td>" . $tenKH . "</td>";
            echo "<td>" . $ngayDat . "</td>";
            echo "<td>" . $phuongThucTT . "</td>";
            echo "<td>" . $trangThai . "</td>";
            // echo "<td>" . $tongTien . "</td>";
            echo "<td>" . number_format($tongTien) . "₫" . "</td>";
            echo '<td><button type="button" class="btn btn-primary btn-sm chitietdon" data-ma="' . $ma . '">Xem chi tiết hóa đơn</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Không tìm thấy kết quả</td></tr>";
    }
} 
?>
