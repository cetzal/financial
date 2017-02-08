<?php

/**
 * This is the model class for table "empleado".
 *
 * The followings are the available columns in table 'empleado':
 * @property integer $ID
 * @property integer $puesto_trabajo_ID
 * @property integer $emisor_ID
 * @property string $nombres
 * @property string $apellidos
 * @property string $calle
 * @property string $numero
 * @property string $colonia
 * @property string $codigo_postal
 * @property string $email
 * @property string $ife
 * @property string $sexo
 * @property string $rfc
 * @property string $pais
 * @property string $municipio
 * @property string $estado
 * @property string $localidad
 * @property string $celular
 * @property string $estado_civil
 * @property string $fecha_nacimiento
 * @property string $curp
 * @property string $url_imagen
 * @property string $imss
 * @property string $fecha_ingreso
 * @property string $num_cuenta
 * @property string $clabe_banco
 * @property string $banco
 * @property string $contrato
 * @property string $estatus
 * @property string $periodicidad_pago
 * @property string $codigo_tarjeta
 * @property integer $tipo_contrato
 * @property integer $tipo_jornada
 * @property integer $tipo_regimen
 * @property string $salario_sdi
 * @property string $salario_sdr
 * @property string $tipo_sangre
 * @property string $visa
 * @property string $visa_tipo
 * @property string $visa_vigencia
 * @property string $pasaporte
 * @property string $pasaporte_vigencia
 * @property string $salario_diario
 * @property string $tipo_pago
 * @property integer $registro_patronal_ID
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $tipo_calculo
 * @property string $salario_mensual
 * @property string $tabulador_ID
 * @property integer $destajo
 *
 * The followings are the available model relations:
 * @property AlmacenMovimientos[] $almacenMovimientoses
 * @property EntradasSalidas[] $entradasSalidases
 */
