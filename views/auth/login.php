<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="row justify-content-center">
  <div class="col-md-7 col-lg-5">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h3 class="mb-3">Sign In</h3>
        <?php if ($error): ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" novalidate autocomplete="off">
          <div class="mb-3">
            <label for="loginuser" class="form-label">Username</label>
            <input type="text" name="username" id="loginuser" class="form-control" placeholder="Enter your username" required autofocus>
          </div>
          <div class="mb-3">
            <label for="loginpass" class="form-label">Password</label>
            <input type="password" name="password" id="loginpass" class="form-control" placeholder="Password" required>
          </div>
          <div class="d-grid gap-2 mb-2">
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
          </div>
          <div class="text-center">
            <a href="index.php?page=register" class="btn btn-link px-0">Create account</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>