<?php

namespace app\models;

use Yii;
use dosamigos\taggable\Taggable;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;



/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $body
 * @property int $author_id
 * @property int $editor_id
 * @property int $category_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $author
 * @property User $createdBy
 * @property User $editor
 * @property User $updatedBy
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    
                ],
                'value' => new Expression('NOW()'),
            ],
          'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],  
            Taggable::className(),         
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'required'],
            [['tagNames'],'safe'],
            [['rate','sum'],'double'],
            [['rating_id', 'author_id', 'editor_id', 'category_id', 'count'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'description','status'], 'string', 'max' => 255],
        
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['editor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['editor_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];

       
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if (empty($this->status)){
            $this->status=1;
            }
            return true;
        }
        
       
        return false;
        
    }
  
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'body' => 'Body',
            'author_id' => 'Author',
            'editor_id' => 'Editor',
            'category_id' => 'Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'rate' => 'Rate',
            'sum' => 'Sum',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('article_tag_assn', ['article_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getStatuses()
    {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }

    public function getCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEditors()
    {
        return $this->hasOne(User::className(), ['id' => 'editor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    public function getAverage()
    {   
        if($this->count != 0) 
        {
            return $average = number_format($this->sum/$this->count,1);
        }
        return 0;
    }


}

