{include file="header.tpl"}
<h1>Editar producto</h1>
  <div class="container">
    <form action="update_producto/{$producto_smarty->id_cerveza}" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre de la cerveza</label>
            <input type="text" class="form-control" name="input_nombre_producto" id="formGroupExampleInput" placeholder="Nombre de la cerveza" value=" {$producto_smarty->nombre_producto} ">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Descripción</label>
            <input type="text" class="form-control"  name="input_descripcion_producto" id="formGroupExampleInput" placeholder="Descripción" value=" {$producto_smarty->descripcion} ">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Porcentaje de alcohol</label>
            <input type="number" class="form-control"  name="input_porcentajeAlc_producto" id="formGroupExampleInput" placeholder="Porcentaje de alcohol" value=" {$producto_smarty->porcentaje_alc} ">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Precio</label>
            <input type="number" class="form-control" name="input_precio_producto" id="formGroupExampleInput" placeholder="Precio" value=" {$producto_smarty->precio} ">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Categoría</label>
          <select class="form-control form-control-sm" name="input_categoria" >
            {foreach from=$categoriasSelect_smarty item=categorias}
              <option value="{$categorias->id_categoria}">{$categorias->nombre_categoria}</option> 
            {/foreach}
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>
{include file="footer.tpl"}     