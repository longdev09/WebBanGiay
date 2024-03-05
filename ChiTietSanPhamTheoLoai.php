<?php 
    include "./share/header.php";
    include "./Config/config.php";
    include "./PhanTrang.php";


    // lay loai san pham

    $loaiSanPham = $_GET["maloai"];

    $querydsSPTheoLoai = "SELECT * FROM sanpham where ma_loai_san_pham = $loaiSanPham";

    $dsSanPhamTheoLoai = mysqli_query($conn, $querydsSPTheoLoai);



?>

<!-- <div class="main_content"> -->
            <div class="product_contents">
                
            </div>
            <div class="product-main">
                <div class="container-product">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="section_product">
                                 <div class="section_product-highlight " style="margin-bottom: 100px;">
                                    <div class="" style="display: flex; flex-wrap: wrap;">

                                        <?php 
                                            while($row  = mysqli_fetch_assoc($dsSanPhamTheoLoai))
                                            {
                                                    $maSP = $row["ma_san_pham"];
                                                    $ten_san_pham = $row["ten_san_pham"];
                                                    $mo_ta = $row["mo_ta"];
                                                    $gia = $row["gia"];
                                                    $url_anh = $row["url_anh"];
                                                    $kich_thuoc = $row["kich_thuoc"];
                                                    $mau_sac = $row["mau_sac"];
                                                    $so_luong_trong_kho = $row["so_luong_trong_kho"];
                                                    $ma_loai_san_pham = $row["ma_loai_san_pham"];
                                                ?>
                                                     <div class="product-item m-lg-3" style="width: 22%;">
                                                        <div class="product-loop d-flex bg-white flex-column text-center">
                                                            <div class="product-title">
                                                                <a class="prod-img" href="./XemChiTietSanPham.php?maSp=<?php echo $maSP?>">
                                                                    <img class="img-fluid w-100 h-100" src="Assets/img/img_SanPham/<?php echo $url_anh ?>">
                                                                </a>
                                                            </div>
                                                            <div class="product-sale">New</div>
                                                            <div class="product-details pt-3 container-fluid mb-3">
                                                                <h3>
                                                                    <a href="./XemChiTietSanPham.php?maSp=<?php echo $maSP?>" class="prod-text-detai text-uppercase">
                                                                        <?php echo $ten_san_pham?>
                                                                            <br>
                                                                    </a>
                                                                </h3>
                                                                
                                                                <div class="product-price">
                                                                    <!-- giá sau khi giam -->
                                                                    <span class="price"><?php echo number_format($gia).'₫'  ?></span>
                                                                    <!-- giá gốc -->
                                                                    <span class="price-del"><?php echo number_format($gia).'₫'  ?></span>
                                                                </div>
                                                                
                                                            </div>
                                                            <!-- <div class="product-action d-flex container-fluid">
                                                                <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                                                    <i class='bx bxs-cart-add' ></i>
                                                                    Thêm vào giỏ
                                                                </div>
                                                                
                                                            </div> -->
                                                        </div>        
                                                    </div>


                                            <?php
                                            }
                                            ?>  
                                    </div>    
                                 </div>

                                
                            </div>
                        </div>
                        <div class="phanTrang">

                            <a href=""></a><a href=""></a><a href=""></a><a href=""></a><a href=""></a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>














<?php 
    include "./share/footer.php"


?>