<!DOCTYPE html>
<html lang="en">
    <head>
        {$Html->charset()}
        <title>{block name=title}Blog{/block}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        {$Html->stylesheet([
                            '/assets/css/bootstrap.min.css', 
                            '/assets/css/bootstrap-responsive.css', 
                            '/assets/css/site.css'
                            ])}
        {block name=styles}{/block}

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="{$Url->content('/assets/ico/favicon.ico')}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{$Url->content('/assets/ico/apple-touch-icon-144-precomposed.png')}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{$Url->content('/assets/ico/apple-touch-icon-114-precomposed.png')}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{$Url->content('/assets/ico/apple-touch-icon-72-precomposed.png')}">
        <link rel="apple-touch-icon-precomposed" href="{$Url->content('/assets/ico/apple-touch-icon-57-precomposed.png')}">
    </head>

    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Blog</a>
                    <div class="btn-group pull-right">
                        {if $isGuest}
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user"></i> Entrar
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{$Html->actionLink('Logar', 'login')}</li>
                                <li class="divider"></li>
                                <li>{$Html->actionLink('Registrar', 'registrar')}</li>
                            </ul>
                        {else}
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user"></i> {$User->username}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{$Html->actionLink('Perfil', '#')}</li>
                                <li class="divider"></li>
                                <li>{$Html->actionLink('Sair', 'logout')}</li>
                            </ul>
                        {/if}
                    </div>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li>{$Html->link('Home', $Url->getBase())}</li>
                            <li>{$Html->link('Sobre', "#")}</li>
                            <li>{$Html->link('Contato', "#")}</li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header">Menu</li>
                            <li>
                                {$Html->link('<i class="icon-home"></i> Home', $Url->getBase())}
                            </li>
                            <li>
                                {$Html->actionLink('<i class="icon-tags"></i> Ver Tudo', null, 'postagem')}
                            </li>
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->

                <div class="span9">
                    {block name=content}{/block}
                </div>

            </div><!--/row-->

            <hr class="soften">
            <!-- Footer
             ================================================== -->
            <footer class="footer">
                <p>Designed and built with all the love in the world <a href="http://twitter.com/twitter" target="_blank">@twitter</a> by <a href="http://twitter.com/mdo" target="_blank">@mdo</a> and <a href="http://twitter.com/fat" target="_blank">@fat</a>.</p>
                <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
                <p>Icons from <a href="http://glyphicons.com">Glyphicons Free</a>, licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
            </footer>

        </div><!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        {$Html->script([
                        '/assets/js/jquery.js',
                        '/assets/js/bootstrap.min.js',
                        '/assets/js/application.js'
                       ])}
        {block name=scripts}{/block}
    </body>
</html>
