document.getElementById("Pedir_Dat").addEventListener("submit",(e)=>{
    e.preventDefault();
    let data = new FormData(document.getElementById("Pedir_Dat"));
    fetch('./php/ventas_altas.php',{
        method: "POST",
        body: data
    })
    .then((res)=>{
        return res.text();
    })
    .then((res1)=>{
        swal.fire(res1);
    })
    .catch((err)=>{
    console.log(err);
    });
});