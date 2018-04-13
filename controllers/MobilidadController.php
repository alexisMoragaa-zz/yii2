<?php

namespace app\controllers;

class MobilidadController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImportExcel(){

      $imputFile = 'upload'
    }

}
