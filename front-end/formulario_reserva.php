<br>
<br>

<div class="container">
   <div class="text">Reserva Livro</div>
   <form method="POST" action="reserva">
      <div class="form-row">
         <div class="input-data">
            <input type="date" required name="data_reserva">
            <div class="underline"></div>
            <label for="" style="margin-bottom: 20px;">Data reserva</label>
         </div>
         <div class="input-data">
            <input type="text" required name="codigo">
            <div class="underline"></div>
            <label for="">Código</label>
         </div>
      </div>

      <div class="form-row">
         <div class="input-data">
            <input type="date" required name="data_entrega">
            <div class="underline"></div>
            <label for="" style="margin-bottom: 20px;">Data entrega</label>
         </div>

         <div class="input-data">
            <input type="text" required name="cliente_reserva">
            <div class="underline"></div>
            <label for="">Cliente</label>
         </div>
      </div>
      <div class="form-row submit-btn">
         <div class="input-data">
            <div class="inner"></div>
            <input type="submit" value="Reserva" name="reserva">
         </div>
      </div>
</div>
</div>
</form>