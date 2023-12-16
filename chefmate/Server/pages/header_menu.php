<link rel="stylesheet" href="/chefmate/Server/css/header_menu.css">
<div class="header">

        <div id="logo">
            <img src="../image/logo_chefmate.jpg" alt="logo">
        </div>

        <div id="header_tool">

            <div id="title_user">

                <div id="title">
                    <h1>Cộng đồng yêu ẩm thực CHEFMATE!</h1>
                </div>

                <div class="user">
                    <p id="hi">Xin chào, </p>
                    

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
                    
                    <!-- Đây là một liên kết ảnh logout -->
                    <a href="logout.php"><img src="../image/image_header_menu/logout.png" alt="logout"></a>

                </div>
                
            </div>

            <div id="menu">
                <a href="index.php">Trang chủ</a>
                <a href="congthuc.php">Công thức</a>
                <a href="nhandip.php">Nhân dịp</a>
                <a href="sukien.php">Sự kiện ẩm thực</a>
                <a href="nhahangdexuat.php">Nhà hàng được đề xuất</a>
                <a id="new_stt" href="taobaiviet.php">Tạo bài viết</a>

                <form class="search">
                    <input type="search" name="search" id="search" placeholder="Tìm kiếm tên món ăn ...">
                    <input type="submit" id="submit" value="Tìm kiếm">
                </form>

            </div>

        </div>

</div>

    

