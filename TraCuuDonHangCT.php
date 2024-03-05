<?php

include "./share/header.php";
include "./Config/config.php";
    $mdh = $_GET["maHD"];
    $queryCTHD = "SELECT sanpham.ten_san_pham, sanpham.url_anh, mathangtrongdonhang.so_luong, mathangtrongdonhang.gia, mathangtrongdonhang.size FROM mathangtrongdonhang, sanpham WHERE mathangtrongdonhang.ma_san_pham = sanpham.ma_san_pham AND mathangtrongdonhang.ma_don_hang = $mdh";

    $resultCTHD = mysqli_query($conn, $queryCTHD);
?>

<style>
    hr {
        margin: 1rem 0;
        color: inherit;
        border: 0;
        border-top: 1px solid;
        opacity: .25;
    }

    .pro_name a {
        color: #6cd30ff2;
    }

    .pro_price a,
    .pro_sum a {
        color: red;
    }

    .btn_edit:hover {
        color: darkcyan;
    }

    .details_cart-main {
        padding: 20px;
    }

    .detail_cart-right {
        border-left: 1px solid #ececec;
    }

    .pro_name,
    .pro_delete {
        padding: 50px 0px !important;
        text-align: center;
    }

    .pro_sum,
    .pro_price {
        padding: 50px 0px !important;
    }

    .pro_img {
        width: 10%;
    }

    .pro_name {
        width: 30%;
        word-wrap: break-word;
    }

    .pro_img img {
        width: 100px;
    }



    .product-order-quantity {
        display: flex;
        padding: 27px 0px;
        width: 100%;
        justify-content: space-between;
    }

    .product-order-quantity button {
        font-size: 20px;
        width: 45px;
        height: 45px;
        border: none;
    }

    .product-order-quantity input {
        width: 40px;
        text-align: center;
        border: 1px solid #e9e4df;
    }

    .cart-page-info {}

    .cart-page-info h1 {
        font-size: 18px;
        margin-bottom: 16px;
    }

    .cart-page-subtitle {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2px;
    }

    .cart-page-total {
        color: #999;
        font-size: 13px;
    }

    .cart-page-checkout .btn-pro-order-buying {
        height: 45px;
        border: 1px solid rgb(122, 226, 153);
        width: 100%;
        font-weight: 600;
        background-color: #fff;
        margin-top: 50px;
        cursor: pointer;
    }

    .cart-page-checkout .btn-pro-order-buying:hover {
        background-color: rgb(122, 226, 153);
        color: #fff;
    }
</style>
<div class="details_cart-main">
    <div class="container">
        <div class="body_details-cart row">
            <div class="detail_cart-left col-9">
                <table class="table align-middle">
                    <thead class="bg-light">
                        <tr style="color: #5B86E5">
                            <th>Mã</th>
                            <th>Tên người nhận</th>
                            <th>SĐT</th>
                            <th>Địa chị</th>
                            <th>Ngày đặt</th>
                            <th>PT thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                            <th></th>


                        </tr>
                    </thead>
                    <tbody id="detail_body">

                    </tbody>
                </table>
            </div>
            <div class="order_body-right col-3">
                <div class="main_detail_receipt">
                    <div class="detail_receipt-body">
                        <div class="detail_receipt-item">
                            <h4>Đơn Hàng Của Bạn</h4>
                        </div>
                        <div class="detail_receipt_review">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th class="product_name">Sản Phẩm</th>
                                        <th class="product_total">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody id="dsCTHD"> 
                                    <?php
                                            
                                            
                                            $thangTien = 0;
                                            while ( $item = mysqli_fetch_assoc($resultCTHD)) {
                                                // $tong = $item["gia"] * $item["soLuong"];
                                                // $thangTien += $tong;
                                            ?>
                                            <tr>
                                                <td class="product_name">
                                                    <div class="d-flex align-items-center">
                                                        <img style="width: 45px; height: 45px;" src="./Assets/img/img_SanPham/<?php echo $item["url_anh"]?>" alt="">
                                                        <div class="ms-3">
                                                            <?php echo $item["ten_san_pham"]?>
                                                            <strong class="product-quantity">× <?php echo $item["so_luong"] ?></strong>
                                                            <strong class="product-quantity">size <?php echo $item["size"] ?></strong>
                                                        </div>

                                                    </div>
                                                    
                                                </td>
                                                <td style="text-align: end;"> 
                                                    <?php echo number_format($item["gia"]). '₫'?>
                                                </td>
                                            </tr>
                                            <?php       
                                            }

                                        ?>
                                </tbody>
                                
                            </table>
                            
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="./Assets/ThuVien/Toast/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "1000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>


<script>
$(document).ready(function() {
        loadDonHang();
    })
    function loadDonHang() {
        $.ajax({
            url: "./XyLyDuLieu/xl_DonHang.php?action=layDsDonHang",
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if (response.status === 1) {
                    var tbodyDonHang = $('#detail_body');
                    tbodyDonHang.empty();
                    var dsDonHang = response.dsdonHang;
                    for (var item of dsDonHang) {
                    

                        var row = `
                            <tr>
                                
                                <td>
                                    ${item.ma_don_hang}

                                </td> 
                                <td>
                                    ${item.hoTenNguoiNhan}

                                </td> 
                                <td>
                                    ${item.soDtNguoiNhan}

                                </td> 
                                <td>
                                    ${item.DiaChi}

                                </td> 
                                <td>
                                    ${item.ngay_dat_hang}

                                </td>
                                <td>
                                    ${item.phuong_thuc_thanh_toan}

                                </td>
                                <td>
                                    ${item.trang_thai}

                                </td>
                                <td>
                                    ${numberWithCommas(item.tong_tien)}

                                </td>
                                <td>
                                    <a  href="./TraCuuDonHangCT.php?maHD=${item.ma_don_hang}" class="btn_edit" name="xemCT" data-id="${item.ma_don_hang}" style="border: none;  background-color: #fff">Xem</a>
                                </td>  
                            </tr>
                            `
                        tbodyDonHang.append(row);


                    }

                }
            }



        })
    }

    function numberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }



</script>


<?php
    include "./share/footer.php"

?> 