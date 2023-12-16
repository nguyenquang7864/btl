<?php
    require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
        $keyword = $_GET['search'];

        $sql = "SELECT id_mon_an, ten_mon_an, hinh_mon_an FROM mon_an WHERE ten_mon_an LIKE '%$keyword%' OR nguyen_lieu LIKE '%$keyword%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="container">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="recipe-item">';
                echo '<img src="' . $row['hinh_mon_an'] . '" alt="' . $row['ten_mon_an'] . '">';
                echo '<h3>' . $row['ten_mon_an'] . '</h3>';
                echo '<a href="chi_tiet_cong_thuc.php?id=' . $row['id_mon_an'] . '">Xem chi tiết</a>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "Không tìm thấy kết quả.";
        }
        $conn->close();
    }
    ?>