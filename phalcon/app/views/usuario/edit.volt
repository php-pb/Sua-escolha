<div class="page-header">
    {{ link_to("usuario", '<span class="glyphicon glyphicon-arrow-left"></span> Voltar', "class":"btn btn-default pull-right") }}
    <h1>Alterar usuário</h1>
</div>

{{ content() }}

{{ form("usuario/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-primary btn-lg') }}
    </div>
</div>

</form>
