


let form = document.getElementById("form");
let fname = document.getElementById("fname");
let lname = document.getElementById("lname")
let email = document.getElementById("email");
let errorBox = document.querySelector(".error");
let successBox = document.querySelector(".success");
let errorMsg = document.getElementById("errormsg");
let closeEbx = document.querySelector(".close");
let blurbox = document.querySelector(".b");
let checkUnsub = document.getElementById("unsub");
let checkSuspend = document.getElementById("suspend");
let checkDelInfo = document.getElementById("delinfo");

function changeBG(col){
    let b = document.getElementsByTagName("body")[0];
    if(col==='r'){
        b.style.background = "#b900fc";
        b.style.background = "linear-gradient(to top, #4eff03, #ff2003)";
    }else{
        b.style.background = "#fff";
    }
}

closeEbx.addEventListener('click',()=>{
    errorBox.classList.add("hide");
    blurbox.classList.add("hide");
    changeBG("w");
});

form.addEventListener('submit', (e)=>{
    
    
    let messages = [];
    //validating firstname
    if(fname.value==='' || fname.value==null || fname.value.length<2){
        messages.push("Please enter a valid first name.");
    }
    //validating lastname
    if(lname.value==='' || lname.value==null || lname.value.length<2){
        messages.push("Please enter a valid last name.");
    }

    if(email.value===''){
        messages.push("Please enter email.");
    } 
    
    if(!email.value===''){

        if( !((email.value.indexOf(".")>0)&&(email.value.indexOf("@")>0))  || 
        /[^a-zA-Z0-9.@_-]/.test.email.value){
            messages.push("Email is invalid.");
        }
    } 
    
    if(!checkUnsub.checked && !checkDelInfo.checked && !checkSuspend.checked){
        messages.push("Please select at least one global preference.");
    }

    if(messages.length>0){
        e.preventDefault(); 
        errorBox.classList.remove("hide"); 
        blurbox.classList.remove("hide");
        errorMsg.innerText = messages.join('\n');
        changeBG("r");
    }
    

});
