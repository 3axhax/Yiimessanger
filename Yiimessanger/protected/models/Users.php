<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property string $status
 * @property integer $online
 */

class Users extends CActiveRecord
{
	public $confirm_password;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, password, email, status', 'required'),
			array('online', 'safe', 'on'=>'create'),
			array('online', 'numerical', 'integerOnly'=>true),
			array('name, password, email, status', 'length', 'max'=>255),
			array('email', 'email'),
			array('email', 'unique'),
			array('confirm_password', 'required', 'on'=>'create, update'),
			array('password', 'compare', 'compareAttribute'=>'confirm_password', 'on'=>'create, update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, password, email, status, online', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'password' => 'Password',
			'confirm_password' => 'Confirm Password',
			'email' => 'Email',
			'status' => 'Status',
			'online' => 'Online',
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
	public function search($list = 'default')
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		//$criteria->compare('id',array('0'=>1, '1'=>2));
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('online',$this->online);
        if ($list == 'contact list')$criteria->compare('id',Users::getContactList());

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getOnlineStatus()
	{
        $sql = "SELECT yiisession.user_id FROM yiisession WHERE user_id=" . $this->id;
        $command = Yii::app()->db->createCommand($sql);
        $online = isset($command->queryAll()[0]) ? 1 : 0;

		return $online;
	}

    public static function getContactList()
    {
        $user_id = Yii::app()->user->id;
        $list = ContactList::model()->findAll('id_request="'.$user_id.'" or id_response="'.$user_id.'"');
        //$contact_list = array();
        foreach ($list as $contact)
        {
            if ($contact->id_request == $user_id) $contact_list[] = $contact->id_response;
            if ($contact->id_response == $user_id) $contact_list[] = $contact->id_request;
        }
        return $contact_list;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
