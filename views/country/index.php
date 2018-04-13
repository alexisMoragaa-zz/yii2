<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<h1 class="text-center text-muted">Lista de paises</h1>
<div class="container">
  <table class="table">
    <thead>
      <th>Nombre</th>
      <th>Cod</th>
      <th>Poblacion</th>
    </thead>

    <tbody id="tbody">
    <?php foreach ($countries as $country): ?>
      <tr>
        <td style='border: inset 0pt'><?= $country->code?></td>
        <td style='border: inset 0pt'><?= $country->name?></td>
        <td style='border: inset 0pt'><?= $country->population?></td>
      </tr>
    <?php endforeach;?>
  </tbody>
  </table>

  <button type="button" name="button" class="btn btn-primary " id="data">Cargar Mas</button>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script type="text/javascript">

  let limit =2
    $("#data").click(function(){
      limit +=2
      $.get('/index.php?r=country/ajax&limit='+limit,function(data){

        document.getElementById("tbody").innerHTML= data

        setTimeout(()=> $("#tbody").fadeIn(1000))

      });
    });
  </script>
