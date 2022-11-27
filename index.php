<?php
require_once "controllers/connection.php";
require_once "views/partials/header.php";
?>
<!-- Background -->
<main>
  <section class="bg-box">
    <img src="public/img/portada.jpg" alt="bg" />
  </section>
  <section class="content-box">
    <div class="form-box">
      <div class="logo-box">
        <img src="public/img/logo.png" id="logo" alt="logo" />
        <h2>Inicio de Sesión</h2>

      </div>

      <div class="login">
        <form action="controllers/login_controller.php" method="POST">
          <div class="input-box">
            <label for="user">Usuario</label>
            <input type="text" id="user" name="user" />
          </div>
          <div class="input-box">
            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="password" />
          </div>

          <div class="input-box">
            <input type="submit" value="Ingresar" id="ingresar" name="btnIngresar" />
          </div>
        </form>
      </div>
    </div>
  </section>
</main>
<?php
require_once "views/partials/footer.php";
?>