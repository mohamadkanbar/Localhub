<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control col-md-6" name="email"  id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control col-md-6" name="password" id="password">
                    </div>
                    <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div> -->
                    <button type="submit" name="login" class="btn btn-info btn-block col-md-8">Log in</button>
                    <p class="form-control col-md-8" style="padding: 5px; margin: 5px;">Don't yet have an account? <a href="register.php">Sign up</a></p>

</form>