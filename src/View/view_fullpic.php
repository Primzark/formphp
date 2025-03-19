<?php include_once '../../templates/head.php'; ?>

<body data-bs-theme="dark">
    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-2 p-3 position-sticky vh-100 overflow-auto top-0 border-end">
                <h4 class="text-light">Instagram</h4>
                <ul class="list-unstyled py-4">
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_home.php"><i
                                class="bi bi-house-door me-2 fs-2"></i> Home</a></li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start" data-bs-toggle="offcanvas"
                            data-bs-target="#searchOffcanvas"><i class="bi bi-search me-2 fs-2"></i> Search</button>
                    </li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start"><i
                                class="bi bi-compass me-2 fs-2"></i> Explore</button></li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start"><i class="bi bi-chat me-2 fs-2"></i>
                            Messages</button></li>
                    <li class="py-2"><button class="btn btn-dark w-100 text-start"><i class="bi bi-heart me-2 fs-2"></i>
                            Notifications</button></li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_post.php"><i
                                class="bi bi-plus-square me-2 fs-2"></i> Create</a></li>
                    <li class="py-2"><a class="btn btn-dark w-100 text-start" href="controller_profil.php"><i
                                class="bi bi-person me-2 fs-2"></i> Profile</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-9">
                <div class="mt-3 mx-auto w-75">
                    <div class="card bg-dark text-light" id="post-<?php echo $post['post_id']; ?>">
                        <img src="../../asset/img/<?php echo htmlspecialchars($post['pic_name'] ?? 'default.jpg'); ?>"
                            class="card-img-top" alt="<?php echo htmlspecialchars($post['post_description']); ?>">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo htmlspecialchars($post['post_description']); ?></h3>
                            <p class="text-muted">Par <?php echo htmlspecialchars($post['user_pseudo']); ?></p>
                            <p><?php echo date("d/m/Y - H:i", $post['post_timestamp']); ?></p>
                            <p><?php echo $post['post_private'] ? 'Privé' : 'Public'; ?></p>
                            <div class="mb-3">
                                <button
                                    class="btn <?php echo $post['user_liked'] ? 'btn-danger' : 'btn-outline-danger'; ?> me-2 like-btn"
                                    data-post-id="<?php echo $post['post_id']; ?>">
                                    <i class="bi bi-heart<?php echo $post['user_liked'] ? '-fill' : ''; ?>"></i>
                                    <span class="like-count"><?php echo $post['like_count']; ?></span> J’aime
                                </button>
                            </div>
                            <h5>Commentaires</h5>
                            <?php if (empty($comments)): ?>
                                <p>Aucun commentaire pour l'instant.</p>
                            <?php else: ?>
                                <?php foreach ($comments as $comment): ?>
                                    <div class="mb-2 d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong><?php echo htmlspecialchars($comment['user_pseudo']); ?></strong>
                                            <span
                                                class="text-muted"><?php echo date("d/m/Y - H:i", $comment['com_timestamp']); ?></span>
                                            <p><?php echo htmlspecialchars($comment['com_text']); ?></p>
                                        </div>
                                        <?php if ($comment['user_id'] == $_SESSION['user_id']): ?>
                                            <a href="controller_delete_comment.php?com_id=<?php echo $comment['com_id']; ?>&post_id=<?php echo $post['post_id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this comment?');">
                                                Supprimer
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <a href="controller_comment.php?post_id=<?php echo $post['post_id']; ?>"
                                class="btn btn-primary mt-2">Ajouter un commentaire</a>
                        </div>
                        <div class="card-footer">
                            <a href="controller_home.php" class="btn btn-secondary">Retour à l'accueil</a>
                            <?php if ($post['user_id'] == $_SESSION['user_id']): ?>
                                <a href="controller_delete.php?post_id=<?php echo $post['post_id']; ?>"
                                    class="btn btn-danger ms-2"
                                    onclick="return confirm('Are you sure you want to delete this post?');">
                                    Supprimer
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Offcanvas -->
    <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="searchOffcanvas"
        aria-labelledby="searchOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-light" id="searchOffcanvasLabel">Search</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Search users, hashtags..." aria-label="Search">
                </div>
                <button type="button" class="btn btn-outline-danger w-100">Search</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>