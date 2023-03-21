function newPopupWindow(url) {
    popupWindow = window.open(
        url,
        "popUpWindow",
        "height=400,width=500,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes"
    );
}

$("#like-post-btn").on("click", function () {
    var token = $('meta[name="csrf-token"]').attr("content");
    var liked =
        $("#like-post-btn").attr("data-status") == "liked" ? true : false;

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": token,
        },
    });

    $.ajax({
        url: liked
            ? $("#like-post-btn").attr("data-url-unlike")
            : $("#like-post-btn").attr("data-url-like"),
        type: liked ? "DELETE" : "POST",
        beforeSend: function (xhr) {
            xhr.setRequestHeader("X-CSRF-TOKEN", token);
            $("#post-likes-icon").addClass("animate-spin");
            $("#like-post-btn").attr("disabled", "disabled");
        },
    }).done(function (response) {
        $("#post-likes-icon").removeClass("animate-spin");
        $("#like-post-btn").removeAttr("disabled");

        if (liked) {
            $("#like-post-btn").attr("data-status", "");
        } else {
            $("#like-post-btn").attr("data-status", "liked");
        }

        if (response.success == true) {
            $("#post-likes-count").text(response.data.likes);

            if (liked) {
                $("#post-likes-icon").removeClass("text-rose-600");
            } else {
                $("#post-likes-icon").addClass("text-rose-600");
            }
        }
    });
});
