<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/chefmate/Server/css/dangnhap.css?v=2">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="login-container">
            <h2>Đăng Nhập</h2>
            <form class="login-form" action=" " method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" id="login-button">Đăng Nhập</button>
            <p><a href="quenmatkhau.php">Quên mật khẩu?</a></p>
            <p>Nếu bạn chưa có tài khoản, <a href="dangky.php">Đăng ký tại đây</a></p>
        </form>
    </div>
    <?php
// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

    // Lấy giá trị từ form đăng nhập
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
    $query = "SELECT * FROM tai_khoan WHERE nick_name='$username' AND password='$password'";
    $result = $conn->query($query);

    // Kiểm tra kết quả truy vấn
    if ($result->num_rows > 0) {
        // Lấy thông tin người dùng
        $user = $result->fetch_assoc();
        
        // Lấy tên của người dùng từ cơ sở dữ liệu
        $full_name = $user['full_name'];

        // Lưu thông tin người dùng vào session
        session_start();
        $_SESSION['id'] = $user['id']; // Lưu ID người dùng vào session
        $_SESSION['nick_name'] = $username; // Lưu nick_name người dùng vào session
        $_SESSION['full_name'] = $full_name; // Lưu full_name người dùng vào session
        
        // Kiểm tra quyền truy cập của người dùng
        if ($user['quyen_truy_cap'] == 0) {
            // Nếu quyền truy cập là 0, chuyển hướng đến trang index.php
            header("Location: index.php");
            exit();
        } elseif ($user['quyen_truy_cap'] == 1) {
            // Nếu quyền truy cập là 1, chuyển hướng đến trang admin.php
            header("Location: admin/admin.php");
            exit();
        }
    } else {
        // Thông báo lỗi nếu thông tin đăng nhập không đúng
        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác')</script>";
    }
    }
    ?>
<!-- Các phần còn lại của trang HTML -->


    
</body>
</html>