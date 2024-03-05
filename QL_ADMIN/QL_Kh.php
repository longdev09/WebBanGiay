    <?php
    include '../share/headerAdmin.php';
    include '../Config/config.php';
    $query_LayDSKhachHang = "SELECT * FROM `khachhang`";
    $dsKhachHang =  mysqli_query($conn, $query_LayDSKhachHang);
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
            
            <form method="get" action="QL_Kh_Search.php">
            <ul>
                <li style="margin-left: 12px; display: flex">
                    <input type="text" name="txt_Search" style="margin-right: 12px; padding: 20px; height: 30px;">
                    <button  name="btn_Search" style="color: #fff; background-image: linear-gradient(to right, #36D1DC 0%, #5B86E5 100%);">Tìm kiếm</button>
                </li>
            </ul>
            </form>
           
        </div>
        <div class="menu-function"><ul><li><button style="color: #fff; background-image: linear-gradient(to right, #36D1DC 0%, #5B86E5 100%);"><a class="text-light" href ="QL_Kh_Insert.php" style="text-decoration: none;">Thêm Khách Hàng</a></button></li></ul></div>
        <div class="table-content">
            <table class="table align-middle">
                <thead class="bg-light">
                    <tr style="color: #5B86E5">
                        <th>Mã</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>email</th>
                        <th>Mật khẩu</th>
                        <th>Trình trạng tài khoản</th>
                        <th>Chức năng</th>
                    </tr>

                </thead>
                <tbody id="product">
                    <?php
                        while ($row = mysqli_fetch_assoc($dsKhachHang))
                        {
                            ?>
                            <tr>
                            <td><?php echo $row["ma_khach_hang"]?></td>
                            <td><?php echo $row["ten_khach_hang"]?></td>
                            <td><?php echo $row["dia_chi"]?></td>
                            <td><?php echo $row["so_dien_thoai"]?></td>
                            <td><?php echo $row["email"]?></td>
                            <td><?php echo $row["matKhau"]?></td>
                            <td><?php echo $row["TinhTrang"]?></td>
                            <td>
						        <button class="btn btn-success"><a class="text-light" href ="QL_kh_Update.php?mkh=<?php echo $row["ma_khach_hang"]?>">Update</a></button>
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