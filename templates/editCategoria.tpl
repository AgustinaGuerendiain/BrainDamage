
{include file="header.tpl"}
<div class="container">

    <form action="update_categoria/{$categoria_smarty->id_categoria}" method="post">
        <div class="form-group">
            <label for="formGroupExampleInput">Nombre de la categoría</label>
            <input type="text" class="form-control" name="input_edit_nombre_categoria" id="formGroupExampleInput" placeholder="Nombre de la categoría" value="{$categoria_smarty->nombre_categoria}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Descripción</label>
            <input type="text" class="form-control"  name="input_edit_descripcion_categoria" id="formGroupExampleInput" placeholder="Descripción" value="{$categoria_smarty->descripcion}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar categoría</button>
    </form>
  </div>

{include file="footer.tpl"}  
