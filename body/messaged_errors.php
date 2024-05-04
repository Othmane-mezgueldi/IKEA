<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger" role="alert">
        <h6>Liste des erreurs</h6>
        <ul>
            <?php foreach ($errors as $key => $error) : ?>
                <li>
                    <?= $error ?>
                </li>
            <?php endforeach  ?>
        </ul>
    </div>
<?php endif ?>