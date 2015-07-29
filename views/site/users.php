<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

?>

<? $images =  Yii::getAlias('@web').'/images/frontend/'; ?>

<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Пользователи</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <?php Pjax::begin(); ?>
            <table id="myTable" class="table table-bordered table-striped table-hover" cellpadding="0" width="100%">
                <thead>
                    <th><?= Html::a('ID <img id="arrow" src="'.$images.''.$arrow.'.png">', ['site/users/'.$orderby.'/id/'.$currentPage]) ?></th>
                    <th><?= Html::a('Логин <img id="arrow" src="'.$images.''.$arrow.'.png">', ['site/users/'.$orderby.'/username/'.$currentPage]) ?></th>
                    <th><?= Html::a('Эл. почта <img id="arrow" src="'.$images.''.$arrow.'.png">', ['site/users/'.$orderby.'/email/'.$currentPage]) ?></th>
                    <th>Статус</th>
                    <th>Роль</th>
                    <th>Дата создания</th>
                </thead>
                <tbody>
                    <? foreach ($allUsers as $user): ?>
                        <tr>
                            <td><?=$user['id']?></td>
                            <td><?=$user['username']?></td>
                            <td><?=$user['email']?></td>
                            <td><?=$user['status']?></td>
                            <td><?=$user['role']?></td>
                            <td><?=$user['created_at']?></td>
                        </tr>
                    <? endforeach; ?>
                </tbody>
            </table>
                <div >
                    <?PHP
                    // display pagination
                    echo LinkPager::widget(['pagination' => $pages, ]);
                    ?>
                </div>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>








