<div class="hero-unit">

    <h1>Sobre este blog</h1>

    <div class="descricao">
        <div>
            Este blog foi criado segundo a proposta da comunidade PHP-PB feita do site
            <a href="http://www.php-pb.net" target="_blank">php-pb.net</a>, que sugere que o mesmo
            sistema seja desenvolvido em vários frameworks PHP diferentes. Este, por sua vez,
            foi desenvolvido no <strong>Phalcon Framework 3.0.3</strong>, com o auxílio da 
            ferramenta <strong>Phalcon DevTools 3.0.5</strong>, além do <strong>Bootstrap 
            3.3.7</strong> para o CSS.
        </div>

        <hr />

        <h3>RAD com Phalcon DevTools</h3>

        <div>Eis o passo-a-passo para montar a estrutura base desta aplicação:</div>

        <pre>phalcon project blog-phalcon simple</pre>

        Configure a banco de dados em <code>app/config/config.php</code> e pastas dos 
        controllers, models, views, segundo a estrutura que deseja: 

<pre>
[
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'nome-do-usuario',
        'password'    => 'sua-senha',
        'dbname'      => 'blog',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'viewsDir'       => APP_PATH . '/views/',
        ...
        'baseUri'        => '/',
    ]
]
</pre>

        Use o <code>scaffold</code> para gerar o código baseado nas tabelas do banco de dados:

<pre>phalcon scaffold --table-name usuario --get-set --template-engine volt
phalcon scaffold --table-name postagem --get-set --template-engine volt
phalcon scaffold --table-name comentario --get-set --template-engine volt</pre>

        Crie outros controllers manualmente que não estão diretamente relacionados ao banco:

        <pre>phalcon controller sobre</pre>

    </div>

</div>