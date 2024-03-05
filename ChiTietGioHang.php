<?php

include "./share/header.php";

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
            <div class="detail_cart-left col-8">
                <table class="table align-middle">
                    <thead class="bg-light">
                        <tr style="color: #5B86E5">
                            <th>Mã</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Size</th>
                            <th>Tổng tiền</th>


                        </tr>
                    </thead>
                    <tbody id="detail_cart-body">

                    </tbody>
                </table>
            </div>
            <div class="detail_cart-right col-4" id="thongTinCTGioHang">
                <!-- <div class="cart-page-info">
                    <h1>Thông tin sản phẩm</h1>
                    <hr>
                    <div class="cart-page-subtitle">
                        <span>Tạm tính (1 sản phẩm)</span>
                        <span>21133₫</span>
                    </div>
                    <div class="cart-page-total">Phương thức thanh toán xe đươc chọn khi bạn đặt hàng</div>
                    <hr>

                    <div class="cart-page-checkout">
                        <a href="/DatHang/DatHang">
                            <button class="btn-pro-order-buying">ĐẶT HÀNG</button>
                        </a>

                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<?php
include "./share/footer.php"
?>

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
        loadGioHang();
        loadTTHoaDon();
    })

    function loadGioHang() {
        $.ajax({
            url: "./XyLyDuLieu/xl_GioHang.php?action=LayDsGioHang",
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if (response.status === 1) {
                    var tbodyDetail_cart_body = $('#detail_cart-body');
                    tbodyDetail_cart_body.empty();
                    var dsGio = response.sanPham;
                    console.log(dsGio);
                    for (var sanPham of dsGio) {
                        console.log(sanPham)
                        var formattedGia = numberWithCommas(sanPham.giaban);
                        var tongTien = numberWithCommas(sanPham.soLuong * sanPham.giaban);
                        var row = `
                            <tr>
                                <td>
                                    <button class="btn_edit" name="xoaSP" style="border: none;  background-color: #fff" data-id="${sanPham.maSP}" data-size = "${sanPham.size}">Xóa </button>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img style="width: 45px; height: 45px;" src="./Assets/img/img_SanPham/${sanPham.anh}" alt="">
                                        <div class="ms-3">
                                            ${sanPham.tensanpham}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    ${formattedGia + ' ₫'}
                                </td>
                                <td>
                                    ${sanPham.soLuong}
                                </td>
                                <td>
                                    ${sanPham.size}
                                </td>

                                <td>
                                    ${tongTien + ' ₫'}
                                </td>
                        </tr>
                            `
                        tbodyDetail_cart_body.append(row);


                    }

                }
            }



        })
    }

    function numberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }


    function loadTTHoaDon() {

        $.ajax({
            url: "./XyLyDuLieu/xl_GioHang.php?action=tongTienGioHang",
            type: "GET",
            dataType: 'json',
            success: function(response) {
                if (response.status === 1) {
                    var thongTinCTGioHang = $("#thongTinCTGioHang");
                    thongTinCTGioHang.empty();
                    var tongTien = numberWithCommas(response.tongTien);
                    var row = `
                        <div class="cart-page-info">
                            <h1>Thông tin sản phẩm</h1>
                            <hr>
                            <div class="cart-page-subtitle">
                                <span>Tạm tính (1 sản phẩm)</span>
                                <span>${tongTien + ' ₫'}</span>
                            </div>
                            <div class="cart-page-total">Phương thức thanh toán sẽ đươc chọn khi bạn đặt hàng</div>
                            <hr>
                            <div class="cart-page-subtitle">
                                <div class="product-order-quantity">
                                    <span>Tổng cộng</span> <span style="color: red; font-weight: bold;">${tongTien +' ₫'}</span>
                                </div>
                            </div>

                            <div class="cart-page-checkout">
                                <a href="./DangHang.php">
                                    <button class="btn-pro-order-buying">ĐẶT HÀNG</button>
                                </a>

                            </div>
                        </div>
                    
                    
                    `
                    thongTinCTGioHang.append(row);

                }



            }
        })

    }

    // xoa san pham

    $(document).on('click', "button[name='xoaSP']", function(event) {
        event.preventDefault();
        $.ajax({
            url: "./XyLyDuLieu/xl_GioHang.php?action=xoaSpGio",
            type: "post",
            dataType: "json",
            data: {
                maSP: $(this).data("id"),
                size: $(this).data("size")
            },
            success: function(response) {
                if (response.status === 1) {
                    loadGioHang();
                    loadTTHoaDon();
                    toastr["success"]("Xóa sản phẩm thành công !!", "Thông Báo")
                }


            }


        })
    })
</script>