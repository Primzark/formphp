<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

include_once "../../templates/head.php";
?>

<body data-bs-theme="dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-3 position-sticky vh-100 overflow-auto top-0 border-end">
                <h4 class="text-light">Instagram</h4>
                <ul class="list-unstyled py-4">
                    <li class="py-2">
                        <a class="btn btn-dark w-100 text-start">
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
                        <button class="btn btn-dark w-100 text-start">
                            <i class="bi bi-compass me-2 fs-2"></i> Explore
                        </button>
                    </li>
                    <li class="py-2">
                        <button class="btn btn-dark w-100 text-start">
                            <i class="bi bi-chat me-2 fs-2"></i> Messages
                        </button>
                    </li>
                    <li class="py-2">
                        <button class="btn btn-dark w-100 text-start">
                            <i class="bi bi-heart me-2 fs-2"></i> Notifications
                        </button>
                    </li>
                    <li class="py-2">
                        <button class="btn btn-dark w-100 text-start">
                            <i class="bi bi-plus-square me-2 fs-2"></i> Create
                        </button>
                    </li>
                    <li class="py-2">
                        <a class="btn btn-dark w-100 text-start" href="../../src/Controller/controller_profil.php">
                            <i class="bi bi-person me-2 fs-2"></i> Profile
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-9">
                <div class="mt-3 mx-auto w-50">
                    <?php foreach ($allPosts as $post): ?>
                        <div class="card mb-3 bg-dark text-light">
                            <div class="card-header">
                                <img src="profile1.jpg" class="rounded-circle" width="40">
                                <span><?php echo $post['user_pseudo']; ?></span>
                                <span class="post-date">
                                    <i class="bi bi-dot"></i><?php echo date("d/m/Y - H:i", $post['post_timestamp']); ?>
                                </span>
                            </div>
                            <div class="ratio ratio-1x1">
                                <img src="../../asset/img/<?php echo $post['pic_name']; ?>"
                                    class="card-img-top object-fit-cover" alt="<?php echo $post['post_description']; ?>">
                            </div>
                            <div class="card-body">
                                <p><?php echo $post['post_description']; ?></p>
                                <div>
                                    <i class="btn btn-outline-danger bi bi-heart me-2"></i>
                                    <i class="btn bi bi-chat me-2"></i>
                                    <i class="btn bi bi-send"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="searchOffcanvas"
        aria-labelledby="searchOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="searchOffcanvasLabel">Search</h5>
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
</body>