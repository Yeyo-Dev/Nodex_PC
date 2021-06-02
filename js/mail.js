async function formMail(){
    const { value: datosCorreo } = await swal.fire({
        position: 'bottom-end',
        title: 'Email',
        html:
          '<input id="swal-nombre" class="swal2-input" type="" placeholder="Nombre">' +
          '<input id="swal-destinatario" class="swal2-input" type="" placeholder="Destinatario">' +
          '<input id="swal-asunto" class="swal2-input" type="" placeholder="Asunto">' +
          '<textarea id="swal-mensaje" rows="10" class="swal2-textarea" cols="50" placeholder="Mensaje"></textarea>',
        focusConfirm: false,
        preConfirm: () => {
          return {
            nombre: document.getElementById('swal-nombre').value,
            destinatario: document.getElementById('swal-destinatario').value,
            asunto: document.getElementById('swal-asunto').value,
            mensaje: document.getElementById('swal-mensaje').value
            }
        }
      })
      
      if (datosCorreo) {
          //swal.fire(JSON.stringify(datosCorreo))
        console.log(datosCorreo);
        let data = new FormData();
        data.append("nombre",datosCorreo.nombre);
        data.append("destinatario",datosCorreo.destinatario);
        data.append("asunto",datosCorreo.asunto);
        data.append("mensaje",datosCorreo.mensaje);
        fetch("./php/mail.php",{
            method: "POST",
            body: data
        })
        .then((res)=> res.text())
        .then((res)=>{
          console.log(res);
          swal.fire(res);           
        })
        .catch((err)=>{
            swal.fire("Hubó un error");
            console.log(err);
        })
      }else{
        swal.fire("Mensaje cancelado");
      }
}