<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<style media="screen">
  td{
    border:none;

  }
</style>
<h1>Lista de paises</h1>

<!-- <ul>
    <?php foreach ($countries as $country): ?>
    <li>
        <?= $country->name, " ($country->code)"?>
        <?= $country->population?>
    </li>
    <?php endforeach;?>
</ul>

<?=LinkPager::widget(['pagination' => $pagination])?> -->

<div class="container">
  <table class="table">
    <thead>
      <th>Nombre</th>
      <th>Cod</th>
      <th>Poblacion</th>
    </thead>
    <tbody id="tbody">

    </tbody>
  </table>

  <button type="button" name="button" class="btn btn-primary" id="data">Cargar Data</button>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  $("#tbody").hide();
  let limit =0
    $("#data").click(function(){
      limit +=2
      $.get('/index.php?r=country/ajax&limit='+limit,function(data){

        document.getElementById("tbody").innerHTML= data

        setTimeout(()=> $("#tbody").fadeIn(1000))

      });
    });
  </script>
