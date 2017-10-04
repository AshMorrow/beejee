<div class="content login-form-wrap">
    <form action="" method="post">
        <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?>">
        <label>
            <i class="fa fa-user" aria-hidden="true"></i>
            <input placeholder="Email" type="email" name="email" required/>
        </label>
        <label>
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input placeholder="Password" type="password" name="password" required/>
        </label>
        <button>Войти</button>
    </form>
    <div class="flash-massage-container <?= \Lib\Flash::check()? '': 'empty' ?>">
        <div class="massage">
            <?= \Lib\Flash::get(); ?>
        </div>
    </div>
</div>
