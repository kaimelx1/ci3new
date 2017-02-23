<div class="container">
    <div align="center" style="margin-top: 150px">
        <div class="row">
            <h1>Authorization</h1>
            <form method="POST" id="login_form" class="form-group col-sm-4 col-sm-offset-4">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" value="" placeholder="Password"
                           required>
                </div>
                <input type="submit" class="btn btn-default login_btn" value="Login">
            </form>
        </div>
        <!-- Message -->
        <div class="form-group ajax_message"></div>
    </div>
</div>