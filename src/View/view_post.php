<?php
// Start session to check login
if (!isset($_SESSION['user_id'])) {
  header('Location: ../../public/');
  exit;
}

include_once("../../templates/head.php");
?>

<body data-bs-theme="dark">
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-2 p-3 position-sticky vh-100 overflow-auto top-0 border-end">
        <h4 class="text-light">Instagram</h4>
        <ul class="list-unstyled py-4">
          <li class="py-2">
            <a href="../Controller/controller_home.php"
              class="btn btn-dark w-100 text-start text-decoration-none shadow-none">
              <i class="bi bi-house-door me-2 fs-2"></i> Home
            </a>

          </li>
          <li class="py-2">
            <button class="btn btn-dark w-100 text-start" data-bs-toggle="offcanvas" data-bs-target="#searchOffcanvas">
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
            <a class="btn btn-dark w-100 text-start">
              <i class="bi bi-plus-square me-3 fs-2"></i> Create
            </a>
          </li>
          <li class="py-2">
            <a href="../Controller/controller_profil.php"
              class="btn btn-dark w-100 text-start text-decoration-none shadow-none">
              <i class="bi bi-person me-2 fs-2"></i> Profile
            </a>
          </li>
        </ul>
      </div>

     
      <div class="col-9">
        <div class="mt-3 mx-auto w-50">
          <div class="bg-dark text-light p-4 shadow rounded">
            <h1 class="text-center mb-4">Ready to show the world ?</h1>
            <form action="../Controller/controller_post.php" method="POST" enctype="multipart/form-data" novalidate>
              <div class="row g-2 justify-content-center">
                <div class="col-12">
                  <label for="photo" class="form-label">Photo</label>
                  <input type="file"
                    class="form-control form-control-sm bg-dark text-light border-secondary <?php echo isset($errors['photo']) ? 'is-invalid' : ''; ?>"
                    id="photo" name="photo" required>
                  <div class="invalid-feedback">Please select a photo</div>
                </div>
                <div class="col-12">
                  <label for="description" class="form-label">Comment</label>
                  <textarea
                    class="form-control bg-dark text-light border-secondary <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>"
                    rows="6" id="description" name="description" placeholder="instagoat" required></textarea>
                  <div class="invalid-feedback">Please enter a comment</div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary mt-3 w-100">Post</button>
                </div>
                <div class="col-12">
                  <a href="../Controller/controller_home.php" class="btn btn-outline-secondary w-100">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="offcanvas offcanvas-start bg-dark text-light" tabindex="-1" id="searchOffcanvas"
    aria-labelledby="searchOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="searchOffcanvasLabel">Search</h5>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <form>
        <div class="mb-3">
          <input type="text" class="form-control bg-dark text-light border-secondary"
            placeholder="Search users, hashtags..." aria-label="Search">
        </div>
        <button type="button" class="btn btn-outline-danger w-100">Search</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>