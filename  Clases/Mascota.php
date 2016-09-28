<?php 	

		class Mascota
		{
			//Atributos
			private $nombre;
			private $edad;
			private $fnac;

			//Get y Set

			public function GetNombre()
			{

				return $this->nombre;
			}
			public function GetEdad()
			{
				return $this->edad;

			}
			public function GetFnac()
			{

				return $this->fnac;
			}

			public function SetNombre($valor)
			{
				$this->Nombre=$valor;
			}
			public function SetEdad($valor)
			{
				$this->Edad=$valor;
			}
			public function SetFnac($valor)
			{
				$this->Fnac=$valor;
			}

		

			public function __construct($nombre,$edad,$fnac)
			{
					$this->nombre=$nombre;
					$this->edad=$edad;
					$this->fnac=$fnac;
				
			}

			public function ToString()
			{
				return $this->nombre."-".$this->edad."-".$this->fnac."\n";
			}


			public static function Guardar($objeto)
			{

				$Archivo= fopen("Mascotas.txt","a");

				fwrite($Archivo,$objeto->ToString());

				fclose($Archivo);
			}

			public static function TraerTodasLasMascotas ()
			{		$listaDeMascotas = array ();
					$miArchivo=fopen("./Mascotas.txt","r");

					while(!feof($miArchivo))
					{
						$renglon=fgets($miArchivo);
						$Mascota= explode("-",$renglon);
						$Mascota[0]=trim($Mascota[0]);
	
						if($Mascota[0] !="" && $Mascota[1] !="" )
						{
							$listaDeMascotas[]= new Mascota($Mascota[0],$Mascota[1],$Mascota[2]);

						}
						
						

					}
					fclose($miArchivo);
					return $listaDeMascotas;
			}

			public static function Eliminar($Fnac)
			{
				
				$listaDeMascotasLeidas = Mascota::TraerTodasLasMascotas();
				$listaDeMascotas= array();

				for($i=0;$i<count($listaDeMascotasLeidas);$i++)
				{ 
						if($listaDeMascotasLeidas[$i]->fnac == $Fnac){continue;}
						$listaDeMascotas[$i]=$listaDeMascotasLeidas[$i];
				}

				$miArchivo= fopen("./Mascotas.txt","w");
				foreach ($listaDeMascotas as $item ) {
					fwrite($miArchivo,$item->ToString());
				}

				fclose($miArchivo);


			}

			public static function Modificar($masc)
			{
				
				$listaDeMascotasLeidas = Mascota::TraerTodasLasMascotas();
				$listaDeMascotas= array();

				for($i=0;$i<count($listaDeMascotasLeidas);$i++)
				{ 
						if($listaDeMascotasLeidas[$i]->fnac == $Fnac){continue;}
						$listaDeMascotas[$i]=$listaDeMascotasLeidas[$i];
				}
				array_push($listaDeMascotas,$masc);				
				$miArchivo = fopen("archivos/productos.txt", "w");
		
		//ESCRIBO EN EL ARCHIVO
		foreach($ListaDeProductos AS $item){
			$cant = fwrite($miArchivo, $item->ToString());
			
			}
			fclose($miArchivo);
			}
		}

 ?>

 ?>