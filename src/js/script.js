// Wait for the page to load
document.addEventListener('DOMContentLoaded', function() {
    // Find all like buttons
    document.querySelectorAll('.like-btn').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            const heartIcon = this.querySelector('i');
            const likeCountSpan = this.querySelector('.like-count');
            let likeCount = parseInt(likeCountSpan.textContent);

            // Send the like/unlike request to controller_like.php
            fetch(`controller_like.php?post_id=${postId}`)
                .then(response => response.text())
                .then(result => {
                    if (result === 'liked') {
                        button.classList.remove('btn-outline-danger');
                        button.classList.add('btn-danger');
                        heartIcon.classList.remove('bi-heart');
                        heartIcon.classList.add('bi-heart-fill');
                        likeCountSpan.textContent = likeCount + 1;
                    } else if (result === 'unliked') {
                        button.classList.remove('btn-danger');
                        button.classList.add('btn-outline-danger');
                        heartIcon.classList.remove('bi-heart-fill');
                        heartIcon.classList.add('bi-heart');
                        likeCountSpan.textContent = likeCount - 1;
                    } else {
                        alert('Something went wrong!');
                    }
                })
                .catch(error => {
                    alert('Error liking post!');
                });
        });
    });
});