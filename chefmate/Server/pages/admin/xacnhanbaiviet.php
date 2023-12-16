<?php
require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hinh_bai_viet = $_POST['hinh_bai_viet'];
    $gioi_thieu = $_POST['gioi_thieu'];
    $chi_tiet = $_POST['chi_tiet'];
    $id_bai_viet = $_POST['id_bai_viet'];

    if (isset($_POST['approve'])) {
        // Thực hiện xác nhận bài viết
        $sql_approve = "INSERT INTO bai_viet (tieu_de, hinh_bai_viet, chi_tiet, gioi_thieu) SELECT tieu_de, hinh_bai_viet, chi_tiet, gioi_thieu FROM bai_viet_cho_duyet WHERE id_bai_viet = '$id_bai_viet'";

        if ($conn->query($sql_approve) === TRUE) {
            // Xóa bài viết đã được xác nhận từ bảng bai_viet_cho_duyet
            $sql_delete = "DELETE FROM bai_viet_cho_duyet WHERE id_bai_viet = '$id_bai_viet'";
            $conn->query($sql_delete);
            echo "Bài viết đã được xác nhận!";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }

    if (isset($_POST['reject'])) {
        // Thực hiện từ chối bài viết
        $sql_reject = "DELETE FROM bai_viet_cho_duyet WHERE id_bai_viet = '$id_bai_viet'";
        if ($conn->query($sql_reject) === TRUE) {
            echo "Bài viết đã bị từ chối!";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}
?>
