<?php

namespace modules\articles\models;

use common\behaviors\HTMLEncodeBehavior;
use common\behaviors\TimestampBehavior;
use common\models\BaseUser;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article_group".
 *
 * @property int $article_group_id
 * @property int $parent_id
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $ypdated_at
 * @property int $created_by
 * @property int $updated_by
 */
class ArticleGroup extends ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'article_group';
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
	public function rules() {
		return [
			[['description'], 'string'],
			[['created_at', 'updated_at'], 'safe'],
			[['created_by', 'updated_by', 'parent_id'], 'integer'],
			[['title'], 'string', 'max' => 256],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'article_group_id' => 'Article Group ID',
			'parent_id' => 'Parent ID',
			'title' => 'Title',
			'description' => 'Description',
			'created_at' => 'Created At',
			'ypdated_at' => 'Ypdated At',
			'created_by' => 'Created By',
			'updated_by' => 'Updated By',
		];
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getParent() {
		return $this->hasOne(ArticleGroup::class, ['article_group_id' => 'parent_id']);
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCreated() {
		return $this->hasOne(BaseUser::class, ['user_id' => 'created_by']);
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUpdated() {
		return $this->hasOne(BaseUser::class, ['user_id' => 'updated_by']);
	}
	
	/**
	 * @return array
	 */
	public static function getDropdown() {
		return ArrayHelper::map(self::find()->asArray(true)->all(), 'article_group_id', 'title');
	}
}
