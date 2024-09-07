<?php
$error_message = isset($error_message) ? $error_message : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="container vh-100 col-md-4 px-4 d-flex align-items-center justify-content-center">
    <main class="form-signin w-100 m-auto">
      <form method="POST" action="index.php?action=register">
        <img class="mb-4" src="assets/img/logo.png" alt="" width="100px">
        <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

        <div class="form-floating my-2">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating my-2">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
            required>
          <label for="floatingPassword">Password</label>
        </div>
        <?php if ($error_message): ?>
          <small style="color: red;"><?= $error_message; ?><br></small>
        <?php endif; ?>
        <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign Up</button>
      </form>
      <a href="index.php?action=login" class="text-decoration-none my-2">Login disini</a>
      <p class="mt-5 mb-3 text-body-secondary">© 2024</p>
    </main>
  </div>
</body>

</html>