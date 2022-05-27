<br>
<br>

<div class="container">
   <div class="text">Reserva Livro</div>
   <form method="POST" action="cadastro_reserva">
      <div class="form-row">
         <div class="input-data">
            <input type="date" required name="data_reserva">
            <div class="underline"></div>
            <label for="" style="margin-bottom: 20px;">Data Reserva</label>
         </div>

         <div class="input-data">
            <input type="text" required name="clivro_reserva">
            <div class="underline"></div>
            <label for="">Código do Livro</label>
         </div>
      </div>

      <div class="form-row">
         <div class="input-data">
            <input type="date" required name="data_entrega">
            <div class="underline"></div>
            <label for="" style="margin-bottom: 20px;">Data Entrega</label>
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
            <input type="submit" value="Reservar" name="cadastro">
         </div>
      </div>
</div>
</div>
</form>