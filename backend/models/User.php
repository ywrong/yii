<?php
namespace backend\models;


use yii\db\ActiveRecord;


/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord 
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    /*public static function tableName()
    {
        return '{{%user}}';
    }*/
    
    public static function model($className=__CLASS__)
    {
	return parent::model($className);
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{user}}';
    }
    
    public function rules(){
        return array(
            array('id','username','email')
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
		'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
	);
    }
    
    /**
	 * @return array customized attribute labels (name=>label)
	 */
    public function attributeLabels()
    {
	return array(
		'id' => 'Id',
		'username' => 'Username',
		'email' => 'Email',
	);
    }


}
