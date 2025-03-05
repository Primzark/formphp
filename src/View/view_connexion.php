<?php
include_once("../../templates/head.php");
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 p-4">
                <div class="card">
                    <div class="p-4">
                        <h1 class="card-title text-center">Connexion</h1>
                        <form action="confirmation.html" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <a><button type="submit" class="btn btn-primary w-100">Se connecter</button></a>
                        </form>
                        <p class="mt-3 text-center">Pas encore de compte ? <a href="../Controller/controller_inscription.php">Inscrivez-vous</a>
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