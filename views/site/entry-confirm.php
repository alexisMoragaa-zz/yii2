<?php
use yii\helpers\Html;
?>

<p> Ingresaste la siguiente informacion</p>

<ul> 
    <li><label>Nombre : </label> <?= Html::encode($model->name) ?></li>
    <li> <label>Email : </label> <?= Html::encode($model->email)?></li>
</ul>    