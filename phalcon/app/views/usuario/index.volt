<div class="page-header">
    {{ link_to("usuario/new", '<span class="glyphicon glyphicon-plus"></span> Cadastrar', "class":"btn btn-primary pull-right") }}
    <h1>Buscar usuário</h1>
</div>

{{ content() }}

{{ form("usuario/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
        {{ text_field("id", "type" : "numeric", "class" : "form-control", "id" : "fieldId") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
        {{ text_field("nome", "size" : 30, "class" : "form-control", "id" : "fieldNome") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSenha" class="col-sm-2 control-label">Senha</label>
    <div class="col-sm-10">
        {{ text_field("senha", "size" : 30, "class" : "form-control", "id" : "fieldSenha") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        {{ text_field("email", "size" : 30, "class" : "form-control", "id" : "fieldEmail") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPerfil" class="col-sm-2 control-label">Perfil</label>
    <div class="col-sm-10">
        {{ text_field("perfil", "size" : 30, "class" : "form-control", "id" : "fieldPerfil") }}
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Buscar', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
