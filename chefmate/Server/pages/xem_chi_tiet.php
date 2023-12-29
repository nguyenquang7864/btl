<div class="xem-chi-tiet">

<link rel="stylesheet" href="../css/xem_chi_tiet.css?v=2">
<?php

            // Kiểm tra xem có thông số id được chuyển đến từ URL không
            if (isset($_GET['id'])) {
                $id_mon_an = $_GET['id'];

                // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của món ăn
                $sql = "SELECT * FROM mon_an WHERE id_mon_an = $id_mon_an";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Hiển thị thông tin chi tiết của món ăn
                        echo '<h2 id = "tenmonan">' . $row['ten_mon_an'] . '</h2>';
                        echo '<img id="hinhmonan" src="' . $row['hinh_mon_an'] . '" alt="' . $row['ten_mon_an'] . '">';
                        echo '<h4>Nguyên liệu</h4>';
                        echo '<table id="nguyenlieu">';
            
                        // Chuyển chuỗi nguyên liệu thành mảng các nguyên liệu
                        $nguyen_lieu_arr = explode("\n", $row['nguyen_lieu']);
                        
                        // Hiển thị từng nguyên liệu là một hàng trong bảng
                        foreach ($nguyen_lieu_arr as $nguyen_lieu) {
                            echo '<tr><td>' . $nguyen_lieu . '</td></tr>';
                        }
                        


                        
                
                        // Chuyển chuỗi các bước cách làm thành mảng các bước
                        $cach_lam_arr = explode("\n\n", $row['cach_lam']);

                        // Hiển thị từng bước cách làm là một hàng trong bảng

                        
                        echo '<table>';
                        echo '<h4>Cách làm</h4>';
                        foreach ($cach_lam_arr as $buoc) {
                            echo '<tr><td>' . nl2br($buoc) . '</td></tr>';
                        }
                        echo '</table>';

                        // Hiển thị các thông tin khác nếu cần
                    }
                } else {
                    echo "Không tìm thấy thông tin món ăn.";
                }
                $conn->close();
            } else {
                echo "Không có thông tin được chọn.";
            }
?>


</div>
