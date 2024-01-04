document.addEventListener('DOMContentLoaded', function () {
    let sidebar = document.querySelector('.sidebar');
    let closeBtn = document.querySelector('#btn');
    let searchBtn = document.querySelector('.fas fa-search');
    
    closeBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        menuBtnChange();
    });

    searchBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        menuBtnChange();
    });

    function menuBtnChange() {
        if (sidebar.classList.contains('open')) {
            closeBtn.classList.replace('fas fa-bars', 'fas fa-bars-alt-right');
        } else {
            closeBtn.classList.replace('fas fa-bars-alt-right', 'fas fa-bars');
        }
    }
});