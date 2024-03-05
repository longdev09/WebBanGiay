


<?php

// xu ly dang ky tai khoan

include "../Config/config.php";

$ten = $_POST['Name'];
$email = $_POST['Email'];
$matKhau = $_POST['Password'];
$matKhau2 = $_POST['Password2'];


// lay cau truy van
$query = "SELECT * FROM `khachhang` WHERE email = '$email'";

$dsKhachHang = mysqli_query($conn, $query);

if ($dsKhachHang) {
    if ($dsKhachHang->num_rows > 0) {
        $response = array(
            "status" => 0,
            "message" => 'Khach Hang Toan Tai'
        );
    } else {
        $queryDangKi = "INSERT INTO khachhang (ten_khach_hang, dia_chi, so_dien_thoai, email, matKhau, `TinhTrang`, `quyen`) VALUES ('$ten', 'null', 'null', '$email', '$matKhau', 'Binh Thuong', 'Khach Hang')";

        $result = mysqli_query($conn, $queryDangKi);

        if ($result) {
            $response = array(
                "status" => 1,
                "message" => 'Dang ky thanh cong'
            );
        } else {
            $response = array(
                "status" => 0,
                "message" => 'Dang ky that bai'
            );
        }
    }
} else {
    $response = array(
        "status" => 0,
        "message" => 'Loi truy van'
    );
}

echo json_encode($response);

?>
