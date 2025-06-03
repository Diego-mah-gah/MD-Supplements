        <!------------------ Modal de Login/Cadastro ----------------->
        <div class="modal fade text-center" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Entrar ou Cadastrar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <form action="src/controller/login.php" method="POST">
                            <input type="email" name="email" required placeholder="Email" class="form-control mb-2">
                            <input type="password" name="senha" required placeholder="Senha" class="form-control mb-2">
                            <button type="submit" class="btn btn-primary w-100">Entrar / Cadastrar</button>
                        </form>
                        <?php
                        session_start($_GET('SESSION'));
                        include 'src/controller/login.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>