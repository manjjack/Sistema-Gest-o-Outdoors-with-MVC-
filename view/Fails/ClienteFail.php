<!DOCTYPE html>
<html>
<head>
    <title>Cliente Fail</title>
</head>
<body>
    <h1>Cliente Fail</h1>
    <p>Sera redirecionado em alguns segundos, aguarde</p>

    <script>
        // Exibe um alerta informando que o cliente está desativado
        alert("O cliente está desativado. Você não pode acessar esta página.");

        // Redireciona para outra página após 5 segundos
        setTimeout(function() {
            window.location.href = "../login.php";
        }, 5000); // 5000 milissegundos = 5 segundos
    </script>
</body>
</html>
