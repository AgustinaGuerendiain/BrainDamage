{include file="header.tpl"}

{if isset($smarty.session.EMAIL)}
  {include file="form_insertar_categoria.tpl"}
{/if}

<div class="container" style="margin-top: 24px;">
  <ul class="list-group">
    {foreach from=$categoria_smarty item=categoria}
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {$categoria->nombre_categoria}
                {if isset($smarty.session.EMAIL)}
                  <button type="button" class="btn btn-outline-success"><a href="editar_categoria/{$categoria->id_categoria}">Editar</a></button>
                  <button type="button" class="btn btn-outline-danger"><a href="borrar_categoria/{$categoria->id_categoria}">Borrar</a></button>
                {/if}
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              {$categoria->descripcion}
              <ul>
                {foreach from=$cervezasDeCategoria item=cerveza}
                  {if $cerveza->id_categoria == $categoria->id_categoria}
                    <li>{$cerveza->nombre_producto} </li>
                  {/if}
                {/foreach}
              </ul>
            </div>
          </div>
        </div>
      </div>
    {/foreach}
  </ul>
</div>


{include file="footer.tpl"} 