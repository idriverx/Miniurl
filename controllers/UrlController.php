<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Url;
use app\models\UrlForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Description of UrlController
 *
 * @author user
 */
class UrlController extends Controller{

    public function actionRelocate($code) {
        $url = Url::find()->where(['short_url' => $code])->one();
        if(!$url) throw new NotFoundHttpException; // если вставили неправильный короткий урл
        else { // иначе редиректим, и добавляем просмотр этой ссылке
            $this->redirect($url->link);
            $url->addCount();
            $info = new \app\models\Info;
            $info->link = $url->id;
            $info->addInfo();
        }
    }
    public function actionAdd() {
        $model = new UrlForm();
        
        if($model->load(Yii::$app->request->post()) && $model->saveLongToShort()) {
            Yii::$app->session->setFlash('created');
        }
        $this->redirect(Yii::$app->request->referrer);

    }
}
