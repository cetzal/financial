<?php

/**
 * This is the model class for table "tarea_des".
 *
 * The followings are the available columns in table 'tarea_des':
 * @property integer $ID
 * @property integer $id_tarea
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property string $status
 * @property string $fecha_hora
 */
class TareaDes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarea_des';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tarea, descripcion, fecha_inicio, fecha_final, status', 'required'),
			array('id_tarea', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>250),
			array('status', 'length', 'max'=>10),
			array('fecha_hora', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, id_tarea, descripcion, fecha_inicio, fecha_final, status, progres, fecha_hora', 'safe', 'on'=>'search'),
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
			'id_tarea' => 'Id Tarea',
			'descripcion' => 'Descripcion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_final' => 'Fecha Final',
			'status' => 'Status',
			'fecha_hora' => 'Fecha Hora',
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
		$criteria->compare('id_tarea',$this->id_tarea);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_final',$this->fecha_final,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('fecha_hora',$this->fecha_hora,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TareaDes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getListaSelect($id){
		$arrModel=TareasUsuario::model()->findAll("id_des_tareas =".$id);

		$arrLista=array();
		foreach($arrModel as $model){
			$username = User::model()->find('ID ='.$model->id_usuario);
			$arrLista[]=$username->ID;
		}

		return $arrLista;
	}
}
