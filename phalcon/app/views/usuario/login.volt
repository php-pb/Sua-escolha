<div class="page-header">
    <h1>Login</h1>
</div>

{{ content() }}

{{ form('login', 'role': 'form') }}
    <fieldset>
        <div class="form-group">
            <label for="email">E-mail</label>
            <div class="controls">
                {{ email_field('email', 'class': 'form-control', 'required':'required') }}
            </div>
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <div class="controls">
                {{ password_field('senha', 'class': 'form-control', 'required':'required') }}
            </div>
        </div>
        <div class="form-group">
            {{ submit_button('Login', 'class': 'btn btn-primary btn-lg') }}
        </div>
    </fieldset>
</form>