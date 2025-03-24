<?php include_once '../../templates/head.php'; ?>

<body data-bs-theme="dark">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar - Hidden on mobile, shown as fixed sidebar on larger screens -->
            <div class="col-md-3 col-lg-2 d-none d-md-block p-3 position-sticky vh-100 overflow-auto top-0 border-end">
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

            <!-- Mobile bottom navigation bar - visible only on mobile -->
            <div class="fixed-bottom bg-dark d-md-none py-2 border-top">
                <div class="row text-center">
                    <div class="col-3">
                        <a class="text-light" href="../../src/Controller/controller_home.php"><i
                                class="bi bi-house-door fs-4"></i></a>
                    </div>
                    <div class="col-3">
                        <button class="btn p-0 text-light" data-bs-toggle="offcanvas" data-bs-target="#searchOffcanvas">
                            <i class="bi bi-search fs-4"></i>
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="text-light" href="../../src/Controller/controller_post.php"><i
                                class="bi bi-plus-square fs-4"></i></a>
                    </div>
                    <div class="col-3">
                        <a class="text-light" href="../../src/Controller/controller_profil.php"><i
                                class="bi bi-person fs-4"></i></a>
                    </div>
                </div>
            </div>

            <!-- Mobile header - visible only on mobile -->
            <div class="col-12 d-md-none border-bottom py-2 sticky-top bg-dark">
                <div class="d-flex justify-content-between align-items-center px-3">
                    <h4 class="text-primary m-0">Instagram</h4>
                    <a href="../../src/Controller/controller_deconnexion.php" class="btn btn-outline-danger btn-sm">Log
                        out</a>
                </div>
            </div>

            <!-- Main content area - adjusted width for different screen sizes -->
            <div class="col-12 col-md-9 col-lg-10 pb-5 pb-md-0">
                <!-- Desktop navbar - visible only on md and up -->
                <nav class="navbar navbar-dark bg-dark border-bottom d-none d-md-block">
                    <div class="container-fluid">
                        <a href="../../src/Controller/controller_deconnexion.php"
                            class="btn btn-outline-danger ms-auto">Log out</a>
                    </div>
                </nav>

                <!-- Profile section -->
                <div class="row mt-3 mt-md-4 mx-2 mx-md-5">
                    <div class="col-4 col-md-3 col-lg-2">
                        <img src="" alt="Profile Picture" class="rounded-circle img-fluid">
                    </div>
                    <div class="col-8 col-md-9 col-lg-10">
                        <div class="d-flex flex-column mb-3">
                            <!-- Mobile layout -->
                            <div class="d-block d-md-none">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="me-2 mb-0"><?= htmlspecialchars($_SESSION["user_pseudo"]) ?></h1>
                                    <i class="bi bi-patch-check-fill text-primary" title="Verified"></i>
                                </div>
                                <div class="row g-4 flex-nowrap mb-2">
                                    <div class="col-4 text-center">
                                        <div>Posts</div>
                                        <div class="fw-bold">6</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div>Followers</div>
                                        <div class="fw-bold">500</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div>Following</div>
                                        <div class="fw-bold">5</div>
                                    </div>
                                </div>
                                <p class="mb-2">Cool guy</p>
                                <div>
                                    <button class="btn btn-outline-primary btn-sm me-2">Follow</button>
                                    <button class="btn btn-outline-primary btn-sm">Contact</button>
                                </div>
                            </div>
                            <!-- Desktop layout -->
                            <div class="d-none d-md-block">
                                <div class="d-flex flex-row align-items-center mb-2">
                                    <h1 class="me-3 mb-0"><?= htmlspecialchars($_SESSION["user_pseudo"]) ?></h1>
                                    <i class="bi bi-patch-check-fill text-primary me-3" title="Verified"></i>
                                    <button class="btn btn-outline-primary btn-sm me-2">Follow</button>
                                    <button class="btn btn-outline-primary btn-sm">Contact</button>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md fw-bold">6 Posts</div>
                                    <div class="col-md fw-bold">500 Followers</div>
                                    <div class="col-md fw-bold">5 Following</div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 d-none d-md-block">Cool guy</p>
                    </div>
                </div>

                <!-- Posts section -->
                <div class="mt-4 mx-2 mx-md-3">
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