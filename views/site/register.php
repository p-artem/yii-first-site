<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\RegisterForm */
/* @var $form ActiveForm */

?>

<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Регистация</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="basic-login">
                    <?php $form = ActiveForm::begin(); ?>
                                <?= $form->field($model, 'username') ?>
                                <?= $form->field($model, 'email') ?>
                                <?= $form->field($model, 'password')->passwordInput() ?>
                                <?= $form->field($model, 'VerifyCode')->widget(Captcha::className(), [
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) ?>
                                <div class="form-group">
                                    <?= Html::submitButton('Регистация', ['class' => 'btn btn-primary']) ?>
                                </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1 social-login">
                <p>You can use your Facebook or Twitter for registration</p>
                <div class="social-login-buttons">
                    <a href="#" class="btn-facebook-login">Use Facebook</a>
                    <a href="#" class="btn-twitter-login">Use Twitter</a>
                </div>
            </div>
        </div>
    </div>
</div>
