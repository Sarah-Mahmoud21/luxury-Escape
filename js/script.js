let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn;
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn');
let temp;

window.onload = function(){
    let userMenu = document.querySelector('.user-container');
    if(!window.location.href.includes("index.php")){
        // If user has already logged in

        formBtn = document.querySelector('#user-btn');
        formBtn.addEventListener('click',()=>{
            if(userMenu.classList.contains('active')){
                userMenu.classList.remove('active');
            }
            else {
                userMenu.classList.add('active');
            }
        });
    } else {
        if(window.location.href.includes("InvalidPassword")){
            window.alert("Couldn't login, wrong password was entered!");
        }
        temp = document.querySelector('#bookTourBtn');
        formBtn = document.querySelector('#login-btn');
        formBtn.addEventListener('click', () =>{
            loginForm.classList.add('active');
        });
        searchBtn.addEventListener('click', () =>{
            searchBtn.classList.toggle('fa-times');
            searchBar.classList.toggle('active');
        });
        formClose.addEventListener('click', () =>{
            loginForm.classList.remove('active');
        });
        window.onscroll = () =>{
            loginForm.classList.remove('active');
        }
    }
};

window.onscroll = () =>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});



videoBtn.forEach(btn =>{
    btn.addEventListener('click',()=>{
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;
    });
});

var swiper = new Swiper(".review-slider", {
    spacebetween:20,
    loop:true,
});


