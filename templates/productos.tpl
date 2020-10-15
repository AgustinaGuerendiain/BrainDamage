
{include file="header.tpl"}

{if isset($smarty.session.EMAIL)}
  {{include file="form_insertar_producto.tpl"}}
{/if}

<div class="container" style="
    margin-top: 24px;">
  <ul class="list-group">
    {foreach from=$producto_smarty item=producto}
      <li class="list-group-item"> 
        {$producto->nombre_producto}
        <button type="button" class="btn btn-outline-info"><a href="detalle_producto/{$producto->id_cerveza}">Detalles</a></button>
        {if isset($smarty.session.EMAIL)}
          <button type="button" class="btn btn-outline-success"><a href="editar_producto/{$producto->id_cerveza}">Editar</a></button>
          <button type="button" class="btn btn-outline-danger"><a href="borrar_producto/{$producto->id_cerveza}">Borrar</a></button>
        {/if}
      </li>
    {/foreach}
  </ul>
</div>

{include file="footer.tpl"}     
      
        