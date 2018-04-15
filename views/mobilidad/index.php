
<style>
.star{
  height: 14px;
}
.starfalse{
  height: 12px;
}
svg.svg-inline--fa.fa-star.fa-w-18 {
    font-size: 10px;
}
button.btn.btn-info {
    padding: 2px 20px;
}
.menu{
  margin-top: 16px;

  margin
}

.fondo{
  background-color: white;
}
.banner{
  text-align: center;
  padding: 75px;
  margin-bottom: 30px;
}

.disponible{
  color: white;
  font-weight: bold;
  background-color: #70D7D4;
  margin-right: 2px;
}

.busqueda{

  background-color: #C0C1C1    ;
  padding-left: 2px;
}
.but{
  padding: 7px;
}

td{
  font-size: 12px;

}
.bg{
  background-color: #70D7D4;
  color: white;
  font-weight:bold;
}
</style>


<div class="container">

  <div class="col-md-3">
    <div class="col-md-11  fondo">
      <ul>
        <li class="menu">menu</li>
        <li class="menu">menu</li>
        <li class="menu">menu</li>
        <li class="menu">menu</li>
        <li class="menu">menu</li>
        <li class="menu">menu</li>
        <li class="menu">menu</li>
        <li class="menu">menu</li>
      </ul>
      </div>
  </div>
  <div class="col-md-9">
    <div class="col-12 banner fondo">
      Este es el banner
    </div>

    <ul class="nav nav-tabs nav-justified text-center">
      <li class="active"><a data-toggle="tab" href="#disponible" class="bg">Colaboradores Disponibles</a></li>
      <li class=""><a data-toggle="tab" href="#busco">Busco Colaboradores</a></li>
    </ul>


<div class="tab-content">
    <div class="col-md-12 fondo tab-pane fade in active" id="disponible">
      <table class="table">
        <thead>
          <th>Obra</th>
          <th>Cargo</th>
          <th>Nombre</th>
          <th>Evaluacion</th>
          <th>Fecha Disponible</th>
          <th>Fecha Publicacion</th>
          <th>Contactar</th>
        </thead>
        <tbody id="tbody">

        <?php foreach($data as $p ):  ?>
            <tr>
              <td style='border: inset 0pt'><?= $p->obra ?></td>
              <td style='border: inset 0pt'><?= $p->cargo ?></td>
              <td style='border: inset 0pt'><?= $p->nombre ?></td>
              <td style='border: inset 0pt'>
                <?php if( $p->evaluacion == 5){ ?>
                  <img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png"  class="star">
                <?php }elseif ($p->evaluacion == 4) {?>
                  <img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/starfalse.png"  class="starfalse">
                <?php }elseif ($p->evaluacion == 3) {?>
                  <img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png"  class="starfalse">
                <?php }elseif ($p->evaluacion == 2) { ?>
                  <img src="/icons/startrue.png" class="star"><img src="/icons/startrue.png" class="star"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png"  class="starfalse">
                <?php  }elseif($p->evaluacion == 1){ ?>
                  <img src="/icons/startrue.png" class="star"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png" class="star"><img src="/icons/starfalse.png"  class="starfalse">
                <?php  } ?>
              </td>
              <td style='border: inset 0pt'></td>
              <td style='border: inset 0pt'></td>
              <td style='border: inset 0pt'><button class="btn btn-info">Contactar</button></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <button type="button" name="button" id="data">Cargar Mas</button>
    </div>

    <div class="col-md-12 tab-pane fade fondo" id="busco">
      <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere nemo et aut at facilis adipisci, assumenda minus quod dolore. Quaerat, commodi! Ratione nam, molestias vel blanditiis corrupti obcaecati consequuntur doloremque.</div>
      <div>Quis velit porro vitae natus in laborum facilis pariatur iure. Possimus aliquid quas, debitis amet cupiditate, facilis culpa odit suscipit aliquam molestias neque, veritatis quae ad. Sapiente, modi. Nam, suscipit?</div>
      <div>At alias modi asperiores dolorem perspiciatis molestias, minus praesentium quidem quaerat delectus fuga, voluptas, accusantium. Provident veniam impedit nemo adipisci, dolore recusandae ut voluptate delectus, dicta blanditiis, doloribus excepturi enim.</div>
      <div>Amet eaque adipisci molestias quam a qui, modi voluptatem, maiores doloremque minus provident assumenda nisi voluptatibus officiis repudiandae in, consequuntur dolor vitae voluptate quasi. Repudiandae, doloribus? Expedita recusandae, aspernatur eligendi.</div>
      <div>Assumenda beatae hic, aperiam fugiat quos iure temporibus eligendi ad adipisci inventore enim voluptatem culpa expedita natus nostrum explicabo eaque suscipit ratione. Facilis vero, nostrum molestias sunt incidunt unde. Eaque.</div>
      <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla velit ullam maiores aliquid tenetur, consectetur nostrum rem aliquam aspernatur nisi deleniti quod quisquam voluptates consequatur modi harum! Omnis, sequi, sit.</div>
      <div>Explicabo ipsa quas quis ipsam ex, deserunt mollitia architecto pariatur saepe quasi neque vel perspiciatis autem nostrum natus debitis nulla officiis at porro officia enim corporis quidem eligendi quo? Sed.</div>
      <div>Velit fugit laudantium quaerat minus provident, quod voluptatibus, ad dolor aliquam omnis nobis obcaecati dicta porro molestiae facere nam saepe consequatur quae adipisci quo blanditiis et, excepturi. Quod, beatae, ratione.</div>
    </div>
    </div>
  </div>

</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript">

let limit =5
  $("#data").click(function(){
    limit +=5
    $.get('/index.php?r=mobilidad/ajax&limit='+limit,function(data){

      document.getElementById("tbody").innerHTML= data

      setTimeout(()=> $("#tbody").fadeIn(1000))

    });
  });
</script>
