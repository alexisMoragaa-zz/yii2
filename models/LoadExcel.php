<?php

namespace app\models;

use yii\base\model;
use yii\web\UploadedFile;


Class LoadExcel extends model{

  public $excelFile;

  public function rules(){
    return[
          [['excelFile'],'file', 'skipOnEmpty' => false, 'extensions' => 'xls, xlsx'],
    ];

  }//fin rules

  public function upload(){
    if($this->validate()){
      //preguntamos si el archivo pasa las validaciones del modelo
      $this->excelFile->saveAs('uploads/' . $this->excelFile->baseName . '.' . $this->excelFile->extension);
//si cumple con las validaciones del modelo lo guardamos en la carpeta uploads con el nombre que traia el archivo
      return true;//retornamos true si las validaciones pasan
    }else{
      return false;//retornamos false si las validaciones no pasan retornamos false en la validacion
    }
  }//fin uopload

}//fin modelo



 ?>
