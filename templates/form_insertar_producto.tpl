  <div class="container" style="margin-top: 24px;">
    <form action="insert_producto" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre de la cerveza</label>
            <input type="text" class="form-control" name="input_nombre_producto" id="input_nombre_producto" placeholder="Nombre de la cerveza">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Descripción</label>
            <input type="text" class="form-control"  name="input_descripcion_producto" id="input_descripcion_producto" placeholder="Descripción">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Porcentaje de alcohol</label>
            <input type="number" class="form-control"  name="input_porcentajeAlc_producto" id="input_porcentajeAlc_producto" placeholder="Porcentaje de alcohol">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Precio</label>
            <input type="number" class="form-control" name="input_precio_producto" id="input_precio_producto" placeholder="Precio">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Categoría</label>
          <select class="form-control form-control-sm" name="input_categoria">
            {foreach from=$categoriasSelect_smarty item=categorias}
              <option value="{$categorias->id_categoria}">{$categorias->nombre_categoria}</option> 
            {/foreach}
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar producto</button>
    </form>
  </div>