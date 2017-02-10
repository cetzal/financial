<?php
class WebUser extends CWebUser {
	// Store model to not repeat query.
	private $_model;
	// Return first name.
	// access it by Yii::app()->user->first_name
	function getUser() {
		$user = $this->loadUser ( Yii::app ()->user->id );
		return $user->usuario;
	}
	function getFullName() {
		$user = $this->loadUser ( Yii::app ()->user->id );
		return $user->fullName ();
	}
	function getRole() {
		$user = $this->loadUser ( Yii::app ()->user->id );
		return $user->perfil;
	}
	function getPerfil() {
		//  cambie los perfiles por el modelo permisos 
		$user = $this->loadUser ( Yii::app ()->user->id );
		//$perfil=Permiso::model()->findByAttributes(array('clave'=>$user->perfil));
		$perfil=Permiso::model()->findByAttributes(array('ID'=>$user->permiso_ID));
		return $perfil->perfil;
	}
	function getEmail() {
		$user = $this->loadUser ( Yii::app ()->user->id );
		return $user->email;
	}
	function getHome(){
		$user = $this->loadUser ( Yii::app ()->user->id );
		if($user!==null){
			$perfil=Perfiles::model()->findByAttributes(array('clave'=>$user->perfil));
			$modulo=Modulos::model()->findByPk($perfil->id_modulo_inicial);
			if($perfil->perfil=="Empleado"){
				$url=$modulo->nombre.'/create';
			}else{
				$url=$modulo->nombre.'/index';
			}			
			/* switch ($perfil->perfil){
				case Usuarios::ROLE_ADMIN:
					$url=array('catalogoAdmin/index');
					break;
				case usuarios::ROLE_ANALISTA:
					$url='catalogoAnalista/index';
					break;
				case Usuarios::ROLE_EJECUTIVO:
					$url='catalogoEjecutivo/index';
					break;
				default:
					$url='site/login';
					break;
			}	 */
		}else{
			$url='site/login';
		}


		return $url;
	}
	public function getHomeImage(){
		$user = $this->loadUser ( Yii::app ()->user->id );
		$image="";
		if($user!==null){
			$perfil=Perfiles::model()->findByAttributes(array('clave'=>$user->perfil));
			if(!is_null($perfil)){
				if($perfil->perfil=='Ejecutivo'){
					$image=Yii::app()->baseUrl.'/images/main/breadcrumbs/ejecutivo.png';
				}elseif($perfil->perfil=='Administrador'){
					$image=Yii::app()->baseUrl.'/images/main/breadcrumbs/administrador.png';
				}
			}
		}
		return $image;
	}
	// function getPasswordExpires(){
	// $user = $this->loadUser(Yii::app()->user->id);
	// return $user->checkExpiryDate();
	// }
	// This is a function that checks the field 'role'
	// in the User model to be equal to constant defined in our User class
	// that means it's admin
	// access it by Yii::app()->user->isAdmin()
	function isPermitted() {		
		$user = $this->loadUser ( Yii::app ()->user->id );
		if($user!==null){
		/*	$perfil=Perfiles::model()->findByAttributes(array('clave'=>$user->perfil));
			if($perfil){				
				$modulo=Modulos::model()->findByAttributes(array('nombre'=>Yii::app()->controller->uniqueId));
				if($modulo){
					$permiso=Permisos::model()->findByAttributes(array('id_modulo'=>$modulo->id,'id_perfil'=>$perfil->id));
					if($permiso==true){						
						return $permiso->id_modulo==$modulo->id;						
					}else{
						$permiso2=ModulosAdministradores::model()->find('(id_modulo=:modulo OR (id_modulo IS NULL AND seccion=:grupo)) AND id_administrador=:admin AND status=1',array(':modulo'=>$modulo->id,':grupo'=>$modulo->grupo,':admin'=>$user->id));
						if(!is_null($permiso2)){
							if($permiso2->permiso=="Consulta" && !in_array(Yii::app()->controller->action->id, array("create","update","delete","import","save","pagar","anticipar","condonar","vencerCredito","reestructurar","timbrar","guardar","cancelCfdi"))){
								return true;
							}elseif($permiso2->permiso=="Edición"){								
								return true;
							}else{								
								return false;
							}							
						}else{							
							return false;
						}
					}
				}else{
					return false;
				}

			}else{
				return false;
			}*/

		}else{
			return false;
		}
		return true;		
		/* if ($user !== null){
			return intval ( $user->perfil ) == Usuarios::ROLE_ADMIN;
		}else{
			return false;
		} */
	}
	
	function isPermittedUrl($controller,$action,$module=null) {
		$user = $this->loadUser ( Yii::app ()->user->id );
		if($user!==null){
			$perfil=Perfiles::model()->findByAttributes(array('clave'=>$user->perfil));
			if($perfil){
				$modulo=Modulos::model()->findByAttributes(array('nombre'=>$controller));
				if($modulo){
					$permiso=Permisos::model()->findByAttributes(array('id_modulo'=>$modulo->id,'id_perfil'=>$perfil->id));
					if($permiso==true){
						return $permiso->id_modulo==$modulo->id;
					}else{						
						$permiso2=ModulosAdministradores::model()->find('(id_modulo=:modulo OR (id_modulo IS NULL AND seccion=:grupo)) AND id_administrador=:admin AND status=1',array(':modulo'=>$modulo->id,':grupo'=>$modulo->grupo,':admin'=>$user->id));
						if(!is_null($permiso2)){
							if($permiso2->permiso=="Consulta" && !in_array(Yii::app()->controller->action->id, array("create","update","delete","import","save","pagar","anticipar","condonar","vencerCredito","reestructurar","timbrar","guardar","cancelCfdi"))){
								return true;
							}elseif($permiso2->permiso=="Edición"){
								return true;
							}else{
								return false;
							}
						}else{
							return false;
						}					
					}
				}else{
					return false;
				}
	
			}else{
				return false;
			}
	
		}else{
			return false;
		}
	
		/* if ($user !== null){
		 return intval ( $user->perfil ) == Usuarios::ROLE_ADMIN;
			}else{
			return false;
			} */
	}
	
	// Load user model.
	protected function loadUser($id = null) {
		if ($this->_model === null) {
			if ($id !== null)
				//$this->_model = Usuarios::model ()->findByAttributes(array('id'=>$id,'status'=>1));
				//cambie modelo Usuarios por  user
				$this->_model = User::model ()->findByAttributes(array('ID'=>$id));
		}
		return $this->_model;
	}
}
?>