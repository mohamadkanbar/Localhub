
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <label for="firstname">first name</label>
            <input type="text" class="form-control col-md-6" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : null; ?>" name="firstname" id="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last name</label>
            <input type="text" class="form-control col-md-6" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : null; ?>" name="lastname" id="lastname">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control col-md-6" value="<?php echo isset($_POST['email']) ? $_POST['email'] : null; ?>" name="email" id="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control col-md-6" value="<?php echo isset($_POST['password']) ? $_POST['password'] : null; ?>" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="confirm">Confirme Password</label>
            <input type="password" class="form-control col-md-6" value="<?php echo isset($_POST['confirm']) ? $_POST['confirm'] : null; ?>" name="confirm" id="confirm">
        </div>
        <div class="custom-control form-group custom-radio">
        <input type="radio" id="customRadio1" name="customRadio" value="admin" class="custom-control-input">
        <label class="custom-control-label" for="customRadio1">Manger (I can adding the announcement)</label>
        </div>
        <div class="custom-control form-group custom-radio">
        <input type="radio" id="customRadio2" name="customRadio" value="visitor" class="custom-control-input">
        <label class="custom-control-label" for="customRadio2">Visitor (I searching an announcements)</label>
        </div>
        <br>
        <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div> -->
        <button type="submit" name="register" class="btn btn-success btn-block col-md-8">Register</button>

        <p class="form-control col-md-8" style="padding: 5px; margin: 5px;">Already have an account? <a href="login.php">Login</a></p>
</form>