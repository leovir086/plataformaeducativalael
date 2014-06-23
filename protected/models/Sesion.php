<?php

/**
 * This is the model class for table "sesion".
 *
 * The followings are the available columns in table 'sesion':
 * @property integer $id_sesion
 * @property integer $id_user
 * @property string $pid
 * @property string $start_sesion
 * @property string $end_sesion
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class Sesion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sesion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, start_sesion', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('pid', 'length', 'max'=>8),
			array('end_sesion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sesion, id_user, pid, start_sesion, end_sesion', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sesion' => 'Id Sesion',
			'id_user' => 'Id User',
			'pid' => 'Pid',
			'start_sesion' => 'Start Sesion',
			'end_sesion' => 'End Sesion',
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

		$criteria->compare('id_sesion',$this->id_sesion);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('start_sesion',$this->start_sesion,true);
		$criteria->compare('end_sesion',$this->end_sesion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sesion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
