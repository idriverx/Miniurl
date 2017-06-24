<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\helpers\Url;

if(Yii::$app->session->hasFlash('created')) {
    echo '<p class = "alert alert-success">Мы сократили Ваш URL!</p>';
}

$form = ActiveForm::begin(['action' => '/url/add']);
?>

<?= $form->field($model, 'url')->input('url', ['placeholder' => 'https://github.com/']) ?>

<?= Html::submitButton("Сократить", ['class' => 'btn btn-default']) ?>
<?php ActiveForm::end(); ?>

<hr>

<?= GridView::widget([
    'dataProvider' => $dataprovider,
    'columns' => [
        ['attribute' => 'id', 'label' => 'ID'],
        ['attribute' => 'link', 'label' => 'Оригинальная ссылка', 'format' => 'url'],
        ['attribute' => 'short_url', 'label' => 'Сокращенная ссылка', 'format' => 'url', 'value' => function($model) { return Url::to($model->short_url, true); }],
        ['attribute' => 'counter', 'label' => "Переходы"],
        ['attribute' => 'date', 'label' => 'Дата создания', 'format' => 'datetime'],
        ['class' => 'yii\grid\ActionColumn',
        'template' => '{my_button}', 
        'buttons' => [
    'my_button' => function ($url, $model, $key) {
        return Html::a('Статистика', ['detail/view', 'id'=>$model->id]);
    },
],
            ]
        
        ],
]) ?>