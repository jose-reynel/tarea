<style type="text/css">
    .contentIzq h1{width: auto; float: left}
    .contentDer p{width: auto; float: right; margin-top: 20px}
</style>
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\models\User;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class = 'col-md-12'>
        <div class = 'contentIzq'><h1><?= Html::encode($this->title) ?></h1></div>
        <?php if(Yii::$app->user->identity->role == User::ROLE_ADMIN):?>
            <div class = 'contentDer'><p><?= Html::a('Crear Usuarios', ['create'], ['class' => 'btn btn-success']) ?></p></div>
        <?php endif;?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'numero_telefono',
            'email:email',
            [
                'attribute' => 'role',
                'label' => 'Rol',
                'value' => function($data){
                    switch ($data->role) {
                        case '10':
                            return 'Cliente';
                            break;
                        case '20':
                            return 'Agente';
                            break;
                        case '30':
                            return 'Administrador';
                            break;
                        default:
                            return 'N/A';
                            break;
                    }
                }
            ],
            [
                'attribute' => 'status',
                'label' => 'Estado',
                'value' => function($data){
                    return $data->status == 10 ? 'Activo' : 'Inactivo';
                }
            ],
            'created_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'contentOptions' => ['style'=>'width: 10px'],
                'buttons' => [
                    'view' => function ($url, $model){
                        $url = Url::to(['view', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('yii', 'Ver'),
                        ]);
                    },
                    'update' => function ($url, $model){
                        if(Yii::$app->user->identity->role <> User::ROLE_ADMIN) return;
                        $url = Url::to(['update', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('yii', 'Editar'),
                        ]);
                    },
                    'delete' => function ($url, $model){
                        if(Yii::$app->user->identity->role <> User::ROLE_ADMIN) return;
                        $url = Url::to(['delete', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Eliminar'),
                            'data-confirm' => 'Esta seguro que desea eliminar este usuario?',
                            'data-method' => 'post',
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>
</div>
