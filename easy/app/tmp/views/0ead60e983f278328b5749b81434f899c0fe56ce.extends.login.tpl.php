<?php /* Smarty version Smarty-3.1.8, created on 2012-05-24 00:43:53
         compiled from "C:\xampp\htdocs\blog\app\View\Pages\Auth\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2094fbdae797e6aa8-13471887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ead60e983f278328b5749b81434f899c0fe56ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\View\\Pages\\Auth\\login.tpl',
      1 => 1337830437,
      2 => 'file',
    ),
    '23f005def321aa855b05acaecde16b8f768799af' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\View\\Layouts\\Login.tpl',
      1 => 1337830437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2094fbdae797e6aa8-13471887',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Html' => 0,
    'Url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fbdae798a26b7_52609029',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbdae798a26b7_52609029')) {function content_4fbdae798a26b7_52609029($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Faculdade iDEZ</title>
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
        <div id="login-page" class="container">
            

<h1>Login</h1>
<?php echo $_smarty_tpl->tpl_vars['Form']->value->create('login',null,null,array('class'=>'well'));?>


<?php echo $_smarty_tpl->tpl_vars['Form']->value->inputText('username',array('div'=>false,'placeholder'=>'Usuário'));?>


<?php echo $_smarty_tpl->tpl_vars['Form']->value->inputText('password',array('type'=>'password','div'=>false,'placeholder'=>'Senha'));?>


<?php echo $_smarty_tpl->tpl_vars['Form']->value->checkboxLabel('remember',array(),array('text'=>'Lembrar me','class'=>'checkbox'));?>


<button type="submit" class="btn btn-primary">Entrar</button>
<button type="submit" class="btn">Esqueci a senha</button>
<?php echo $_smarty_tpl->tpl_vars['Form']->value->close();?>


<?php echo $_smarty_tpl->tpl_vars['Session']->value->flash('auth',array('class'=>'alert alert-error'));?>



        </div>

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