function exitSystem(){
    let Res = confirm("¿Estas seguro de querer salir del sistema?, se cerrara su sesion");
    if (Res){
        fetch('./php/closesession.php')
        .then(()=>{
            history.go(0);
        })
        .catch((err)=>{ 
            console.log(err);   

        });
    }
}