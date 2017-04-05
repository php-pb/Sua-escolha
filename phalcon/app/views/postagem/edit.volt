<div class="page-header">
    {{ link_to("postagem", '<span class="glyphicon glyphicon-arrow-left"></span> Voltar', "class":"btn btn-default pull-right") }}
    <h1>Editar postagem</h1>
</div>

{{ content() }}

{{ form("postagem/save", "method":"post", "autocomplete" : "off") }}

{{ hidden_field("id") }}

<div class="form-group">
    <label for="fieldNome" class="control-label">Título</label>
    {{ text_field("nome", "size" : 30, "class" : "form-control", "id" : "fieldNome") }}
</div>

<div class="form-group">
    <label for="fieldDescricao" class="control-label">Texto</label>
    {{ text_area("descricao", "cols": "30", "rows": "20", "class" : "form-control", "id" : "fieldDescricao") }}
</div>

<div class="form-group">
    {{ submit_button('Salvar', 'class': 'btn btn-primary btn-lg') }}
</div>

</form>