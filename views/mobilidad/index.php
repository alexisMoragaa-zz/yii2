<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css">
<style>
.star{
  height: 14px;
}
.starv{
  height: 21px;
}
.starfalse{
  height: 12px;
}
.starfalsev{
  height: 20px;
}
svg.svg-inline--fa.fa-star.fa-w-18 {
    font-size: 10px;
}
button.btn.btn-info {
    padding: 0px 20px;
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
hr {
    margin-top: 9px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid black;
  }


.bg{
  background-color: #C2C4C4;
  color: white;
  font-weight:bold;
}
.bg-gray{
  background-color: #C3C6C4;
}
#addColaborator{
  background-color: #17D34D;
  padding: 15px;
  margin-bottom: 15px;
}
#btnPublicar{
  margin-top: 5px;
  padding: 2px 20px;
}
#textAddColaborator{
  margin-top: 10px;
  margin-bottom: 5px
}
.fontWhite{
  color: white;
}
.fontBold{
  font-weight: bold;
}

.mt-2{
  margin-top: 1.5em;
}
ul.ui-autocomplete {
    z-index: 1100;
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
<!-- <input type="text" name="" value="" id="autocomplete" class="form-control"> -->
    <ul class="nav nav-tabs nav-justified text-center">
      <li class="active"><a data-toggle="tab" href="#disponible" class="bg">Colaboradores Disponibles</a></li>
      <li class=""><a data-toggle="tab" href="#busco" class="bg">Busco Colaboradores</a></li>
    </ul>


<div class="tab-content ">
    <div class="col-md-12 fondo tab-pane fade in active" id="disponible">
      <br>
      <div class="col-md-12" id="addColaborator">
        <div class="col-sm-12 col-md-10">
          <p class="fontWhite fontBold" id="textAddColaborator" >Publicar Colaboradores Disponibles </p>
        </div>
        <div class="col-sm-12 col-md-2">
          <button type="button" name="button" class="btn btn-default" id="btnPublicar" data-toggle="modal" data-target=".bs-example-modal-lg">Publicar</button>
        </div>
      </div>
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
              <td style='border: inset 0pt; vertical-align:middle'><?= $p->obra ?></td>
              <td style='border: inset 0pt; vertical-align:middle'><?= $p->cargo ?></td>
              <td style='border: inset 0pt; vertical-align:middle'><?= $p->nombre ?></td>
              <td style='border: inset 0pt; vertical-align:middle'>
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
                <?php  }elseif ($p->evaluacion == 0) {?>
                  <img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png" class="starfalse"><img src="/icons/starfalse.png"  class="starfalse">
                <?php }  ?>
              <td style='border: inset 0pt'>dd/mm/aaaa</td>
              <td style='border: inset 0pt'>dd/mm/aaaa</td>
              <td style='border: inset 0pt'><button class="btn btn-info">Contactar</button></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <!-- <button type="button" name="button" id="data">Cargar Mas</button> -->
      <a href="#" class="" id="data">Cargar mas <span class="caret"></span></a>
<br><br>
      <!-- <div class="col-md-12 well" >
        <p>Descargar Lista de Colaboradores Disponibles</p>
        <hr>

        <div class="col-sm-12 col-md-2">
          <label for="">Obra</label>
          <input type="text" name="" value="" class="">
        </div>

        <div class="col-sm-12 col-md-2">
          <label for="[object Object]">Cargolabel</label>
          <input type="text" name="" value="" class="">
        </div>

        <div class="col-sm-12 col-md-2">
          <label for="[object Object]">Evaluacion</label>
          <input type="text" name="" value="" class="">
        </div>
        <div class="col-sm-12 col-md-2">
           <label for="[object Object]">Desde </label>
               <input type="date" name="" value="" class="">
        </div>

        <div class="col-sm-12 col-md-2">
          <label for="[object Object]">Hasta </label>
          <input type="date" name="" value="" class="">
        </div>

        <div class="col-sm-12 col-md-2">
          <label for="[object Object]">.</label>
          <button type="button" name="button" class="btn btn-warning">Descargar</button>
      </div>
    </div> -->



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


