
<?php

$tabla = $_GET['tabla'];
error_reporting(0);
$ruta = "./php/consulta_". $tabla .".php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
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
            width: 25%;
            height: 550px;
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
    </style>
</head>
<body>
<center>
    <form class="b-form" id="b-form">
        <input class="search" spellcheck="false" type="search" name="buscar" id="buscar" autocomplete="off" />
    </form>
</center>

        <div id="Consulta">
            <?php if(!file_exists($ruta)) { 
                echo "Error, tabla no localizada";
            }?>
        </div>
        <?php
        if(file_exists($ruta)) { ?>

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

            function eliminar(tabla, campo, id){
                let data = new FormData();
                data.append('tabla',tabla);
                data.append('campo',campo);
                data.append('id',id);
                let msg = confirm("¿Esta seguro de eliminar este registro?, se eliminara para siempre");
                if (msg == true) {
                    fetch("./php/eliminar.php", {
                        method: "POST",
                        body: data
                    })
                    .then((res) => {
                        return res.text();
                    })
                        .then((data1) => {
                            alert(data1);
                            consultar();
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    alert("Eliminación Cancelada");
                }
            }
            </script>

       <?php }?>

</body>

</html>