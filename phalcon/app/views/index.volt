<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Jaime Neto (www.jaimeneto.com)">
    <meta name="description" content="Blog criado a partir da seguinte proposta: http://php-pb.net/sua-escolha">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    {{ get_title() }}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{ link_to("", "Blog Sua Escolha", 'class':'navbar-brand') }}
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li{{ router.getRewriteUri() == '/' ? ' class="active"' : ''}}>{{ link_to("", "Posts") }}</li>
                    <li{{ router.getRewriteUri() == '/sobre' ? ' class="active"' : ''}}>{{ link_to("sobre", "Sobre") }}</li>
                    {% if session.get('auth') != null and session.get('auth').perfil == 'admin' %}  
                    <li{{ router.getRewriteUri() == '/postagem/new' ? ' class="active"' : ''}}>{{ link_to("postagem/new", "Cadastrar novo post") }}</li>
                    {% endif %}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    {% if session.get('auth') == null %}  
                    <li{{ router.getRewriteUri() == '/login' ? ' class="active"' : ''}}>{{ link_to("login", "Login") }}</li>
                    <li{{ router.getRewriteUri() == '/usuario/new' ? ' class="active"' : ''}}>{{ link_to("usuario/new", "Cadastrar-se") }}</li>
                    {% else %} 
                    <li>{{ link_to("", session.get('auth').nome) }}</li>
                    <li>{{ link_to("logout", "Logout") }}</li>
                    {% endif %}
                </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
      </nav>

    <div class="container">

    <div class="row">
        <div class="col-md-9">
            {{ content() }}
        </div>

        <div class="col-md-3">
            <br><br>

            <div class="panel panel-default">
                <div class="panel-heading">Links do projeto</div>
                <div class="list-group">
                    <a class="list-group-item" href="http://php-pb.net/2012/03/18/sua-escolha/" target="_blank">PHP-PB.NET</a>
                    <a class="list-group-item" href="https://github.com/php-pb/Sua-escolha/" target="_blank">Git Hub do projeto</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">+ Phalcon Framework</div>
                <div class="list-group">
                    <a class="list-group-item" href="http://phalconphp.com/pt" target="_blank">Site Oficial</a>
                    <a class="list-group-item" href="http://blog.phalconphp.com" target="_blank">Blog Oficial</a>
                    <a class="list-group-item" href="http://phalconbrasil.com.br" target="_blank">Projeto Phalcon Brasil</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Sites de apoio</div>
                <div class="list-group">
                    <a class="list-group-item" href="http://www.php.net" target="_blank">php.net</a>
                    <a class="list-group-item" href="http://www.jquery.com" target="_blank">Jquery</a>
                    <a class="list-group-item" href="http://getbootstrap.com" target="_blank">Twitter Bootstrap</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Blog do desenvolvedor</div>
                <div class="list-group">
                    <a class="list-group-item" href="http://blog.jaimeneto.com" target="_blank">blog.jaimeneto.com</a>
                </div>
            </div>

        </div><!--/span-->

    </div><!--/row-->


    <hr />

    <footer>
        <p class="pull-right">Powered by <a href="http://phalconphp.com/pt" target="_blank">Phalcon Framework</a></p>
        <p>&copy; <a href="http://php-pb.net" target="_blank">PHP-PB.NET</a> 2017 - Desenvolvido por <a href="http://www.jaimeneto.com">jaimeneto.com</a></p>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
