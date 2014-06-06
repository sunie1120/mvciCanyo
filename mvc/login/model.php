<?php

class validar extends DBAbstractModel {

    ############################### PROPIEDADES ################################
    protected $nick_usuario;
    protected $contrasena;
    protected $id_usuario;
    protected $id_rol;
    protected $vacaciones;

    ################################# MÉTODOS ##################################
# Traer datos de un usuario
    public function get($nick_suario='',$contrasena='') {
        if($nick_suario != '') {
            $this->query = "SELECT id_uduario, id_rol, contrasena FROM usuario WHERE nick_suario = '$nick_suario' and contrasenya=password('$contrasena')";
			
            $this->get_results_from_query();
			echo   $this->get_results_from_query();
        }

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            if($this->contrasena==$contrasena){
             $this->mensaje = 'Usuario valido';
             //echo 'usuario valido';
            }
           
        } else {
            $this->mensaje = 'Usuario o contraseña incorretos';
            //echo 'usuario o contraseña no valido';
        }
    }
    
    # Método constructor
    function __construct() {
    }

    protected function delete() {
        
    }

    protected function edit() {
        
    }

    protected function set() {
        
    }

    /*   function control_usuario($user,$contra,&$rol)
{
    $conex=conectar_bdd();
    $resultado=mysql_query("SELECT * from usuaris where user_name='$user' and contrasenya=password('$contra')"/*$buscausuario*//*,$conex);
    $num_filas=mysql_num_rows($resultado);
    $error=0;
    
    if($fila=mysql_fetch_array($resultado, MYSQL_ASSOC))
    {
        $rol=$fila['rol'];
    }
    else
    {
        $error=1;
    }
    
    mysql_close($conex);
    
    return $error;	

}*/
    
    
}