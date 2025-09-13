$(document).ready(function () {
    loadReviews();

    $('#reviewForm').submit(function (e) {
        e.preventDefault();
        console.log("submit success");

        var formData = {
            username: $('#username').val(),
            rating: $('#rating').val(),
            review_text: $('#review_text').val()
        };

        $.ajax({
            url: 'submit_review.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    var newReview = `
                        <div class="review">
                            <strong>${response.username}</strong> (${response.rating}/5)
                            <p>${response.review_text}</p>
                        </div>
                    `;
                    $('#reviews').prepend(newReview);
                    $('#reviewForm')[0].reset();
                } else {
                    alert('Failed to submit review. Please try again.');
                }
            }
        });
    });
});

function loadReviews() {
    $.ajax({
        url: 'load_reviews.php',
        type: 'GET',
        success: function (data) {
            $('#reviews').html(data);
        }
    });
}
