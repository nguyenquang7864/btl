<div class="quanlitaikhoan">

<link rel="stylesheet" href="../../css/quanlitaikhoan.css">
        <?php
            require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
                if (!empty($_POST['id'])) {
                    $id = $_POST['id'];
            
                    $delete_query = "DELETE FROM tai_khoan WHERE id = ?";
                    $stmt = $conn->prepare($delete_query);
                    if (!$stmt) {
                        die("Prepare failed: " . $conn->error);
                    }
            
                    $stmt->bind_param("i", $id);
            
                    if ($stmt->execute()) {
                        echo "Người dùng đã được xóa thành công.";
                    } else {
                        echo "Lỗi khi xóa người dùng: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Không có ID người dùng được cung cấp.";
                }
            }
            

            $sql = "SELECT id, full_name, nick_name, gmail, phone FROM tai_khoan";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $full_name = $row['full_name'];
                    $nick_name = $row['nick_name'];
                    $gmail = $row['gmail'];
                    $phone = $row['phone'];

                    echo '<div class="nguoi-dung">';
                    echo "<p>ID: $id</p>";
                    echo "<p>Tên đầy đủ: $full_name</p>";
                    echo "<p>Nick name: $nick_name</p>";
                    echo "<p>Email: $gmail</p>";
                    echo "<p>Số điện thoại: $phone</p>";

                    // Form để xóa người dùng
                    echo "<form method='POST' action='quanlitaikhoan.php'>";
                    echo "<input type='hidden' name='id' value='$id'>";
                    echo "<button type='submit' name='delete_user'>Xóa tài khoản</button>";
                    echo "</form>";

                    echo '</div>';
                }
            } else {
                echo "Không có người dùng nào.";
            }

            ?>




</div>

