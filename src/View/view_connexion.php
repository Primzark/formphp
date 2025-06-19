<?php
include_once "../../templates/head.php";
?>



<body class="bg-dark">
     <h1 class="display-4 text-light text-center">
      <p class="text-primary fw-bold">Instagram</p>
     </h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 p-4">
                <div class="card bg-dark border-light rounded-4">
                    <div class="p-4">
                        <h1 class="card-title text-center text-primary">Connexion</h1>
                        <form action="" method="post" novalidate>

                            <div class="mb-3">
                                <label for="email" class="form-label text-light">Email:</label>
                                <input type="email"
                                    class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                                    id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label text-light">password:</label>
                                <input type="password"
                                    class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
                                    id="password" name="password" required>
                                <?php if (isset($errors['password'])): ?>
                                    <div class="invalid-feedback"><?= $errors['password'] ?></div>
                                <?php endif; ?>
                            </div>
                            <?php if (isset($errors['connexion'])): ?>
                                <div class="invalid-feedback d-block"><?= $errors['connexion'] ?></div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary w-100">connexion</button>
                        </form>

                        <p class="mt-3 text-center text-light">No account yet ? <a
                                href="../Controller/controller_inscription.php">Sign-in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>