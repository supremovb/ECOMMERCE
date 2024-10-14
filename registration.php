<?php require_once("includes/header.php")?>

    <!-- Navbar -->
    <?php require_once("includes/navbar.php")?>

    <!-- Registration Form -->
    <div class="container content mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Create Your Account</h4>
                    </div>
                    <div class="card-body">

                    <?php if(isset($_GET["success"])){?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $_GET["success"]; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }?>

<?php if(isset($_GET["error"])){ ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong><?php echo $_GET["error"]; ?></strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>




                        <form action="authRegister.php" method="POST">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">username</label>
                                <input type="username" class="form-control" id="username" name="username" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Already have an account? <a href="login.html" class="text-primary">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Footer -->
   <?php require_once("includes/footer.php")?>