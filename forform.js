
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
    
    
    function onSend(e){
        e.preventDefault();
    const msgs=document.querySelector('.msgs');
    var n=document.querySelector('#name');
    var e=document.querySelector('#email')
    var m=document.querySelector('#msg');
    
        if(n.value === '' || e.value === ''||m.value === ''){
            msgs.innerhtml ='Your Message has been sent!'
    }
    else{
        
        msgs.innerhtml ='Your Message has been sent!'
        
    }
    }
    