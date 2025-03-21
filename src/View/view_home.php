<?php include_once '../../templates/head.php'; ?>

<body data-bs-theme="dark">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-lg-2 d-none d-md-block p-3 position-sticky vh-100 overflow-auto top-0 border-end">
                <h4 class="text-primary">Instagram</h4>
                <ul class="list-unstyled py-4">
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_home.php"><i
                                class="bi bi-house-door me-2 fs-2"></i> <span>Home</span></a></li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start" data-bs-toggle="offcanvas"
                            data-bs-target="#searchOffcanvas"><i class="bi bi-search me-2 fs-2"></i>
                            <span>Search</span></button>
                    </li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_post.php"><i
                                class="bi bi-plus-square me-2 fs-2"></i> <span>Create</span></a></li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_profil.php"><i
                                class="bi bi-person me-2 fs-2"></i> <span>Profile</span></a></li>
                </ul>
            </div>


            <div class="fixed-bottom bg-dark d-md-none py-2">
                <div class="row text-center">
                    <div class="col-3">
                        <a class="text-light" href="controller_home.php"><i class="bi bi-house-door fs-4"></i></a>
                    </div>
                    <div class="col-3">
                        <button class="btn p-0 text-light" data-bs-toggle="offcanvas" data-bs-target="#searchOffcanvas">
                            <i class="bi bi-search fs-4"></i>
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="text-light" href="controller_post.php"><i class="bi bi-plus-square fs-4"></i></a>
                    </div>
                    <div class="col-3">
                        <a class="text-light" href="controller_profil.php"><i class="bi bi-person fs-4"></i></a>
                    </div>
                </div>
            </div>


            <div class="col-12 d-md-none border-bottom py-2 sticky-top bg-dark">
                <h4 class="text-primary m-0 ps-3">Instagram</h4>
            </div>


            <div class="col-12 col-md-9 col-lg-10 pb-5 pb-md-0">
                <div class="mt-3 mx-auto col-md-8 col-lg-6">
                    <?php if (empty($allPosts)): ?>
                        <p class="text-center text-light">No post available.</p>
                    <?php else: ?>
                        <?php foreach ($allPosts as $post): ?>
                            <div class="card mb-3 bg-dark text-light" id="post-<?php echo $post['post_id']; ?>">
                                <div class="card-header d-flex align-items-center">
                                    <img src="../../asset/img/<?php echo htmlspecialchars($post['user_avatar'] ?: 'profile.jpg'); ?>"
                                        class="rounded-circle me-2" width="40" alt="Profile">
                                    <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                                        <span class="fw-bold"><?php echo htmlspecialchars($post['user_pseudo']); ?></span>
                                        <span class="post-date ms-sm-2">
                                            <i class="bi bi-dot"></i><?php echo date("d/m/Y - H:i", $post['post_timestamp']); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="ratio ratio-1x1">
                                    <a href="controller_fullpic.php?post_id=<?php echo $post['post_id']; ?>">
                                        <img src="../../asset/img/<?php echo htmlspecialchars($post['pic_name'] ?? 'default.jpg'); ?>"
                                            class="card-img-top object-fit-cover"
                                            alt="<?php echo htmlspecialchars($post['post_description']); ?>">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php echo htmlspecialchars($post['post_description']); ?></p>
                                    <div class="d-flex">
                                        <button
                                            class="btn <?php echo $post['user_liked'] ? 'btn-danger' : 'btn-outline-danger'; ?> me-2 like-btn"
                                            data-post-id="<?php echo $post['post_id']; ?>">
                                            <i class="bi bi-heart<?php echo $post['user_liked'] ? '-fill' : ''; ?>"></i>
                                            <span class="like-count"><?php echo $post['like_count']; ?></span>
                                        </button>
                                        <button class="btn btn-outline-light me-2"><i class="bi bi-chat"></i></button>
                                        <button class="btn btn-outline-light"><i class="bi bi-send"></i></button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <?php include_once '../View/view_search.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="../js/search.js"></script>
</body>