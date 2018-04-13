<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Mobilidad;
use app\models\LoadExcel;


class MobilidadController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
        //retornamos la vista index de este contrlador
    }

    public function actionGuardarExcel(){
      //esta funcion guarda un archivo excel para posteriormenete ser ingresado en la base de datos
      $model = new LoadExcel();
      //creamos una nueva instancia del modelo LoadExcel
      if(Yii::$app->request->isPost){
      //validamos vi viene una peticion post en el request
        $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
      //asignamos a la propiedad excelFile el valor de la instancia uploadedFile

        if($model->upload()){
          //validamos si la funcion upload del modelo LoadExcel nos retorna true. si nos retorna true el el archivo se cargo con exito
            Yii::$app->session->setFlash('success','Tu archivo excel se cargo con exito');
          //si la carga del archivo fue exitosa retornamos un mensaje de session indicando que el archivo fue cargado con extito
        }
      }

      return $this->render('loadExcel',['model'=>$model]);
      //si no viene una peticion de tipo post cuando llamamos a la accion retornamos la vista load excel con una instancia del modelo
    }


}
