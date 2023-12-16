let CountryPhotos  = document.querySelectorAll('.slick-dots li');
let arrowPrev = document.getElementsByClassName('arrow-prev');
let arrowNext = document.querySelector('.arrow-next');
var indexHold = 0;

function changeDays(){
    // to remove the previous photo

    var src = document.querySelector('.slick-current , .slick-active');

    src.style["opacity"] = "0";
    src.style["z-index"] = "998";
    src.setAttribute('aria-hidden',"true");
    src.classList.remove('slick-current');
    src.classList.remove('slick-active');

    // to replace the photo removed

    src = document.querySelectorAll('.slick-list .slide');
    src[indexHold].style["opacity"] = "1";
    src[indexHold].style["z-index"] = "999";
    src[indexHold].setAttribute('aria-hidden',"false");
    src[indexHold].classList.add('slick-current');
    src[indexHold].classList.add('slick-active');
    
    // to remove the previous content

    src = document.querySelector('.draggable .slick-track .slick-current');
    src.setAttribute('aria-hidden',"true");
    src.classList.remove('slick-current');
    src.classList.remove('slick-active');

    // to replace the content removed previously

    src = document.querySelectorAll('.slide-content');
    src[indexHold+1].setAttribute('aria-hidden',"false");
    src[indexHold+1].classList.add('slick-current');
    src[indexHold+1].classList.add('slick-active');
    
}

CountryPhotos.forEach(btn => {
    btn.addEventListener('click' , ()=>{
        document.querySelector('.slick-dots .slick-active').classList.remove('slick-active');
        btn.classList.add('slick-active');

        // To get the button's value
        indexHold = btn.getAttribute('value')-1;
        changeDays();
    })
});

function changeDots(){
    // to make sure no invalid index accures
    if(indexHold > 8 ){
        indexHold = 0;
    }
    else if(indexHold < 0){
        indexHold = 8;
    }
    document.querySelector('.slick-dots .slick-active').classList.remove('slick-active');
    CountryPhotos[indexHold].classList.add('slick-active');
};

function Nextfunction(){
    indexHold++;
    changeDots();
    changeDays();
};
    

function Prevfunction(){
    indexHold--;
    changeDots();
    changeDays();
};