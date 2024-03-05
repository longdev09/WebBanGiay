<?php

// xu ly dang nhap tai khoan
session_start();


include "../Config/config.php";

$email = $_POST['emailDN'];
$matKhau = $_POST['mkDN'];


// lay cau truy van
$query = "SELECT * FROM khachhang WHERE email = '$email' AND matKhau = '$matKhau'";


$KtrDangNhap = mysqli_query($conn, $query);

if ( $KtrDangNhap && mysqli_num_rows($KtrDangNhap) > 0) {

    $row = mysqli_fetch_assoc($KtrDangNhap);

    if($row["TinhTrang"] == "Khoa")
    {
        $response = array(
            "status" => -1,
            "message" => 'Tài khoản bị khóa'
        );
    }
    else{
        $response = array(
            "status" => 1,
            "message" => 'Đăng nhập thành công'
        );
        $_SESSION["dangNhap"] = $row;
    

    } 
} else {
    $response = array(
        "status" => 0,
        "message" => 'Đăng nhập thất bại'
    );
}

echo json_encode($response);

?>
