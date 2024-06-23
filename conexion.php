

<?php
 

	class Connection {
               
        

		/*=============================================
		Información de la base de datos
		=============================================*/

		static public function infoDatabase(){
          
			$infoDB = array(
<<<<<<< HEAD
				"host" => "localhost",
				"database" => "ejemplo",
=======
				"host" => "localhost:3307",
				"database" => "ejemplo3",
>>>>>>> f7a1092c206a0302c1d26e082538dc709bcd8adc
				"user" => "root",
				"pass" => ""

			);
			

			return $infoDB;

		}}

		/*=============================================
		Conexión a la base de datos
		=============================================*/

		class Conexion{
					static public function connect(){


			try{

				$link = new PDO(
					"mysql:host=".Connection::infoDatabase()["host"].";dbname=".Connection::infoDatabase()["database"],
					Connection::infoDatabase()["user"], 
					Connection::infoDatabase()["pass"]
				);

				$link->exec("set names utf8");
           

			}catch(PDOException $e){

				die("Error: ".$e->getMessage());

			}
		

			return $link;

		}

	}

	
?>