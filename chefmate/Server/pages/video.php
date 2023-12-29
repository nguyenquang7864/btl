<link rel="stylesheet" href="../css/video.css">
<div class="video-grid">
    <?php
    require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

    $sql = "SELECT id_video, ten_video, link_video FROM video LIMIT 15";
    $result = $conn->query($sql);

    $video_count = 0; // Biến đếm số video trên mỗi hàng
    echo '<div class="video-row">'; // Bắt đầu một hàng mới

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ten_video = $row['ten_video'];
            $link_video = $row['link_video'];

            echo '<div class="video-item">';
            echo "<p>$ten_video</p>";
            echo "<div>$link_video</div>";
            echo '</div>';

            $video_count++;
            if ($video_count === 3) { // Nếu đã hiển thị 3 video
                echo '</div>'; // Kết thúc hàng
                echo '<div class="video-row">'; // Bắt đầu hàng mới
                $video_count = 0; // Đặt lại đếm cho hàng mới
            }
        }

        if ($video_count > 0) {
            // Nếu còn video trong hàng cuối cùng và không đủ 3 video, kết thúc hàng
            echo '</div>';
        }
    } else {
        echo "Không có video nào trong cơ sở dữ liệu.";
    }

    // Đóng kết nối
    $conn->close();
    ?>
</div>
