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
