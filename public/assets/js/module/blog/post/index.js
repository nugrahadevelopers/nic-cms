$("#blog-post-table").DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    autoWidth: false,
    ajax: {
        url: $("#blog-post-table").attr("data-url"),
    },
    columns: [
        {
            data: "DT_RowIndex",
            searchable: false,
            sortable: false,
        },
        {
            data: "title",
        },
        {
            data: "excerpt",
        },
        {
            data: "created_by",
        },
        {
            data: "categories",
            searchable: false,
            sortable: false,
        },
        {
            data: "tags",
            searchable: false,
            sortable: false,
        },
        {
            data: "post_date",
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
