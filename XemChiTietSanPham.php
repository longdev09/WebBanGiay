<?php
include "./share/header.php";


$maSP = $_GET["maSp"];
$query = "SELECT * FROM sanpham where ma_san_pham = $maSP";

$sp = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($sp);

$ten_san_pham = $row["ten_san_pham"];
$mo_ta = $row["mo_ta"];
$gia = $row["gia"];
$url_anh = $row["url_anh"];
$kich_thuoc = $row["kich_thuoc"];
$mau_sac = $row["mau_sac"];
$so_luong_trong_kho = $row["so_luong_trong_kho"];
$ma_loai_san_pham = $row["ma_loai_san_pham"];


$kt = explode(", ", $kich_thuoc);




?>


<div class="content-section">
    <div class="container">
        <div class="product-menu">
            <div class="product-menu-lists">
                <ol class="product-menu-list">
                    <li><a href="./index.html">Trang chủ / </a></li>
                    <li><a href="">Sản Phẩm / </a></li>
                </ol>
            </div>

        </div>

    </div>
    <div class="product-Details">
        <div class="container">
            <div class="row">
                <div class="col-md-5 product-gallery">
                    <div class="product-content-gallery">
                        <div class="product-gallery-img">
                            <img src="Assets/img/img_SanPham/<?php echo $url_anh ?>" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md product-detail">
                    <div class="product-content-detail">
                        <div class="row product-order">
                            <div class="product-order-heading">
                                <h1><?php echo $ten_san_pham ?></h1>
                                <h6>Tình trạng: Còn hàng</h6>
                            </div>
                            <div class="product-order-price">
                                <span class="pro-price-del">
                                    <?php echo number_format($gia) . '₫' ?>
                                </span>
                                <span class="pro-price">
                                    <?php echo number_format($gia) . '₫' ?>
                                </span>
                            </div>
                            <div class="product-order-size">
                                <div class="pro-size-text">
                                    Kích thước:
                                </div>
                                <div class=" pro-size-set">
                                    <form action="">

                                        <?php 
                                            foreach($kt as $value)
                                            {
                                             ?>
                                             <input type="radio" id="html" name="size_" value="<?php echo $value?>"> <?php echo $value?>
                                             <?php
                                            }

                                            ?>
                                        
                                    </form>

                                    <hr>
                                </div>

                            </div>
                            <div class="row product-order-actions">
                                <div class=" col-md-4 row product-order-quantity">
                                    <button onclick="clickDecrease()" type="button">-</button>

                                    <input type="text" class="quantity-input" min="1" value="1" id="result">
                                    <button onclick="clickIncrease()" type="button">+</button>
                                </div>
                                <div class="col-md porduct-order-buying">
                                    <button data-product-id = "<?php echo $maSP?>" id="addCart" class="btn-pro-order-buying" type="button">THÊM VÀO GIỎ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-description">
                        <!-- <div class="row product-des">
                            <div class="product-des-heading">
                                <span>THÔNG TIN SẢN PHẨM</span>
                            </div>
                            <div class="product-des-text">
                                <p>Chất vải: TERRY FABRIC (vải chân cua chất lượng cao)</p>
                                <p>+ Không đổ lông khi sử dụng</p>
                                <p>+ Độ dày vừa phải, đủ mát mẻ để mặc vào mùa hè và đủ ấm áp để mặc vào mùa
                                    đông</p>
                                <p>+ Không nhăn và không xuống màu, chấp mọi thể loại giặt máy, giặt tay, phơi
                                    nắng, phơi sương</p>
                                <p>Size M: &lt;1m65 &nbsp;&lt;60kg</p>
                                <p>Size M: &lt;1m65 &nbsp;&lt;60kg</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>

    </div>
    <hr>


</div>


<script>
    const header = document.querySelector('.header');
    const headercontacts = document.querySelector('.header-contacts');
    window.addEventListener("scroll", function() {

        var x = pageYOffset;
        // console.log(x)
        if (x > 20) {

            header.classList.add('close-header-wrapper');
            headercontacts.classList.add('close-heade-contacts');

        } else {

            header.classList.remove('close-header-wrapper');
            headercontacts.classList.remove('close-heade-contacts');
        }
    })

    // Tăng 
    var click = 1;

    function clickIncrease() {
        click += 1;
        document.getElementById("result").value = click;
    }
    //Giảm
    function clickDecrease() {
        if (click == 1)
            document.getElementById("result").value = 1;
        else {
            click -= 1;
            document.getElementById("result").value = click;
        }
    }

    // Dong mo dang nhap

    var headerAccDropdown = document.querySelector('.header-acc-dropdown');
    var iconHeaderList = document.querySelector('.icon-header-list');
    iconHeaderList.onclick = function OpenHeaderAccDropdown() {
        var isOpen = headerAccDropdown.clientHeight === 0;
        if (isOpen) {
            headerAccDropdown.classList.add('open-header-acc-dropdown');
        } else {
            headerAccDropdown.classList.remove('open-header-acc-dropdown');


        }
    }
</script>


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
    $("#addCart").click(function(event){
        event.preventDefault();
        var maSP = $(this).data("product-id");
        var soLuong =  $(".quantity-input").val();
        var selectedSize = $('input[name="size_"]:checked').val();

        $.ajax({
                url: './XyLyDuLieu/xlThemVaoGioHang.php',
                type: 'post',
                data: {
                    masanPham: maSP,
                    SL : soLuong,
                    size :selectedSize
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 0) {
                        toastr["error"]("Thêm sản phẩm thất bại", "Thông Báo")
                        
                        
                    } else {
                        toastr["success"]("Thêm sản phẩm thành công", "Thông Báo")
                        
                        setTimeout(function() {
                            window.location.href = window.location.href;
                        }, 1000)

                    }
                }
            })

    })

</script>



<?php
include "./share/footer.php"

?>