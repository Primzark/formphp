<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

include_once("../../templates/head.php");
?>

<body data-bs-theme="dark">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar (hidden on small screens) -->
            <div class="col-md-2 col-12 p-3 position-sticky vh-100 overflow-auto border-end d-md-block d-none">
                <h4 class="text-primary">Instagram</h4>
                <ul class="list-unstyled py-4">
                    <li class="py-2">
                        <a href="../../src/Controller/controller_home.php"
                            class="btn btn-dark w-100 text-start text-decoration-none shadow-none">
                            <i class="bi bi-house-door me-2 fs-2"></i> Home
                        </a>
                    </li>
                    <li class="py-2">
                        <button class="btn btn-dark w-100 text-start" data-bs-toggle="offcanvas"
                            data-bs-target="#searchOffcanvas">
                            <i class="bi bi-search me-2 fs-2"></i> Search
                        </button>
                    </li>
                    <li class="py-2">
                        <a href="../../src/Controller/controller_post.php"
                            class="btn btn-dark w-100 text-start text-decoration-none shadow-none">
                            <i class="bi bi-plus-square me-2 fs-2"></i> Create
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="../../src/Controller/controller_profil.php"
                            class="btn btn-dark w-100 text-start text-decoration-none shadow-none">
                            <i class="bi bi-person me-2 fs-2"></i> Profile
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 col-12 p-3">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="bg-dark text-light p-4 rounded">
                            <h1 class="text-center mb-4">Ready to show the world?</h1>
                            <?php if (!empty($errors)): ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $field => $message): ?>
                                        <p><?php echo htmlspecialchars($message); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <form action="" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="photo" class="form-label">Photo</label>
                                        <input type="file"
                                            class="form-control bg-dark text-light border-secondary <?php echo isset($errors['photo']) ? 'is-invalid' : ''; ?>"
                                            id="photo" name="photo" required>
                                        <div class="invalid-feedback">
                                            <?php echo $errors['photo'] ?? 'Please select a photo'; ?></div>
                                    </div>
                                    <div class="col-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea
                                            class="form-control bg-dark text-light border-secondary <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>"
                                            rows="6" id="description" name="description" placeholder="instagoat"
                                            required></textarea>
                                        <div class="invalid-feedback">
                                            <?php echo $errors['description'] ?? 'Please enter a description'; ?></div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100 mb-2">Post</button>
                                        <a href="../../src/Controller/controller_home.php"
                                            class="btn btn-outline-secondary w-100">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Offcanvas -->
    <div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="searchOffcanvas"
        aria-labelledby="searchOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="searchOffcanvasLabel">Search</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="../../src/Controller/controller_search.php">
                <div class="mb-3">
                    <input type="text" class="form-control bg-dark text-light border-secondary" name="search_term"
                        placeholder="Search users...">
                </div>
                <button type="submit" class="btn btn-outline-danger w-100">Search</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>