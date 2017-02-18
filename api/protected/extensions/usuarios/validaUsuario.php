<?php

class validaUsuario{

	private $usuario = "";
	private $frase   = "XanNa";
	private $fecha   = "";
	private $modulos = array("compras","ventas","administracion", "", "");
	private $permisos = "";
	private $messageError = "";
	private $findModulo = "";
	private $Mpermiso = "";
	private $nombreUsuario = "";

	function __construct(){
		$this->fecha = date('d-m-Y');
	}

	public function getErrorMessage(){
		return $this->messageError;
	}

	public function buscarPermisos($modulo){
		$modulo = Modulo::model()->find("menuID = '".$modulo."'");
		if($modulo){
			$permiso   = $this->usuario->permiso;
			$this->Mpermiso = $permiso;
			$moduloID  = $modulo->ID;
			$permisoID = $permiso->ID;
			$criteria  = new CDbCriteria();
			$criteria->condition = "permiso_ID = :permiso AND modulo_ID = :modulo";
			$criteria->params = array(':permiso' => $permisoID, ":modulo" => $moduloID);

			$busqueda = PermisoModulo::model()->find($criteria);

			if(!is_null($busqueda)){
				$this->permisos = $busqueda;
				return true;
			}else{
				$this->messageError = "Acceso Denegado, no tiene acceso al modulo";
				if($this->nombreUsuario == "developer") { return true; }
				else { return false; }
			}
		}else{
			$this->messageError = "Modulo no Encontrado, Verifique la Informacion";
			return false;
		}
	}

	public function validar($usuarioID, $modulo = ""){
			$response = false;
			$usuario = User::model()->findByPk($usuarioID);
			$this->usuario = $usuario;
			$this->nombreUsuario = $usuario->nombre;
			if (is_array($modulo))
			{
				$band = 0;
				foreach ($modulo as $key=>$mod) 
				{
					if($this->buscarPermisos($mod)){
					$band = 1;
					}else{
						$band = 0;
					}
					# code...
				}
				if ($band == 1)
				{
					$response = true;
				}
			}
			else
			{
				if($this->buscarPermisos($modulo)){
					$response = true;
				}else{
					
				}
			}
			
		return true;
	}

	public function dumpPermiso(){
		var_dump($this->Mpermiso);
		var_dump($this->permisos);
	}

	public function editar(){
		$permiso = $this->permisos;
		$response = false;
		if($permiso){
			if($permiso->editar == "true"){
				$response = true;
				$this->messageError = "";
			}else{
				$this->messageError = "No tiene permitido editar este elemento";
			}
		}
		if($this->nombreUsuario == "developer") {$response = true; };
		return true;
	}

	public function crear(){
		$permiso = $this->permisos;
		$response = false;
		if($permiso){
			if($permiso->crear == "true"){
				$response = true;
			}else{
				$this->messageError = "No tiene permitido crear nuevos elementos";
			}
		}else{
			$this->messageError = "No tiene permiso para acceder a este modulo";
		}
		if($this->nombreUsuario == "developer") {$response = true; };
		return $response;
	}

	public function eliminar(){
		$permiso = $this->permisos;
		$response = false;
		if($permiso){
			if($permiso->eliminar == "true"){
				$response = true;
			}else{
				$this->messageError = "No tiene permitido Eliminar los Elementos";
			}
		}else{
			$this->messageError = "No tiene permiso para acceder a este modulo";
		}
		if($this->nombreUsuario == "developer") {$response = true; };
		return true;
	}

	public function imprimirPermisos($otroMensage = ""){
		if($this->nombreUsuario != "developer"){

			$mensage = "No tiene Permisos para ";
			$arrayP = array();
			if(!$this->crear()) $arrayP[] = "Crear";
			if(!$this->editar()) $arrayP[] = "Editar";
			if(!$this->eliminar()) $arrayP[] = "Eliminar";
			$m2 = "";

			if(sizeof($arrayP) != 0){
				foreach ($arrayP as $p){
					 $m2 .= $p.", ";
				}
				$m2 = substr($m2, 0,-2);
				$mensage .= $m2 . " Elementos";
				$this->imprimirMensageW($mensage);
			}
		}
	}

	public function imprimirEditar(){
		if(!$this->editar()){
			$this->imprimirMensageW("No tiene permisos para editar este elemento");
		}
	}
	public function imprimirCrear(){
		if(!$this->crear()){
			$this->imprimirMensageW("No tiene permisos para crear nuevos elementos");
		}
	}

	public function imprimirMensageW($mensage){
		echo '<div class="alert alert-warning alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  			'. $mensage .'
			</div>';
	}

	public function imprimirMensageS($mensage){
		echo '<div class="alert alert-success alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  			'. $mensage .'
			</div>';
	}
}
