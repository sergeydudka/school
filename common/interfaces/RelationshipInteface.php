<?php
/**
 * Created by PhpStorm.
 * User: almon
 * Date: 22.07.2018
 * Time: 13:17
 */

namespace common\interfaces;

interface RelationshipInteface {
	const RELATION_HAS_ONE = 1;
	const RELATION_HAS_MANY = 2;
	
	public static function relationships();
}