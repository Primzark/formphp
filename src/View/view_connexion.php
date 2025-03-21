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
                                <span><?= $errors['email'] ?? '' ?></span>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label text-light">password:</label>
                                <span><?= $errors['password'] ?? '' ?></span>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <span><?= $errors['connexion'] ?? '' ?></span>
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