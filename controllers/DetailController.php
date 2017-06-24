<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Info;
use app\models\Url;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Description of DetailController
 *
 * @author user
 */
class DetailController extends Controller {
    public function actionView($id) {
        $model = Url::findOne($id);
        $dataprovider = new ActiveDataProvider([
            'query' => Info::find()->where(['link_id' => $id]),
            'pagination' => [
                'pageSize' => 20,
                'pageSizeParam' => false,
            ]
            
        ]);
        return $this->render('view', ['dataprovider' => $dataprovider, 'model' => $model]);
    }
}
