$("#roles-table").DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: $("#roles-table").attr("data-url"),
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
            data: "permissions",
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
