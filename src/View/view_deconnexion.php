<?php
include_once("../../templates/head.php");
?>




<body data-bs-theme="dark">
    <div class="container-fluid">
        <div class="row">

            <div class="col-2 p-3 position-sticky vh-100 overflow-auto top-0 border-end">
                <h4 class="text-light">Instagram</h4>
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

            <div class="col-9">
                <div class="mt-5 mx-auto w-75">
                    <div class="card bg-dark text-light">
                        <div class="card-header">
                            <div class="p-4 text-center">
                                <h1 class="display-6"> Log out ?</h1>
                                <p class="display-6">Your session will end</p>
                                <a href="../Controller/controller_logout.php" class="btn btn-danger btn-lg">log-out
                                </a>
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
                            <input type="text" class="form-control bg-dark text-light border-secondary"
                                name="search_term" placeholder="Search users..." aria-label="Search">
                        </div>
                        <button type="submit" class="btn btn-outline-danger w-100">Search</button>
                    </form>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous">
                </script>
        </div>
    </div>
</body>