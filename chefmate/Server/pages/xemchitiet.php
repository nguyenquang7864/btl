<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết công thức</title>
    <link rel="stylesheet" href="../css/xemchitiet.css">
</head>
<body>
    <div class="container">
        <?php
        include("header_menu.php");

        require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

        // Kiểm tra xem có thông số id được chuyển đến từ URL không
        if (isset($_GET['id'])) {
            $id_mon_an = $_GET['id'];

            // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của món ăn
            $sql = "SELECT * FROM mon_an WHERE id_mon_an = $id_mon_an";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Hiển thị thông tin chi tiết của món ăn
                    echo '<h1>' . $row['ten_mon_an'] . '</h1>';
                    echo '<img src="' . $row['hinh_mon_an'] . '" alt="' . $row['ten_mon_an'] . '">';
                    echo '<h3>Nguyên liệu</h3>';
                    echo '<p>' . nl2br($row['nguyen_lieu']) . '</p>';
                    echo '<h3>Cách làm</h3>';
                    echo '<p>Cách làm: ' . nl2br($row['cach_lam']) . '</p>';

                    // Hiển thị các thông tin khác nếu cần
                }
            } else {
                echo "Không tìm thấy thông tin món ăn.";
            }
            $conn->close();
        } else {
            echo "Không có thông tin được chọn.";
        }

        include("footer.php");
        ?>
    </div>
</body>
</html>
