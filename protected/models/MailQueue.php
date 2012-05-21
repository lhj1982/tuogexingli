<?php

/**
 * This is the model class for table "mail_queue".
 *
 * The followings are the available columns in table 'mail_queue':
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $subject
 * @property string $sender
 * @property string $recipient
 * @property string $message
 * @property string $created
 * @property string $send_time
 * @property integer $sent
 * @property string $error_message
 * @property string $ipaddress
 *
 * The followings are the available model relations:
 * @property AdvertisementResponse[] $advertisementResponses
 */
class MailQueue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MailQueue the static model class
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
		return 'mail_queue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject, sender, recipient, message, created, ipaddress', 'required'),
			array('sent', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>18),
			array('name, sender', 'length', 'max'=>50),
			array('subject, recipient', 'length', 'max'=>100),
			array('ipaddress', 'length', 'max'=>15),
			array('send_time, error_message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, name, subject, sender, recipient, message, created, send_time, sent, error_message, ipaddress', 'safe', 'on'=>'search'),
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
			'advertisementResponses' => array(self::HAS_MANY, 'AdvertisementResponse', 'mail_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'name' => 'Name',
			'subject' => 'Subject',
			'sender' => 'Sender',
			'recipient' => 'Recipient',
			'message' => 'Message',
			'created' => 'Created',
			'send_time' => 'Send Time',
			'sent' => 'Sent',
			'error_message' => 'Error Message',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('sender',$this->sender,true);
		$criteria->compare('recipient',$this->recipient,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('send_time',$this->send_time,true);
		$criteria->compare('sent',$this->sent);
		$criteria->compare('error_message',$this->error_message,true);
		$criteria->compare('ipaddress',$this->ipaddress,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}