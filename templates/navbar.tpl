<nav class="navbar navbar-dark bg-dark">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="../BrainDamage">Cervezas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../BrainDamage/categorias">Categorías</a>
        </li>
        {if isset($smarty.session.EMAIL)}
            <li class="nav-item">
                <button type="button" class="btn btn-outline-secondary class=btn btn-secondary btn-sm"> <a class="nav-link" href="../BrainDamage/logout">Cerrar Sesión</a> </button>
            </li>
        {else}
            <li class="nav-item">
                <a class="nav-link" href="../BrainDamage/login">Inicio Sesión</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Registración</a>
            </li>
        {/if}

    </ul>
</nav>

