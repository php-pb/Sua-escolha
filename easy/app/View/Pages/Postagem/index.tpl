{block name=content}
<div class="hero-unit">
    <h1>Bem Vindo!</h1>
    <p>Esse é um exemplo de um Blog simples.</p>
    <p><a class="btn btn-primary btn-large">Saiba mais &raquo;</a></p>
</div>

{for $i = 0; $i < $total; $i++}
<div class="row-fluid">
    {foreach $postagens[$i] as $postagem}
        <div class="span4">
            <h2>{$Html->actionLink($postagem->titulo, $postagem->titulo)}</h2> 
            <h3>
                <small>
                    <i class="icon-user"></i> {$Html->actionLink($postagem->getUsuario()->username, 'author', 'postagem', urlencode($postagem->getUsuario()->username))} 
                    <i class="icon-calendar"></i> {$postagem->dataCriacao|date_format:'%d/%m/%Y'}
                </small>
            </h3>
            <p>{$postagem->descricao|truncate:200}</p>
            <p>{$Html->actionLink('Ler mais >>', $postagem->titulo, null, null, ['class' => 'btn'])}</p>
        </div><!--/span-->
    {/foreach}
</div><!--/row-->
{/for}

{/block}