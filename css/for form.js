
function onSubmit(e){
        e.preventDefault();
    const msg=document.querySelector('.msg');
    var F=document.querySelector('#FirstName');
    var O=document.querySelector('#OtherName')
    var E=document.querySelector('#Email');
    var P=document.querySelector('#PhoneNumber');
    var A=document.querySelector('#Area');
    var J=document.querySelector('#Job');
    var FI=document.querySelector('#File');
    var G=document.querySelector('#Gender');
        if(F.value === '' || O.value === ''||E.value === ''||P.value === ''||A.value === ''||J.value === ''||FI.value === ''||G.value === ''){
        msg.classList.add('poly')
        msg.innerHTML = 'Please enter all fields';
        setTimeout(() => msg.remove(),3000);
    }
    else{
        msg.classList.add('note')
        msg.innerhtml ='Your Application was successful!'
        setTimeout(() => msg.remove(),3000);
    }
    }
    
    