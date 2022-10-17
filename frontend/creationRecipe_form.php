<div class="content-container">
    <form action="create-recipe.php" enctype="multipart/form-data" method="post">
        <div class="recipe__title">
            <input name="recipe-title" type="text" placeholder="Название рецепта">
        </div>
        <div class="recipe__img">
            <input name="main-img" type="file" id="main-img" value="Готовое блюдо">
            <label for="main-img" class="recipe__img__input">
                <div class="main-img__container">
                    <img src="./frontend/img/addImg-icon.svg">
                    <div class="input-file-text">Фото блюда<br></div>
                </div>
            </label>
        </div>
        <div class="recipe__category">
            <div class="select-arrow">
                <select name="category" class="select-category">
                    <option>Завтрак</option>
                    <option>Обед</option>
                    <option>Ужин</option>
                    <option>Перекус</option>
                </select>
            </div>
        </div>
        <div class="recipe__info">
            <div class="info__description">
                <textarea name="recipe-info" id="" cols="30" rows="10" placeholder="Описание рецепта"></textarea>
            </div>
            <div class="info__grid">
                <div class="info__ingredients">
                    <ul class="info__add-ingredient">
                        <li>
                            <input name="ingredient[]" class="add-ingredient__input" type="text" placeholder="Ингредиент">
                        </li>
                    </ul>
                    <div class="add-ingredient__btn">Добавить</div>
                </div>
                <div class="cooking-time">
                    <input name="cooking-time" type="text" placeholder="Время готовки">
                </div>
                <div class="portions-count">
                    <input name="portions-count" type="text" placeholder="Кол-во порций">
                </div>
            </div>
        </div>
        <div class="steps">
            <div class="step__number">
                1 шаг
            </div>
            <div class="recipe__step margin-btm-15">
                <div class="step-img__input">
                    <input name="step_img[]" type="file" id="step-img1" value="Фото шага">
                    <label for="step-img1" class="recipe__input-img-btn">
                        <div class="main-img__container">
                            <img src="./frontend/img/addImg-icon.svg">
                            <div>Фото Шага</div>
                        </div>
                    </label>
                </div>
                <div class="step__info">
                    <textarea name="step_info[]" placeholder="Описание шага"></textarea>
                </div>
            </div>
        </div>
        <div class="add-step-btn">Добавить шаг</div>

        <input class="add-recipe-btn" type="submit" value="Добавить рецепт">
    </form>
</div>
<script>
    let inputs = document.querySelectorAll('#main-img');
    Array.prototype.forEach.call(inputs, function (input) {
        let label = input.nextElementSibling,
            labelVal = label.querySelector('.input-file-text').innerText;

        input.addEventListener('change', function (e) {
            let countFiles = '';
            if (this.files && this.files.length >= 1)
                countFiles = this.files.length;

            if (countFiles)
                label.querySelector('.input-file-text').innerText += 'Выбрано файлов: ' + countFiles;
            else
                label.querySelector('.input-file-text').innerText = labelVal;
        });
    });


    //Добавление шагов
    let stepCount = 1;
    let addStep = document.getElementsByClassName('add-step-btn')[0];
    let steps = document.getElementsByClassName('steps')[0];
    addStep.addEventListener('click', function(event) {
        stepCount += 1;
        steps.innerHTML += "<div class='step__number'>"+ stepCount + "шаг" +"</div>"+
            "<div class='recipe__step margin-btm-15'>"+
                "<div class='step-img__input'>"+
                    "<input name='step_img[]' type='file' id='step-img"+ stepCount +"' value='Фото шага'>" +
                    "<label for='step-img"+ stepCount +" 'class='recipe__input-img-btn'>"+
                        "<div class='main-img__container'>"+
                            "<img src='./frontend/img/addImg-icon.svg'>"+
                            "<div>Фото Шага</div>"+
                        "</div>"+
                    "</label>"+
                "</div>"+
                "<div class='step__info'>"+
                    "<textarea name='step_info[]' placeholder='Описание шага'></textarea>"+
                "</div>"+
            "</div>";
    });

    //Добавление ингридиентов
    let addIngr = document.getElementsByClassName('add-ingredient__btn')[0];
    let ingrs = document.getElementsByClassName('info__add-ingredient')[0];
    addIngr.addEventListener('click', function (event){
       ingrs.innerHTML +=
           "<li>"+
                "<input name='ingredient[]' class='add-ingredient__input' type='text' placeholder='Ингредиент'>"+
           "</li>";
    });

</script>