<div class="page-header">
    {{ link_to("usuario", '<span class="glyphicon glyphicon-arrow-left"></span> Voltar', "class":"btn btn-default pull-right") }}
    <h1>Buscar usuário</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
            <th>Nome</th>
            <th>Senha</th>
            <th>Email</th>
            <th>Perfil</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for usuario in page.items %}
            <tr>
                <td>{{ usuario.getId() }}</td>
            <td>{{ usuario.getNome() }}</td>
            <td>{{ usuario.getSenha() }}</td>
            <td>{{ usuario.getEmail() }}</td>
            <td>{{ usuario.getPerfil() }}</td>

                <td>{{ link_to("usuario/edit/"~usuario.getId(), "Edit") }}</td>
                <td>{{ link_to("usuario/delete/"~usuario.getId(), "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("usuario/search", "First") }}</li>
                <li>{{ link_to("usuario/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("usuario/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("usuario/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
