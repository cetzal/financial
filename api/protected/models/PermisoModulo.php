<?php

/**
 * This is the model class for table "permiso_modulo".
 *
 * The followings are the available columns in table 'permiso_modulo':
 * @property integer $ID
 * @property integer $permiso_ID
 * @property integer $modulo_ID
 *
 * The followings are the available model relations:
 * @property Permiso $permiso
 * @property Modulo $modulo
 */
class PermisoModulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'permiso_modulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('permiso_ID, modulo_ID', 'required'),
			array('permiso_ID, modulo_ID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, permiso_ID, modulo_ID', 'safe', 'on'=>'search'),
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
			'permiso' => array(self::BELONGS_TO, 'Permiso', 'permiso_ID'),
			'modulo' => array(self::BELONGS_TO, 'Modulo', 'modulo_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'permiso_ID' => 'Permiso',
			'modulo_ID' => 'Modulo',
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
		$criteria->compare('permiso_ID',$this->permiso_ID);
		$criteria->compare('modulo_ID',$this->modulo_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermisoModulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
