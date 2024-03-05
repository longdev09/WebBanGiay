
<?php
    include "./Config/config.php";
    include "./share/header.php";
    $query_LaySanPhamAdidas = "SELECT * FROM sanpham WHERE ma_loai_san_pham = 2 ORDER BY RAND() LIMIT 4";

    $dsSanPhamAdidas = mysqli_query($conn, $query_LaySanPhamAdidas);
   //unset($_SESSION["cart"]);

?>


<div class="main_content">
            <div class="content">
                <div class="slider_main" data-aos="fade-up"  data-aos-duration="2000">
                    <a href="">
                        <img src="./Assets/img/img_slider/img_sd_1.jpg" class="w-100 img-fluid" alt="">
                    </a>
                </div>

                <div class="section_commit " data-aos="fade-up"  data-aos-duration="2000">
                    <div class="row section-content align-items-center">
                        <div  class="col commit-item w-100 h-100">
                            <div class="commit-content">
                                <div class="commit-icon">
                                    <i class="bi bi-car-front"></i>
                                </div>
                                <div class="commit-tile text-center text-uppercase">
                                    <h4>FreeShip</h4>
                                </div>
                                <div class="commit-cmd">
                                    <p>Giao hàng
                                        tận nơi khắp các tỉnh thành trên cả nước</p>
        
                                </div>
                            </div>
                        </div>
                        <div  class="col commit-item w-100 h-100">
                            <div class="commit-content">
                                <div class="commit-icon">
                                    <i class="bi bi-arrow-repeat"></i>
                                </div>
                                <div class="commit-tile text-center text-uppercase">
                                    <h4>hoàn tiền 100%</h4>
                                </div>
                                <div class="commit-cmd">
                                    <p>Hoàn lại 100% tiền nếu không vừa ý hoặc lỗi từ nhà sản xuất (trong 7 ngày)</p>
        
                                </div>
                            </div>
                        </div>
                        <div  class="col commit-item w-100 h-100">
                            <div class="commit-content">
                                <div class="commit-icon">
                                    <i class="bi bi-chat-left-dots"></i>
                                </div>
                                <div class="commit-tile text-center text-uppercase">
                                    <h4>Hỗ trợ 24/7</h4>
                                </div>
                                <div class="commit-cmd">
                                    <p>Đội ngũ tư vấn viên, chăm sóc khách hàng luôn sẵn sàng hỗ trợ 24/7</p>
        
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- nike -->
                <div class="section_bg container-fluid" data-aos="fade-up"  data-aos-duration="2000">
                    <div class="row">
                        <div class="section_bg-text text-center p-4 p">
                           <h1 class="custum-h1" >Nike shoes - accompanying you to success</h1>
                           <p class="custum-sub-tile mb-3">More than just shoes: Nike is a symbol of sport, fashion, and culture</p>
                          <div class="section_bg-link">
                                <a href="" class="p-3"  >
                                    <span style="font-size: 18px;">NIKE <i class="bi bi-arrow-right-short m-lg-1"></i></span>
                                </a>
                          </div>
                          
                        </div>
                        <div class="section_bg-img  " >
                            <a href="" class="d-flex justify-content-center">
                                <img src="./Assets/img/img_bg/ing_bg-1.jpg" class=" w-75 img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <!-- adidas -->
                <div class="section_product" data-aos="fade-up"  data-aos-duration="2000">
                    <div class="section_bg-text text-center p-4 p">
                        <h1 class="custum-h1">Highlight Products of Adidas</h1>
                        <p class="custum-sub-tile mb-3">The following is a list of some of the standout products offered by Adidas</p>
                       <div class="section_bg-link">
                             <a href="ChiTietSanPhamTheoLoai.php" class="p-3"  >
                                 <span style=" font-size: 18px;"> ADIDAS <i class="bi bi-arrow-right-short m-lg-1"></i></span>
                             </a>
                       </div>
                     </div>
                     <div class="section_product-highlight " style="margin-bottom: 100px;">
                        <div class="slider-items container">


                            <?php 
                                while($row = mysqli_fetch_assoc($dsSanPhamAdidas))
                                {

                                    $ten_san_pham = $row["ten_san_pham"];
                                    $mo_ta = $row["mo_ta"];
                                    $gia = $row["gia"];
                                    $url_anh = $row["url_anh"];
                                    $kich_thuoc = $row["kich_thuoc"];
                                    $mau_sac = $row["mau_sac"];
                                    $so_luong_trong_kho = $row["so_luong_trong_kho"];
                                    $ma_loai_san_pham = $row["ma_loai_san_pham"];


                                    ?>
                                    <!-- code html -->
                                        <div class="product-item m-lg-3">
                                            <div class="product-loop d-flex bg-white flex-column text-center">
                                                <div class="product-title">
                                                    <a class="prod-img" href="">
                                                        <img class="img-fluid w-100 h-100" src="Assets/img/img_SanPham/<?php echo $url_anh ?>">
                                                    
                                                    </a>
                                                </div>
                                                <div class="product-sale">New</div>
                                                <div class="product-details pt-3 container-fluid mb-3">
                                                    <h3>
                                                        <a href="" class="prod-text-detai text-uppercase">
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
            
                <div class="section_bg container-fluid" data-aos="fade-up"  data-aos-duration="2000" >
                    <div class="row">
                        <div class="section_bg-text text-center p-4 p">
                           <h1 class="custum-h1" >Jordan Shoes: The Perfect Blend of Style and Performance</h1>
                           <p class="custum-sub-tile mb-3">History and Overview of the Jordan Brand and its Iconic Shoes</p>
                          <div class="section_bg-link">
                                <a href="" class="p-3"  >
                                    <span style="font-size: 18px;">JORDAN<i class="bi bi-arrow-right-short m-lg-1"></i></span>
                                </a>
                          </div>
                          
                        </div>
                        <div class="section_bg-img">
                            <a href="" class="d-flex justify-content-center">
                                <img src="./Assets/img/img_bg/ing_bg-2.jpg" class="w-75 img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
               


                <!-- San pham noi bat cua shop -->
                <div class="section_product" data-aos="fade-up"  data-aos-duration="2000">
                    <div class="section_bg-text text-center p-4 position-relative container">
                        <h1 class="custum-h1 section_bg-text_prduct">Highlight Products</h1>
                        <!-- <p class="custum-sub-tile mb-3">The following is a list of some of the standout products offered by Adidas</p> -->
                       <div class="section_bg-link">
                             <a href="" class="p-3"  >
                                 <span style=" font-size: 18px;">ALL <i class="bi bi-arrow-right-short m-lg-1"></i></span>
                             </a>
                       </div>
                     </div>
                     <div class="section_product-highlight " style="margin-bottom: 100px;">
                        <div class="container slider_product">
                            <div class="product-item m-lg-3 ">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/adidas-nmd-r1-metallic-gold-eg56651-king-shoes-sneaker-real-hcm-1624253101.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/fy9337-giay-ultraboost-4.0-chinh-hang-gia-tot-den-king-shoes-1.jpg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/gw2763-giày-adidas-sn1997-x-marimekko-chính-hãng-dến-king-shoes-1-1656581808.jpg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>

                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/adidas-falcon-pink-purple-bd78251-king-shoes-sneaker-real-hcm-1624253267.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/adidas-falcon-pink-purple-bd78251-king-shoes-sneaker-real-hcm-1624253267.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/adidas-falcon-pink-purple-bd78251-king-shoes-sneaker-real-hcm-1624253267.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/adidas-falcon-pink-purple-bd78251-king-shoes-sneaker-real-hcm-1624253267.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                        </div>    
                     </div>
                </div>




                <!-- Phu kien giay -->

                <div class="section_product" data-aos="fade-up"  data-aos-duration="2000">
                    <div class="section_bg-text text-center p-4 position-relative container">
                        <h1 class="custum-h1 section_bg-text_accessory">Accessory</h1>
                        <!-- <p class="custum-sub-tile mb-3">The following is a list of some of the standout products offered by Adidas</p> -->
                       <div class="section_bg-link">
                             <a href="" class="p-3"  >
                                 <span style=" font-size: 18px;">ALL <i class="bi bi-arrow-right-short m-lg-1"></i></span>
                             </a>
                       </div>
                     </div>
                     <div class="section_product-highlight " style="margin-bottom: 100px;">
                        <div class="container slider_product">
                            <div class="product-item m-lg-3 ">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_Accessory/bo-dung-dich-ve-sinh-giay-sneaker-the-thao-crep-protect-viet-nam-vn-1594093213--bappcihs.jpg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_Accessory/crep-insole-sport-lót-giày-thể-thao-king-shoes-sneaker-real-hcm-1624437717.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_Accessory/crep-mark-on-bút-tô-dế-giày-king-shoes-sneaker-real-hcm-1624438220.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>

                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_Accessory/CREP-PROTECT-CURE-B-kit-v-sinh-giy-king-shoes-sneaker-authentic-4.jpg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_Accessory/CREP-PROTECT-CURE-B-kit-v-sinh-giy-king-shoes-sneaker-authentic-4.jpg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_Accessory/insole-comfort021c7bc8bd374d9b87e8269b083be2f1master.jpg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                            <div class="product-item m-lg-3">
                                <div class="product-loop d-flex bg-white flex-column text-center">
                                    <div class="product-title">
                                        <a class="prod-img" href="">
                                            <img class="img-fluid w-100 h-100" src="./Assets/img/img_product-highlight/adidas/adidas-falcon-pink-purple-bd78251-king-shoes-sneaker-real-hcm-1624253267.jpeg"  >
                                           
                                        </a>
                                    </div>
                                    <div class="product-sale">New</div>
                                    <div class="product-details pt-3 container-fluid mb-3">
                                        <h3>
                                            <a href="" class="prod-text-detai text-uppercase">
                                                AIR MAX 90 LOVE LETTER
                                                    <br>
                                            </a>
                                        </h3>
                                        
                                        <div class="product-price">
                                            <!-- giá sau khi giam -->
                                            <span class="price">Giá: 179,000₫</span>
                                            <!-- giá gốc -->
                                            <span class="price-del">350,000₫</span>
                                        </div>
                                        
                                    </div>
                                    <div class="product-action d-flex container-fluid">
                                        <div class="add-cart rounded-3 p-1 text-white bg-dark  w-100 mb-2">
                                            <i class='bx bxs-cart-add' ></i>
                                            Thêm vào giỏ
                                        </div>
                                        
                                    </div>
                                </div>   
                                      
                            </div>
                        </div>    
                     </div>
                </div>
            </div>
</div>

<?php
    include "./share/footer.php"

?>