<?php

namespace app\models;
//declaramos el namespace
use yii\base\model;
//importamos models desde yii base

class EntryForms extends model{
    //creamos una clase llamada EntryForms que extiende desde models
    public $name;//declaramos una variable publica llamada nomnbre
    public $email;//declaramos una variable publica llamada email
    
    public function rules(){
        //creamos un metodo rules, para establecer las reglas de validaciones
        return[//retornamos las reglas de validacion en un array
            [['name','email'],'required', 'message'=>'Este es un campo Obligatorio'],//establecemos nombre y email como campos requeridos
            ['email','email','message'=>'Ingrese una direccion de correo Electronico valida'],//establecemos el campo email, como un campo de tipo email
        //usamos message para personalizar los mensajes de error, ya que por default estan en ingles
        ];//fin return
    }//fin funcion rules
}//fin clase