{{ form("comentario/create", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

{{ hidden_field("postagem_id", "id" : "fieldPostagemId", "value" : postagem.getId()) }}

<div class="form-group">
    <label for="fieldNome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
        {{ text_field("nome", "size" : 30, "class" : "form-control", "id" : "fieldNome", "required": "required") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldDescricao" class="col-sm-2 control-label">Descricao</label>
    <div class="col-sm-10">
        {{ text_area("descricao", "cols": "30", "rows": "4", "class" : "form-control", "id" : "fieldDescricao", "required": "required") }}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Publicar comentário', 'class': 'btn btn-primary') }}
    </div>
</div>

</form>
