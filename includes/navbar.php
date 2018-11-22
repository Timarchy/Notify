<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">N.S.</a>
        </li>
        <?php
        $user_logged = $_SESSION['username'];
        if(!$user_logged){
            echo '<li class="nav-item"><a class="nav-link" href="login_page.php">Log in</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="create_user.php">Create Account</a></li>';
        }else{
            echo '<li class="nav-item"><a class="nav-link" href="index.php">Log out</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="create_notifier.php">Create Notify</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="notifications.php">Notify list</a></li>';
            echo '<li class="nav-item"><a class="nav-link" href="preview_template.php">Preview Template</a></li>';
        }
        ?>
    </ul>
</nav>



