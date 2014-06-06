<?php
# Importar modelo de abstracción de base de datos
require_once('../core/db_abstract_model.php');

/**
* Clase para eliminar y crear puestos, departamentos y roles en la app
*/
class personlizacion extends DBAbstractModel {

    ############################### PROPIEDADES ################################
    protected $id_rol;
    protected $nombre_rol;
	protected $descripcion_acceso_app;
    protected $id_departamento;
    protected $nombre_departamento;
    protected $id_puesto;
    private $nombre_puesto;

    

    ################################# MÉTODOS ##################################
            
       
        ############################### SET ################################
        /**
         * Metodo que modifica el nombre del rol
         * @param string $nombre
         */
        public function setNombreRol($nombre){
            $this->nombre_rol=$nombre;
        }
		
		 /**
         * Metodo que modifica el nombre del departamento
         * @param string $nombre
         */
        public function setNombreDepartamento($nombre){
            $this->nombre_departamento=$nombre;
        }
 
		 /**
         * Metodo que modifica el nombre del puesto
         * @param string $nombre
         */
        public function setNombrePuesto($nombre){
            $this->nombre_puesto=$nombre;
        } 
 
 		 /**
         * Metodo que modifica la descripcion del rol
         * @param string $descripcion_acceso_app
         */
        public function setDescripcionAccesoRol($descripcion){
            $this->descripcion_acceso_app=$descripcion;
        } 

 	        
        ############################### GET ################################
        /**
         * Metodo que devuelve el nombre del rol
         * @return string $nombre_rol
         */
        public function getNombreRol(){
            return $this->nombre_rol;
        }
        
        /**
         * Metodo que devuelve el nombre del puesto
         * @return string $nombre_puesto
         */
        public function getNombrePuesto(){
            return $this->nombre_puesto;
        }
        
      
       /**
         * Metodo que devuelve el nombre del departamento
         * @return string $nombre_departamento
         */
        public function getNombreDepartamento(){
            return $this->nombre_departamento;
        }
        

       /**
         * Metodo que devuelve  la descripción del rol
         * @return string $descripcion_rol
         */
        public function getDescripcionAccesoRol(){
            return $this->descripcion_acceso_app;
        }

       /**
         * Metodo que devuelve  la id del rol
         * @return string $id_rol
         */
        public function getIdRol(){
            return $this->id_rol;
        }
		
       /**
         * Metodo que devuelve  la id del puesto
         * @return string $id_puesto
         */
        public function getIdPuesto(){
            return $this->id_puesto;
        }	
        
       /**
         * Metodo que devuelve  la id del departamento
         * @return string $id_departamento
         */
        public function getIdDepartamento(){
            return $this->id_departamento;
        }	
        
  
    
/*
* Funcion para modificar puestos
*/
    public function edit_puesto($id_puesto='',$puesto_data=array()) {
        
        foreach ($puesto_data as $propiedad=>$valor) {
                $this->$propiedad = $valor;
        }
        
        if($id_puesto!=''){
    
             $query = "UPDATE `icanyo`.`puesto` SET";
             if($puesto_data['nombre_puesto']!=''){
                 $query .=" `nombre_puesto` = '$this->nombre'";
             }
                       
             $query .=" WHERE `puesto`.`id_puesto` = $id_puesto;";
        }
        
         $this->query = $query;
         $this->execute_single_query();
         $this->mensaje = 'Puesto modificado';
    }
	
	
	
/*
* Funcion para modificar departamento
*/
    public function edit_departamento($id_departamento='',$departamento_data=array()) {
        
        foreach ($departamento_data as $propiedad=>$valor) {
                $this->$propiedad = $valor;
        }
        
        if($id_departamento!=''){
    
             $query = "UPDATE `icanyo`.`departamento` SET";
             if($departamento_data['nombre_departamento']!=''){
                 $query .=" `nombre_departamento` = '$this->nombre'";
             }
                       
             $query .=" WHERE `puesto`.`id_departamento` = $id_departamento;";
        }
        
         $this->query = $query;
         $this->execute_single_query();
         $this->mensaje = 'departamento modificado';
    }


