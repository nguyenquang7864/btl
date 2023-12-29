<link rel="stylesheet" href="../../css/taobaiviet.css?v=2">
<?php
        require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tieu_de = $_POST['tieude'];
            $gioi_thieu = $_POST['gioithieu'];
            $chi_tiet = $_POST['chitiet'];
            $hinh_bai_viet = $_POST['hinh_bai_viet'];

            // Kiểm tra xem các trường có rỗng không
            if (!empty($tieu_de) && !empty($gioi_thieu) && !empty($chi_tiet) && !empty($hinh_bai_viet)) {
                $sql = "INSERT INTO bai_viet (tieu_de, gioi_thieu, chi_tiet, hinh_bai_viet) VALUES ('$tieu_de', '$gioi_thieu', '$chi_tiet', '$hinh_bai_viet')";

                if ($conn->query($sql) === TRUE) {
                    echo "Thêm bài viết thành công!";
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            } else {
                echo "Vui lòng điền đầy đủ thông tin!";
            }
        }
?>


        <div class="taobaiviet">

            <h2>Tạo bài viết mới</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="tieude">Tiêu đề:</label><br>
            <input type="text" id="tieude" name="tieude"><br>

            <label for="gioithieu">Giới thiệu:</label><br>
            <textarea id="gioithieu" name="gioithieu" rows="4" cols="50"></textarea><br>

            <label for="chitiet">Chi tiết:</label><br>
            <textarea id="chitiet" name="chitiet" rows="8" cols="50"></textarea><br>

            <label for="hinh_bai_viet">Link hình ảnh:</label><br>
            <input type="text" id="hinh_bai_viet" name="hinh_bai_viet"><br>

            <input type="submit" value="Submit">

        </div>
        
    </form>