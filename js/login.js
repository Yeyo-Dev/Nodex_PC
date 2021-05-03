// document.addEventListener("load",()=>{
//     fetch("./php/sesion.php")
//     .then((res)=>{
//         return res.text();
//     })
//     .then((res1)=>{
//         console.log(res1)
//         if (res1 == 'true') {
//             window.location.href = "./index.html";       
//         }else if(res1 == 'error'){
//             console.log("error");
//         }
//     })
//     .catch((err)=>{ 
//         console.log(err);
//     });
// });

let form = document.getElementById('FRMLogin');
form.addEventListener('submit',function(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    fetch("./php/addsession.php",{
        method:"POST",
        body: data
    })
    .then((res)=>{return res.text()})
    .then((res)=>{
        if (res == 'Usuario no encontrado') {
            
            document.getElementById("error").innerHTML = res.text();
            document.getElementById("error").removeAttribute('hidden');
            document.getElementById("error").style.marginBottom = "2px";
            document.getElementById("password").style.marginBottom = "0px";
            document.getElementById("password").value = "";
            document.getElementById("user").value = "";
        }else if(res == 'Usuario encontrado'){
            window.location.href = "./index.html"; 
        }else{
            console.log("Error");
            console.log(res);
        }
    })
    .catch((err)=>{
        console.log(err);
        document.getElementById("error").removeAttribute('hidden');
        document.getElementById("error").innerHTML = "Usuario no encontrado";
        document.getElementById("error").style.marginBottom = "2px";
        document.getElementById("password").style.marginBottom = "0px";
        document.getElementById("password").value = "";
        document.getElementById("user").value = "";
    });
});

