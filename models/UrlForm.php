<?php
namespace app\models;

use linslin\yii2\curl\Curl;
use yii\base\Model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UrlForm
 *
 * @author user
 */
class UrlForm extends Model {
    public $url;
    
    public function rules() {
        return [
          ['url', 'required', 'message' => 'Введите ссылку!'],
          ['url', 'url', 'message' => 'Введите корректную ссылку'],
          ['url', 'validateLink']
        ];
    }
    public function attributeLabels() {
        return [
          'url' => 'Введите длинную ссылку'  
        ];
    }
    
    private function getShortLink() {
     
    do {
        $shortCode = substr(str_shuffle(ALLOW_CHARS), 0, 6);
    } while (Url::find()->where(['short_url' => $shortCode])->one());
        
    return $shortCode;
        
    }
    public function validateLink($params) {// проверяем курлом, рабочий ли юрл
        $curl = new Curl;
        $response = $curl->get($this->url);
        if($response == false) $this->addError($params, 'Плохая ссылка..');
    }
    
    public function saveLongToShort() {
        if($this->validate()) {
            $url = new Url();
            $url->link = $this->url;
            $url->short_url = $this->getShortLink();
            return $url->save();
        }
    }
    
}
