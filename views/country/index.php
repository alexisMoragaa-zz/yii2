<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1>Lista de paises</h1>

<ul>
    <?php foreach ($countries as $country): ?>
    <li>
        <?= $country->name, " ($country->code)"?>
        <?= $country->population?>
    </li>
    <?php endforeach;?>
</ul>

<?=LinkPager::widget(['pagination' => $pagination])?>

<div class="container">
  <table class="table">
    <thead>
      <th>Nombre</th>
      <th>Cod</th>
      <th>Poblacion</th>
    </thead>
    <tbody>
      <tr>
        <td id="name"></td>
        <td id="cod"></td>
        <td id="population"></td>
      </tr>
    </tbody>
  </table>

  <button type="button" name="button" class="btn btn-primary" id="data">Cargar Data</button>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script type="text/javascript">

    $("#data").click(function(){
      $.get('/index.php?r=country/ajax',function(data){
        $.each(data, function(index,obj){
          $("#name").text(obj.comuna);
          $("#cod").text(obj.rutero);
          $("#population").text(obj.h_lunes);
        });
      });
    });
  </script>
