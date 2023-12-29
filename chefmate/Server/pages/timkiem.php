<link rel="stylesheet" href="../css/timkiem.css">

<div class = "timkiem" >

<?php
require_once 'C:\xampp\htdocs\chefmate\Server\admin\config\connect.php';

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = $_GET['search'];

    // Sử dụng biến $search_query trong câu truy vấn SQL
    $sql = "SELECT id_mon_an, ten_mon_an, hinh_mon_an FROM mon_an WHERE ten_mon_an LIKE '%$search_query%' OR nguyen_lieu LIKE '%$search_query%'";

    $result = $conn->query($sql);



    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            echo '<div class="recipe-item">';
            echo '<img src="' . $row['hinh_mon_an'] . '" alt="' . $row['ten_mon_an'] . '">';
            echo '<h3>' . $row['ten_mon_an'] . '</h3>';
            echo '<a href="xemchitiet.php?id=' . $row['id_mon_an'] . '">Xem chi tiết</a>';
            echo '</div>';
        }


    } else {
        echo '<p class="search-message">Không có công thức nào phù hợp với từ khóa tìm kiếm.</p>';
    }

    
} else {
    
    ?>
            
    <?php
}
?>


</div>