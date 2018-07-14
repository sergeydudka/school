<?php

namespace modules\articles\models;

use common\behaviors\HTMLEncodeBehavior;
use common\behaviors\TimestampBehavior;
use modules\languages\models\Language;
use modules\users\models\User;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $article_id
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property int $article_group_id
 * @property int $language_id
 * @property int $created_by
 * @property int $updated_by
 * @property int $difficult_id
 */
class Article extends \yii\db\ActiveRecord {
	
	const STATUS_DEFAULT = 'disabled';
	
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'article';
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
	
	public function init() {
		if ($this->status === null) {
			$this->status = self::STATUS_DEFAULT;
		}
		
		if ($this->language_id === null) {
			$this->language_id = \Yii::$app->language;
		}
		parent::init();
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['description', 'status', 'title'], 'required'],
			[['description', 'status'], 'string'],
			[['created_at', 'updated_at'], 'safe'],
			[['created_by', 'updated_by', 'article_group_id', 'difficult_id', 'language_id'], 'integer'],
			[['title'], 'string', 'max' => 512],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'article_id' => 'Article ID',
			'title' => 'Title',
			'description' => 'Description',
			'created_at' => 'Date Create',
			'updated_at' => 'Date Update',
			'created_by' => 'Created By',
			'updated_by' => 'Updated By',
			'status' => 'Status',
			'article_group_id' => 'Article Group ID',
			'difficult_id' => 'Difficult',
			'language_id' => 'Language ID',
		];
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getArticleGroup() {
		return $this->hasOne(ArticleGroup::class, ['article_group_id' => 'article_group_id']);
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
	 * @return \yii\db\ActiveQuery
	 */
	public function getDifficult() {
		return $this->hasOne(Difficult::class,
			[
				'difficult_id' => 'difficult_id'
			]
		);
	}
	
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getLanguage() {
		return $this->hasOne(Language::class,
			[
				'language_id' => 'language_id'
			]
		);
	}
}
