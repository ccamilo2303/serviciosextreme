<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<h2>Formulario de contacto</h2>
<form action={{route('contact')}} method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombres</label>
        <input name="name" type="text">
    </div>
    <div class="form-group">
        <label for="last">Apellidos</label>
        <input name="last" type="text">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="text">
    </div>
    <div class="form-group">
        <label for="name">Mensaje</label>
        <input name="msg" type="text">
    </div>
    <div class="form-group">
        <button type="submit" id='btn-contact' class="btn">Enviar</button>
    </div>
</form>


