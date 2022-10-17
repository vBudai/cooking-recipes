<div class="header">
    <div class="header__container">
        <a style="display: inline-block" href="index.php?page=main">
            <div class="logo"></div>
        </a>
        <div class="search">
            <form method="post" action="../search.php">
                <input name="searchTitle" class="search__form" type="text" placeholder="Найти рецепт...">
                <input class="search__btn" type="submit" value="">
            </form>
            <div class="create-recipe">
                <a href="index.php?page=myrecipes" style="display: block; margin: auto auto;">
                    <img src="./frontend/img/add-recipe_icon.svg" alt="add">
                </a>
            </div>
            <?php
                if(!isset($_SESSION['id'])):
            ?>
                <a class="auth" href="index.php?page=profile" title="Войти">
                    <img src="/frontend/img/login.svg">
                </a>
            <?php
            else:
            ?>
                <a class="auth" href="index.php?logout=1" title="Выйти">
                    <img src="/frontend/img/logout.svg">
                </a>
            <?php
            endif;?>
        </div>

        <div class="menu">
            <ul class="menu__list">
                <li class="menu__item"><a href="index.php?page=main&category=Завтрак">Завтрак</a></li>
                <li class="menu__item"><a href="index.php?page=main&category=Обед">Обед</a></li>
                <li class="menu__item"><a href="index.php?page=main&category=Перекус">Перекус</a></li>
                <li class="menu__item"><a href="index.php?page=main&category=Ужин">Ужин</a></li>
                <li class="menu__item"><a href="index.php?page=myrecipes">Мои рецепты</a></li>
            </ul>
            <div class="hamb">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>



        <script>
            let hamb = document.querySelector(".hamb");
            let menu = document.querySelector(".menu__list");

            hamb.addEventListener("click", mobileMenu);

            function mobileMenu(){
                hamb.classList.toggle("active");
                menu.classList.toggle("active");
            }

            const menuLink = document.querySelectorAll(".menu__item");
            menuLink.forEach(n => n.addEventListener("click", closeMenu));

            function closeMenu(){
                hamb.classList.remove("active");
                menu.classList.remove("active");
            }
        </script>
    </div>
</div>


