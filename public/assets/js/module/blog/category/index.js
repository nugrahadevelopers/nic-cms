$("#blog-category-table").DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: $("#blog-category-table").attr("data-url"),
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
            data: "slug",
        },
        {
            data: "description",
            searchable: false,
            sortable: false,
        },
        {
            data: "parent",
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
