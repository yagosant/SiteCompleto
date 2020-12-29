<div class="input-field">
    <input type="text" name="name" class="validate" id="" value="{{isset($usuario->name) ? $usuario->name:''}}">
    <label for="email">Nome</label>
</div>
<div class="input-field">
    <input type="text" name="email" class="validate" id="" value="{{isset($usuario->email) ? $usuario->email:''}}">
    <label for="email">E-mail</label>
</div>
<div class="input-field">
    <input type="password" name="password" class="validate" id="">
    <label for="password">Senha</label>
</div>