<?php

use yii\grid\GridView;

?>

<p class = 'alert alert-info'>Количество переходов по данной ссылке: <strong><?= $model->counter ?></strong></p>

<?= GridView::widget([


    'dataProvider' => $dataprovider,
    'columns' => [
        ['attribute' => 'ip', 'label' => 'IP-адрес'],
        ['attribute' => 'user_agent', 'label' => 'С чего заходили'],
    ],
    
]) ?>
