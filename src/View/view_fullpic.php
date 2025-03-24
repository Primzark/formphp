<?php include_once '../../templates/head.php'; ?>

<body data-bs-theme="dark">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left Sidebar -->
            <div class="col-xl-2 col-md-3 col-12 p-3 position-sticky vh-100 overflow-auto border-end d-md-block d-none">
                <h4 class="text-primary">Instagram</h4>
                <ul class="list-unstyled py-4">
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_home.php"><i
                                class="bi bi-house-door me-2 fs-2"></i> Home</a></li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start" data-bs-toggle="offcanvas"
                            data-bs-target="#searchOffcanvas"><i class="bi bi-search me-2 fs-2"></i> Search</button>
                    </li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_post.php"><i
                                class="bi bi-plus-square me-2 fs-2"></i> Create</a></li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_profil.php"><i
                                class="bi bi-person me-2 fs-2"></i> Profile</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-xl-10 col-md-9 col-12">
                <div class="row g-0">
                    <!-- Post insta-->
                    <div class="col-xl-7 col-12 p-3">
                        <div class="card bg-dark text-light mx-auto">
                            <img src="../../asset/img/<?php echo htmlspecialchars($post['pic_name'] ?? 'default.jpg'); ?>"
                                class="card-img-top" alt="<?php echo htmlspecialchars($post['post_description']); ?>">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo htmlspecialchars($post['post_description']); ?></h3>
                                <p>Par <?php echo htmlspecialchars($post['user_pseudo']); ?></p>
                                <p><?php echo date("d/m/Y - H:i", $post['post_timestamp']); ?></p>
                                <p><?php echo $post['post_private'] ? 'Privé' : 'Public'; ?></p>
                                <div class="mb-3">
                                    <button
                                        class="btn <?php echo $post['user_liked'] ? 'btn-danger' : 'btn-outline-danger'; ?> me-2 like-btn"
                                        data-post-id="<?php echo $post['post_id']; ?>">
                                        <i class="bi bi-heart<?php echo $post['user_liked'] ? '-fill' : ''; ?>"></i>
                                        <span class="like-count"><?php echo $post['like_count']; ?></span> Likes
                                    </button>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="controller_home.php" class="btn btn-secondary">Back home</a>
                                <?php if ($post['user_id'] == $_SESSION['user_id']): ?>
                                    <a href="controller_delete.php?post_id=<?php echo $post['post_id']; ?>"
                                        class="btn btn-danger ms-2"
                                        onclick="return confirm('Are you sure you want to delete this post?');">
                                        Delete
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section (Side-by-side only on xl) -->
                    <div class="col-xl-5 col-12 p-3 border-start d-md-block d-none">
                        <div class="sticky-top">
                            <h5 class="text-light mb-3">Comments</h5>
                            <div class="overflow-auto">
                                <?php if (empty($comments)): ?>
                                    <p class="text-light">No comment yet.</p>
                                <?php else: ?>
                                    <?php foreach ($comments as $comment): ?>
                                        <div class="mb-3 bg-dark p-3 rounded">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <strong
                                                        class="text-light"><?php echo htmlspecialchars($comment['user_pseudo']); ?></strong>
                                                    <span
                                                        class="text-muted d-block"><?php echo date("d/m/Y - H:i", $comment['com_timestamp']); ?></span>
                                                    <p class="text-light mt-1">
                                                        <?php echo htmlspecialchars($comment['com_text']); ?>
                                                    </p>
                                                </div>
                                                <?php if ($comment['user_id'] == $_SESSION['user_id']): ?>
                                                    <a href="controller_delete_comment.php?com_id=<?php echo $comment['com_id']; ?>&post_id=<?php echo $post['post_id']; ?>"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this comment?');">
                                                        Delete
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <a href="controller_comment.php?post_id=<?php echo $post['post_id']; ?>"
                                class="btn btn-primary w-100 mt-2">Add comment</a>
                        </div>
                    </div>

                    <!-- Mobile Comments (shown only on small screens) -->
                    <div class="col-12 p-3 d-md-none">
                        <h5 class="text-light mb-3">Comments</h5>
                        <?php if (empty($comments)): ?>
                            <p class="text-light">No comment yet.</p>
                        <?php else: ?>
                            <?php foreach ($comments as $comment): ?>
                                <div class="mb-3 bg-dark p-3 rounded">
                                    <strong class="text-light"><?php echo htmlspecialchars($comment['user_pseudo']); ?></strong>
                                    <span
                                        class="text-muted d-block"><?php echo date("d/m/Y - H:i", $comment['com_timestamp']); ?></span>
                                    <p class="text-light mt-1"><?php echo htmlspecialchars($comment['com_text']); ?></p>
                                    <?php if ($comment['user_id'] == $_SESSION['user_id']): ?>
                                        <a href="controller_delete_comment.php?com_id=<?php echo $comment['com_id']; ?>&post_id=<?php echo $post['post_id']; ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this comment?');">
                                            Delete
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <a href="controller_comment.php?post_id=<?php echo $post['post_id']; ?>"
                            class="btn btn-primary w-100 mt-2">Add a comment</a>
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
    <script src="../js/script.js"></script>
</body>