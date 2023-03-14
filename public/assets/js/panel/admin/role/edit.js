$("#select-all-permissions-checkbox").on("click", function () {
    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});