<!-- Modal Publicar Colaborador Disponible -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h6 class="modal-title" id="gridSystemModalLabel">Publicar Colaborador</h6>
       </div>
       <div class="modal-body">
         <div class="row">
            <div class="col-sm-12">
              <div class="col-md-12 well">
              <h4>Datos Colaborador</h4>

              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-3">
                  <label for="" class="control-label">Nombre</label>
                </div>
                <div class="col-sm-12 col-md-9">
                  <input type="text" class="form-control" id="searchName">
                  <div id="suggestions"></div>
                </div>
              </div>


              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-3">
                  <label for="" class="control-label">Cargo</label>
                </div>
                <div class="col-sm-12 col-md-9">
                  <input type="text" class="form-control" id="cargo">
                </div>
              </div>

              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-3">
                  <label for="" class="control-label">Obra</label>
                </div>
                <div class="col-sm-12 col-md-9">
                  <input type="text" class="form-control" id="obra">
                </div>
              </div>

              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-3">
                  <label for="" class="control-label">Email</label>
                </div>
                <div class="col-sm-12 col-md-9">
                  <input type="text" class="form-control" id="email">
                </div>
              </div>

              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-3">
                  <label for="" class="control-label">Telefono</label>
                </div>
                <div class="col-sm-12 col-md-9">
                  <input type="text" class="form-control" id="telefono">
                </div>
              </div>

              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-4">
                  <label for="" class="control-label">Disponibilidad</label>
                </div>
                <div class="col-sm-12 col-md-8">
                  <input type="text" class="form-control">
                </div>
              </div>

              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-3">
                  <label for="" class="control-label">Evaluacion</label>
                </div>
                <div class="col-sm-12 col-md-9">
                   <img src="/icons/starfalse.png" class="starfalsev" id="star1"> <img src="/icons/starfalse.png" class="starfalsev" id="star2">
                   <img src="/icons/starfalse.png" class="starfalsev" id="star3"> <img src="/icons/starfalse.png"  class="starfalsev" id="star4">
                   <img src="/icons/starfalse.png" class="starfalsev"id="star5">  <span class="glyphicon glyphicon-remove starfalsev" id="clear"></span>
                 </div>
              </div>

              <div class="col-sm-12 col-md-6 mt-2">
                <div class="col-sm-12 col-md-4">
                  <label for="" class="control-label">Recomendacion</label>
                </div>
                <div class="col-sm-12 col-md-8">
                  <textarea name="name" rows="4" class="form-control"></textarea>
                </div>
              </div>
<button type="button" name="button" id="send" class="btn btn-success">Enviar</button>
            </div>
            </div>
          </div>
       </div>

    </div>
  </div>
</div>

</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
<script type="text/javascript">


let limit =5//establecemos una variable limit en ya que en la tabla mostramos los primeros 5 registros
  $("#data").click(function(e){//ejecutamos la funcion con el evento click sobre #data
    e.preventDefault();//desasctivamos el comportamiento por default del elemento
    limit +=5//cada vez que se desencadene el evento sumamos 5 al limite y traemos 5 resultados mas
    $.get('/index.php?r=mobilidad/ajax&limit='+limit,function(data){
//lanzamos una peticion get a la ruta la cual nos retorna un string con el codigo html
      document.getElementById("tbody").innerHTML= data
//seleccionamos el body de la tabla he insertamos la data con el codigo html que traemos desde la peticon ajax
    }); //fin peticion ajax
  });// fin evento click



  // creamos una funcion para autocompletar los campos
  // $("#searchName").autocomplete({
  //   source: '/index.php?r=mobilidad/autocomplete-ajax',
  //   minLenght:3,
  //   select : function(event, ui){
  //     $("#searchName").val(ui.item.value);
  //     $("#obra").val(ui.item.id);
  //
  //   }
  // });

