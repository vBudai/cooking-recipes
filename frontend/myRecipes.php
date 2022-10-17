<div class="content-container">
    <div class="page__title">
        Мои рецепты
    </div>
    <div class="grid-food">
        <div class="food-create-link__container">
            <a href="index.php?page=create-recipe" class="food__create-link">
                Добавить рецепт<br>+
            </a>
        </div>
        <?php
            $recipes = selectAll('recipe', ['id_user' => $id_user]);
            for($i = 0; $i < count($recipes); $i++){ ?>
                <div class="food__container">
                    <a href="index.php?page=recipe&id_recipe=<?= $recipes[$i]['id'] ?>" class="food__link">
                        <div class="food">
                            <div class="food__img">
                                <img src="<?= $recipes[$i]['mainImage'] ?>" alt="food">
                            </div>
                            <div class="grid-food2">
                                <div class="food__title"><div><?= $recipes[$i]['title'] ?></div></div>
                                <div class="food__cooking-time"><div> <?= $recipes[$i]['cookingTime'] ?></div></div>
                            </div>
                        </div>
                    </a>
                    <a href="delete-recipe.php?id=<?= $recipes[$i]['id'] ?>" class="food-delete">
                        <span></span>
                        <span></span>
                    </a>
                </div>
            <?php } ?>
    </div>
</div>