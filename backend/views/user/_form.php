<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'numero_telefono')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?php if(Yii::$app->user->identity->role == User::ROLE_ADMIN):?>
        <?= $form->field($model, 'role')->dropDownList(['10' => 'Cliente', '20' => 'Agente', '30' => 'Administrador']) ?>
        <?= $form->field($model, 'status')->dropDownList(['1' => 'Inactivo', '10' => 'Activo']) ?>
    <?php endif;?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
