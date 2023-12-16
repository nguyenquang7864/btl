<link rel="stylesheet" href="/chefmate/Server/css/main.css">
<div id="main">
    <h2 id="st">Xin chào đến với Chefmate!</h2>
    <p id="gt">
        Chào mừng bạn đến với cộng đồng yêu ẩm thực Chefmate. Chúng tôi tạo ra trang web này với mục tiêu cung cấp một trải nghiệm tuyệt vời về ẩm thực và nấu ăn.
    </p>
    <p id="gt">
        Tại Chefmate, chúng tôi tin rằng việc nấu ăn không chỉ là một nhiệm vụ hàng ngày, mà còn là một nghệ thuật và niềm đam mê. Trang web của chúng tôi cung cấp cho bạn một loạt các công thức ngon, video hướng dẫn, và tin tức về xu hướng ẩm thực mới nhất. Hãy tham gia cùng chúng tôi để khám phá thế giới đa dạng của các món ăn, học cách nấu ăn và chia sẻ những trải nghiệm ẩm thực của bạn với cộng đồng. Chúng tôi rất vui mừng được có bạn ở đây.
    </p>
        
    <h2 id="st">Tin tức và bài viết</h2>

    <div class="news-container">
        <?php
        require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';
        $sql = "SELECT id_bai_viet , tieu_de, gioi_thieu, chi_tiet, hinh_bai_viet FROM bai_viet";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                echo '<div class="news-item">';
                echo '<div>';
                echo '<img src="' . $row['hinh_bai_viet'] . '" alt="Ảnh">';
                echo '</div>';
                echo '<div class="news-noi_dung">';
                echo '<div>';
                echo '<h4><a href="#">' . $row['tieu_de'] . '</a></h4>';
                echo '<p id="content-' . $row['id_bai_viet'] . '">' . $row['gioi_thieu'] . '</p>';
                echo '</div>';
                echo '<div class="news-content" style="display: none;">';
                echo '<p>' . nl2br($row['chi_tiet']) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $counter++;
            }
        
            if ($counter >= 5) {
                echo '<button id="view-more">Xem thêm</button>';
            }
        } else {
            echo "Không có bài viết nào trong cơ sở dữ liệu.";
        }
        
        ?>
        <!-- Các phần tử news-item còn lại -->
    </div>

    <h2>Video hướng dẫn nấu ăn đề xuất</h2>
    <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Q5V0uEkdTPg?si=U1UMbXMiFO8x6yXd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>
<script src="../js/baiviet.js"></script>
