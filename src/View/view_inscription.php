<?php include_once '../../templates/head.php'; ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card p-4">
                    <h1 class="card-title text-center">Inscription</h1>
                    <form action="" method="POST" novalidate>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text"
                                class="form-control <?php echo isset($errors['nom']) ? 'is-invalid' : ''; ?>" id="nom"
                                name="nom" value="<?= $_POST['nom'] ?? '' ?>" required>
                            <?php if (isset($errors['nom'])): ?>
                                <div class="invalid-feedback"><?= $errors['nom'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Nom valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom:</label>
                            <input type="text"
                                class="form-control <?php echo isset($errors['prenom']) ? 'is-invalid' : ''; ?>"
                                id="prenom" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>" required>
                            <?php if (isset($errors['prenom'])): ?>
                                <div class="invalid-feedback"><?= $errors['prenom'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Prénom valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Pseudo:</label>
                            <input type="text"
                                class="form-control <?php echo isset($errors['pseudo']) ? 'is-invalid' : ''; ?>"
                                id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>" required>
                            <?php if (isset($errors['pseudo'])): ?>
                                <div class="invalid-feedback"><?= $errors['pseudo'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Pseudo valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email"
                                class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                                id="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required>
                            <?php if (isset($errors['email'])): ?>
                                <div class="invalid-feedback"><?= $errors['email'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Email valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe: (Maj, numb, min, special)</label>
                            <input type="password"
                                class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
                                id="password" name="password" required>
                            <?php if (isset($errors['password'])): ?>
                                <div class="invalid-feedback"><?= $errors['password'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Mot de passe valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirmez le mot de passe:</label>
                            <input type="password"
                                class="form-control <?php echo isset($errors['confirm_password']) ? 'is-invalid' : ''; ?>"
                                id="confirm_password" name="confirm_password" required>
                            <?php if (isset($errors['confirm_password'])): ?>
                                <div class="invalid-feedback"><?= $errors['confirm_password'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Mot de passe confirmé</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Date de naissance:</label>
                            <input type="date"
                                class="form-control <?php echo isset($errors['dob']) ? 'is-invalid' : ''; ?>" id="dob"
                                name="dob" value="<?= $_POST['dob'] ?? '' ?>" required>
                            <?php if (isset($errors['dob'])): ?>
                                <div class="invalid-feedback"><?= $errors['dob'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Date de naissance valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre:</label>
                            <select class="form-control <?php echo isset($errors['genre']) ? 'is-invalid' : ''; ?>"
                                id="genre" name="genre" required>
                                <option value="" disabled <?php echo !isset($_POST['genre']) ? 'selected' : ''; ?>>--
                                    Choisir --</option>
                                <option value="M" <?php echo (isset($_POST['genre']) && $_POST['genre'] === 'M') ? 'selected' : ''; ?>>Homme</option>
                                <option value="F" <?php echo (isset($_POST['genre']) && $_POST['genre'] === 'F') ? 'selected' : ''; ?>>Femme</option>
                                <option value="A" <?php echo (isset($_POST['genre']) && $_POST['genre'] === 'A') ? 'selected' : ''; ?>>Autre</option>
                            </select>
                            <?php if (isset($errors['genre'])): ?>
                                <div class="invalid-feedback"><?= $errors['genre'] ?></div>
                            <?php else: ?>
                                <div class="valid-feedback">Genre valide</div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" value="1" <?php echo isset($_POST['terms']) ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="terms">J'accepte les conditions d'utilisation</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
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