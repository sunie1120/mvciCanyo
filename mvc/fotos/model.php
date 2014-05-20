<?php
# Importar modelo de abstracción de base de datos
require_once('../core/db_abstract_model.php');


class imagen {
    protected $archivo; 
    protected $url; 
    protected $extensiones; 
    
    public function comprueba($archivo){ 
        $this->archivo = $archivo; 
        if(empty($this->archivo)){ 
            return false; 
        }else { 
            return true; 
        } 
    } 
  } 
class subir extends imagen 
  { 
      private $dir = string; 
      private $random; 
      private $exten ; 
      private $arr; 
      public function subir($ar,$ex,$dir) 
      { 
              $this->dir=$dir; 

               $this->archivo = explode(".",$ar['name']); 
               $this->extensiones = $ex; 
               $random = (date("d:m:y:h:i") * rand()*9999999); 

                    if(in_array($this->archivo[1],$this->extensiones)) 
                    { 

                            $this->url = $dir.$random.".".$this->archivo[1]; 

              if(!file_exists($this->dir)) 
              { 
                      @mkdir($this->dir,777); 
              } 
              $this->arr = array(':nombre' => "hola", 
              ':des' => "Hola", 
              ':url' => $this->url 
              ); 
              $this->archivo = $ar; 
                    if(move_uploaded_file($this->archivo['tmp_name'],$this->url)) 
                    { 
             $base = new bd(TBD,SER,BD,US,CL); 

              $sql = $base->prepare("INSERT INTO imagenes(nombre,descripcion,url) VALUES(:nombre,:des,:url)"); 

              if($sql->execute($this->arr)) 
              { 


                      echo "Imagen subida y almacenada correctamente"; 
              } 
              else { 
                      echo "Error"; 
              } 
                    } else { 
                            echo "error"; 
                    } 
                    } 
                    else { 
                      echo "Extension invalida"; 
                               } 


      } 
  } 
  class extension extends subir 
  { 
  } 
?>