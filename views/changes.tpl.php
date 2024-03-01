<?php require_once VIEWS . '/incs/header.php';
global $loginuser; ?>
<div class="main">
    <div class="container">
        <form method="post" action="changes">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Новое имя</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
                       placeholder="<?= $loginuser['name'] ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="Email1" class="form-label">Новый email</label>
                <input type="email" name="email" class="form-control" id="Email" aria-describedby="email"
                       placeholder="<?= $loginuser['email'] ?>">
            </div>
            <div class="mb-3 mt-3">
                <label for="Phone" class="form-label">Новое телефон</label>
                <input type="tel" name="phone" class="form-control" id="Phone" data-inputmask="'mask': '+79999999999'"
                       placeholder="<?= $loginuser['phone'] ?>"">
            </div>
            <div class="mb-3 mt-3">
                <label for="Password" class="form-label">Новое пароль</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="password"
                       placeholder="Скрыт">
            </div>
            <input type="hidden" name="id" value="<?= $loginuser['id'] ?>">
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="text-danger bg-light p-2 col-md-4 offset-md-4"
                 style="text-align:center; font-size: 21px"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#Phone').inputmask();
    });
</script>

<?php require_once VIEWS . '/incs/footer.php' ?>
