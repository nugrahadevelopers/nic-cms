let ToastSuccess;
let ToastError;
function detechTheme() {
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.classList.add("dark");
        ToastSuccess = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            iconColor: "#fff",
            background: "#15803d",
            customClass: {
                title: "text-white",
                timerProgressBar: "bg-green-800 dark:bg-green-500",
            },
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
        ToastError = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            iconColor: "#fff",
            color: "#fff",
            background: "#be123c",
            customClass: {
                title: "text-white",
                timerProgressBar: "bg-rose-800 dark:bg-rose-500",
            },
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
    } else {
        document.documentElement.classList.remove("dark");
        ToastSuccess = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            iconColor: "#359458",
            background: "#f2fcf6",
            customClass: {
                title: "text-green-800",
                timerProgressBar: "bg-green-800 dark:bg-green-500",
            },
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
        ToastError = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            iconColor: "#be123c",
            color: "#be123c",
            background: "#ffe6e8",
            customClass: {
                title: "text-rose-800",
                timerProgressBar: "bg-rose-800 dark:bg-rose-500",
            },
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
    }
}

detechTheme();

$("#switchThemeBtn").on("click", function () {
    localStorage.theme === "dark"
        ? (localStorage.theme = "light")
        : (localStorage.theme = "dark");

    detechTheme();
});

$("#trigger-alert-test-btn").on("click", function () {
    // ToastSuccess.fire({
    //     icon: "success",
    //     title: "Signed in successfully",
    // });
    ToastError.fire({
        icon: "error",
        title: "Terjadi Kesalahan!",
        text: "Something went wrong!",
    });
});

if (!document.body.dataset.alert) {
    console.log(document.body.dataset.alert);
} else {
    var type = document.body.dataset.alertType;
    switch (type) {
        case "success":
            ToastSuccess.fire({
                icon: "success",
                title: document.body.dataset.alertMessage,
            });
            break;

        case "error":
            ToastError.fire({
                icon: "error",
                title: "Terjadi Kesalahan!",
                text: document.body.dataset.alertMessage,
            });
            break;
    }
}
