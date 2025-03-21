<?php include_once '../../templates/head.php'; ?>

<body data-bs-theme="dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-3 position-sticky vh-100 overflow-auto top-0 border-end">
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
                            <i class="bi bi-plus-square me-3 fs-2"></i> Create
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


            <div class="col-10">

                <nav class="navbar navbar-dark bg-dark border-bottom">
                    <div class="container-fluid">

                        <a href="../../src/Controller/controller_deconnexion.php" class="btn btn-outline-danger">Log
                            out</a>

                    </div>
                </nav>


                <div class="row mt-4 mx-5">
                    <div class="col-md-3">
                        <img src="" alt="Profile Picture" class="rounded-circle img-fluid">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex align-items-center mb-3">
                            <h1 class="me-2"><?= htmlspecialchars($_SESSION["user_pseudo"]) ?></h1>
                            <i class="bi bi-patch-check-fill text-primary" title="Verified"></i>
                            <div class="ms-3">
                                <button class="btn btn-outline-primary btn-sm me-2">Follow</button>
                                <button class="btn btn-outline-primary btn-sm">Contact</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col fw-bold">6 Posts</div>
                            <div class="col fw-bold">500 Followers</div>
                            <div class="col fw-bold">5 Following</div>
                        </div>
                        <p>Cool guy</p>
                    </div>
                </div>


                <div class="mt-4 mx-3">
                    <ul class="nav nav-tabs justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active text-light" href="#"><i class="bi bi-camera me-1"></i> Posts</a>
                        </li>

                    </ul>
                    <div class="row row-cols-1 row-cols-md-3 g-3 mt-3">
                        <?php if (empty($posts)): ?>
                            <div class="col-12 text-center text-light">
                                <p>No posts yet.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($posts as $value): ?>
                                <div class="col">
                                    <div class="card bg-dark text-light position-relative">
                                        <a href="controller_fullpic.php?post_id=<?= $value['post_id'] ?>">
                                            <div class="ratio ratio-1x1">
                                                <img src="../../asset/img/<?= htmlspecialchars($value['pic_name'] ?? 'default.jpg') ?>"
                                                    class="card-img-top object-fit-cover"
                                                    alt="<?= htmlspecialchars($value['post_description']) ?>">
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                        placeholder="Search users..." aria-label="Search">
                </div>
                <button type="submit" class="btn btn-outline-danger w-100">Search</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>