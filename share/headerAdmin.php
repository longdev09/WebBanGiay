<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <!-- gg font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="../Assets/style/adminPage.css" rel="stylesheet" />
    <link rel="stylesheet" href="./Assets/ThuVien/Toast/toastr.min.css">
    <title>@ViewBag.Title</title>
</head>
<body>
    <div class="grid-container">

        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">notifications</span>
                <span class="material-icons-outlined">email</span>
                <span class="material-icons-outlined">account_circle</span>
            </div>
        </header>
        <!-- End Header -->
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <span class="material-icons-outlined">inventory</span> ADMIN
                </div>
                <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <a href="../QL_ADMIN/Admin.php">
                        <span class="material-icons-outlined">dashboard</span> Dashboard
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="../QL_ADMIN/QL_sanPham.php">
                        <span class="material-icons-outlined">inventory_2</span> Quản Lý Sản Phẩm
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="../QL_ADMIN/QL_HoaDon.php">
                        <span class="material-icons-outlined">fact_check</span> Quản Lý Hóa Đơn
                    </a>
                </li>
                <li class="sidebar-list-item">
                    <a href="../QL_ADMIN/QL_Kh.php" >
                        <span class="material-icons-outlined">shopping_cart</span> Quản Lý Khách Hàng
                    </a>
                </li>
                
            </ul>
        </aside>
        <!-- End Sidebar -->

       

    
