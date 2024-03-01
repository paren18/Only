
<?php require_once VIEWS . '/incs/header.php';?>
<div class="main">
    <div class="container">
        <form method="post" action="login">
            <div class="mb-3 mt-3">
                <label for="login" class="form-label">Телефон или Email</label>
                <input type="text" name="login" class="form-control" id="login" aria-describedby="login">
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="password">
            </div>
            <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Войти</button>
        </form>
        <div
                id="captcha-container"
                class="smart-captcha mt-2"
                data-callback="onRecaptchaSuccess"
                data-sitekey="ysc1_vo3jPo3R2254ztMcOP7dLVHvoXORa6WOCgxtkfEy8105050c"
        ></div>
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="text-danger bg-light p-2 col-md-4 offset-md-4"
                 style="text-align:center; font-size: 21px"><?= $_SESSION['message'] ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#Phone').inputmask();
    });

    function onRecaptchaSuccess() {
        document.getElementById("submitBtn").removeAttribute("disabled");
    }
</script>



<?php require_once VIEWS . '/incs/footer.php' ?>
