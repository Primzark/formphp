<?php include_once '../../templates/head.php'; ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card p-4">
                    <h1 class="card-title text-center">Sign-in</h1>
                    <form action="" method="POST" novalidate>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Name:</label>
                            <span class="text-danger"><?= $errors['nom'] ?? '' ?></span>
                            <input type="text"
                                class="form-control <?php echo isset($errors['nom']) ? 'is-invalid' : ''; ?>" id="nom"
                                name="nom" value="<?= $_POST['nom'] ?? '' ?>" required>
                            <?php if (isset($errors['nom'])): ?>
                                <div class="invalid-feedback"><?= $errors['nom'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Invalid</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">name:</label>
                            <span class="text-danger"><?= $errors['prenom'] ?? '' ?></span>
                            <input type="text"
                                class="form-control <?php echo isset($errors['prenom']) ? 'is-invalid' : ''; ?>"
                                id="prenom" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>" required>
                            <?php if (isset($errors['prenom'])): ?>
                                <div class="invalid-feedback"><?= $errors['prenom'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Name correct</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Pseudo:</label>
                            <span class="text-danger"><?= $errors['pseudo'] ?? '' ?></span>
                            <input type="text"
                                class="form-control <?php echo isset($errors['pseudo']) ? 'is-invalid' : ''; ?>"
                                id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>" required>
                            <?php if (isset($errors['pseudo'])): ?>
                                <div class="invalid-feedback"><?= $errors['pseudo'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Pseudo valid</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
                            <input type="email"
                                class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                                id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
                            <?php if (isset($errors['email'])): ?>
                                <div class="invalid-feedback"><?= $errors['email'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Email valid</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password: (Maj, numb, min, special)</label>
                            <span class="text-danger"><?= $errors['password'] ?? '' ?></span>
                            <input type="password"
                                class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
                                id="password" name="password" required>
                            <?php if (isset($errors['password'])): ?>
                                <div class="invalid-feedback"><?= $errors['password'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Password valid</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm password:</label>
                            <span class="text-danger"><?= $errors['confirm_password'] ?? '' ?></span>
                            <input type="password"
                                class="form-control <?php echo isset($errors['confirm_password']) ? 'is-invalid' : ''; ?>"
                                id="confirm_password" name="confirm_password" required>
                            <?php if (isset($errors['confirm_password'])): ?>
                                <div class="invalid-feedback"><?= $errors['confirm_password'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">password confirme</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">birthdate:</label>
                            <span class="text-danger"><?= $errors['dob'] ?? '' ?></span>
                            <input type="date"
                                class="form-control <?php echo isset($errors['dob']) ? 'is-invalid' : ''; ?>" id="dob"
                                name="dob" value="<?= $_POST['dob'] ?? '' ?>" required>
                            <?php if (isset($errors['dob'])): ?>
                                <div class="invalid-feedback"><?= $errors['dob'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">birthdate valid </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre:</label>
                            <span class="text-danger"><?= $errors['genre'] ?? '' ?></span>
                            <select class="form-control <?php echo isset($errors['genre']) ? 'is-invalid' : ''; ?>"
                                id="genre" name="genre" required>
                                <option value="" disabled <?php echo !isset($_POST['genre']) ? 'selected' : ''; ?>>--
                                    Choose --</option>
                                <option value="M" <?php echo (isset($_POST['genre']) && $_POST['genre'] === 'M') ? 'selected' : ''; ?>>Male</option>
                                <option value="F" <?php echo (isset($_POST['genre']) && $_POST['genre'] === 'F') ? 'selected' : ''; ?>>Women</option>
                                <option value="A" <?php echo (isset($_POST['genre']) && $_POST['genre'] === 'A') ? 'selected' : ''; ?>>Other</option>
                            </select>
                            <?php if (isset($errors['genre'])): ?>
                                <div class="invalid-feedback"><?= $errors['genre'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Genre valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" value="1" <?php echo isset($_POST['terms']) ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="terms">Accept condition</label>
                            <span class="text-danger"><?= $errors['terms'] ?? '' ?></span>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Sign-in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>