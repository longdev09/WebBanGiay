<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="./Assets/style/taikhoan.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./Assets/ThuVien/Toast/toastr.min.css">
    <meta name="viewport" content="width=device-width" />
    <title>@ViewBag.Title</title>

</head>

<body>
    <div class="main-user">
        <div class="user-body">

            <div class="item1">
                <div class="pill-1 rotate-45"></div>
                <div class="pill-2 rotate-45"></div>
                <div class="pill-3 rotate-45"></div>
                <div class="pill-4 rotate-45"></div>
            </div>
            <div class="item_2">
                <div class="item_s">
                    <div class="tab-list">
                        <div class="tab-login tab-item">
                            <h5>Đăng nhập</h5>
                        </div>
                        <div class="tab-register tab-item">
                            <h5>Đăng ký</h5>
                        </div>
                        <div class="line"></div>
                    </div>
                    <div class="tap-wrap">
                        <div class="tap-content">
                            <div class="tap-item">
                                <form id="dangNhap" method="post" class="tab-pane">
                                    <div class="form-login form-item">
                                        <h2 style="font-weight: 700; color: #36D1DC ;">Đăng Nhập</h2>
                                        <img src="./acses/img/img-logoAnh.png" class="img-logo img-fluid hover-img" alt="">
                                        <input type="email" placeholder="Email" name="emailDN">
                                        <input type="password" placeholder="Password" name="mkDN">
                                        <input type="submit" class="btn-login" value="Đăng nhập">
                                    </div>
                                </form>

                            </div>
                            <div class="tap-item">
                                <form id="dangKy" method="post" class="tab-pane">
                                    <div class="form-register form-item">
                                        <h2 style="font-weight: 700; color: #36D1DC">Đăng Ký</h2>
                                        <img src="./acses/img/img-logoAnh.png" class="img-logo img-fluid hover-img" alt="">
                                        <input type="text" placeholder="Tên của bạn" name="Name">
                                        <input type="email" placeholder="Email" name="Email">
                                        <input type="password" placeholder="Password" name="Password">
                                        <input type="password" placeholder="Nhập lại Password" name="Password2">
                                        <input type="submit" class="btn-login" value="Đăng Ký">
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!-- dang nhap - tao tai khoan hieu ung -->
    <script>
        const tapItems = document.querySelectorAll(".tap-item");
        const tapItemWidth = tapItems[0].offsetWidth;
        const tapContent = document.querySelector(".tap-content");
        const tabLogin = document.querySelector(".tab-login")

        const tabRegister = document.querySelector(".tab-register");

        const tabListLine = document.querySelector(".tab-list .line");
        var postionX = 0;

        tabListLine.style.left = tabLogin.offsetLeft + "px"
        tabListLine.style.width = tabLogin.offsetWidth + "px"
        tabLogin.addEventListener("click", function() {
            hand(1);
            tabListLine.style.left = this.offsetLeft + "px"
            tabListLine.style.width = this.offsetWidth + "px"
        });

        tabRegister.addEventListener("click", function() {
            hand(-1);
            tabListLine.style.left = this.offsetLeft + "px"
            tabListLine.style.width = this.offsetWidth + "px"
        });

        function hand(x) {
            if (x == 1) {
                postionX = postionX + tapItemWidth;
                tapContent.style = `transform: translateX(${postionX}px)`;

            }
            if (x == -1) {

                postionX = postionX - tapItemWidth;
                tapContent.style = `transform: translateX(${postionX}px)`;
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

    <!-- xu ly dang ky bang ajax -->
    <script>
        $("#dangKy").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: './XyLyDuLieu/xl_DangKy.php',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                   
                    if (response.status == 0) {
                        toastr["warning"]("Email đã tồn tại", "Thông Báo")
                    } else {
                        //console.log(response);

                        toastr["success"]("Đăng Kí Thành Công", "Thông Báo")
                        setTimeout(function() {
                            window.location.href = "./NguoiDung.php";
                        }, 1000)
                    }
                }
            })
        })
    </script>



    <!-- xu ly dang ky bang ajax -->
    <script>
        $("#dangNhap").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: './XyLyDuLieu/xl_DangNhap.php',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == 0) {
                        toastr["error"]("Email hoặc mật khẩu không đúng", "Thông Báo")

                    }
                    else if(response.status == -1)
                    {
                        toastr["error"]("Tài khoản bị khóa", "Thông Báo")
                    }
                    else  {
                        //console.log(response);

                        toastr["success"]("Đăng nhập thành công", "Thông Báo")
                        setTimeout(function() {
                            window.location.href = "./TrangChu.php";
                        }, 1000)
                    }
                }
            })
        })
    </script>
</body>

</html>