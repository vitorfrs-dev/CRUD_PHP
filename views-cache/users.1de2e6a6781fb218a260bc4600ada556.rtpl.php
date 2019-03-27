<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <div class="contentWrapper">
    <div class="container-fluid">

        <a href="/users/create" class="btn btn-primary mb-3 mt-3">+ Add Aluno</a>

        <form action="/users" method="GET" class="form-group">
            <div class="row">
                
                <div class="col-md-3 form-group">
                    <input type="text" class="form-control" name="search" value = "<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite uma busca">
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary">Buscar</button>
                </div>

            </div>

        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                <tr>
                    <td>
                        <div class="avatar_img" style="background-image:url(<?php echo htmlspecialchars( $value1["avatar_url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>);"></div>
                    </td>
                    <td scope="row"><?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td><?php echo htmlspecialchars( $value1["turma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                    <td>
                        <a  href="/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-outline-success">Vizualizar</a>
                        <a href="/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/update" class="btn btn-outline-dark">Editar</a>
                        <a href="/users/<?php echo htmlspecialchars( $value1["iduser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja deletar <?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>?');" class="btn btn-outline-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>

               


            </tbody>
        </table>

        <div class="box">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php if( $page > 1 ){ ?>
                  <li class="page-item"><a class="page-link" href="/users?page=<?php echo htmlspecialchars( $page-1, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Anterior</a></li>
                  <?php } ?>

                  <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                  <li class="page-item"><a class="page-link" href="<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["item"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                  <?php } ?>

                  <?php if( $page < $totalPages ){ ?>
                  <li class="page-item"><a class="page-link" href="/users?page=<?php echo htmlspecialchars( $page+1, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Proximo</a></li>
                  <?php } ?>
                </ul>
              </nav>
        </div>

    </div>
    <!--End of container -->

    </div><!-- End of contetnWrapper -->


    <script src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>

</html>