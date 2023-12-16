window.onload = function(){
    let urlHolder = window.location.href;
    var countryHolder = new URL(urlHolder).searchParams.get("country");

    let valuesHolder = [null,'Rome','NewYork','Maldives','London','Istanbul','Hawaii','Egypt','Dubai','Bali'];

    let indexHolder = valuesHolder.indexOf(countryHolder);

    // let temp = document.querySelectorAll('body > input');
    // for(var i=0;i<10;i++){
    //     console.log(temp[i].getAttribute('checked'));
    // }

    console.log(document.getElementById("check"+(indexHolder+1)));

    let checkConnector = document.getElementById("check"+(indexHolder+1));
    document.getElementById("check"+(indexHolder+1)).checked=true;
    // checkConnector.checked = true;

    //checkConnector.setAttribute('checked','');
    
    //window.location.reload();

};