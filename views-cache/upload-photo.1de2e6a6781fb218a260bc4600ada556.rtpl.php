<?php if(!class_exists('Rain\Tpl')){exit;}?><form action="/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update_photo" method="post" enctype="multipart/form-data">

    <input type="file" name="user_photo" id="user_photo">

    <button class="btn btn-outline-primary">Enviar</button>

</form>