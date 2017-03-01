<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $ID
 * @property string $nombre_comercial
 * @property string $denominacion
 * @property string $rfc
 * @property string $calle
 * @property string $numero_exterior
 * @property string $numero_interior
 * @property string $colonia
 * @property string $localidad
 * @property string $referencia
 * @property integer $id_estado
 * @property integer $id_localidad_pld
 * @property integer $id_codigo_postal
 * @property string $telefono
 * @property string $email
 * @property string $img_logo
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_comercial, denominacion, rfc, calle, numero_exterior, numero_interior, colonia, localidad, referencia, id_estado, id_localidad_pld, id_codigo_postal, telefono, email, img_logo', 'required'),
			array('id_estado, id_localidad_pld, id_codigo_postal', 'numerical', 'integerOnly'=>true),
			array('nombre_comercial, denominacion, rfc, localidad, email', 'length', 'max'=>100),
			array('calle, numero_exterior, numero_interior, colonia', 'length', 'max'=>50),
			array('referencia, img_logo', 'length', 'max'=>250),
			array('telefono', 'length', 'max'=>13),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, nombre_comercial, denominacion, rfc, calle, numero_exterior, numero_interior, colonia, localidad, referencia, id_estado, id_localidad_pld, id_codigo_postal, telefono, email, img_logo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'nombre_comercial' => 'Nombre Comercial',
			'denominacion' => 'Denominacion',
			'rfc' => 'Rfc',
			'calle' => 'Calle',
			'numero_exterior' => 'Numero Exterior',
			'numero_interior' => 'Numero Interior',
			'colonia' => 'Colonia',
			'localidad' => 'Localidad',
			'referencia' => 'Referencia',
			'id_estado' => 'Id Estado',
			'id_localidad_pld' => 'Id Localidad Pld',
			'id_codigo_postal' => 'Id Codigo Postal',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'img_logo' => 'Img Logo',
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
	/*public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('nombre_comercial',$this->nombre_comercial,true);
		$criteria->compare('denominacion',$this->denominacion,true);
		$criteria->compare('rfc',$this->rfc,true);
		$criteria->compare('calle',$this->calle,true);
		$criteria->compare('numero_exterior',$this->numero_exterior,true);
		$criteria->compare('numero_interior',$this->numero_interior,true);
		$criteria->compare('colonia',$this->colonia,true);
		$criteria->compare('localidad',$this->localidad,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_localidad_pld',$this->id_localidad_pld);
		$criteria->compare('id_codigo_postal',$this->id_codigo_postal);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('img_logo',$this->img_logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}*/

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	//para  obtener el id
	public function getId() {
		$id = 0;
		$dataProvider = new CActiveDataProvider ( 'Empresa' );
		if ($dataProvider->totalItemCount == 1) {
			$dataEmpresa = $dataProvider->getData ();
			$id = $dataEmpresa [0]->id;
		}
		return $id;
	}
}
