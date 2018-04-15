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
      $query = Mobilidad::find();


        $data = $query->orderBy('id')
          ->limit(5)
          ->all();



        return $this->render('index',['data'=>$data]);
        //retornamos la vista index de este contrlador
    }



        public function actionAjax(){
          $limit = $_GET['limit'];

          $query = Mobilidad::find();

          // $pagination = new Pagination([//creamos un nuevo objeto de la clase paginacion
          //     'defaultPageSize' => 5,//establecemos el limite de registros por paginas
          //     'totalCount' => $query->count(),//añadimos el total de registros obtenidos por la consulta
          // ]);

          $mob = $query->orderBy('id')//asignamos a la variable countri el resultado de la consulta alojada en query
              // ordenada por nombre, y con la paginacion establecida
              ->offset(0)
              ->limit($limit)
              ->all();//retornamos todos los registros


          $html="";//definimos una variable hrml para concatenar la consulta
          foreach ($mob as $m ) {
            if($m->evaluacion == 5){
              $e ="<img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png'  class='star'></td><td style='border: inset 0pt'> ";
            }elseif($m->evaluacion == 4){
              $e ="<img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/starfalse.png'  class='starfalse'></td><td style='border: inset 0pt'> ";

            }elseif($m->evaluacion == 3){
              $e ="<img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png'  class='starfalse'></td><td style='border: inset 0pt'> ";

            }elseif($m->evaluacion == 2){
              $e ="<img src='/icons/startrue.png' class='star'><img src='/icons/startrue.png' class='star'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png'  class='starfalse'></td><td style='border: inset 0pt'> ";

            }elseif($m->evaluacion == 1){
              $e ="<img src='/icons/startrue.png' class='star'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png'  class='starfalse'></td><td style='border: inset 0pt'> ";

            }else{
              $e ="<img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png' class='starfalse'><img src='/icons/starfalse.png'  class='starfalse'></td><td style='border: inset 0pt'> ";

            }
            $row = "<tr><td style='border: inset 0pt'>"
              .$m->obra."</td><td style='border: inset 0pt'>"
              .$m->cargo."</td><td style='border: inset 0pt'>"
              .$m->nombre."</td><td style='border: inset 0pt'>"

              .$e

              // .""

              .$m->disponibilidad."</td><td style='border: inset 0pt'>"
              .$m->recomendacion."</td><td style='border: inset 0pt'>"
              ." <button class='btn btn-info'> Contactar </button></td><td>";
            //creamos el codigo html por cada elemento de la query
            $html .= $row;//concatenamos el codigo html en la variable html
          }


          return (substr($html,0) );//retornamos el html generado

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
            Yii::$app->session->setFlash('info','Nomina Cargada');
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

        try{
          $inputFiletype = \PHPExcel_IOFactory::identify($ruta);
          //establecemos el tipo de archivo identificando el mismo mediate la ruta
          $objReader = \PHPExcel_IOFactory::CreateReader($inputFiletype);
          //creamos un objeto para leerlo usando el $inputFiletype que creamos con la ruta
          $objPHPExcel = $objReader->load($ruta);
          //creamos un objeto phpexcel cargando el $objReader creado anteriormente, el cual cargamos desde la ruta
        }catch(Exception $ex){
          //si el try falla matamos el proceso y retornamos los errores
            die('Error '.ex);
        }

        $sheet = $objPHPExcel->getSheet(0);//tomamos la primera hoja del excel
        $highestRow = $sheet->getHighestRow();  //tomamos la primera fila de la hoja excel y calculamos la cantidad de filas
        $highestColumn = $sheet->getHighestColumn();//tomamos la primera columna de la hoja y calculamos la ultima columa de la misma

        ini_set('max_execution_time',300);//modificamos el tiempo maximo de ejecucion para este proceso y lo establecemos en 300 segundos (5 minutos)

         for($row = 1; $row <= $highestRow; $row ++){//establecemos un for que recorrera la hoja por cada fila que esta tenga
            $rowData = $sheet->rangeToArray('A' . $row . ':' .$highestColumn.$row, NULL, TRUE, FALSE);
            //creamos un array con la data de la fila  desde donde comenzara la lectura, para la primera iteracion sera desde el A1: hasta la primera fila de la ultima columna
            if($row == 1){
              continue;
              //si la fila es igual a 1 continuamos, ya que en esta estan los titulos
            }
            $mobilidad = new Mobilidad();//creamos una nueva instancia del modelo mobilidad para guardar los datos

            $mobilidad->id = $rowData[0][0];
            $mobilidad->nombre = $rowData[0][1];
            $mobilidad->obra = $rowData[0][2];
            $mobilidad->telefono = $rowData[0][3];
            $mobilidad->cargo = $rowData[0][5];
            $mobilidad->email = $rowData[0][6];

            $mobilidad->save();  //guardamos los registros en el modelo y bd
            Yii::$app->session->setFlash('success',' Nomina Insertada Con Exito');
            //  añadimos un mensaje flash indicando que fuimos redireccionados con exito

            // print_r($mobilidad->getErrors());//imprimimos los errores
         }

       }





}
