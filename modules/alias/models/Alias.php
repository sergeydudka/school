<?php

namespace modules\alias\models;

/**
 * This is the model class for table "alias".
 *
 * @property int $alias_id
 * @property int $language_id
 * @property int $ref_id
 * @property string $ref_model
 * @property string $code
 */
class Alias extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'alias';
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['alias_id'], 'required'],
			[['alias_id', 'language_id', 'ref_id'], 'integer'],
			[['ref_model', 'code'], 'string', 'max' => 256],
			[['code'], 'unique'],
			[['alias_id'], 'unique'],
		];
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'alias_id' => 'Alias ID',
			'language_id' => 'Language ID',
			'ref_id' => 'Ref ID',
			'ref_model' => 'Ref Model',
			'code' => 'Code',
		];
	}
	
	public static function getAlias($ref_id, $ref_model) {
		$condition = [
			'ref_id' => $ref_id,
			'ref_model' => $ref_model
		];
		return self::find()->where($condition)->one();
	}
	
	public static function setAlias($ref_id, $ref_model, $code) {
		$model = new self();
		$model->load([
			'ref_id' => $ref_id,
			'ref_model' => $ref_model,
			'code' => $code
		]);
		return $model->save();
	}
}
