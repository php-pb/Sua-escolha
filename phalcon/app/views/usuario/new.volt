<div class="page-header">
    {{ link_to("usuario", '<span class="glyphicon glyphicon-arrow-left"></span> Voltar', "class": "btn btn-default pull-right") }}
    <h1>Cadastrar-se</h1>
</div>

{{ content() }}

{{ form("usuario/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldNome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
        {{ text_field("nome", "size" : 30, "class" : "form-control", "id" : "fieldNome", "required":"required") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEmail" class="col-sm-2 control-label">E-mail</label>
    <div class="col-sm-10">
        {{ email_field("email", "size" : 100, "class" : "form-control", "id" : "fieldEmail", "required":"required") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSenha" class="col-sm-2 control-label">Senha</label>
    <div class="col-sm-5">
        {{ password_field("senha", "size" : 30, "class" : "form-control", "id" : "fieldSenha", "required":"required") }}
    </div>
    <div class="col-sm-5">
        {{ password_field("senha_confirm", "size" : 30, "class" : "form-control", "id" : "fieldSenhaConfirm", "required":"required", "placeholder": "Repita a senha") }}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Salvar', 'class': 'btn btn-primary btn-lg') }}
    </div>
</div>

</form>
