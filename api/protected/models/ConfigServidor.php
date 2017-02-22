<?php

/**
 * This is the model class for table "config_servidor".
 *
 * The followings are the available columns in table 'config_servidor':
 * @property integer $ID
 * @property string $servidor
 * @property integer $puerto
 * @property string $cifrado
 * @property string $usuario
 * @property string $password
 */
class ConfigServidor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'config_servidor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servidor, puerto, cifrado, usuario, password', 'required'),
			array('puerto', 'numerical', 'integerOnly'=>true),
			array('servidor, usuario, password', 'length', 'max'=>250),
			array('cifrado', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, servidor, puerto, cifrado, usuario, password', 'safe', 'on'=>'search'),
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
			'servidor' => 'Servidor',
			'puerto' => 'Puerto',
			'cifrado' => 'Cifrado',
			'usuario' => 'Usuario',
			'password' => 'Password',
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
		$criteria->compare('servidor',$this->servidor,true);
		$criteria->compare('puerto',$this->puerto);
		$criteria->compare('cifrado',$this->cifrado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConfigServidor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
