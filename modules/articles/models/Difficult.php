<?php

namespace modules\articles\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "difficult".
 *
 * @property int $difficult_id
 * @property string $type
 * @property string $title
 * @property string $sort
 */
class Difficult extends ActiveRecord {
	
	const TYPE_ARTICLE_DIFFICULT = 'article';
	const TYPE_ARTICLE_GROUP_DIFFICULT = 'article_group';
	
	
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'difficult';
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['type', 'title'], 'required'],
			[['type'], 'string'],
			[['sort'], 'integer'],
			[['title'], 'string', 'max' => 256],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'difficult_id' => 'Difficult ID',
			'type' => 'Type',
			'title' => 'Title',
			'sort' => 'Sort',
		];
	}
	
	/**
	 * @return array
	 */
	public static function getDropdown($type) {
		return ArrayHelper::map(
			self::find()
				->asArray(true)
				->where(['type' => $type])
				->orderBy(['sort' => 'ASC'])
				->all(),
			'difficult_id',
			'title'
		);
	}
}
