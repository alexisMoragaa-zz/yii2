<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>



<?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'name')->label('Ingresa Tu Nombre') ?>
    <?= $form->field($model, 'email')->label('Ingresa Tu Email') ?>

    <div class="form-group">
        <?= Html::submitButton('submit',['class'=>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end();  ?>
