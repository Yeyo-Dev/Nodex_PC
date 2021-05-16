
<?php
session_start();
$tabla = $_GET['tabla'];
error_reporting(0);
$ruta = "./php/consulta_". $tabla .".php";
if($tabla  == "empleados" || $tabla  == "usuarios" ){
    if($_SESSION['nivel'] == "user"){
        header("./index.html");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <script src="./js/sesion.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <style>
        body{
            background-color: whitesmoke;

        }
        .tarjeta{
            color: white;
            border-style: solid;
            border-radius: 5px;
            border-color: aqua;
            background-color: blue;
            margin: 2%;
            padding:1%;
            box-shadow: 2px 2px 10px rgb(38, 1, 8);
            width: 35%;
            height: auto;
            display: inline-block;
        }
        .tarjeta .img{
            width: 180px;
            height: 180px;
            border-style: solid;
            border-color: aqua;
            border-radius: 3px;
            background-color: whitesmoke;

        }
        .tarjeta img{
            max-height: 180px;
            max-width:180px;
            border-style: none;
            border-radius: 3px;
            display:block;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
            margin-bottom: auto;
        }
        .tarjeta table{
            width: 100%;
        }
        .b-form {
            margin-top: 8px;
            background-color: darkgray;
            width: 95%;
            padding-top: 10px;
            padding-bottom: 10px;
            box-shadow: 2px 2px 10px rgb(38, 1, 87);
        }
        .search {
            border-style: solid;
            border-radius: 3px;
            width: 45%;
            background-color: oldlace;
            color: darkblue;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-stretch: 3;
            font-size: 25px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        button{
            background-color: aqua;
            color: darkblue;
            padding: 3px;
            margin: 2%;
            border-style: none;
            border-radius: 5px;
        }
        .NR{
            color: red;
            weight: 3px;
        }
    </style>
</head>
<body>
<center>
    <form class="b-form" id="b-form">
        <a style="text-decoration: none; left: 97.5%; position: fixed; font-weight:4px; color:white; background-color:red; border-radius:50%; width: 15px; height: 15px; padding: 0.5%; box-shadow: 2px 2px 10px rgb(38, 1, 87);" href="javascript:window.history.back();">X</a>
        <input class="search" spellcheck="false" type="search" name="buscar" id="buscar" autocomplete="off" />
    </form>
</center>
<center>
        <div id="Consulta"> <center>
            <?php if(!file_exists($ruta)) { 
                echo "Error, tabla no localizada";
            }?></center>
        </div></center>
        <?php
        if(file_exists($ruta)) { ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <script>
            fetch("<?php echo $ruta; ?>")
            .then((res) => {
                return res.text();
            })
            .then((data1) => (document.getElementById("Consulta").innerHTML = `${data1}`))
            .then(()=>{gsap.from(".tarjeta",{duration: 1, opacity:0, y: 1810, stagger: 0.15});})
            .catch(function(error) {
                console.log(error);
            });
            
            let formulario2 = document.getElementById("b-form");
            let searcher = document.getElementById("buscar");

            formulario2.addEventListener("keyup", function(e) {
                e.preventDefault();
                consultar();                
            });
            
            window.onfocus = function() {
                consultar();
            }

            function consultar(){
                let datax = new FormData(formulario2); //Guarda los datos del formulario en la variable data
                fetch("<?php echo $ruta; ?>", {
                    method: "POST",
                    body: datax
                })
                .then((res) => {
                    return res.text();
                })
                .then((data1) => (document.getElementById("Consulta").innerHTML = `${data1}`))
                .then(()=>{gsap.from(".tarjeta",{duration: 1, opacity:0, y: 1810, stagger: 0.15});})
                .catch(function(error) {
                    console.log(error);
                });
            }

            async function eliminar(tabla, campo, id){
                let res = await checkPassword();
                if(res == 'true'){
                    let data = new FormData();
                    data.append('tabla',tabla);
                    data.append('campo',campo);
                    data.append('id',id);

                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                    title: '¿Esta seguro de eliminar este registro?',
                    text: "Se eliminara para siempre",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, borralo',
                    cancelButtonText: 'No, cancelalo',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        fetch("./php/eliminar.php", {
                            method: "POST",
                            body: data
                        })
                        .then((res) => {
                            return res.text();
                        })
                            .then((data1) => {
                                if (data1 == 'Registro Eliminado Permanentemente'){
                                swalWithBootstrapButtons.fire(
                                '¡Eliminado!',
                                'Registro ha sido eliminado con exito',
                                'success'
                                );
                                }else if (data1 == 'Error al Eliminar Registro'){
                                    swalWithBootstrapButtons.fire(
                                    'Error',
                                    'Error al Eliminar Registro',
                                    'error'
                                    )

                                }
                                consultar();
                            })
                            .catch(function(error) {
                                console.log(error);
                            });

                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'Tus registros estan seguros',
                        'success'
                        )
                    }
                    })

                }else if(res == 'false'){
                    swal.fire("Contraseña incorrecta","",'warning');
                }
            }

            async function checkPassword(){
                const { value: pass } = await Swal.fire({
                    title: 'Enter your password',
                    input: 'password',
                    inputLabel: 'Password',
                    inputPlaceholder: 'Introduzca su contraseña',
                    inputAttributes: {
                        maxlength: 35,
                        autocapitalize: 'off',
                        autocorrect: 'off'
                    }
                    })
                let data = new FormData();
                data.append("password", pass);
                let respuesta = await fetch("./php/checkPassword.php",{
                    method: "POST",
                    body: data
                })
                .then((res) => res.text())
                .catch((e) => {console.log(e)})
                return respuesta;
            }
            
            async function modificar(tabla, id) {
                let res = await checkPassword();
                    if(res == 'true'){
                        const a = document.createElement('a');
                        a.href = `./Modif/Form_${tabla}.php?id=${id}`;
                        a.target = '_blank';
                        a.click();
                    }else if(res == 'false'){
                        swal.fire("Contraseña incorrecta");
                    }
                
            }
            </script>
                    <script>   
                        function visualizarFoto(inputFile, outputFoto){
                            let file = document.getElementById(inputFile).files[0];
                            let img = URL.createObjectURL(file);
                            console.log(img);
                            document.getElementById('img-foto').setAttribute("src",img);
                        }
                </script>

       <?php }?>

</body>

</html>