<?php
include_once "../../templates/head.php";
?>

<body>
    <div class="col-2 p-3 position-fixed vh-100 top-0 border-end">
        <h4 class="text-light">Instagram</h4>
        <ul class="list-unstyled py-4">
            <li class="py-2">
                <a class="btn btn-dark w-100 text-start" href="../../src/Controller/controller_home.php">
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
                <a class="btn btn-dark w-100 text-start" href="../../src/Controller/controller_post.php">
                    <i class="bi bi-plus-square me-2 fs-2"></i> Create
                </a>
            </li>
            <li class="py-2">
                <a class="btn btn-dark w-100 text-start" href="../../src/Controller/controller_profil.php">
                    <i class="bi bi-person me-2 fs-2"></i> Profile
                </a>
            </li>
        </ul>
    </div>
</body>