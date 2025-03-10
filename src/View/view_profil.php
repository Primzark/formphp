<?php
    include_once "../../templates/head_profil.php";
?>

<div class="top-bar">
    <div class="top-bar-left">
        <h2>Instagram</h2>
    </div>
    <div class="top-bar-right">
        <button class="signin-btn">Sign In</button>
        <button class="login-btn">Log out</button>
    </div>
</div>

<div class="container">
    <header class="profile-header">
        <div class="profile-picture">
            <img src="/image/Blackpink insta logo.jpg" alt="Profile Picture" />
        </div>
        <div class="header-content">
            <div class="account-info">
                <h1>
                    <?= $_SESSION["user_pseudo"] ?>
                    <span class="verified-icon">
                        <i class="fas fa-check-circle"></i>
                </h1>
                <button>Follow</button>
                <button>Contact</button>
            </div>
            <div class="account-stats">
                <div><strong>1947</strong> Posts</div>
                <div><strong>57M</strong> Followers</div>
                <div><strong>5</strong> Following</div>
            </div>
            <div class="account-bio">
                <p>Cool guy</p>
            </div>
        </div>
    </header>
</div>
<div class="account-info-sm">
    <button>Follow</button>
    <button>Contact</button>
</div>

<div class="main-section">
    <div class="tab-bar">
        <div class="tab active">
            <i class="fa fa-camera"></i>Post
        </div>
        <div class="tab">
            <i class="fa fa-video"></i> Reels
        </div>
        <div class="tab">
            <i class="fa fa-hashtag"></i> Tag
        </div>
    </div>
    <div class="post-grid">
        <?php foreach ($post as $value) { ?>
            <div class="post-thumbnail">
                <img src="../../asset/img/<?= $value['pic_name'] ?>" alt="Post 1">
                <i class="fa-solid fa-clone carousel-icon"></i>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>