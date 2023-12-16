<link rel="stylesheet" href="../../css.duyetbaiviet.css">
<?php
// Kết nối đến cơ sở dữ liệu
require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

// Truy vấn để lấy danh sách bài viết chờ duyệt từ bảng bai_viet_cho_duyet
$sql = "SELECT * FROM bai_viet_cho_duyet";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<h3>' . $row['tieu_de'] . '</h3>';
        echo '<p>' . $row['gioi_thieu'] . '</p>';
        // Hiển thị các thông tin khác về bài viết

        // Thêm nút để admin xác nhận hoặc từ chối bài viết
        echo '<form method="post" action="xacnhanbaiviet.php">';
        echo '<input type="hidden" name="id_bai_viet" value="' . $row['id_bai_viet'] . '">';
        echo '<input type="submit" name="approve" value="Xác nhận">';
        echo '<input type="submit" name="reject" value="Từ chối">';
        echo '</form>';

        echo '</div>';
    }
} else {
    echo "Không có bài viết nào đang chờ duyệt.";
}
$conn->close();
?>
