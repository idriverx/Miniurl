<?php

namespace app\controllers;

use app\models\Url;
use app\models\UrlForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new UrlForm();
        $urls = Url::find()->orderBy(['id' => SORT_DESC])->all();
        $dataprovider = new \yii\data\ActiveDataProvider([
            'query' => Url::find()->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 15,
                'pageSizeParam' => false,
            ]
        ]);
        return $this->render('index', ['model' => $model, 'urls' => $urls, 'dataprovider' => $dataprovider]);
    }
    
}
