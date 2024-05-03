<?php if (isset($_SESSION['message'], $_SESSION['couleur'])) : ?>
    <div class="alert alert-<?= $_SESSION['couleur'] ?>" role="alert">
        <?= $_SESSION['message'] ?>
        <?php unset($_SESSION['message']) ?>
    </div>
<?php endif ?>