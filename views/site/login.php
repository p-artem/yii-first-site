<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */
?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Авторизация</h1>
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
                            <?= $form->field($model, 'email') ?>
                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <?= $form->field($model, 'rememberMe')->checkbox()?>
                            <div class="form-group">
                                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
                            </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-sm-7 social-login">
                <p>Or login with your Facebook or Twitter</p>
                <div class="social-login-buttons">
                    <a href="#" class="btn-facebook-login">Login with Facebook</a>
                    <a href="#" class="btn-twitter-login">Login with Twitter</a>
                </div>
                <div class="clearfix"></div>
                <div class="not-member">
                    <p>Not a member? <a href="register">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
