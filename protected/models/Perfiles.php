<?php

/**
 * This is the model class for table "perfiles".
 *
 * The followings are the available columns in table 'perfiles':
 * @property integer $id
 * @property string $nombre
 * @property string $resena
 * @property string $trayectoria
 * @property string $web
 * @property integer $usuarios_id
 * @property integer $areas_id
 *
 * The followings are the available model relations:
 * @property Audios[] $audioses
 * @property Fotos[] $fotoses
 * @property Usuarios $usuarios
 * @property Areas $areas
 * @property Propuestas[] $propuestases
 * @property RedesHasPerfiles[] $redesHasPerfiles
 * @property Videos[] $videoses
 */
class Perfiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Perfiles the static model class
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
		return 'perfiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, resena, usuarios_id, areas_id', 'required'),
			array('usuarios_id, areas_id', 'numerical', 'integerOnly'=>true),
			array('nombre, web', 'length', 'max'=>255),
			array('trayectoria', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, resena, trayectoria, web, usuarios_id, areas_id', 'safe', 'on'=>'search'),
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
			'audioses' => array(self::HAS_MANY, 'Audios', 'perfiles_id'),
			'fotoses' => array(self::HAS_MANY, 'Fotos', 'perfiles_id'),
			'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
			'areas' => array(self::BELONGS_TO, 'Areas', 'areas_id'),
			'propuestases' => array(self::HAS_MANY, 'Propuestas', 'perfiles_id'),
			'redesHasPerfiles' => array(self::HAS_MANY, 'RedesHasPerfiles', 'perfiles_id'),
			'videoses' => array(self::HAS_MANY, 'Videos', 'perfiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'resena' => 'Resena',
			'trayectoria' => 'Trayectoria',
			'web' => 'Web',
			'usuarios_id' => 'Usuarios',
			'areas_id' => 'Areas',
			'value' => 'Value',
			'label' => 'Label',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('resena',$this->resena,true);
		$criteria->compare('trayectoria',$this->trayectoria,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('usuarios_id',$this->usuarios_id);
		$criteria->compare('areas_id',$this->areas_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function buscar($term)
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'id, nombre';
		$criteria->compare('nombre', $term, true);

		$artistas = $this->findAll($criteria);
		$resultado = array();

		foreach($artistas as $value)
		{
			$resultado[] = array('value' => $value->id,
								 'label' => $value->nombre);
		}
		/*print_r($resultado);
		Yii::app()->end();*/

		return $resultado;
	}

	public function findRandom($page = 1)
	{
		$max 	= $this->count();
		$offset = rand(0, $max-1);

		//SELECT * FROM myTable WHERE RAND()<( SELECT (( 12/COUNT(*) )*10) FROM myTable) ORDER BY RAND() LIMIT 12;

		$n 						= 12;
		$offset 				= $n * $page;
		$pcriteria 				= new CDbCriteria;
		$pcriteria->addCondition('RAND()<(SELECT (('.$n.'/COUNT(*) )*10) FROM '.$this->tableName().')');
		$pcriteria->order 		= 'RAND()';
		//$pcriteria->offset 		= $offset;
		$pcriteria->limit 		= $n;
	
		$perfiles = $this->findAll($pcriteria);

		return $perfiles;
	}

}