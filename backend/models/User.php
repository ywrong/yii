<?php
namespace backend\models;


use yii\db\ActiveRecord;


/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $email
 */
class User extends ActiveRecord 
{

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
        'name' => 'Name',
		'email' => 'Email',
	);
    }


}
