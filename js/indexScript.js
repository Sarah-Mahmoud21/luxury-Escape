formBtnIn2 =  document.querySelectorAll('.bookTourBtn');

bookTourBtn();

function bookTourBtn(){
    if(window.location.href.includes('index.php')){
        formBtnIn2.forEach(btn =>{
            btn.addEventListener('click',()=>{
               document.getElementById('login-btn').click();
            });
        });
    } else {
        let BookPForm = document.querySelector('.BookP-form-container');
        let form1Close = document.querySelector('#form1-close');
        
        // formBtnIn2.forEach(btn =>{
        //     btn.addEventListener('click', () =>{
        //         console.log(btn);
        //         BookPForm.classList.toggle('active');
        //     });
        // });
        
        form1Close.addEventListener('click', () =>{
            BookPForm.classList.remove('active');
        });
    }
}

function bookNow(id){
    let BookPForm = document.querySelector('.BookP-form-container');
    BookPForm.classList.toggle('active');
    document.getElementById('field').value=id;
    console.log(id);

}