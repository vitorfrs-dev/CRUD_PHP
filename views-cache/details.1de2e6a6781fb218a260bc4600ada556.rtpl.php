<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <div class="contentWrapper">
    <div class="container">

        

        <form class="form-create">

            <h1>Detalhes do Aluno</h1>

            <div class="form-group">
                <input type="text" name ="name" id="name" placeholder="Digite o Nome" class="form-control" value="<?php echo htmlspecialchars( $user["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
            </div>

            <div class="form-group">
                <input type="text" name="phone" id="phone" placeholder="Digite o Telefone" class="form-control" value="<?php echo htmlspecialchars( $user["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
            </div>

            <div class="form-group">
                <input type="text" name="email" id="email" placeholder="Digite o e-mail" class="form-control" value="<?php echo htmlspecialchars( $user["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
            </div>

            <div class="form-group">
                <input type="text" name="turma"id="turma" placeholder="Dgite a Turma" class="form-control" value="<?php echo htmlspecialchars( $user["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
            </div>

            <div>
                <a href ="/users/<?php echo htmlspecialchars( $user["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-outline-primary" >Editar</a>
            </div>

        </form>

    </div>

    </div><!--End of contentWrapper-->

</body>

</html>