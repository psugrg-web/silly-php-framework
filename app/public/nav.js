const primaryNav = document.querySelector('.primary-nav');
const navToggle = document.querySelector('.primary-nav-toggle');
const body = document.getElementsByTagName('body');

navToggle.addEventListener('click', () => {
    const visibility = primaryNav.getAttribute('data-visible');

    if (visibility === "false") {
        primaryNav.setAttribute('data-visible', true);
        body[0].classList.add('primary-nav-scroll-disable');
    }
    else {
        primaryNav.setAttribute('data-visible', false);
        body[0].classList.remove('primary-nav-scroll-disable');
    }
});