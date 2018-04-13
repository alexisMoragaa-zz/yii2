<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>

<div class="container">

  <h1 class="text-center text-muted">Seleccionar Archivo Excel</h1>

  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'excelFile')->fileInput() ?>

  <div class="form-group">
    <?= Html::submitButton('submit',['class'=>'btn btn-success']) ?>
  </div>
  <?php ActiveForm::end(); ?>

</div>
