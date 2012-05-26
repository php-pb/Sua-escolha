<?php /* Smarty version Smarty-3.1.8, created on 2012-05-25 03:44:55
         compiled from "C:\xampp\htdocs\blog\app\View\Pages\Home\admin_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38624fbf2a4fd2eed6-19915414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80596c271503532c9e2f9552667db46ede5f4b86' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\View\\Pages\\Home\\admin_index.tpl',
      1 => 1337928290,
      2 => 'file',
    ),
    '00fc38df8580387960ece26bd8c1152795f29f77' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\View\\Layouts\\Layout.tpl',
      1 => 1337927300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38624fbf2a4fd2eed6-19915414',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fbf2a4fe78633_41413181',
  'variables' => 
  array (
    'Html' => 0,
    'Url' => 0,
    'isGuest' => 0,
    'User' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf2a4fe78633_41413181')) {function content_4fbf2a4fe78633_41413181($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $_smarty_tpl->tpl_vars['Html']->value->charset();?>

        <title>Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <?php echo $_smarty_tpl->tpl_vars['Html']->value->stylesheet(array('/assets/css/bootstrap.css','/assets/css/bootstrap-responsive.css','/assets/css/site.css'));?>

        

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value->content('/assets/ico/favicon.ico');?>
">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value->content('/assets/ico/apple-touch-icon-144-precomposed.png');?>
">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value->content('/assets/ico/apple-touch-icon-114-precomposed.png');?>
">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value->content('/assets/ico/apple-touch-icon-72-precomposed.png');?>
">
        <link rel="apple-touch-icon-precomposed" href="<?php echo $_smarty_tpl->tpl_vars['Url']->value->content('/assets/ico/apple-touch-icon-57-precomposed.png');?>
">
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
                        <?php if ($_smarty_tpl->tpl_vars['isGuest']->value){?>
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user"></i> Entrar
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?php echo $_smarty_tpl->tpl_vars['Html']->value->actionLink('Logar','login');?>
</li>
                                <li class="divider"></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['Html']->value->actionLink('Registrar','registrar');?>
</li>
                            </ul>
                        <?php }else{ ?>
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user"></i> <?php echo $_smarty_tpl->tpl_vars['User']->value->username;?>

                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?php echo $_smarty_tpl->tpl_vars['Html']->value->actionLink('Perfil','#');?>
</li>
                                <li class="divider"></li>
                                <li><?php echo $_smarty_tpl->tpl_vars['Html']->value->actionLink('Sair','logout');?>
</li>
                            </ul>
                        <?php }?>
                    </div>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li><?php echo $_smarty_tpl->tpl_vars['Html']->value->link('Home',$_smarty_tpl->tpl_vars['Url']->value->getBase());?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['Html']->value->link('Sobre',"#");?>
</li>
                            <li><?php echo $_smarty_tpl->tpl_vars['Html']->value->link('Contato',"#");?>
</li>
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
                                <?php echo $_smarty_tpl->tpl_vars['Html']->value->link('<i class="icon-home"></i> Home',$_smarty_tpl->tpl_vars['Url']->value->getBase());?>

                            </li>
                            <li>
                                <?php echo $_smarty_tpl->tpl_vars['Html']->value->actionLink('<i class="icon-tags"></i> Ver Tudo',null,'postagem');?>

                            </li>
                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->

                <div class="span9">
                    
<div class="hero-unit">
    <h1>Bem Vindo!</h1>
    <p>Essa é a área administrativa.</p>
    <p><a class="btn btn-primary btn-large">Saiba mais &raquo;</a></p>
</div>



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
        <?php echo $_smarty_tpl->tpl_vars['Html']->value->script(array('/assets/js/jquery.js','/assets/js/bootstrap.min.js','/assets/js/application.js'));?>

        
    </body>
</html>
<?php }} ?>