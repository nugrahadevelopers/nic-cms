$("#parent-id-select").select2({
    placeholder: "Pilih Parent",
    allowClear: true,
    minimumInputLength: 3,
    ajax: {
        url: $("#parent-id-select").attr("data-url"),
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
