<h1 class="nombre-pagina">LOGIN</h1>
<p class="descripcion-pagina"> Inicia Sesión Con Tus Datos</p>

<!-- ------ CREANDO EL FORMULARIO DE LOGIN ------ -->
<form class="formulario" method="POST" action="/">

    <div class="campo">
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            placeholder="Tu Password"
            name="password"
        />
    </div>

    <input
        type="submit"
        class="boton"
        value="Iniciar Sesión"
    />

</form>

<!-- ------ CREANDO LAS DEMAS OPCIONES ------ -->
<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear Una</a>
    <a href="/olvide">¿Olvidaste tu Password?</a>
</div>