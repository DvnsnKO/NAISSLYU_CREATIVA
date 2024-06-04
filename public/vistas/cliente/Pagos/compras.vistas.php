<!-- Content Header (Page header) -->




<form action="index.php?ruta=destacados" method="post">
  <div class="row">
    <div class="col-8">

      <div class="form-group">

        <h3><b> Detalle del envio </b> </h3><br>
        <span><i class="fas fa-map"></i></span>
        <label class="" for="direccion">Dirección de envío:</label>
        <input class="form-control right col-10" id="" name="shippingAddress" type="text" required>
      </div>
      <hr>

      <div class="form-group  ">
        <label for="products">Productos comprados:</label>
        <div class="row mb-4  ">

          <div class="col-2 text-center">
            <img src="./public/images/alambrismo-corazones.png" alt="sin imagen" class="w-25">
          </div>

          <div class="col-10 ">
            <div class="small ">Descripcion del producto:</div>
            <div class="row small ">
              <div class="col-6" id="pVar">
                <label class="">cantidad:</label>
                <input class=" col-6 " type="number" id="cantidad" name="cantidad"
                min="1" value="" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4  ">

          <div class="col-2 text-center">
            <img src="./public/images/alambrismo-rombos-arcoiris.png" alt="sin imagen" class="w-25">
          </div>

          <div class="col-10 ">
            <div class="small ">Descripcion del producto:</div>
            <div class="row small ">
              <div class="col-6" id="pVar">
                <label class="">cantidad:</label>
                <input class=" col-6 " type="number" id="cantidad" name="cantidad"
                  min="1" value="" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4  ">

          <div class="col-2 text-center">
            <img src="./public/images/aretes-mostilla-acero.png" alt="sin imagen" class="w-25">
          </div>

          <div class="col-10 ">
            <div class="small ">Descripcion del producto:</div>
            <div class="row small ">
              <div class="col-6" id="pVar">
                <label class="">cantidad:</label>
                <input class=" col-6 " type="number" id="cantidad" name="cantidad"
                  min="1" value="" required>
              </div>
            </div>
          </div>
        </div>




      </div>
      <!-- Hasta aqui los productos agregados -->


      <div class="">
        <label for="productos">Detalles del pago:</label><br>

        <input type="radio" name="pago" id="opcion1" value="opcion1"
          required>&nbsp;&nbsp;Efectivo&nbsp;&nbsp;</input><br>

        <input type="radio" name="pago" id="opcion2" value="opcion2">PSE</input>
        <select name="Pago digital" id="lang">
          <option value="Nequi">Nequi</option>
          <option value="Daviplata">Daviplata</option>
          <option value="Rappypay">Rappypay</option>
          <option value="Movii">Movii</option>
          <option value="Dale">Dale</option>
          <option value="Bancolombia">Bancolombia</option>
          <option value="Banco BBVA">BancoBBVA</option>
          <option value="Banco davivienda">Bancodavivienda</option>
        </select>
        <img src="./public/images/pse.png" width="75" height="75">


        <br>
        <input type="radio" name="pago" id="opcion3" value="opcion3" required>Tarjeta
        debito/credito</input><br>


        <div class="imagen ">
          <img class="imagen" src="./public/images/tarjeta.png" width="160" height="135">

        </div>

        <br>
        <label style="color:#0A0A0A" ;
          for="Nombres">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre del
          titular:&nbsp;&nbsp;
        </label>
        <input type="text" id="Name" name="Name" style="font-family: Arial;  height: 25px;"  /><br>


        <label style="color:#0A0A0A"
          ;for="Nombres">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;numero de
          tarjeta:&nbsp;&nbsp;&nbsp;
        </label>
        <input type="text" id="Name" name="Name" style="font-family: Arial; height: 25px;"  /><br>
        <label style="color:#0A0A0A"
          ;for="Nombres">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;codigo
          CVV:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        <input type="number" id="Name" name="Name" style="font-family: Arial; height: 25px;" /><br>

        <label style="color:#0A0A0A"
          ;for="Nombres">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;fecha
          de caducidad:&nbsp;&nbsp;
        </label>
        <input type="date" id="start" name="trip-start" value="17-02-2024" min="01-01-2024" max="31-12-2024"  />
        <br>&nbsp;&nbsp;


      </div>

    </div>
    <div class="col-4">

      <div class="card card-header">Resumen de la compra
        <table class="table">
          <thead>
            <tr>
              <th scope="col">productos</th>
              <td scope="col">precio en #</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">envio</th>
              <td>precio en #</td>

            </tr>
            <tr>
              <th scope="row">total a pagar</th>
              <td>precio en #</td>

            </tr>
          </tbody>
        </table>
        
          <div class="form-group text-center">
            <button class="btn btn-success" type="submit">Realizar pago</button>
        

      </div>
    </div>


    <!-- /.login-card-body -->

  </div>
</form>
