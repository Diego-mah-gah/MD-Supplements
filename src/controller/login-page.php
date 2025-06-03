 <?php
    session_start();
    include 'src/controller/login.php';
    ?>
 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MD-Supplements</title>
     <link rel="stylesheet" href="src/model/style/style.css">
 </head>

 <body>
     <!------------------ Modal de Login/Cadastro ----------------->
     <div class="modal fade text-center">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="loginModalLabel">Cadastrar</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                 </div>
                 <div class="modal-body">
                     <form action="../../index.php" method="POST">
                         <input type="name" name="nome" required placeholder="Nome Completo" class="form-control mb-2">
                         <input type="text" name="endereco" required placeholder="Endereço" class="form-control mb-2">
                         <input type="text" name="telefone" required placeholder="Telefone" class="form-control mb-2">
                         <input type="date" name="data_nascimento" required placeholder="Data de Nascimento" class="form-control mb-2">
                         <input type="email" name="email" required placeholder="Email" class="form-control mb-2">
                         <input type="password" name="senha" required placeholder="Senha" class="form-control mb-2">
                         <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>


 </body>

 </html>