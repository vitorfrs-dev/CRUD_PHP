<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <div class="contentWrapper">
    
    <div class="container">

        

        <form action="/users/create" method="POST" class="form-create">

            <h1>Cadastro Aluno</h1>

            <div class="form-group">
                <input type="text" name ="name" id="name" placeholder="Digite o Nome" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="phone" id="phone" placeholder="Digite o Telefone" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="email" id="email" placeholder="Digite o e-mail" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="turma"id="turma" placeholder="Dgite a Turma" class="form-control">
            </div>

            <div>
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
            </div>

        </form>

    </div>

    </div><!--End of contentWrapper-->

</body>

</html>