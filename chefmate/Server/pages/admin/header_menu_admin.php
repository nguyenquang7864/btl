<link rel="stylesheet" href="/chefmate/Server/css/header_menu.css">
<div class="header">

        <div id="logo">
            <img src="../../image/logo_chefmate.jpg" alt="logo">
        </div>

        <div id="header_tool">

            <div id="title_user">

                <div id="title">
                    <h1>Cộng đồng yêu ẩm thực CHEFMATE!</h1>
                </div>

                <div class="user">
                    <p id="hi">Xin chào _</p>
                    

                    <?php
                    // Kết nối đến cơ sở dữ liệu
                    require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

                    // Bắt đầu session để sử dụng biến session
                    session_start();

                    // Kiểm tra nếu biến session đã được đặt và có dữ liệu
                    if(isset($_SESSION['full_name']) && !empty($_SESSION['full_name'])) {
                        // Sử dụng biến session để hiển thị tên người dùng
                        echo "<p id='name'>" . $_SESSION['full_name'] . "</p>";
                    }
                    ?>
                    
                    <a href="../logout.php"><img src="../../image/image_header_menu/logout.png" alt="logout"></a>
                </div>
                
            </div>

            <div id="menu">
                    
                    <a href="duyetbaiviet.php">Duyệt bài viết</a>
                    <a href="../admin/taobaiviet.php">Thêm bài viết</a>
                    <a href="quanlibaiviet.php">Quản lí bài viết</a>
                    <a href="quanlitaikhoan.php">Quản lí tài khoản</a>

            </div>

        </div>

</div>

    

