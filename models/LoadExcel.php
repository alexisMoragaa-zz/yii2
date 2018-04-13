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
    return [
          [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
      ];
  }

  public function upload(){
    if($this->validate()){
      $this->excelFile->saveAs('uploads/' . $this->excelFile->baseName . '.' . $this->excelFile->extension);


      return true;
    }else{
      return false;
    }
  }
}


 ?>
