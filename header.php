<?php
    require_once 'util/funcoes.php';
    $permitido = array("/","/cadastro/","/login/", "/entrar/");
    if(session_status() != PHP_SESSION_ACTIVE)
        session_start();
    
    if(!in_array($_SERVER['REQUEST_URI'], $permitido)){
        if(!isLogged()){
            header("Location: /");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <base href="/" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Nossa Compra</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Nossa Compra</a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php if (!isset($_SESSION['usuario'])): ?>
                    <form class="navbar-form navbar-right" action="/entrar/" role="search" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="E-mail" name="user" autocomplete="off">
                            <input type="password" class="form-control" placeholder="Senha" name="pass">
                        </div>
                        <button type="submit" class="btn btn-default">Entrar</button>
                      </form>
                    <?php endif; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (isset($_SESSION['usuario'])): ?>
                            <li>
                                <a href="/dashboard/">Meus Grupos</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['usuario']["USU_EMAIL"]; ?> <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><i class="fa fa-cog"></i> Configurações</a>
                                    </li>
                                    <li>
                                        <a href="/logout/"><i class="fa fa-sign-out"></i> Sair</a>
                                    </li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li><a href="/">Inicio</a></li>
                            <li><a href="/cadastro/">Cadastrar</a></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
