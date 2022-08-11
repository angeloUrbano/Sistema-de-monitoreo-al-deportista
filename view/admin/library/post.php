<?php
require("conn.php");






class comprobacion_de_datos {   

    public $cedu;
    public $nom ;
    public $fech ;
    public $cargo;
    public $lastName;
    
 
   function __construct($datos){ 
      $this->cedu = $datos[ 'cedula' ];
      $this->nom = $datos[ 'nombre' ];
      $this->fech =$datos[ 'fecha' ];
      $this->cargo =$datos[ 'cargo' ];    
      $this->lastName = $datos[ 'apellido' ];
         
   }
  
   function valores_vacios(){
      if (empty(trim($this->cedu)) or empty(trim($this->lastName)) or empty(trim($this->nom))
	  or empty(trim($this->fech))or empty(trim($this->cargo)) or empty(trim($this->lastName)) ){

            return false ;             
      }else{             
            return true; 
      }
   } 
 
   function solo_numeros(){
      if(ctype_digit($this->cedu) and strlen($this->cedu)==8){
         
         return true;    
      }else{             
         return false;
      } 
   }

   function solo_letras(){   
	 $parametro = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";

      if (preg_match($parametro , $this->nom) and preg_match($parametro , $this->lastName) )  { 
		
	
		   return true ;        
      }else{
		
		   return false; 
           
      } 

   }


  
 
   function fecha_nacimiento(){
      $impedimento= 1900; 
      $anio = date("Y");
      $mes = date("m");
      $dia = date("d");
      
      $fecha_actual= $anio . "-" . $mes . "-" . $dia ;       
      $porciones= explode("-" , $this->fech); 
      $anio_separado_de_fecha = $porciones[0];

      $cambio_anio= (int)$anio;
      $cambio_anio_separado_de_fecha = (int)$anio_separado_de_fecha;
	  $resta = $cambio_anio - $cambio_anio_separado_de_fecha;
      
      if ($this->fech >= $fecha_actual or $anio_separado_de_fecha<$impedimento or $resta<=5 ) {
         return false;
      }else{
         return true;
      } 
   }

}





// registro de los datos
if (!empty($_POST['acccion2']) and $_POST['oculto']=="" and $_FILES){
   $datos = $_REQUEST;
  

   $registro = new comprobacion_de_datos($datos);
   $lista_comprovacion   = [];
   $lista_comprovacion[] = $registro->valores_vacios();
   $lista_comprovacion[] = $registro-> solo_letras();
   $lista_comprovacion[] = $registro->solo_numeros();
   $lista_comprovacion[] = $registro->fecha_nacimiento();





   $r= true;

   foreach ($lista_comprovacion as $key) {  
   
	 
	  if ($key == false){
   
		
		 $r=false;        
		 break;
	  }
   
   }


$cedu = $_POST['cedula'];
$consulta_where = "SELECT * FROM dataprimaryathletes where ci= '$cedu' ";
$aja =  mysqli_query($conn,$consulta_where);
   	
 if ($aja->num_rows >=1) {
	echo "<span>Existe un atleta con ese numero de cedula</span>";
}

   if ($r ==false) {

	   echo "<span>No se pudieron guardar los datos</span>";
   }else{

      if ($_FILES['foto']){
         $subir_archivo=basename($_FILES['foto']['name']);
     }
     else {
         $subir_archivo="2";
     }
     
     $directorio = 'SoportesAspirantes/';
     $subir_archivo = $directorio.basename($_FILES['foto']['name']);
     
      if (move_uploaded_file($_FILES['foto']['tmp_name'], $subir_archivo)) {
         $foto = true;
         
      }else{
         $foto =false;
   
      }

	   $cedu = $_POST['cedula'];
      $foto = $_FILES['foto']['name'];
	 	$nom = $_POST['nombre'];
	 	$fech = $_POST['fecha'];
	 	$cargo = $_POST['cargo']; 
	 	$lastName = $_POST['apellido'];
	 	//consulta mysql para insertar los datos del empleados
      $consulta = "INSERT INTO dataprimaryathletes (name, lastname, age, dateofbirth, code, ci , foto) VALUES ('$nom' , '$lastName' , '$cargo' , '$fech' ,'$cedu' , '$cedu' , '$foto')";
	 	mysqli_query($conn, $consulta);
       $conn->close();
		 echo "<span>Guardado Correctamente</span>";
   }

   
}

   



