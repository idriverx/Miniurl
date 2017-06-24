<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Description of Info
 *
 * @author user
 */
class Info extends ActiveRecord {
    public static function tableName() {
        return 'info';
    }
    
    public $link;
    
    public function rules() {
        return [
          ['link_id', 'integer'],
          ['ip', 'string'],
          ['user_agent', 'string'],
        ];
    }
    
    public function addInfo() {
        $info = new Info();
        $info->link_id = $this->link;
        $info->user_agent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
        $info->ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
        return $info->save();
    }
    
    public function getUrl() {
        return $this->hasOne(Url::className(), ['id' => 'link_id']);
    } 
    
}
