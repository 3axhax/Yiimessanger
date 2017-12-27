<?php

/**
 * This is the model class for table "messages".
 *
 * The followings are the available columns in table 'messages':
 * @property integer $id
 * @property integer $id_sender
 * @property integer $id_response
 * @property string $message
 * @property string $time
 * @property integer $seen
 */
class Messages extends CActiveRecord
{
	
	public $inOut = 'in';
	public $column = false;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_sender, id_response, message, time', 'required'),
			array('id_sender, id_response, seen', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_sender, id_response, message, time, seen', 'safe', 'on'=>'search'),
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
			'id_sender' => 'Sender',
			'id_response' => 'Recipient',
			'message' => 'Message',
			'time' => 'Time',
			'seen' => 'Seen',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_sender',$this->id_sender);
		$criteria->compare('id_response',$this->id_response);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('seen',$this->seen);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                'defaultOrder' => 'time DESC',
            ),
		));
	}

	public function columnForMessages($inOut)
	{
		$columns = array(
			array(
				'name' => 'id_sender',
				'value' => 'Users::model()->findByPk($data->id_sender)->name',
			),
			array(
				'name' => 'id_response',
				'value' => 'Users::model()->findByPk($data->id_response)->name',
			),
			'message',
			'time',
			array(
				'name' => 'seen',
				'type' => 'boolean',
			),
			array(
				'class'=>'CButtonColumn',
				'template' => '{view}'.(($inOut == 'in') ? '&nbsp;{message}' : ''),
				'buttons'=>array
				(
					'view' => array
					(
						'imageUrl' => Yii::app()->request->baseUrl.'/images/view-16.png',
					),
					'message' => array
					(
						'label'=>'Answer',
						'url'=>'Yii::app()->getUrlManager()->createUrl("/messages/create", array("id_response" => $data->id_sender))',
						'imageUrl' => Yii::app()->request->baseUrl.'/images/answer-16.png',
					),
				),
			),
		);
		if ($inOut == 'in')
		{
			unset($columns[1]);
			$columns[4] = array(
                'name' => 'seen',
                'value' => '(($data->seen == 0)? "No ".CHtml::image(Yii::app()->request->baseUrl."/images/new-20.png","New") : "Yes")',
                'type' => 'html',
            );
		}
		if ($inOut == 'out')
		{
			unset($columns[0]);
		}
		return $columns;
	}

    public static function getUserList($list = 'contact')
    {
        $criteria=new CDbCriteria;
        $criteria->select='name, id';
        $users = Users::model()->findAll($criteria);
        foreach ($users as $user)
        {
            if ($user->id != Yii::app()->user->id) {
                if ($list == 'contact')
                    if (Users::isUserInContactList($user->id)) $userList[$user->id] = $user->name;
                if ($list != 'contact')
                    if (!Users::isUserInContactList($user->id)) $userList[$user->id] = $user->name;
            }

        }
        return $userList;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Messages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
