<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForms;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function actionEntry(){
        $model = new EntryForms;
        //creamos un nuevo objeto de tipo EntryForms

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            //validamos los datos  recibidos en el modelo

            return $this->render('entry-confirm',['model'=>$model]);
        }else{
            //si la validacion del modelo no pasa
            return $this->render('entry',['model'=>$model]);
        }


  /*Que sucede
*la primera llamada a la accion entry nos retorna el else, ya que no incluye datos enviados por post
   * al estar vacia no puede cargar los datos y nos retorna el else, el cual nos muestra el formulario
   * cuando ingresamos los datos al formulario, y lo enviamos este logra cargar los datos objetinos del request
   * en el objeto form y este es enviado a validar, si pasa las validaciones nos retotna una vista llamada entry-confirm
   * la cual esta acompañada del modelo, del cual mas adelante tomamos los datos

   *    */

    }

   public function actionSaluda($get='esto lo recivimos en la url'){//creamos la acion saludar
     $message1 = 'Hola mundo';
     $message2 = 'como estas';
     $numeros =[0,1,2,3,4];
     return $this->render('saluda',[
       'message1'=>$message1,
       'message2'=>$message2,
       'array'=>$numeros,
       'param'=>$get
     ]);
     //retornamos una vista llamada saluda
   }

   public function actionFormulario(){

     return $this->render('formulario');
   }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
