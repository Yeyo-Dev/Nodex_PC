fetch("./php/sesion.php")
.then((res)=>{
    return res.text();
})
.then((res1)=>{
    console.log(res1)
    if (res1 == 'false') {
        window.location.href = "./login.html";       
    }else if(res1 == 'error'){
        console.log("error");
    }
})
.catch((err)=>{ 
    console.log(err);
    window.location.href = "./login.html";       

});