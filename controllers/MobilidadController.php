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
            Yii::$app->session->setFlash('info','Tu archivo excel se cargo con exito');
          //si la carga del archivo fue exitosa retornamos un mensaje de session indicando que el archivo fue cargado con extito

          $ruta ='uploads/'.$model->excelFile->name;
          //guardamos la ruta del archivo que cargamos en la variable ruta para enviarla al metodo ImportExcel que cargara el aechivo en la base de datos
         $this->ImportExcel($ruta);
         //si el archivo se cargo con exito redireccionamos a un metodo que lo insertara en la base de datos
        }
      }

      return $this->render('loadExcel',['model'=>$model]);
      //si no viene una peticion de tipo post cuando llamamos a la accion retornamos la vista load excel con una instancia del modelo
    }

    public function ImportExcel($ruta){ //creamos uns funcion que tomara el archivo excel cargado y lo insertara en la base de datos usando la libreria phpexcel
        Yii::$app->session->setFlash('success',' fueste redirigido a otro metodo y me entragaste este ruta '.$ruta);
        //añadimos un mensaje flash indicando que fuimos redireccionados con exito

        try{
          $inputFiletype = \PHPExcel_IOFactory::indentify($ruta);
          //establecemos el tipo de archivo identificando el mismo mediate la ruta
          $objReader = \PHPExcel_IOFactory::CreateReader($inputFiletype);
          //creamos un objeto para leerlo usando el $inputFiletype que creamos con la ruta
          $objPHPExcel = $objReader->load($ruta);
          //creamos un objeto phpexcel cargando el $objReader creado anteriormente, el cual cargamos desde la ruta
        }catch(Exception $ex){
          //si el try falla matamos el proceso y retornamos los errores
            die(ex);
        }



    }


}
