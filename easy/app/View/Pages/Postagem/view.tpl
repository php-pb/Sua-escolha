{block name=content}
<div class="row-fluid">
    <div class="span14">
        <h2>{$postagem->titulo}</h2> 
        <h3>
            <small>
                <i class="icon-user"></i> {$postagem->Usuario->username} 
                <i class="icon-calendar"></i> {$postagem->dataCriacao|date_format:'%d/%m/%Y'}
            </small>
        </h3>
        {$postagem->descricao}

    </div><!--/span-->
</div><!--/row-->
<hr/>
<div class="row-fluid">
    <div class="span14">
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#comentarios" data-toggle="tab">{__('Comentários')}</a></li>
            <li><a href="#fazer-comentario" data-toggle="tab">{__('Fazer um comentário')}</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="comentarios">
                {if !empty($postagem->Comentarios)}
                    {foreach $postagem->Comentarios as $comentario}
                        <p>{$comentario->descricao}</p>
                    {/foreach}
                {else}
                    <p>{__('Não há comentários ainda.')}</p>
                {/if}
            </div>
            <div class="tab-pane fade" id="fazer-comentario">
                <div id="postagem-form-comentario">
                    {$Form->create('add', 'mensagens', null, ['class' => 'form-vertical'])}
                    <fieldset>
                        <div class="control-group">
                            {$Form->textAreaLabel('descricao', 
                                ['div' => 'controls', 'class'=>'input-large'], 
                                ['text'=>'Mensagem', 'class'=>'control-label']
                            )}
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary btn-large"><i class="icon-comment"></i> Enviar</button> 
                        </div>
                    </fieldset>
                    {$Form->close()}
                </div>
            </div>
        </div>
    </div><!--/span-->
</div>

{/block}