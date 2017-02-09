<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $ID
 * @property string $nombre
 * @property string $usuario
 * @property string $password
 * @property string $estatus
 * @property string $email
 * @property string $url_imagen
 * @property integer $permiso_ID
 * @property string $reset_token
 * @property string $idioma
 *
 * The followings are the available model relations:
 * @property Contrato[] $contratos
 * @property Cotizacion[] $cotizacions
 * @property Permiso $permiso
 */
class User extends CActiveRecord
{
	public $usuario;
	public $password;
	public $rememberMe;

	private $_identity;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, usuario, password, estatus, email', 'required'),
			array('permiso_ID', 'numerical', 'integerOnly'=>true),
			array('nombre, usuario, password, estatus, email, url_imagen', 'length', 'max'=>45),
			array('reset_token', 'length', 'max'=>255),
			array('idioma', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, nombre, usuario, password, estatus, email, url_imagen, permiso_ID, reset_token', 'safe', 'on'=>'search'),
			array('usuario', 'ECompositeUniqueValidator', 
            'attributesToAddError'=>'usuario',
            'message'=>'El Nombre de usuario  ya se encuentra registrado.'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'contratos' => array(self::HAS_MANY, 'Contrato', 'user_ID'),
			'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'usuario_ID'),
			'permiso' => array(self::BELONGS_TO, 'Permiso', 'permiso_ID'),
			//'empleados'=>array(self::MANY_MANY, 'Empleado', 'UserEmpleado(user,empleado)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'nombre' => 'Nombre',
			'usuario' => 'Usuario',
			'password' => 'Password',
			'estatus' => 'Estatus',
			'email' => 'Email',
			'url_imagen' => 'Url Imagen',
			'permiso_ID' => 'Permiso',
			'reset_token' => 'Reset Token',
			'idioma' => 'Idioma',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url_imagen',$this->url_imagen,true);
		$criteria->compare('permiso_ID',$this->permiso_ID);
		$criteria->compare('reset_token',$this->reset_token,true);
		$criteria->compare('idioma',$this->idioma,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->usuario,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->usuario,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=3600*24*1; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}




	public static function getLista(){
		$arrModel=User::model()->findAll();

		$arrLista=array();
		foreach($arrModel as $model){
			$arrLista[$model->ID]=$model->nombre;
		}

		return $arrLista;
	}

	public static function getListaEmpleado(){
		$arrModel=User::model()->findAll();

		$arrLista=array();
		foreach($arrModel as $model){
			$modelRel=UserEmpleado::model()->findByAttributes(array("user_ID"=>$model->ID));			
			$arrLista[$model->ID]=$model->nombre."(".( (isset($modelRel))?$modelRel->empleado->nombreCompleto:"--Asignar Empleado--" ).")";			
		}

		return $arrLista;
	}

	public function getNombreEmpleado(){
		$modelRel=UserEmpleado::model()->findByAttributes(array("user_ID"=>$this->ID));
		if($modelRel){
			return $modelRel->empleado->nombreCompleto;
		}else{
			return "";
		}
	}
	public static function getListaSinAsignar()
	{
		$arrModel=User::model()->findAll();

		$arrLista=array();
		foreach($arrModel as $model){
			$modelRel =UserEmpleado::model()->findByAttributes(array("user_ID"=>$model->ID));
			if (!$modelRel)
			{
				$arrLista[$model->ID]=$model->nombre;

			}
		}

		return $arrLista;
	}
	public static function isDeveloper(){
		$isDeveloper = false;
		try {
			if(isset($_POST['user_id']) && !empty($_POST['user_id'])){
				$sqlI = "SELECT superuser FROM user WHERE ID = :ID";
				$parametros = array(":ID"=>$_POST['user_id']);
				$res = Yii::app()->db->createCommand($sqlI)->queryScalar($parametros);
				$isDeveloper = ($res == 1);
			}
		}catch(\Exception $e) {
			return false;
		}
		return $isDeveloper;
	}

	public function setPermisosByRol(){

		if($this->permiso_ID!=""){

			//Borramos las asignaciones previas
			PermisoUser::model()->deleteAll(array("condition"=>" user_ID={$this->ID} "));

			$arrModelPermisoRol=PermisoRol::model()->findAllByAttributes(
					array(
							"permiso_ID"=>$this->permiso_ID,
						)
				);

			if($arrModelPermisoRol){
				foreach($arrModelPermisoRol as $modelPermisoRol){
					$modelPermisoUser=new PermisoUser;
					$modelPermisoUser->user_asigna_ID=(isset($_POST['user_id']))?$_POST['user_id']:1;
					$modelPermisoUser->user_ID=$this->ID;
					$modelPermisoUser->modulo_funcion_ID=$modelPermisoRol->modulo_funcion_ID;
					$modelPermisoUser->activo=1;
					if(!$modelPermisoUser->save()){
						
					}
				}
			}

		}

	}

	
}
