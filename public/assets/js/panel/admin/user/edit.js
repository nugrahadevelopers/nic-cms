var rolesSelect = $("#roles-select");
$.ajax({
    type: "GET",
    url: $("#roles-select").attr("data-find-url"),
}).then(function (data) {
    data.map((value, index) => {
        // create the option and append to Select2
        var option = new Option(value.text, value.id, true, true);
        rolesSelect.append(option).trigger("change");
    });

    // manually trigger the `select2:select` event
    rolesSelect.trigger({
        type: "select2:select",
        params: {
            data: data,
        },
    });
});

$("#roles-select").select2({
    placeholder: "Pilih Role",
    allowClear: true,
    minimumInputLength: 3,
    ajax: {
        url: $("#roles-select").attr("data-url"),
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
