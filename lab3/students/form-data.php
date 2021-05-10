<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/style.css">
  <title>Datos de los Alumnos</title>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="./../index.php" class="nav__link">Lista alumnos</a>
        </li>
        <li class="nav__item">
          <a href="./../students/number-students.php" class="nav__link">Cantidad alumnos</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container container--large">

    <?php
    if (isset($_GET['number_students'])) :

      $numberStudents = $_GET['number_students'];

      if (!empty($numberStudents)) :

        include('./../database-init.php');

        $careers = $db->getCareers();

        if (count($careers) > 0) :

    ?>

          <form class="form form--full" action="./create.php" method="post">

            <h2 class="subtitle">Datos de los alumnos</h2>

            <?php
            for ($index = 0; $index < $numberStudents; $index++) :
            ?>

              <div class="row">

                <span class="row__number"><?= $index + 1 ?></span>

                <div class="col-7">

                  <div class="field field--inline">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#person" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="text" name="names[]" id="names<?= $index ?>" placeholder="Nombres alumno" maxlength="30" required>
                      <label for="names<?= $index ?>" class="field__label">Nombres</label>
                    </div>
                  </div>


                  <div class="field field--inline">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#person" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="text" name="surnames[]" id="surnames<?= $index ?>" placeholder="Apellidos alumno" maxlength="30" required>
                      <label for="surnames<?= $index ?>" class="field__label">Apellidos</label>
                    </div>
                  </div>

                  <div class="field field--inline">
                    <div class="field__container-icon">
                      <svg class="icon field__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#college-id" />
                      </svg>
                    </div>
                    <div class="field__container-input">
                      <input class="field__input" type="text" name="college_id[]" id="college_id<?= $index ?>" placeholder="Carnet universitario alumno" maxlength="15" required>
                      <label for="college_id<?= $index ?>" class="field__label">Carnet universitario</label>
                    </div>
                  </div>

                </div>

                <div class="col-3">

                  <div class="radio-group">
                    <span class="radio-group__title">Sexo</span>
                    <div class="radio-group__content">
                      <label class="radio-group__label" for="male<?= $index ?>">
                        <input class="radio-group__radio" type="radio" name="genre[<?= $index ?>]" value="M" id="male<?= $index ?>">
                        <span class="radio-group__text">Masculino</span>
                      </label>
                      <label class="radio-group__label" for="female<?= $index ?>">
                        <input class="radio-group__radio" type="radio" name="genre[<?= $index ?>]" value="F" id="female<?= $index ?>">
                        <span class="radio-group__text">Femenino</span>
                      </label>
                    </div>
                  </div>

                </div>

                <div class="col-2">

                  <div class="combobox">
                    <select class="combobox__select" name="career_id[]" id="career_id" required>
                      <option class="combobox__option" value="" disabled selected>--- Seleccione una ---</option>
                      <?php

                      foreach ($careers as $career) :

                      ?>
                        <option class="combobox__option" value="<?= $career['id'] ?>"><?= $career['name'] ?></option>
                      <?php

                      endforeach;

                      ?>
                    </select>
                    <div class="combobox__container-icon">
                      <svg class="icon combobox__icon">
                        <use xlink:href="./../assets/feather-sprite.svg#expand" />
                      </svg>
                    </div>
                  </div>

                </div>

              </div>

            <?php
            endfor;
            ?>

            <div class="container-actions container-actions--center">

              <input class="btn btn--outlined" type="reset" value="Limpiar">
              <input class="btn btn--contained" type="submit" value="Enviar">

            </div>

          </form>

        <?php

          $db->close();

        else :

        ?>
          <div class="message message--warning">
            <h3 class="message__title">Datos de los alumnos</h3>
            <p class="message__content">¡No hay carreras registradas!</p>
          </div>
        <?php

        endif;

      else :

        ?>
        <div class="message message--warning">
          <h3 class="message__title">Datos de los alumnos</h3>
          <p class="message__content">¡Los campos estan vacíos!</p>
        </div>
      <?php

      endif;

    else :

      ?>
      <div class="message message--warning">
        <h3 class="message__title">Datos de los alumnos</h3>
        <p class="message__content">¡No se enviaron los parámetros necesarios!</p>
      </div>
    <?php

    endif;
    ?>

  </div>

</body>

</html>