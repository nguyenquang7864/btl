document.addEventListener('DOMContentLoaded', function() {
    const newsContainers = document.querySelectorAll('.news-item');

    newsContainers.forEach(newsItem => {
        const title = newsItem.querySelector('h4 a');
        const content = newsItem.querySelector('.news-noi_dung .news-content');

        title.addEventListener('click', function(event) {
            event.preventDefault();
            
            if (content.style.display === 'none' || content.style.display === '') {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });
    });
});

var viewMoreButton = document.getElementById('view-more');
var newsContainer = document.querySelector('.news-container');

viewMoreButton.addEventListener('click', function() {
        // Xử lý sự kiện khi nhấn nút "Xem thêm"
        // Thực hiện hiển thị tất cả bài viết hoặc thêm bài viết mới vào DOM
        // Ví dụ:
        // Fetch dữ liệu từ cơ sở dữ liệu cho các bài viết còn lại
        // Thêm HTML mới cho các bài viết vào newsContainer
});

