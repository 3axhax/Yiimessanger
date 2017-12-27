<?php

/**
 * This is the model class for table "contact_list".
 *
 * The followings are the available columns in table 'contact_list':
 * @property integer $id
 * @property integer $id_request
 * @property integer $id_response
 * @property integer $status
 */
class ContactList extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contact_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_request, id_response', 'required'),
			array('id_request, id_response, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_request, id_response, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'id_request' => 'Id Request',
			'id_response' => 'Id Response',
			'status' => 'Status',
		);
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContactList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
