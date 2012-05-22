<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $original_mobile
 * @property string $mobile
 * @property integer $trusted
 * @property string $description
 * @property string $small_image
 * @property string $big_image
 * @property string $password
 * @property string $status
 * @property string $created
 * @property string $modified
 * @property string $last_access
 *
 * The followings are the available model relations:
 * @property Advertisement[] $advertisements
 * @property AdvertisementResponse[] $advertisementResponses
 * @property Message[] $messages
 * @property UserComment[] $userComments
 * @property UserRecommendation[] $userRecommendations
 * @property UserRecommendation[] $userRecommendations1
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, created, modified', 'required'),
			array('trusted', 'numerical', 'integerOnly'=>true),
			array('name, original_mobile, mobile', 'length', 'max'=>20),
			array('email', 'length', 'max'=>50),
			array('description', 'length', 'max'=>100),
			array('small_image, big_image, password', 'length', 'max'=>45),
			array('status', 'length', 'max'=>7),
			array('last_access', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, original_mobile, mobile, trusted, description, small_image, big_image, password, status, created, modified, last_access', 'safe', 'on'=>'search'),
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
			'advertisements' => array(self::HAS_MANY, 'Advertisement', 'user_id'),
			'advertisementResponses' => array(self::HAS_MANY, 'AdvertisementResponse', 'user_id'),
			'messages' => array(self::HAS_MANY, 'Message', 'user_id'),
			'userComments' => array(self::HAS_MANY, 'UserComment', 'target_user'),
			'userRecommendations' => array(self::HAS_MANY, 'UserRecommendation', 'to_user'),
			'userRecommendations1' => array(self::HAS_MANY, 'UserRecommendation', 'from_user'),
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
			'email' => 'Email',
			'original_mobile' => 'Original Mobile',
			'mobile' => 'Mobile',
			'trusted' => 'Trusted',
			'description' => 'Description',
			'small_image' => 'Small Image',
			'big_image' => 'Big Image',
			'password' => 'Password',
			'status' => 'Status',
			'created' => 'Created',
			'modified' => 'Modified',
			'last_access' => 'Last Access',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('original_mobile',$this->original_mobile,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('trusted',$this->trusted);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('small_image',$this->small_image,true);
		$criteria->compare('big_image',$this->big_image,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('last_access',$this->last_access,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Search user by given email and password.
	 * 
	 * @param $email
	 * @param $password
	 * @return user object if find hits, otherwise, return null
	 */
	public function login($email, $password) {
		return Yii::app()->db->createCommand()
		->from('user')
		->where('email=:email AND password=:password', array(':email'=>$email,':password'=>md5($password)))
		->queryRow();
	}
}