<?php

include "./share/header.php";



?>

<style>
    .order_main {
        padding: 50px;
    }


    .order_body-left {
        padding: 12px;
        box-shadow: 0 3px 6px -4px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);
        border-radius: 10px;
    }

    .product_total {
        text-align: right;
    }

    .product-price {
        text-align: right;
        color: red;
        font-size: 14px;
    }

    .main_detail_receipt {
        padding: 12px;
        box-shadow: 0 3px 6px -4px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);
        border-radius: 10px;
    }

    ul {
        list-style-type: none;
        padding-left: 0px !important;
    }

    .oder-contact {
        display: flex;
        flex-direction: column;
        padding: 10px;
    }

    .oder-contact input {
        padding: 5px;
    }
</style>


<div class="order_main">
    <div class="container">
        <div class="order_body row">
            <div class="order_body-left col-7">
                <div class="order_body-list ">
                    <div class="ordertitle">
                        <h4>Thông tin giao hàng</h4>
                    </div>
                    <div class="oder-contact">
                        <label for="">Họ Tên (*)</label>
                        <input type="text" id="ng">

                    </div>
                    <div class="oder-contact">
                        <label for="">Số Điện Thoại (*) </label>
                        <input type="text" id='sdtNh'>

                    </div>
                    <div class="oder-contact">
                        <label for="">Địa Chỉ (*) </label>
                        <input type="text" id="dc">

                    </div>

                </div>
            </div>
            <div class="order_body-right col-5">
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
                                <tbody> 
                                    <?php
                                        $dsdatHang = $_SESSION["cart"];
                                        $thangTien = 0;
                                         foreach ( $dsdatHang as $item) {
                                            $tong = $item["giaban"] * $item["soLuong"];
                                            $thangTien += $tong;
                                        ?>
                                        <tr>
                                            <td class="product_name">
                                                <div class="d-flex align-items-center">
                                                    <img style="width: 45px; height: 45px;" src="./Assets/img/img_SanPham/SanPham_adidas/<?php echo $item["anh"]?>" alt="">
                                                    <div class="ms-3">
                                                        <?php echo number_format($item["giaban"]).'₫'?>
                                                        <strong class="product-quantity">× <?php echo $item["soLuong"] ?></strong>
                                                        <strong class="product-quantity">size <?php echo $item["size"] ?></strong>
                                                    </div>

                                                </div>
                                                
                                            </td>
                                            <td style="text-align: end;"> 
                                                <?php echo number_format($tong). '₫'?>
                                            </td>
                                        </tr>
                                        <?php       
                                        }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tổng</th>
                                        <td class="product-price"><?php echo number_format($thangTien). '₫'?></td>
                                    </tr>
                                    <tr>
                                        <th>Giao hàng</th>
                                        <td style="font-size: 13px;">Giao hàng miễn phí</td>
                                    </tr>
                                    <tr>
                                        <th>Đơn vi vận chuyển</th>
                                        <td style="font-size: 13px;">Giao hàng tiết kiệm</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="payment">
                                <ul class="payment-list">
                                    <li class="payment-item">
                                        <input type="radio" name="pay" id="pay" value="TT khi nhận hàng"> Trả tiền mặt khi nhận hàng
                                    </li>
                                    <li class="payment-item">
                                        <input type="radio" name="pay" id="pay" value="Chuyển khoảng"> Chuyển khoảng
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div style="display: flex; justify-content: center;">
                        <button style="padding: 5px 37px; border: none;" id="DatHang">Đặt Hàng</button>
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
    $("#DatHang").click(function(event){

        event.preventDefault();

        var hoTenNguoiNhan = $("#ng").val();
        var soDienThoai = $("#sdtNh").val();
        var diaChi = $("#dc").val();
        var selectedSize = $('input[name="pay"]:checked').val();
        $.ajax({
            url: './XyLyDuLieu/xl_DonHang.php?action=them1HoaDon',
            type: 'post',
            data:{
                ht:hoTenNguoiNhan,
                sdt: soDienThoai,
                dc :diaChi,
                ptTT: selectedSize
            },
            dataType: 'json',
            success: function(response){
                if(response.status == 1){
                    toastr["success"]("Đặt hàng thành công", "Thông Báo")
                    setTimeout(function() {
                            window.location.href = "./TrangChu.php";
                        }, 1000)
                    
                }else
                {
                    if(response.status == 0){
                    toastr["success"]("Đặt hàng thất bại", "Thông Báo")
                    
                }
                }
            }


        })
    })

</script>

<?php
    include "./share/footer.php"

?> 


