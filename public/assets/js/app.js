(function(){
    const $menuToggle = document.querySelector('.menu-toggle');
    const $body = document.querySelector('body');
    $menuToggle.addEventListener('click', () => {
        $body.classList.toggle('hide-sidebar');
    });
})();


