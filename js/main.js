//----------------------- slide bình luận--------------------
let slider = document.querySelector('.slider-cmt-phu .slider-list-cmt-phu');
let items = document.querySelectorAll('.slider-cmt-phu .slider-list-cmt-phu .slider-item-cmt-phu');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider-cmt-phu .slider-dots-cmt-phu li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function () {
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function () {
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(() => { next.click() }, 3000);
function reloadSlider() {
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider-cmt-phu .slider-dots-cmt-phu li.active-phu');
    last_active_dot.classList.remove('active-phu');
    dots[active].classList.add('active-phu');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => { next.click() }, 5000);
}

dots.forEach((li, key) => {
    li.addEventListener('click', () => {
        active = key;
        reloadSlider();
    })
})
window.onresize = function (event) {
    reloadSlider();
};


// -----------------slide show ----------------
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-red", "");
    }
    x[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " w3-red";
}


//---------------------- mua ngay -----------------
const buy_nows = document.querySelectorAll('.js-buy-now')
const modal = document.querySelector('.js-modal')

const modalclose = document.querySelector('.js-modal-close')
const modalContinue = document.querySelector('.js-modal-continue')
const modalContainer = document.querySelector('.js-modal-container')
function hide_noti_cart() {
    modal.classList.remove('open')
}

function show_noti_cart() {
    modal.classList.add('open')
}


for (const buy_now of buy_nows) {
    buy_now.addEventListener('click', show_noti_cart)
}

modalclose.addEventListener('click', hide_noti_cart)
modal.addEventListener('click', hide_noti_cart)
modalContinue.addEventListener('click', hide_noti_cart)

modalContainer.addEventListener('click', function (event) {
    event.stopPropagation()
})