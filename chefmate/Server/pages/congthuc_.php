<link rel="stylesheet" href="/chefmate/Server/css/congthuc.css">
<div class="container">
        <h1>Danh sách công thức</h1>
        <div class="recipe-grid">
            <?php
            require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

            // Truy vấn dữ liệu từ bảng mon_an và giới hạn chỉ lấy tối đa 12 bản ghi
            $sql = "SELECT id_mon_an, ten_mon_an, hinh_mon_an FROM mon_an LIMIT 12";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Hiển thị thông tin của từng công thức
                    echo '<div class="recipe-item">';
                    echo '<img src="' . $row['hinh_mon_an'] . '" alt="' . $row['ten_mon_an'] . '">';
                    echo '<h3>' . $row['ten_mon_an'] . '</h3>';
                    echo '<a href="xemchitiet.php?id=' . $row['id_mon_an'] . '">Xem chi tiết</a>';
                    echo '</div>';
                }
            } else {
                echo "Không có công thức nào.";
            }
            $conn->close();
            ?>
        </div>
    </div>