<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <div class="contentWrapper">
    <div class="container">

        

        <form action="/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" method="POST" class="form-create">

            <h1>Editar cadastro Aluno</h1>

            <div class="form-group">
                <input type="text" name ="name" id="name" placeholder="Digite o Nome" class="form-control" value="<?php echo htmlspecialchars( $user["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="phone" id="phone" placeholder="Digite o Telefone" class="form-control" value="<?php echo htmlspecialchars( $user["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="email" id="email" placeholder="Digite o e-mail" class="form-control" value="<?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
                <input type="text" name="turma"id="turma" placeholder="Dgite a Turma" class="form-control" value="<?php echo htmlspecialchars( $user["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div>
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
            </div>

        </form>

    </div>

    </div><!--End of contentWrapper-->

</body>

</html>