	/*
* Funcion para modificar roles
*/
    public function edit_rol($id_rol='',$rol_data=array()) {
        
        foreach ($rol_data as $propiedad=>$valor) {
                $this->$propiedad = $valor;
        }
        
        if($id_rol!=''){
    
             $query = "UPDATE `icanyo`.`rol` SET";
             if($puesto_data['nombre_rol']!=''){
                 $query .=" `nombre_rol` = '$this->nombre'";
             }
			 
             if($puesto_data['descripcion_acceso_app']!=''){
                 $query .=", `descripcion_acceso_app` = '$this->descripcion'";
             }
             
             $query .=" WHERE `rol`.`id_rol` = $id_rol;";
        }
        
         $this->query = $query;
         $this->execute_single_query();
         $this->mensaje = 'Rol modificado';
    }
    
   
    # Crear un rol
    public function set($user_data=array()) {
            $nombre_rol=$rol_data['nombre_rol'];
            $this->query = "SELECT * FROM rol WHERE nombre_rol = '$nombre_rol'";
            $this->get_results_from_query();
            
            if(count($this->rows) == 0){
                $nombre_rol=$rol_data['nombre'];
                $descripcion_acceso_app=$rol_data['descripcion_acceso_app'];

                
                $query = "INSERT INTO `icanyo`.`rol` (`nombre_rol`, `descripcion_acceso_app`) VALUES (NULL, '$nombre_rol', '$descripcion_acceso_app');";
                $this->query = $query;
                $this->execute_single_query();
                $this->mensaje = 'Rol agregado exitosamente';
                
            } else {
               $this->mensaje = 'El rol ya existe';
            }
    }
	
	# Crear un puesto
    public function set($puesto_data=array()) {
            $nombre_puesto=$rol_data['nombre_puesto'];
            $this->query = "SELECT * FROM puesto WHERE nombre_puesto = '$nombre_puesto'";
            $this->get_results_from_query();
            
            if(count($this->rows) == 0){
                $nombre_puesto=$puesto_data['nombre'];
                              
                $query = "INSERT INTO `icanyo`.`puesto` (`nombre_puesto`) VALUES (NULL, '$nombre_puesto');";
                $this->query = $query;
                $this->execute_single_query();
                $this->mensaje = 'Puesto agregado exitosamente';
                
            } else {
               $this->mensaje = 'El puesto ya existe';
            }
    }

		# Crear un departamento
    public function set($departamento_data=array()) {
            $nombre_departamento=$departamento_data['nombre_departamento'];
            $this->query = "SELECT * FROM departamento WHERE nombre_departamento = '$nombre_departamento'";
            $this->get_results_from_query();
            
            if(count($this->rows) == 0){
                $nombre_departamento=$departamento_data['nombre'];
                              
                $query = "INSERT INTO `icanyo`.`departamento` (`nombre_departamento`) VALUES (NULL, '$nombre_departamento');";
                $this->query = $query;
                $this->execute_single_query();
                $this->mensaje = 'Departamento agregado exitosamente';
                
            } else {
               $this->mensaje = 'El departamento ya existe';
            }
    }

    # Eliminar un rol
    public function delete($id_rol='') {
        $query = "DELETE FROM `icanyo`.`rol` WHERE `rol`.`id_rol` =$id_rol";
        $this->query = $query;
        $this->execute_single_query();
        $this->mensaje = 'Rol eliminado';
    }
    
    # Eliminar un puesto
    public function delete($id_puesto='') {
        $query = "DELETE FROM `icanyo`.`puesto` WHERE `puesto`.`id_puesto` =$id_puesto";
        $this->query = $query;
        $this->execute_single_query();
        $this->mensaje = 'Puesto eliminado';
    }
	
    # Eliminar un departamento
    public function delete($id_departamento='') {
        $query = "DELETE FROM `icanyo`.`departamento` WHERE `departamento`.`id_departamento` =$id_departamento";
        $this->query = $query;
        $this->execute_single_query();
        $this->mensaje = 'Departamento eliminado';
    }
    
    # Método constructor
    function __construct() {

    }

    # Método destructor del objeto
    function __destruct() {
        unset($this);
    }
    

}
?>