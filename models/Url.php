<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Description of Url
 *
 * @author user
 */
class Url extends ActiveRecord {
    public static function tableName() {
        return 'links';
    }
    
   public function addCount() { // Добавляем просмотры при каждом клике
       $this->counter++;
       return $this->save();
   }
   
 
}
