<?php
		require_once("Mascota.php");	

$quehago=$_POST['queHacer'];

		switch ($quehago) {
			case 'Agregar':				
				$obj=$_POST['mascota'];				
				$masc= new mascota($obj["nombre"],$obj["edad"],$obj["fnac"]);
				
				mascota::Guardar($masc);
				break;
					
			case 'mostrarLista':
			
				$ArrayDeMascotas = Mascota::TraerTodasLasMascotas();				

				$plantilla='<table class="table">
					<thead style="background:rgb(14, 26, 112);color:#fff;">
						<tr>
							<th>  Nombre </th>
							<th>  Edad    </th>
							<th>  Fnac      </th>
							
						</tr> 
					</thead>';   	
				foreach ($ArrayDeMascotas as $Mascotas) {					
							$masc = array();
							$masc['nombre']= $Mascotas->GetNombre();
							$masc['edad']= $Mascotas->GetEdad();
							$masc['fnac']=$Mascotas->GetFnac();
							$masc = json_encode($masc);

								$plantilla .= "<tr>
								<td>".$Mascotas->GetNombre()."</td>
								<td>".$Mascotas->GetEdad()."</td>
								<td>".$Mascotas->GetFnac()."</td>

							<td><input type='button' value='Eliminar' class='MiBotonUTN' id='btnEliminar' onclick='BorrarMascota($masc)' />
									</td>
							<td><input type='button' value='Modificar'  id='btnModificar' onclick='Modificar($masc)' /></td>
								</tr>";
						}		
						$plantilla .= '</table>';		
		
		echo $plantilla;
		break;

				case 'eliminar':
				$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;
					
				mascota::Eliminar($obj->fnac);
				break;

		case 'modificar':
			$obj = isset($_POST['mascota']) ? json_decode(json_encode($_POST['mascota'])) : NULL;
			$masc= new mascota($obj->nombre,$obj->edad,$obj->fnac);

			mascota::modificar($masc);


		}



?>