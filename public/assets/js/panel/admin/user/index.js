$("#users-table").DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: $("#users-table").attr("data-url"),
    },
    columns: [
        {
            data: "DT_RowIndex",
            searchable: false,
            sortable: false,
        },
        {
            data: "name",
        },
        {
            data: "email",
        },
        {
            data: "roles",
            searchable: false,
            sortable: false,
        },
        {
            data: "action",
            searchable: false,
            sortable: false,
        },
    ],
});
