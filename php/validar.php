<?php 
    $password = $_POST["password"];
    $mysqli = new mysqli("localhost", "root", "", "banco");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $resultado = $mysqli->query("SELECT * FROM cliente WHERE ncliente = '" . $password . "'");
   if ($resultado->num_rows >= 1) {
       //header("location:");
       echo "
       <script>
        alert('Entrar al sistema');
        location.href='../';
       </script>";
   } else {
       echo "<script>
        alert('Número de cliente inválido');
        location.href='../';
       </script>";
       //header("location:../");
   }
?>