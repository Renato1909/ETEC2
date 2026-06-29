<?php
require_once 'verifica_sessao.php';

// ============================================
// SANITIZAÇÃO E VALIDAÇÃO DOS DADOS DE ENTRADA
// ============================================

// Sanitizar dados recebidos via POST
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

// Array para armazenar erros de validação
$erros = [];

// Validar nome
if (empty($nome) || strlen($nome) < 3) {
    $erros[] = "Nome inválido: deve ter pelo menos 3 caracteres.";
} elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s]+$/', $nome)) {
    $erros[] = "Nome inválido: deve conter apenas letras.";
}

// Validar email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "Email inválido: digite um email válido.";
}

// Validar telefone (opcional)
if (!empty($telefone) && !preg_match('/^\(?[1-9]{2}\)?\s?[9]?[0-9]{4}-?[0-9]{4}$/', $telefone)) {
    $erros[] = "Telefone inválido: use o formato (11) 99999-9999.";
}

// Validar curso
if (empty($curso)) {
    $erros[] = "Selecione um curso de interesse.";
}

// Validar mensagem
if (empty($mensagem) || strlen($mensagem) < 10) {
    $erros[] = "Mensagem inválida: deve ter pelo menos 10 caracteres.";
}

// Se houver erros, exibir e parar
if (!empty($erros)) {
    echo '<!DOCTYPE html>';
    echo '<html lang="pt-br"><head><meta charset="UTF-8"><title>Erro</title>';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link rel="stylesheet" href="processo.css"></head><body>';
    echo '<div class="page-wrapper"><div class="box mx-auto">';
    echo '<h1>Erros encontrados:</h1>';
    echo '<div class="alert alert-danger"><ul>';
    foreach ($erros as $erro) {
        echo '<li>' . htmlspecialchars($erro) . '</li>';
    }
    echo '</ul></div>';
    echo '<a href="formulario.php" class="btn btn-primary">Voltar ao Formulário</a>';
    echo '</div></div></body></html>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="processo.css">
</head>
<body>
    <div class="page-wrapper">
        <div class="box mx-auto">
            <h1>Olá, <?php echo htmlspecialchars($nome); ?>!</h1>
            <p>
                Email - <strong><?php echo htmlspecialchars($email); ?></strong>
            </p>
            <p>
                Telefone - <strong><?php echo htmlspecialchars($telefone); ?></strong>
            </p>
            <p>
                Você foi matriculado no curso de <strong><?php echo htmlspecialchars($curso); ?></strong>
            </p>
            <p>
                Mensagem - <strong><?php echo htmlspecialchars($mensagem); ?></strong>
            </p>
            <p>Muito obrigado pela mensagem!</p>
            <a href="formulario.php" class="btn btn-primary mt-3">Enviar Nova Mensagem</a>
            <a href="index.html" class="btn btn-danger mt-3">Voltar ao Site</a>
        </div>
    </div>

    <footer class="text-white pt-4 mt-5 w-100" style="background-color:#b02a37;">
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
</body>
</html>