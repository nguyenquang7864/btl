<!DOCTYPE html>
<html>
<head>
    <title>Trang Đăng Ký Tài Khoản</title>
    <link rel="stylesheet" type="text/css" href="/chefmate/Server/css/dangky.css">
    <title>Đăng ký tài khoản</title>
</head>
<body>
    
    <div class="registration-container">
        <h2>Đăng Ký Tài Khoản</h2>
        <form class="registration-form"  method="POST" action="">

            <div class="form-group">
                <label for="full-name">Họ và Tên:</label>
                <input type="text" id="full-name" name="full-name" required>
            </div>
            <div class="form-group">
                <label for="new-username">Tên đăng nhập:</label>
                <input type="text" id="new-username" name="new-username" required>
            </div>
            <div class="form-group">
                <label for="new-password">Mật khẩu:</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <button type="submit" name="button">Đăng Ký</button>
            <a href="dangnhap.php" id="trolai">Quay về đăng nhập</a>

            
        </form>
    </div>
    <?php
    require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

    if (isset($_POST['button'])) {
        // Lấy dữ liệu từ form
        $full_name = $_POST['full-name'];
        $nick_name = $_POST['new-username'];
        $password = $_POST['new-password'];
        $phone = $_POST['phone'];
        $gmail = $_POST['email'];

        // Truy vấn SQL để kiểm tra nick name và số điện thoại đã tồn tại hay chưa
        $check_user_query = "SELECT * FROM tai_khoan WHERE nick_name='$nick_name' OR phone='$phone'";
        $result = $conn->query($check_user_query);

        if ($result->num_rows > 0) {
            // Tên đăng nhập hoặc số điện thoại đã tồn tại, không thực hiện thêm dữ liệu mới
            echo "<script>alert('Tên đăng nhập hoặc số điện thoại đã tồn tại')</script>";
        } else {
            // Tên đăng nhập và số điện thoại không tồn tại, thực hiện truy vấn chèn dữ liệu mới
            $sql = "INSERT INTO tai_khoan (full_name, nick_name, password, phone, gmail) VALUES ('$full_name', '$nick_name', '$password', '$phone', '$gmail')";

            // Thực hiện truy vấn và xử lý lỗi (nếu có)
            if ($conn->query($sql)) {
                echo "<script>alert('Đăng ký thành công')</script>";
            } else {
                echo "<script>alert('Đăng ký thất bại. Lỗi: " . mysqli_error($conn) . "')</script>";
            }
        }
    }
    ?>

</body>
</html>
