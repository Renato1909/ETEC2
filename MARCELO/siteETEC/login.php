<?php
session_start();

// Dados do usuário (em produção, use banco de dados com senha hash)
$usuario_valido = 'etec';
$senha_valida = 'etec2026';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if ($usuario === $usuario_valido && $senha === $senha_valida) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $usuario;
        header('Location: formulario.php');
        exit;
    } else {
        $erro = 'Usuário ou senha inválidos!';
    }
}

// Se já estiver logado, redireciona para o formulário
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: formulario.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ETEC Zona Leste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="imagens/etec-cpsLogo.svg" class="logo me-2" alt="Logo ETEC">
                ETEC Zona Leste
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="quemSomos.html">Quem Somos</a></li>
                    <li class="nav-item"><a class="nav-link" href="vestibulinho.html">Vestibulinho</a></li>
                    <li class="nav-item"><a class="nav-link" href="formulario.php">Formulário</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container section-glass mt-5">
        <h2 class="text-center">Acesso ao Formulário</h2>
        <p class="text-center">Faça login para acessar o formulário de contato.</p>
    </div>

    <div class="container section-glass mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow p-4">
                    <h3 class="text-center mb-4">Login</h3>
                    
                    <?php if (!empty($erro)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($erro); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="login.php" id="formLogin">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuário</label>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Digite seu usuário" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                    
                    <div class="mt-3 text-center">
                        <small class="text-muted">Credenciais de demonstração:<br>Usuário: <strong>etec</strong> | Senha: <strong>etec2026</strong></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-white pt-4 mt-5 w-100">
        <div class="container-fluid px-3 px-md-5">
            <div class="row">
                <div class="col-md-3">
                    <h5>ETEC Zona Leste</h5>
                    <p>Ensino técnico de qualidade.</p>
                </div>
                <div class="col-md-3">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-white">Início</a></li>
                        <li><a href="quemSomos.html" class="text-white">Quem Somos</a></li>
                        <li><a href="vestibulinho.html" class="text-white">Vestibulinho</a></li>
                        <li><a href="formulario.php" class="text-white">Formulário</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contato</h5>
                    <p>📍 São Paulo - SP</p>
                    <p>📞 (11) 0000-0000</p>
                    <p>✉️ etec@email.com</p>
                </div>
                <div class="col-md-3">
                    <h5>Horário</h5>
                    <p>Seg - Sex: 08h às 22h</p>
                    <p>Sábado: 08h às 12h</p>
                    <h5 class="mt-3">Redes</h5>
                    <a href="https://www.facebook.com/Eteczonalesteoficial/?locale=pt_BR" class="text-white">Facebook</a><br>
                    <a href="https://www.instagram.com/eteczonalesteoficial" class="text-white">Instagram</a><br>
                    <a href="https://www.youtube.com/@etecdazonaleste2949" class="text-white">YouTube</a>
                </div>
            </div>
            <hr>
            <div class="text-center pb-3">
                © 2026 ETEC Zona Leste
            </div>
        </div>
    </footer>

    <script src="formulario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>