//seleccion de datos para una posterior edicion

   if (!empty($_POST['acccion'])  and $_POST['acccion']=='selelccionar') {
     


      $seleccion = $_POST['id'];
      $consulta_where2 = "SELECT * FROM dataprimaryathletes where idatletas= '$seleccion' ";
      $resultado =  mysqli_query($conn,$consulta_where2);


      $datos = array();
     

      while ($row=mysqli_fetch_array($resultado)) {

         $datos['user']=array('idatletas'=>$row['idatletas']  ,'name'=> $row["name"],'lastname'=>$row["lastname"] ,'age'=>$row["age"] , 'dateofbirth'=> $row['dateofbirth'] ,
                        'code'=> $row['code'] , 'ci'=>$row['ci'] , 'foto'=>$row['foto']);
     }
     
      echo json_encode($datos);
   
      

      

   }

// edicion
   if ($_POST['oculto']!="" and  $_POST['oculto']!="noEdito") {

      $datos = $_POST;

     


      $registro = new comprobacion_de_datos($datos);
      $lista_comprovacion   = [];
      $lista_comprovacion[] = $registro->valores_vacios();
      $lista_comprovacion[] = $registro-> solo_letras();
      $lista_comprovacion[] = $registro->solo_numeros();
      $lista_comprovacion[] = $registro->fecha_nacimiento();
   
   
   
   
   
      $r= true;
   
      foreach ($lista_comprovacion as $key) {  
      
       
        if ($key == false){
      
         
          $r=false;        
          break;
        }
      
      }



      if ($r ==false) {

         echo "<span>No se pudo editar los datos</span>";
      }else{
         
         if (!$_FILES){

            $ci = $_POST['oculto'];
      
            $cedu = $_POST['cedula'];
            $nom = $_POST['nombre'];
            $fech = $_POST['fecha'];
            $cargo = $_POST['cargo']; 
            $lastName = $_POST['apellido'];
            //consulta mysql para insertar los datos del empleados
            $consulta3 = "UPDATE dataprimaryathletes SET name='$nom' , lastname='$lastName' , age='$cargo' , dateofbirth='$fech' where idatletas ='$ci' ";
            
            mysqli_query($conn, $consulta3);
            $conn->close();
            echo "<span>Editado Correctamente</span>";
            }else {
            
               if ($_FILES['foto']){
                  $subir_archivo=basename($_FILES['foto']['name']);
              }else {
                  $subir_archivo="2";
              }
              
              $directorio = 'SoportesAspirantes/';
              $subir_archivo = $directorio.basename($_FILES['foto']['name']);
              
               if (move_uploaded_file($_FILES['foto']['tmp_name'], $subir_archivo)) {
                  $foto = true;
                  
               }else{
                  $foto =false;
            
               }

               if($foto=true){
                  $ci = $_POST['oculto'];
      
                  $cedu = $_POST['cedula'];
                  $nom = $_POST['nombre'];
                  $fech = $_POST['fecha'];
                  $cargo = $_POST['cargo']; 
                  $lastName = $_POST['apellido'];
                  $foto1= $_FILES['foto']['name'];
                  
                 
                  $consulta3 = "UPDATE dataprimaryathletes SET name='$nom' , lastname='$lastName' , age='$cargo' , dateofbirth='$fech' , foto='$foto1' where idatletas ='$ci' ";

                  mysqli_query($conn, $consulta3);
                  $conn->close();
                  echo "<span>Editado Correctamente</span>";
               }




            }
      }
   

   

      
     

   }
?>
