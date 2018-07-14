<?php

namespace modules\languages\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "language".
 *
 * @property int $language_id
 * @property string $code
 * @property string $title
 * @property string $flag
 */
class Language extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'language';
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['url', 'code', 'title'], 'required'],
			[['url'], 'string', 'max' => 3],
			[['code'], 'string', 'max' => 50],
			[['title', 'flag'], 'string', 'max' => 256],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'language_id' => 'Language ID',
			'url' => 'Url',
			'code' => 'Code',
			'title' => 'Title',
			'flag' => 'Flag',
		];
	}
	
	/**
	 * @return array
	 */
	public static function getDropdown() {
		return ArrayHelper::map(self::find()->asArray(true)->all(), 'language_id', 'title');
	}
}
