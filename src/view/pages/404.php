<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>M&D Supplements</title>
    <link rel="stylesheet" href="src/model/style/style.css" />
    <link rel="shortcut icon" href="src/model/imgs/MD-LOGO.avif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <?php 
    
    if (isset($_GET["param"])) {
        $pagina = "src/view/{$_GET["param"]}.php";
        if (!file_exists($pagina)) {
            header("Location: src/view/pages/404.php");
            exit();
        }
    }

    ?>

</head>
<body>
    
    <img src="../../model/imgs/404-bg.png" alt="erro 404" class="img-fluid mx-auto d-block mt-5" style="max-width: 1000px; display: flex; flex-wrap: wrap; margin-bottom: 60px;">        
    <a href="../../../index.php?home" class="btn btn-primary d-block mx-auto">Voltar para a página inicial</a>

</body>