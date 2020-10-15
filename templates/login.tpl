{include file="header.tpl"}

<div class="container">
   
    {if $message != ""}
        <div class="alert alert-danger" role="alert">
            {$message}
        </div>  
    {/if}
    

    <form action="verifyAdmin" method="post" style="margin-top: 24px;">
        <div class="form-group">
        <label for="user">Email</label>
        <input class="form-control" id="user" name="input_email" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="input_pass">
        </div>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

</div>

{include file="footer.tpl"}     
      