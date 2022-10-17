<?php
    $recipe = selectOne('recipe', ['id' => $id_recipe]);
    $ingredient = selectAll('ingredient', ['id_recipe' => $id_recipe]);
    $steps = selectAll('step', ['id_recipe' => $id_recipe]);
?>

<div class="content-container">
    <div class="recipe__title">
        <?=
            $recipe['title']
        ?>
    </div>
    <div class="recipe__img">
        <img src="<?= $recipe['mainImage'] ?>" alt="recipe">
    </div>
    <div class="recipe__info">
        <div class="info__description">
            <?=
                $recipe['info']
            ?>
        </div>
        <div class="info__grid">
            <div class="info__ingredients">
                <ul>
                    <?php
                        for($i = 0; $i < count($ingredient); $i++){ ?>
                            <li>
                                <label class="checkbox-label">
                                    <input class="info__real-checkbox" id="product'<?= $i ?>'" type="checkbox">
                                    <span  class="info__custom-checkbox"></span>
                                    <?= $ingredient[$i]['name'] ?>
                                </label>
                            </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="info__cooking-time">
                <?=
                    $recipe['cookingTime']
                ?>
            </div>
            <div class="info__portions-count">
                <div>
                    <?=
                    $recipe['serviceCount']
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        for($i = 0; $i < count($steps); $i++){ ?>
            <div class="step__number">
                <?= ($i+1).' шаг' ?>
            </div>
            <div class="recipe__step">
                <div class="step__img">
                    <img src="<?= $steps[$i]['image'] ?>" alt="step">
                </div>
                <div class="step__info">
                    <?= $steps[$i]['info'] ?>
                </div>
            </div>
        <?php } ?>
</div>
</body>