$( "#searchName" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "index.php?r=mobilidad/autocomplete-ajax",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function( data ) {
     response( data );
     console.log(data);
    }
   });
  },
  select: function (event, ui) {
   // Set selection

   $('#searchName').val(ui.item.label); // display the selected text
   $("#obra").val(ui.item.obra);
   $("#telefono").val(ui.item.telefono);
   $("#cargo").val(ui.item.cargo);
   $("#email").val(ui.item.email);
   // $('#selectuser_id').val(ui.item.value); // save selected id to input
   return false;
  }
 });


  var star1 = document.getElementById("star1");//obtenemos el elemento
  var star2 = document.getElementById("star2");//obtenemos el elemento
  var star3 = document.getElementById("star3");//obtenemos el elemento
  var star4 = document.getElementById("star4");//obtenemos el elemento
  var star5 = document.getElementById("star5");//obtenemos el elemento
  var clear = document.getElementById("clear");//obtenemos el elemento


let star = 0;//creamos una variable star para contene el numero de estrellas seleccionado

clear.addEventListener('click',()=>{//creamos una funcion para limpiar las estrellas y dejarlas en false
  star1.src='/icons/starfalse.png'
  star1.className='starfalsev'
  star2.src='/icons/starfalse.png'
  star2.className='starfalsev'
  star3.src='/icons/starfalse.png'
  star3.className='starfalsev'
  star4.src='/icons/starfalse.png'
  star4.className='starfalsev'
  star5.src='/icons/starfalse.png'
  star5.className='starfalsev'
   star = 0
})
  star1.addEventListener('click',()=>{//creamos una serie de funciones que muesran las estrella susando los eventos clicks sobre las mismas
    star1.src='/icons/startrue.png'//añadimos la estrela que representa el true
    star1.className='starv'//añadimos una clase que aumenta el tamaño de la misma
      star2.src='/icons/starfalse.png'//añadimos el icono que representa el false
      star2.className='starfalsev'
      star3.src='/icons/starfalse.png'
      star3.className='starfalsev'
      star4.src='/icons/starfalse.png'
      star4.className='starfalsev'
      star5.src='/icons/starfalse.png'
      star5.className='starfalsev'
       star = 1
  })
  star2.addEventListener("click",()=>{
    star1.src='/icons/startrue.png'
    star1.className='starv'
    star2.src='/icons/startrue.png'
    star2.className='starv'
    star3.src='/icons/starfalse.png'
    star3.className='starfalsev'
    star4.src='/icons/starfalse.png'
    star4.className='starfalsev'
    star5.src='/icons/starfalse.png'
    star5.className='starfalsev'
     star = 2
  });
  star3.addEventListener("click",()=>{
    star1.src='/icons/startrue.png'
    star1.className='starv'
    star2.src='/icons/startrue.png'
    star2.className='starv'
    star3.src='/icons/startrue.png'
    star3.className='starv'
    star4.src='/icons/starfalse.png'
    star4.className='starfalsev'
    star5.src='/icons/starfalse.png'
    star5.className='starfalsev'
    star = 3
  });

  star4.addEventListener("click",()=>{
    star1.src='/icons/startrue.png'
    star1.className='starv'
    star2.src='/icons/startrue.png'
    star2.className='starv'
    star3.src='/icons/startrue.png'
    star3.className='starv'
    star4.src='/icons/startrue.png'
    star4.className='starv'
    star5.src='/icons/starfalse.png'
    star5.className='starfalsev'
    star = 4
  });
  star5.addEventListener("click",()=>{
    star1.src='/icons/startrue.png'
    star1.className='starv'
    star2.src='/icons/startrue.png'
    star2.className='starv'
    star3.src='/icons/startrue.png'
    star3.className='starv'
    star4.src='/icons/startrue.png'
    star4.className='starv'
    star5.src='/icons/startrue.png'
    star5.className='starv'
    star = 5
  });

// $("#star1").hover(function(){
//   $this.
//   console.log("pasaste por la estrella numero 1")
// });
// $("#star2").hover(function(){
//   console.log("pasaste por la estrella numero 2")
// });
// $("#star3").hover(function(){
//   console.log("pasaste por la estrella numero 3")
// });
// $("#star4").hover(function(){
//   console.log("pasaste por la estrella numero 4")
// });
// $("#star5").hover(function(){
//   console.log("pasaste por la estrella numero 5")
// });
</script>
