<?php

$this->title = 'Saluda';
use yii\helpers\Html;
?>

<h1>llamado a saluda</h1>
<h3>Mensaje 1 <?= $message1 ?></h3>
<h3>Mensaje 2 <?= $message2 ?></h3>

<?php foreach ($array as $numero ){ ?>
  <strong><?=$numero  ?></strong>
  <br>
<?php }?>

<h4>Parametro enviado por Get/ { <?= $param  ?> }</h4>
<!-- Nuestra url en este momento es http://localhost:8080/index.php?r=site/saluda
y para enviar el parametro por get pasamos el argumento
http://localhost:8080/index.php?r=site/saluda6get=parametro que desemos enviat
 -->
