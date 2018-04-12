<?php

namespace app\controllers;
//establecemos el namespace del controlador
use yii\web\Controller;//importamos la clase controller
use yii\data\Pagination;//importamos la clase pagination
use app\models\Country;//importamos el modelo country para manipular la tabla

class CountryController extends Controller
{//creamos la clase CountryController para administrar los metodos que  usaran la tabla country

    public function actionIndex(){
        $query = Country::find();
        //countri find esta referenciando al nombre de la tabla? / nos trae todos los registros de la tabla

        $pagination = new Pagination([//creamos un nuevo objeto de la clase paginacion
            'defaultPageSize' => 5,//establecemos el limite de registros por paginas
            'totalCount' => $query->count(),//añadimos el total de registros obtenidos por la consulta
        ]);

        $countries = $query->orderBy('name')//asignamos a la variable countri el resultado de la consulta alojada en query
                // ordenada por nombre, y con la paginacion establecida
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();//retornamos todos los registros

        return $this->render('index',[//retornamos la vista index de este controlador con el objeto countris que
            //contiene el resultadi de la consulta, y el objeto paginacion
            'countries' => $countries,
            'pagination' => $pagination,
        ]);

    }

    public function actionAjax(){
      $query = Country::find();

      $pagination = new Pagination([//creamos un nuevo objeto de la clase paginacion
          'defaultPageSize' => 5,//establecemos el limite de registros por paginas
          'totalCount' => $query->count(),//añadimos el total de registros obtenidos por la consulta
      ]);

      $countries = $query->orderBy('name')//asignamos a la variable countri el resultado de la consulta alojada en query
          // ordenada por nombre, y con la paginacion establecida
          ->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all();//retornamos todos los registros

          // $response = Yii::app->response;
          // $response->format = \yii\web\Response::FORMAT_JSON;
          // $response->data = $countries;
          return $this->render($countries);
    }


}
