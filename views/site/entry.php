<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>



<?php $form = ActiveForm::begin(); ?>

<div class="col-md-6">
  <?= $form->field($model, 'name')->textInput([])->label('Ingresa Tu Nombre') ?>
</div>
<div class="col-md-6">
  <?= $form->field($model, 'email')->label('Ingresa Tu Email') ?>
</div>  


    <div class="form-group">
        <?= Html::submitButton('submit',['class'=>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end();  ?>
