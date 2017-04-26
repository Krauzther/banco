<?php
    echo "
    <script>
        var correo = prompt('Ingresa tu correo:', '');
        //Detectamos si el usuario ingreso un valor
        if (correo != null) {
            alert('Tu nueva contraseña se envio a tu correo' + correo);
    </script>";
      //mail( correo, 'Banamex - Contraseña provisional' , '');
    echo "
    <script>
            location.href='../';            
        } else  {
            location.href='../';
        } 
    </script>
    ";     
    
?>