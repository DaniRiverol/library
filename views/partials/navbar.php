<div class="navbar-fixed">
    <nav class="orange darken-2">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li>
                   <a href="#"> Hola 
                            <?php echo $_SESSION['full_name']; ?>
                        </a>
                </li>
                <?php if ($_SESSION['role'] != "alumno") { ?>
                <li>
                    <a href="../publisher/publisher.php">Editoriales
                        <i class="material-icons left">account_balance</i>
                    </a>
                </li>
                <li>
                    <a href="../user/profile.php">Usuarios
                        <i class="material-icons left">account_circle</i>
                    </a>
                </li>
                <?php } ?>
                

            </ul>
            <a href="#" class="brand-logo center"><img src="../../public/img/logo1.png" alt="Logo brand" width="82px"
                    height="60px"></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">

                <li>
                    <a href="../loan/loan.php">Préstamos
                        <i class="material-icons left">today</i>
                    </a>
                </li>
                <li>
                    <a href="../book/book.php">Libros
                        <i class="material-icons left">library_books</i>
                    </a>
                </li>
                <li>
                    <a href="../../controllers/logout.php"> Salir
                        <i class="material-icons left">logout</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>