<div class="content-container">
    <div class="profile">
        <span class="login">Вход:</span>
        <form action="login.php" method="post">
            <input name="nickname" class="nickname" type="text" placeholder="Логин">
            <input name="password" class="password" type="password" placeholder="Пароль">
            <div class="error"></div>
            <input name="btn-login" class="btn" type="submit" value="Войти">
        </form>

        <span class="reg">Регистрация:</span>
        <form action="reg.php" method="post">
            <input name="nickname" value="" class="nickname" type="text" placeholder="Придумайте логин">
            <input name="password" class="password" type="password" placeholder="Придумайте пароль">
            <input name="password_repeat" class="password" type="password" placeholder="Повторите пароль">
            <div class="error"></div>
            <input name="btn-reg" class="btn" type="submit" value="Зарегистрироваться">
        </form>
    </div>
</div>