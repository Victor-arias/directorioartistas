<?php

/**
 * This is the model class for table "convocatorias".
 *
 * The followings are the available columns in table 'convocatorias':
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $inicio_convocatoria
 * @property string $fin_convocatoria
 * @property string $inicio_evaluacion
 * @property string $fin_evaluacion
 * @property string $resultados
 *
 * The followings are the available model relations:
 * @property Propuestas[] $propuestases
 */
class Convocatorias extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Convocatorias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convocatorias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, inicio_convocatoria, fin_convocatoria, inicio_evaluacion, fin_evaluacion, resultados', 'required'),
			array('titulo', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, titulo, descripcion, inicio_convocatoria, fin_convocatoria, inicio_evaluacion, fin_evaluacion, resultados', 'safe', 'on'=>'search'),
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
			'propuestases' => array(self::HAS_MANY, 'Propuestas', 'convocatorias_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
			'inicio_convocatoria' => 'Inicio Convocatoria',
			'fin_convocatoria' => 'Fin Convocatoria',
			'inicio_evaluacion' => 'Inicio Evaluacion',
			'fin_evaluacion' => 'Fin Evaluacion',
			'resultados' => 'Resultados',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('inicio_convocatoria',$this->inicio_convocatoria,true);
		$criteria->compare('fin_convocatoria',$this->fin_convocatoria,true);
		$criteria->compare('inicio_evaluacion',$this->inicio_evaluacion,true);
		$criteria->compare('fin_evaluacion',$this->fin_evaluacion,true);
		$criteria->compare('resultados',$this->resultados,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}