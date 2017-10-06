<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>Tasks</b> Manager</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
            <input type="hidden" name="_token" value="<?= $_SESSION['token'] ?>">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="flash-massage-container <?= \Lib\Flash::check()? '': 'empty' ?>">
                        <div class="massage">
                            <?= \Lib\Flash::get(); ?>
                        </div>
                    </div>
                  </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
</div>
