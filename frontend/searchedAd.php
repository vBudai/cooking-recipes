<?php
    $recipe = search('recipe', $title);
?>

    <div class="content-container">
        <div class="page__title">
            <?= $title ?>
        </div>

        <div class="grid-food">
            <?php for($i = 0; $i < count($recipe); $i++){?>
                <div class="food__container">
                    <a href="index.php?page=recipe&id_recipe=<?= $recipe[$i]['id'] ?>" class="food__link">
                        <div class="food">
                            <div class="food__img">
                                <img src="<?= $recipe[$i]['mainImage'] ?>" alt="food">
                            </div>
                            <div class="grid-food2">
                                <div class="food__title"><div><?= $recipe[$i]['title'] ?></div></div>
                                <div class="food__cooking-time"><div><?= $recipe[$i]['cookingTime'] ?></div></div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
