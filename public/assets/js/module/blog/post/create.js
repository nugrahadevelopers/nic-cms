$("#category-id-select").select2({
    placeholder: "Pilih Kategori",
    allowClear: true,
    minimumInputLength: 3,
    ajax: {
        url: $("#category-id-select").attr("data-url"),
        type: "POST",
        dataType: "json",
        data: function (params) {
            return {
                _token: $('meta[name="csrf-token"]').attr("content"),
                search: params.term,
            };
        },
        processResults: function (data) {
            return {
                results: data,
            };
        },
    },
});

$("#tag-id-select").select2({
    placeholder: "Pilih Kategori",
    allowClear: true,
    minimumInputLength: 3,
    ajax: {
        url: $("#tag-id-select").attr("data-url"),
        type: "POST",
        dataType: "json",
        data: function (params) {
            return {
                _token: $('meta[name="csrf-token"]').attr("content"),
                search: params.term,
            };
        },
        processResults: function (data) {
            return {
                results: data,
            };
        },
    },
});

var postContentEditor = editormd("post-content-editor", {
    width: "100%",
    height: "500px",
    placeholder: "Mulai tulis karya mu disini.",
    imageUpload: true,
    imageFormats: ["jpg", "jpeg", "png"],
    imageUploadURL: "",
    path: "/assets/js/vendor/editor-md/lib/",
    toolbarIcons: function () {
        return [
            "undo",
            "redo",
            "|",
            "bold",
            "italic",
            "quote",
            "hr",
            "|",
            "h1",
            "h2",
            "h3",
            "h4",
            "h5",
            "h6",
            "|",
            "list-ul",
            "list-ol",
            "table",
            "|",
            "image",
            "code-block",
            "|",
            "preview",
            "watch",
            "fullscreen",
        ];
    },
});

function imageData() {
    return {
        previewUrl: "",
        updatePreview() {
            var reader,
                files = document.getElementById("featured-img").files;

            reader = new FileReader();

            reader.onload = (e) => {
                this.previewUrl = e.target.result;
            };

            reader.readAsDataURL(files[0]);
        },
        clearPreview() {
            document.getElementById("featured-img").value = null;
            this.previewUrl = "";
        },
    };
}

var start = moment();

function cbPostDate(start) {
    $("#post-date-select span").html(start.format("D MMM YYYY"));
    $("#post-date").val(start.format("YYYY-MM-DD HH:mm:ss"));
}

$("#post-date-select").daterangepicker(
    {
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: "d M Y",
            separator: " - ",
            applyLabel: "Terapkan",
            cancelLabel: "Batal",
            fromLabel: "Dari",
            toLabel: "Ke",
            customRangeLabel: "Custom",
            weekLabel: "W",
            daysOfWeek: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
            monthNames: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Augustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ],
            startDate: start,
            firstDay: 0,
        },
        opens: "center",
    },
    cbPostDate
);

cbPostDate(start);

$("#post-comment-status").prop("checked", true);
$("#post-comment-status").attr("value", 1);
$("#post-comment-status").on("change", function () {
    if ($(this).is(":checked")) {
        $(this).attr("value", 1);
    } else {
        $(this).attr("value", 0);
    }
});

$("#auto-generate-content-btn").on("click", function () {
    if ($("#title").val()) {
        $.ajax({
            url:
                $("#auto-generate-content-btn").attr("data-url") +
                $("#title").val(),
            type: "GET",
            beforeSend: function () {
                $(".ajax-loading").show();
            },
        }).done(function (response) {
            $(".ajax-loading").hide();
            setTimeout(function () {
                postContentEditor.setValue(response);
            }, 2000);
        });
    } else {
        ToastError.fire({
            icon: "error",
            title: "Terjadi Kesalahan!",
            text: "Buat judul terlebih dahulu.",
        });
    }
});
