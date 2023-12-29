<div class="quanlibaiviet">

            <link rel="stylesheet" href="../../css/quanlibaiviet_.css">
            <?php
            require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_post'])) {
                if (!empty($_POST['id_bai_viet'])) {
                    $id_bai_viet = $_POST['id_bai_viet'];

                    // Chuẩn bị truy vấn xóa bài viết bằng Prepared Statement
                    $delete_query = "DELETE FROM bai_viet WHERE id_bai_viet = ?";
                    $stmt = $conn->prepare($delete_query);

                    // Bind tham số
                    $stmt->bind_param("i", $id_bai_viet);

                    // Thực thi truy vấn
                    if ($stmt->execute()) {
                        echo "Bài viết đã được xóa thành công.";
                    } else {
                        echo "Lỗi khi xóa bài viết: " . $conn->error;
                    }
                    $stmt->close();
                } else {
                    echo "Không có ID bài viết được cung cấp.";
                }
            }

            $sql = "SELECT id_bai_viet, hinh_bai_viet, tieu_de, gioi_thieu FROM bai_viet";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id_bai_viet = $row['id_bai_viet'];
                    $hinh_bai_viet = $row['hinh_bai_viet'];
                    $tieu_de = $row['tieu_de'];
                    $gioi_thieu = $row['gioi_thieu'];

                    echo '<div class="bai-viet">';

                    echo "<form method='POST' action='quanlibaiviet.php'>";
                    echo "<input type='hidden' name='id_bai_viet' value='$id_bai_viet'>";
                    echo "<button type='submit' name='delete_post'>Xóa</button>";
                    echo "</form>";
                    echo "<img src='$hinh_bai_viet' alt='$tieu_de'>";
                    echo "<h2>$tieu_de</h2>";
                    echo "<p>$gioi_thieu</p>";

                    // Form để xóa bài viết

                    echo '</div>';
                }
            } else {
                echo "Không có bài viết nào.";
            }

            $conn->close();
            ?>


</div>