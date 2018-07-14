<?php

namespace modules\articles\models;

use common\behaviors\HTMLEncodeBehavior;
use common\behaviors\TimestampBehavior;
use modules\users\models\User;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article_category".
 *
 * @property int $article_category_id
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $difficult_id
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_category';
    }
	
	public function behaviors() {
		return [
			TimestampBehavior::class => [
				'class' => TimestampBehavior::class,
			],
			HTMLEncodeBehavior::class => [
				'class' => HTMLEncodeBehavior::class,
				'attributes' => [
					'description', 'title'
				]
			],
			BlameableBehavior::class => [
				'class' => BlameableBehavior::class,
			]
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['title'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_category_id' => 'Article Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCreated() {
		return $this->hasOne(User::class, ['user_id' => 'created_by']);
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUpdated() {
		return $this->hasOne(User::class, ['user_id' => 'updated_by']);
	}
	
	/**
	 * @return array
	 */
	public static function getDropdown() {
		return ArrayHelper::map(self::find()->asArray(true)->all(), 'article_category_id', 'title');
	}
}
