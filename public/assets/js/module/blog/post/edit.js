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

var categoryIdSelect = $("#category-id-select");
$.ajax({
    type: "GET",
    url: $("#category-id-select").attr("data-find-url"),
}).then(function (data) {
    // create the option and append to Select2
    data.map((state, index) => {
        var option = new Option(state.text, state.id, true, true);
        categoryIdSelect.append(option).trigger("change");
    });

    // manually trigger the `select2:select` event
    categoryIdSelect.trigger({
        type: "select2:select",
        params: {
            data: data,
        },
    });
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

var tagIdSelect = $("#tag-id-select");
$.ajax({
    type: "GET",
    url: $("#tag-id-select").attr("data-find-url"),
}).then(function (data) {
    // create the option and append to Select2
    data.map((state, index) => {
        var option = new Option(state.text, state.id, true, true);
        tagIdSelect.append(option).trigger("change");
    });

    // manually trigger the `select2:select` event
    tagIdSelect.trigger({
        type: "select2:select",
        params: {
            data: data,
        },
    });
});

var postContentEditor = editormd("post-content-editor", {
    width: "100%",
    height: "500px",
    toc: true,
    imageUpload: true,
    imageFormats: ["jpg", "jpeg", "png"],
    imageUploadURL: "http://niccms.test/admin/blog/posts/upload-content-img",
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
        previewUrl: $("#featured-img-upload-wrapper").attr("data-url"),
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
var startBirthDay = $("#post-date").attr("data-value")
    ? moment($("#post-date").attr("data-value"))
    : start;

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
            startDate: startBirthDay,
            firstDay: 0,
        },
        opens: "center",
    },
    cbPostDate
);

cbPostDate(startBirthDay);

$("#post-comment-status").on("change", function () {
    if ($(this).is(":checked")) {
        $(this).attr("value", 1);
    } else {
        $(this).attr("value", 0);
    }
});