class Empleado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empleado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_contrato, tipo_jornada, tipo_regimen, clase_riesgo', 'required', 'on'=>'update'),
			array('puesto_trabajo_ID, emisor_ID, tipo_regimen, clase_riesgo', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos, calle, numero, colonia, imss', 'length', 'max'=>100),
			array('codigo_postal, email, ife, rfc, pais, municipio, estado, localidad, celular, estado_civil, curp, url_imagen, num_cuenta, clabe_banco, contrato, periodicidad_pago, codigo_tarjeta', 'length', 'max'=>45),
			array('sexo', 'length', 'max'=>6),
			array('banco', 'length', 'max'=>3),
			array('tipo_sangre', 'length', 'max'=>15),
			array('estatus', 'length', 'max'=>8),
			array('visa', 'length', 'max'=>25),
			array('visa_tipo', 'length', 'max'=>75),
			array('pasaporte', 'length', 'max'=>55),
			array('tipo_calculo', 'length', 'max'=>9),
			array('fecha_nacimiento, fecha_ingreso, visa_vigencia, pasaporte_vigencia', 'safe'),
			array('destajo','default','value'=>0),
			array('emisor_ID','default','value'=>0),
			array('destajo','length','max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, puesto_trabajo_ID, emisor_ID, nombres, apellidos, calle, numero, colonia, codigo_postal, email, ife, sexo,
			rfc, pais, municipio, estado, localidad, celular, estado_civil, fecha_nacimiento, curp, url_imagen, imss, fecha_ingreso,
			num_cuenta, clabe_banco, banco, contrato, estatus, periodicidad_pago, codigo_tarjeta, tipo_contrato, tipo_jornada, tipo_regimen,
			clase_riesgo, salario_sdi,salario_sdr, salario_diario, tipo_pago ,registro_patronal_ID, apellido_materno, apellido_paterno, tipo_calculo, salario_mensual, tabulador_ID', 'safe'),
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
			'puestoTrabajo' => array(self::BELONGS_TO, 'PuestoTrabajo', 'puesto_trabajo_ID'),
			'entradaAlmacens' => array(self::HAS_MANY, 'EntradaAlmacen', 'empleado_ID'),
			'empleadoContratos' => array(self::HAS_MANY, 'EmpleadoContrato', 'empleado_ID'),
			'entradasSalidases' => array(self::HAS_MANY, 'EntradasSalidas', 'empleado_ID'),
			'empleadoContactoses' => array(self::HAS_MANY, 'EmpleadoContactos', 'empleado_ID'),
			'empleadoVacunases' => array(self::HAS_MANY, 'EmpleadoVacunas', 'empleado_ID'),
			'tabulador' => array(self::BELONGS_TO, 'Tabulador', 'tabulador_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'puesto_trabajo_ID' => 'Puesto Trabajo',
			'emisor_ID' => 'Emisor',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'calle' => 'Calle',
			'numero' => 'Numero',
			'colonia' => 'Colonia',
			'codigo_postal' => 'Codigo Postal',
			'email' => 'Email',
			'ife' => 'Ife',
			'sexo' => 'Sexo',
			'rfc' => 'Rfc',
			'pais' => 'Pais',
			'municipio' => 'Municipio',
			'estado' => 'Estado',
			'localidad' => 'Localidad',
			'celular' => 'Celular',
			'estado_civil' => 'Estado Civil',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'curp' => 'Curp',
			'url_imagen' => 'Url Imagen',
			'imss' => 'Imss',
			'fecha_ingreso' => 'Fecha Ingreso',
			'num_cuenta' => 'Num Cuenta',
			'clabe_banco' => 'Clabe Banco',
			'banco' => 'Banco',
			'contrato' => 'Contrato',
			'estatus' => 'Estatus',
			'periodicidad_pago' => 'Periodicidad Pago',
			'codigo_tarjeta' => 'Codigo Tarjeta',
			'tipo_contrato' => 'Tipo Contrato',
			'tipo_jornada' => 'Tipo Jornada',
			'tipo_regimen' => 'Tipo Regimen',
			'clase_riesgo' => 'Clase Riesgo',
			'salario_sdi' => 'Salario Diario Integrado',
			'salario_sdr' => 'Salario Diario Real',
			'tipo_sangre' => 'Tipo Sangre',
			'visa' => 'Visa',
			'visa_tipo' => 'Visa Tipo',
			'visa_vigencia' => 'Visa Vigencia',
			'pasaporte' => 'Pasaporte',
			'pasaporte_vigencia' => 'Pasaporte Vigencia',
			'salario_diario' => 'Salario Diario',
			'tipo_pago' => 'Forma de Pago',
			'registro_patronal_ID' => 'Registro',
			'apellido_materno' => 'Apellido Materno',
			'apellido_paterno' => 'Apellido Paterno',
			'tipo_calculo' => 'Tipo de cálculo',
			'salario_mensual' => 'Salario mensual',
			'tabulador' => 'Tabulador',
			'destajo' => 'Salario por destajo',
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
		$criteria->compare('puesto_trabajo_ID',$this->puesto_trabajo_ID);
		$criteria->compare('emisor_ID',$this->emisor_ID);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('codigo_postal',$this->codigo_postal,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('ife',$this->ife,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('estado_civil',$this->estado_civil,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('curp',$this->curp,true);
		$criteria->compare('url_imagen',$this->url_imagen,true);
		$criteria->compare('imss',$this->imss,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('num_cuenta',$this->num_cuenta,true);
		$criteria->compare('clabe_banco',$this->clabe_banco,true);
		$criteria->compare('banco',$this->banco,true);
		$criteria->compare('contrato',$this->contrato,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('periodicidad_pago',$this->periodicidad_pago,true);
		$criteria->compare('codigo_tarjeta',$this->codigo_tarjeta,true);
		$criteria->compare('tipo_contrato',$this->tipo_contrato);
		$criteria->compare('tipo_jornada',$this->tipo_jornada);
		$criteria->compare('tipo_regimen',$this->tipo_regimen);
		$criteria->compare('clase_riesgo',$this->clase_riesgo);
		$criteria->compare('salario_sdi',$this->salario_sdi);
		$criteria->compare('salario_sdr',$this->salario_sdr);
		$criteria->compare('tipo_sangre',$this->tipo_sangre,true);
		$criteria->compare('visa',$this->visa,true);
		$criteria->compare('visa_tipo',$this->visa_tipo,true);
		$criteria->compare('visa_vigencia',$this->visa_vigencia,true);
		$criteria->compare('pasaporte',$this->pasaporte,true);
		$criteria->compare('pasaporte_vigencia',$this->pasaporte_vigencia,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('tipo_calculo',$this->tipo_calculo,true);
		$criteria->compare('salario_mensual',$this->salario_mensual,true);
		$criteria->compare('tabulador',$this->tabulador,true);
		$criteria->compare('destajo',$this->destajo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empleado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validarApellidos(){
		if(isset($this->apellidos) && $this->apellido_paterno.$this->apellido_materno==""  ){
			$apellidos=$this->apellidos;
		}else{
			$apellidos=$this->apellido_paterno." ".$this->apellido_materno;
		}

		return $apellidos;
	}

	public function getNombreCompleto(){
		return $this->nombres." ".$this->validarApellidos();
	}

	public function getApellidoNombre(){

		return $this->validarApellidos()." ".$this->nombres;
	}

	public function getNombrePuesto(){
		if(isset($this->puestoTrabajo)){
			return $this->puestoTrabajo->nombre;
		}else{
			return "";
		}
	}

	public function getNombreDepartamento(){
		if(isset($this->puestoTrabajo)){
			return $this->puestoTrabajo->nombreDepartamento;
		}else{
			return "";
		}
	}


	//Listado de Empleados
	public static function getArrLista($index=false){

		$arrModel=Empleado::model()->findAll(array('order'=>'nombres'));
		$arrValues=array(""=>"Selecciona un Empleado");

		foreach ($arrModel as $model) {
			$arrValues[$model->ID] = $model->nombreCompleto;
		}

		if(!$index){
			return $arrValues;
		}else{
			return (isset($arrValues[$index]))?$arrValues[$index]:"--";
		}
	}
	//Listado de Empleados Asociativa
	public static function getArrListaAsociativa($index=false, $ajax = false){

		$arrModel=Empleado::model()->findAll(array('order'=>'nombres'));
		//$arrValues=array(""=>"Selecciona un Empleado");
		$arrValues=array();

		foreach ($arrModel as $model) {
			$arrValues[] = array(
				"id" => $model->ID,
				"name"=> $model->nombreCompleto
			);
		}

		if(!$index){
			return $arrValues;
		}else{

			return (isset($arrValues[$index]))?$arrValues[$index]:"--";
		}
	}

	//Listado de Empleados
	public static function getArrListaID($index=false){

		$arrModel=Empleado::model()->findAll(array("order"=>"apellidos"));
		$arrValues=array(""=>"Selecciona un Empleado");

		foreach ($arrModel as $model) {
			$arrValues[$model->ID] = $model->ID." - ".$model->apellidoNombre;
		}

		if(!$index){
			return $arrValues;
		}else{
			return (isset($arrValues[$index]))?$arrValues[$index]:"--";
		}
	}
	public static function getLista(){
		$arrList=array();
		$arrModel=Empleado::model()->findAll(array("condition"=> "estatus  =  'activo'", 'order'=>'nombres'));

		foreach ($arrModel as $model){
			$arrList[$model->ID] = $model->nombreCompleto;
		}

		return $arrList;
	}
	public static function getListaByEmisor($emisor_ID){
		$arrList=array(''=>'Selección de empleado');
		if($emisor_ID){
			$arrModel=Empleado::model()->findAll(array('select'=>'ID,nombres,apellidos,apellido_paterno,apellido_paterno','condition'=>'emisor_ID = :emisor_ID','params'=>array(':emisor_ID'=>$emisor_ID),'order'=>'nombres'));
			foreach ($arrModel as $model){
				$arrList[$model->ID] = $model->nombreCompleto;
			}
		}
		return $arrList;
	}
	public function sync($key,$values = array()){
		$id = $this->ID;
		$array = (!empty($values))?$values:array();

		switch ($key) {
			case 'vacuna':
				Yii::app()->db->createCommand('DELETE FROM empleado_vacunas WHERE empleado_ID='.$id)->execute();
				if(!empty($array['nombre'][0])){
					$length = count($array['nombre']);
					for ($i=0; $i < $length; $i++) {
						$nombre = $array['nombre'][$i];
						$fecha = (!empty($array['fecha_aplicacion'][$i])?('\''.$array['fecha_aplicacion'][$i].'\''):'null');
						$vigencia = (!empty($array['vigencia'][$i])?('\''.$array['vigencia'][$i].'\''):'null');

						Yii::app()->db->createCommand("INSERT INTO empleado_vacunas (nombre, fecha_aplicacion, vigencia, empleado_ID) VALUES ('{$nombre}', {$fecha}, {$vigencia}, '{$id}')")->execute();
					}
				}

				break;
			case 'contacto':
				Yii::app()->db->createCommand('DELETE FROM empleado_contactos WHERE empleado_ID='.$id)->execute();
				if(!empty($array['valor'][0])){
					$length = count($array['valor']);
					for ($i=0; $i < $length; $i++) {
						$nombre = $array['nombre'][$i];
						$valor = $array['valor'][$i];
						Yii::app()->db->createCommand("INSERT INTO empleado_contactos (valor, nombre, empleado_ID) VALUES ('{$valor}', '{$nombre}', {$id});")->execute();
					}
				}
				break;
			case 'periodicidad':
				Yii::app()->db->createCommand('DELETE FROM empleado_periodicidad WHERE empleado_ID='.$id)->execute();
				foreach ($array as $value)
					Yii::app()->db->createCommand("INSERT INTO empleado_periodicidad (empleado_ID, periodicidad) VALUES ({$id}, '{$value}');")->execute();
				break;

			default:break;
		}
	}


	public static function help($label){

		$help=array(
				"salario_diario"=>"Importe bruto que percibe el trabajador por cada día de trabajo, se usa en el cálculo de nómina fiscal",
				"salario_sdi"=>"Salario díario por el factor de integración derivado de las prestaciones establecidas  en ley, denominado también Salario Base de cotización (SBC), se usa en el cálculo de nómina fiscal",
				"salario_sdr"=>"Importe neto real que el trabajador percidbe por cada día de trabajo, se usa para el cálculo de nómina no fiscal o  mixto",
				"salario_mensual"=>"Importe bruto que el trabajador percibe por un mes de trabajo, se usa para el cálculo de nómina no fiscal o  mixto  y aguinaldos",
			);

		return (isset($help[$label]))?$help[$label]:"";
	}

	public function setSalarioInicial(){
		//Primero revisar si existe un sueldo inicial
		$model=EmpleadoSalario::model()->findByAttributes(array("inicial"=>1));
		if(!$model){
			$model = new EmpleadoSalario;
			$model->inicial=1;
		}
			$model->fecha=$this->fecha_ingreso;
			$model->empleado_ID=$this->ID;
			$model->salario_di=$this->salario_diario;
			$model->salario_dr=$this->salario_sdr;
			$model->salario_mensual=$this->salario_mensual;
			$model->observaciones=($model->observaciones!="")?$model->observaciones:"Salario Inicial";
			$model->save();
	}


	public static  function getTipoNomina()
	{
		$arrTipos = array(
			"fiscal"=> "Regular",
			"no_fiscal"=> "Raya",
			"ambos"=> "Mixta"
		);

		return $arrTipos;
	}

	public static function getListPeriodicidadPago(){
		return array(
			'Hora'           => 'Por hora',
			'Diario'         => 'Diario',
			'Semanal'        => 'Semanal',
			'Quincenal'      => 'Quincenal',
			'Mensual'        => 'Mensual',
			'Catorcenal'     => 'Catorcenal',
			'Bimestral'      => 'Bimestral',
			'Unidad de obra' => 'Unidad de obra',
			'Comision'       => 'Comisión',
			'Presio alzado'  => 'Precio alzado'
		);
	}

	public function getPeriodicidadPago(){
		$arrRes = array();
		$result = Yii::app()->db->createCommand("select periodicidad FROM empleado_periodicidad WHERE empleado_ID = {$this->ID}")->queryAll();
		foreach ($result as $value)
			$arrRes[] = $value['periodicidad'];

		return $arrRes;
	}

	public static function updateApellidos()
	{
		$sql = "SELECT * from empleado";
		$result = Yii::app()->db->createCommand($sql)->queryAll();
		foreach ($result as $row)
		{
			$arAppellidos = explode(' ',$row["apellidos"] );
			$apellido_paterno = $arAppellidos[0];
			$apellido_materno = (count($arAppellidos) > 1) ? $arAppellidos[1] : "";
			$sql2 = "UPDATE empleado SET apellido_paterno = '" .$apellido_paterno . "', apellido_materno = '".$apellido_materno . "' WHERE ID =".$row["ID"];
			Yii::app()->db->createCommand($sql2)->execute();
		}

	}

	public static function getTiposBaja()
	{
		return array(
			'baja_despido' => 'Despido',
			'baja_renuncia' => 'Renuncia',
			'reincorporacion' => 'Reincoporación',
			'alta' => 'Alta',
			'' => '');
	}

	public function getAntiguedad()
	{

	}

	public static function getSalario($empleado_id)
	{
		$data = array();
		$sql = "SELECT * from empleado_salario WHERE  empleado_ID = {$empleado_id} order by fecha DESC";
		$result = Yii::app()->db->createCommand($sql)->queryRow();
		if ($result)
		{
			$data["salario_diario_real"] = $result["salario_dr"];
			$data["salario_diario_integrado"] = $result["salario_di"];
			$data["salario_mensual"] = $result["salario_mensual"];

		}
		else
		{
			$sql = "SELECT salario_diario, salario_mensual, salario_sdi, salario_sdr from empleado where ID = {$empleado_id}";
			$result = Yii::app()->db->createCommand($sql)->queryRow();
			$data["salario_diario_real"] = $result["salario_sdr"];
			$data["salario_diario_integrado"] = $result["salario_sdi"];
			$data["salario_mensual"] = $result["salario_mensual"];

		}
		return $data;
		
	}

	public static function getTotalDestajo($id,$fechai,$fechaf){
		$result=0;
		if(!empty(Empleado::model()->findByPk($id))){
			$query="SELECT
							SUM(`linea_cultivo_actividad_invernadero_registro`.`cantidad` * `linea_cultivo_actividad`.`costo_unitario`) as total
							FROM
							`linea_cultivo_actividad_invernadero_registro`
							JOIN
							`linea_cultivo_actividad`
							ON
							`linea_cultivo_actividad_invernadero_registro`.`lcai_ID`=`linea_cultivo_actividad`.`ID`
							LEFT JOIN
							`actividad`
							ON `actividad`.`ID`=linea_cultivo_actividad.`actividad_ID`
							LEFT JOIN `empleado`
							ON
							`linea_cultivo_actividad_invernadero_registro`.`empleado_ID`=`empleado`.`ID`
							WHERE `linea_cultivo_actividad`.`fecha` BETWEEN '$fechai' AND '$fechaf'
							AND `linea_cultivo_actividad_invernadero_registro`.`empleado_ID`=$id
							AND `actividad`.`destajo`=1 AND `empleado`.`destajo`=1";
				$result=Yii::app()->db->createCommand($query)->queryRow();
		}


		return $result['total'];
	}

	public static function getActividadesDestajo($id,$fechai,$fechaf,$isDestajo){
		$result = array();
		$destajo= $isDestajo ? 1 : 0;
		if(!empty(Empleado::model()->findByPk($id))){
			$query="SELECT
							`actividad`.`ID`,
							`actividad`.`nombre`,
							`linea_cultivo_actividad`.`costo_unitario`,
							`linea_cultivo_actividad_invernadero_registro`.`cantidad`,
							(`linea_cultivo_actividad_invernadero_registro`.`cantidad` * `linea_cultivo_actividad`.costo_unitario) as total
							FROM
							`linea_cultivo_actividad_invernadero_registro`
							JOIN
							`linea_cultivo_actividad`
							ON
							`linea_cultivo_actividad_invernadero_registro`.`lcai_ID`=`linea_cultivo_actividad`.`ID`
							LEFT JOIN
							`actividad`
							ON `actividad`.`ID`=linea_cultivo_actividad.`actividad_ID`
							LEFT JOIN `empleado`
							ON
							`linea_cultivo_actividad_invernadero_registro`.`empleado_ID`=`empleado`.`ID`
							WHERE `linea_cultivo_actividad`.`fecha` BETWEEN '$fechai' AND '$fechaf'
							AND `linea_cultivo_actividad_invernadero_registro`.`empleado_ID`=$id
							AND `actividad`.`destajo`=$destajo AND `empleado`.`destajo`=$destajo";
			$result=Yii::app()->db->createCommand($query)->queryAll();
		}
		return $result;
	}

	public static function getListDestajo(){
		return array('0' => Yii::t('app','No'),'1' => Yii::t('app','Sí'));
	}

}
