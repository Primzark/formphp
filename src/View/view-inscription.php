


<?php 
include_once("../../templates/head.php");
?>




<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="p-4">
                        <h1 class="card-title text-center">Inscription</h1>
                        <form action="" method="post" novalidate>
                            <div>
                                <label for="nom" class="form-label">Nom:</label>
                                <span class="text-danger"><?= $errors['nom'] ?? '' ?></span>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                                <?php if (isset($errors['nom'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nom'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom:</label>
                                <span class="text-danger"><?= $errors['prenom'] ?? '' ?></span>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                                <?php if (isset($errors['nom'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nom'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <?php if (isset($errors['nom'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nom'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe: (Maj, numb, min, special)</label>
                                <span class="text-danger"><?= $errors['password'] ?? '' ?></span>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <?php if (isset($errors['nom'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nom'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmez le mot de passe:</label>
                                <span class="text-danger"><?= $errors['lastname'] ?? '' ?></span>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" required>
                                    <?php if (isset($errors['nom'])): ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['nom'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date de naissance:</label>
                                <span class="text-danger"><?= $errors['lastname'] ?? '' ?></span>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>

                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre:</label>
                                <span class="text-danger"><?= $errors['genre'] ?? '' ?></span>
                                <select class="form-select" id="genre" name="genre" required>
                                    <option value="" selected disabled></option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                    <option value="autre">Autre</option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <span class="text-danger"><?= $errors['terms'] ?? '' ?></span>
                                <label class="form-check-label" for="terms">J'accepte les conditions
                                    d'utilisation</label>
                            </div>

                            <a href="confirmation.php"><button type="submit"
                                    class="btn btn-primary w-100">S'inscrire</button></a>
                        </form>
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