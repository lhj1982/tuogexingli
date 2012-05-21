<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $id
 * @property integer $user_id
 * @property string $type
 * @property string $body
 * @property string $status
 * @property string $created
 * @property string $ipaddress
 *
 * The followings are the available model relations:
 * @property Advertisement[] $advertisements
 * @property User $user
 * @property UserComment[] $userComments
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, body, created, ipaddress', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>9),
			array('status', 'length', 'max'=>7),
			array('ipaddress', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, type, body, status, created, ipaddress', 'safe', 'on'=>'search'),
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
			'advertisements' => array(self::MANY_MANY, 'Advertisement', 'advertisement_message(message_id, advertisement_id)'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'userComments' => array(self::HAS_MANY, 'UserComment', 'message_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'type' => 'Type',
			'body' => 'Body',
			'status' => 'Status',
			'created' => 'Created',
			'ipaddress' => 'Ipaddress',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('ipaddress',$this->ipaddress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}