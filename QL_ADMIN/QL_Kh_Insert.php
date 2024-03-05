<?php
include '../share/headerAdmin.php';
include '../Config/config.php';
if (isset($_POST["btnSubmit"])) {
    $ma_khach_hang = null;
    $ten_khach_hang = $_POST["txtName"];
    $dia_chi = $_POST["txtAddress"];
    $so_dien_thoai = $_POST["txtPhoneNum"];
    $email = $_POST["txtEmail"];
    $matKhau = $_POST["txtmk"];
    $kq = mysqli_query($conn, "insert into khachhang values('$ma_khach_hang','$ten_khach_hang','$dia_chi','$so_dien_thoai','$email','$matKhau','Binh Thuong')");
    if ($kq) {
        $tb = "them khach hang thanh cong";
    } else {
        $tb = "Them bi loi, xem lai";
    }
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
        <p class="font-weight-bold">Khách Hàng</p>
    </div>
    <div class="main-content">
        <div class="menu-function">
            <ul>
                <li style="margin-left: 12px; display: flex">
                        <input type="text" name="txt_Search" style="margin-right: 12px; padding: 20px; height: 30px;">
                        <button  name="btn_Search" style="color: #fff; background-image: linear-gradient(to right, #36D1DC 0%, #5B86E5 100%);">Tìm kiếm</button>
                </li>

            </ul>
        </div>
        <div class="menu-function"><ul><li><button style="color: #fff; background-image: linear-gradient(to right, #36D1DC 0%, #5B86E5 100%);"><a class="text-light" href ="QL_Kh_Insert.php" style="text-decoration: none;">Thêm Khách Hàng</a></button></li></ul></div>
        <div class="table-content">
            <h2 style="text-align: center;"> TRANG THEM KHACH HANG</h2>
            <form method="post" action="QL_Kh_Insert.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên Khách Hàng</label>
                    <input type="text" class="form-control" placeholder="Nhap ten khach hang" name="txtName" id="idName" required="required" />
                </div>

                <div class="form-group">
                    <label>Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Nhap dia chi khach hang" name="txtAddress" id="idAddress" required="required" />
                </div>
                <div class="form-group">
                    <label>Điện Thoại</label>
                    <input type="number" class="form-control" placeholder="Nhap dien thoai khach hang" name="txtPhoneNum" id="idPhone" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Nhap email khach hang" name="txtEmail" id="idEmail" required="required" />
                </div>
                <div class="form-group">
                    <label>Mật Khẩu</label>
                    <input type="text" class="form-control" placeholder="Nhap ghi chu" name="txtmk" id="idPassword" />
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnSubmit" >Create</button>
                    <button class="btn btn-primary" name="btnSubmit"> <a style="color: #fff; text-decoration: none; "  href="QL_Kh.php">Home</a></button>
                </div>
                <div form-group class="text-danger">
                    <?php
                    if ($tb != Null) {
                        echo $tb;
                    } else {
                        echo "";
                    }
                    ?>
                </div>
            </form>

        </div>
    </div>
</main>
<!-- End Main -->

<!-- Modal them san pham -->
<div class="modal fade" id="ThemSpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Đổi mật khẩu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" class="modal-body">

                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tenSP" name="tenSanPham" />
                </div>

                <div class="form-group">
                    <label>Hình</label>
                    <input type="file" class="form-control" id="hinh" disabled />
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" class="form-control" id="sl" name="soLuong" />
                </div>
                <div class="form-group">
                    <label>Đơn giá</label>
                    <input type="text" class="form-control" id="dg" name="gia" />
                </div>
                <!-- <div class="form-group">
                    <label>Mã loại</label>
                    <select class="form-select" id="loai_" aria-label="Default select example">
                        @foreach (var i in Model)
                        {
                            <option id="loai_" value="@i.MALOAI">@i.TenLoai</option>
                        }
                    </select>
                </div> -->
            </form>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="btnThemSP">Lưu</button>
            </div>
        </div>
    </div>
</div>

<?php
include '../share/footerAdmin.php'
?>