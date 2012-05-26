{block name=content}

<h1>Login</h1>
{$Form->create('login', null, null, ['class' => 'well'])}

{$Form->inputText('username', 
                    ['div' => false,  'placeholder' => 'Usuário'])}

{$Form->inputText('password', 
                    ['type' => 'password','div' => false,  'placeholder' => 'Senha'])}

{$Form->checkboxLabel('remember', [], ['text' => 'Lembrar me', 'class' => 'checkbox'])}

<button type="submit" class="btn btn-primary">Entrar</button>
<button type="submit" class="btn">Esqueci a senha</button>
{$Form->close()}

{$Session->flash('auth', ['class' => 'alert alert-error'])}

{/block}