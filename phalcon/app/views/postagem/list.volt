
{% for postagem in list %}

    <div class="postagem">

        <h2>{{ link_to('postagem/view/'~postagem.getId(), postagem.getNome()|e) }}</h2>

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
                {{ postagem.descricao | nl2br }}
            </div>
        </div>

    </div>

{% endfor %}