<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 26.11.2018
 * Time: 20:34
 */

namespace backend\tests\common;


interface ModelTestInterface {
    public function getModuleName();
    public function testCrud();
    public function getDataPath();
}