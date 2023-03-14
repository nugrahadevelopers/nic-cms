function imageData() {
    return {
        previewUrl: $("#avatar-upload-wrapper").attr("data-url"),
        updatePreview() {
            var reader,
                files = document.getElementById("avatar").files;

            reader = new FileReader();

            reader.onload = (e) => {
                this.previewUrl = e.target.result;
            };

            reader.readAsDataURL(files[0]);
        },
        clearPreview() {
            document.getElementById("avatar").value = null;
            this.previewUrl = "";
        },
    };
}
