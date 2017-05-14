<?php 
      
    class BaseDatos {
    private $conexion;
     
    public function realizarConexion() {
      //$this->conexion = new mysqli("localhost","root","","banco");
      $this->conexion = new mysqli("mysql.hostinger.mx","u279435612_userb","b12345","u279435612_banco");
      if ($this->conexion->connect_errno) {
        echo "<script>alert('No hay conexión con los datos, consulte con el administrador.')</script>";
      }
    } 
     
    public function realizarConsulta($query) {
      try {
        $this->conexion->autocommit(false);
          if (!$resultado = $this->conexion->query($query)) {
            $this->conexion->rollback();
            echo "<script>alert('Transacción no realizada, consulte con el administrador.')</script>";
          }
          $this->conexion->commit();
      } catch (Exception $e) {
          $this->conexion->rollback();
      }
      return $resultado;
    }
    
    public function realizarAccion($sentencia) {
      try {
        $this->conexion->autocommit(false);
          if (!$resultado = $this->conexion->query($sentencia)) {
            $this->conexion->rollback();
            echo "<script>alert('Transacción no realizada, consulte con el administrador.')</script>";
            return false;
          }
          $this->conexion->commit();
          return true;
      } catch (Exception $e) {
          $this->conexion->rollback();
          return false;
      }
    }
      
    public function cerrarConexion() {
      $this->conexion->close();
    }    
  }
?>