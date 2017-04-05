<div class="page-header">
    {{ link_to("postagem", '<span class="glyphicon glyphicon-arrow-left"></span> Voltar', "class":"btn btn-default pull-right") }}
    <h1>{{ postagem.getNome()|e }}</h1>
</div>

<p>
    {{ link_to('postagem/view/'~postagem.getId()~'#comentarios', postagem.countComentarios() ~ ' comentários'|e) }}
     -
    Postado por <em>{{ postagem.getUsuario().getNome() }}</em>,
    <strong>{{ postagem.getCriacao('d/m/Y H:i') }}</strong>

    {% if session.get('auth') != null and session.get('auth').perfil == 'admin' %}
        {{ link_to('postagem/edit/'~postagem.getId(), '[editar]') }}
        {{ link_to('postagem/delete/'~postagem.getId(), '[excluir]') }}
    {% endif %}
</p>

<div class="panel panel-default">
    <div class="panel-body">
        {{ postagem.descricao | nl2br}}
    </div>
</div>

<div id="comentarios">
    <h3>Comentários</h3>
    <ul class="list-unstyled">
        {% if postagem.countComentarios() > 0 %}
            {% for comentario in postagem.getComentarios() %}
            <li>
                <strong>{{ comentario.getNome()|e }}</strong> -
                <em>{{ comentario.getCriacao('d/m/Y H:i') }}</em>

                {% if session.get('auth') != null and session.get('auth').perfil == 'admin' %}
                    {{ link_to('comentario/delete/'~comentario.getId(), '[excluir]') }}
                {% endif %}

                <p class="well">{{ comentario.getDescricao()|e }}</p>
            </li>
            {% endfor %}
        {% else %}
            <li>
                <p class="well">Nenhum comentário até o momento...</p>
            </li>
        {% endif %}
            <li>
                {% include "comentario/new.volt" %}
            </li>
    </ul>

    {# Formulário para comentar #}
</div>