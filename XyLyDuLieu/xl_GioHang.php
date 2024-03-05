<?php 

    session_start();
    

    function LayDsGioHang(){
        if(isset($_SESSION["cart"]))
        {
            $SPGio = $_SESSION["cart"];
            $response = array(
                'status' =>1,
                'sanPham' => $SPGio
            );
    
        }
        else{
            $response = array(
                'status' =>0,
                'sanPham' => "Không có sản phẩm nào"
            );
        }
        echo json_encode($response);
    
    }

    function tongTienGioHang(){
        if(isset($_SESSION["cart"]))
        {
            $SPGio = $_SESSION["cart"];
            $tongTien = 0;
            foreach($SPGio as  $item)
            {
                $tongTien +=  ($item["soLuong"]  * $item["giaban"]);

            }
            $response = array(
                'status' =>1,
                'tongTien' => $tongTien
            );
    
        }
        else{
            $response = array(
                'status' =>0,
                'tongTien' => 0
            );
        }
        echo json_encode($response);
    }

    function xoaSpGio(){
        $maSP = $_POST["maSP"];
        $sizeSP = $_POST["size"];

        
        if(isset($_SESSION["cart"]))
        {
            foreach ($_SESSION['cart'] as $key => $cart_item) {
                if ($cart_item['maSP'] === $maSP && $cart_item['size'] === $sizeSP) {
                        unset($_SESSION['cart'][$key]);

                        $capNhatSession = $_SESSION["cart"];
                        $_SESSION["cart"] = array_values($capNhatSession);
                        $response = array(
                            'status' =>1,
                            'message' => "Xóa sản phẩm thành công"
                        );
                        echo json_encode($response);
                        return;
                    
                }
            }
       
    
        }
        

    }


    if(isset($_GET["action"]))
    {
        if ($_GET['action'] === 'LayDsGioHang') {
            LayDsGioHang();
        } 
        else if($_GET['action'] === 'tongTienGioHang') {
            tongTienGioHang();

        }
        else if($_GET['action'] === 'xoaSpGio') {
            xoaSpGio();

        }

        
        

    }

    




?>
