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
