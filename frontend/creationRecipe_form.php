<div class="content-container">
    <form action="" enctype="multipart/form-data" method="post">
        <div class="recipe__title">
            <input type="text" placeholder="Название рецепта">
        </div>
        <div class="recipe__img">
            <input type="file" id="main-img" value="Готовое блюдо">
            <label for="main-img" class="recipe__img__input">
                <div class="main-img__container">
                    <img src="./frontend/img/addImg-icon.svg">
                    <div>Фото блюда</div>
                </div>
            </label>
        </div>
        <div class="recipe__info">
            <div class="info__description">
                <textarea name="" id="" cols="30" rows="10" placeholder="Описание рецепта"></textarea>
            </div>
            <div class="info__grid">
                <div class="info__ingredients">
                    <ul class="info__add-ingredient">
                        <li>
                            <input class="add-ingredient__input" type="text" placeholder="Ингредиент">
                        </li>
                        <li>
                            <input class="add-ingredient__btn" type="button" value="Добавить">
                        </li>
                    </ul>
                </div>
                <div class="cooking-time">
                    <input type="text" placeholder="Время готовки">
                </div>
                <div class="portions-count">
                    <input type="text" placeholder="Кол-во порций">
                </div>
            </div>
        </div>

        <div class="step__number">
            1 шаг
        </div>
        <div class="recipe__step margin-btm-15">
            <div class="step-img__input">
                <input type="file" id="step-img1" value="Фото шага">
                <label for="step-img1" class="recipe__input-img-btn">
                    <div class="main-img__container">
                        <img src="./frontend/img/addImg-icon.svg">
                        <div>Фото Шага</div>
                    </div>
                </label>
            </div>
            <div class="step__info">
                <textarea placeholder="Описание шага"></textarea>
            </div>
        </div>
        <input class="add-step-btn" type="button" value="Добавить шаг">
        <input class="add-recipe-btn" type="submit" value="Добавить рецепт">
    </form>
</div>