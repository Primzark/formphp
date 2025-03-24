<?php include_once '../../templates/head.php'; ?>

<body data-bs-theme="dark">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left Sidebar -->
            <div class="col-md-2 col-12 p-3 position-sticky vh-100 overflow-auto top-0 border-end d-md-block d-none">
                <h4 class="text-light">Instagram</h4>
                <ul class="list-unstyled py-4">
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_home.php"><i class="bi bi-house-door me-2 fs-2"></i> Home</a></li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start" data-bs-toggle="offcanvas" data-bs-target="#searchOffcanvas"><i class="bi bi-search me-2 fs-2"></i> Search</button></li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start"><i class="bi bi-heart me-2 fs-2"></i> Notifications</button></li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_post.php"><i class="bi bi-plus-square me-2 fs-2"></i> Create</a></li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_profil.php"><i class="bi bi-person me-2 fs-2"></i> Profile</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-11 mt-4 mb-4">
                        <div class="card bg-dark text-light">
                            <div class="card-header">
                                <h3 class="mb-2">Add a comment</h3>
                                <p class="text-muted mb-0">For "<?php echo htmlspecialchars($post['post_description']); ?>" by <?php echo htmlspecialchars($post['user_pseudo']); ?></p>
                            </div>
                            <div class="card-body">
                                <?php if (isset($error)): ?>
                                    <p class="text-danger mb-3"><?php echo $error; ?></p>
                                <?php endif; ?>
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="com_text" class="form-label">Your comment</label>
                                        <textarea class="form-control bg-dark text-light border-secondary" id="com_text" name="com_text" rows="3" placeholder="Write your comment here..."></textarea>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary w-100">Post</button>
                                        <a href="controller_fullpic.php?post_id=<?php echo $post['post_id']; ?>" class="btn btn-secondary w-100">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Offcanvas -->
    <div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="searchOffcanvas" aria-labelledby="searchOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="searchOffcanvasLabel">Search</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form method="POST" action="../../src/Controller/controller_search.php">
                <div class="mb-3">
                    <input type="text" class="form-control bg-dark text-light border-secondary" name="search_term" placeholder="Search users..." aria-label="Search">
                </div>
                <button type="submit" class="btn btn-outline-danger w-100">Search</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>