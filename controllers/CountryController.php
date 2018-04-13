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
            'defaultPageSize' => 2,//establecemos el limite de registros por paginas
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
      $limit = $_GET['limit'];

      $query = Country::find();

      $pagination = new Pagination([//creamos un nuevo objeto de la clase paginacion
          'defaultPageSize' => 5,//establecemos el limite de registros por paginas
          'totalCount' => $query->count(),//añadimos el total de registros obtenidos por la consulta
      ]);

      $countries = $query->orderBy('name')//asignamos a la variable countri el resultado de la consulta alojada en query
          // ordenada por nombre, y con la paginacion establecida
          ->offset(0)
          ->limit($limit)
          ->all();//retornamos todos los registros


      $html="";//definimos una variable hrml para concatenar la consulta
      foreach ($countries as $country ) {
        $row = "<tr><td style='border: inset 0pt'>".$country->code."</td><td style='border: inset 0pt'>".$country->name."</td><td style='border: inset 0pt'>".$country->population."</td><tr>";
        //creamos el codigo html por cada elemento de la query
        $html .=$row;//concatenamos el codigo html en la variable html
      }


      return (substr($html,0) );//retornamos el html generado

    }


}
