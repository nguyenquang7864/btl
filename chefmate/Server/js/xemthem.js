document.addEventListener('DOMContentLoaded', function() {
    const recipeGrid = document.getElementById('recipeGrid');
    const loadMoreButton = document.getElementById('loadMoreButton');
    let offset = 12; // Số công thức đã hiển thị ban đầu


    loadMoreButton.addEventListener('click', function() {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                const newRecipes = this.responseText;
                recipeGrid.insertAdjacentHTML('beforeend', newRecipes);
                offset += 12; // Tăng số công thức đã hiển thị
            }
        };
        xhr.open('GET', `xemthemcongthuc.php?offset=${offset}`, true);
        xhr.send();
    });
});
