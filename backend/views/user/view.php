<style type="text/css">
    .contentIzq h1{width: auto; float: left}
    .contentDer p{width: auto; float: right; margin-top: 20px}
</style>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
if(Yii::$app->user->identity->role == User::ROLE_ADMIN || Yii::$app->user->identity->role == User::ROLE_AGENTE)
    $this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class = 'contentIzq'><h1><?= Html::encode($this->title) ?></h1></div>
    <?php if(Yii::$app->user->identity->role != User::ROLE_AGENTE):?>
        <div class = 'contentDer'>
            <p>
                <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?php if(Yii::$app->user->identity->role == User::ROLE_ADMIN):?>
                    <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Esta seguro que desea eliminar este usuario?',
                            'method' => 'post',
                        ],
                    ]) ?>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>
    <?php if(Yii::$app->user->identity->role == User::ROLE_AGENTE && Yii::$app->user->identity->id == $model->id):?>
        <div class = 'contentDer'>
            <p><?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></p>
        </div>
    <?php endif;?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'numero_telefono',
            'email:email',
            [
                'attribute' => 'role',
                'label' => 'Rol',
                'value' => $model->retornaRol()
            ],
            [
                'attribute' => 'status',
                'label' => 'Estado',
                'value' => $model->status == 10 ? 'Activo' : 'Inactivo'
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
