function detechTheme() {
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.classList.add("dark");
        $("#dark-toogle-icon").removeClass("hidden");
        $("#light-toogle-icon").addClass("hidden");
    } else {
        document.documentElement.classList.remove("dark");
        $("#dark-toogle-icon").addClass("hidden");
        $("#light-toogle-icon").removeClass("hidden");
    }
}

detechTheme();

$("#switchThemeBtn").on("click", function () {
    localStorage.theme === "dark"
        ? (localStorage.theme = "light")
        : (localStorage.theme = "dark");

    detechTheme();
});

$("#mobile-menu-button").on("click", function () {
    if ($("#mobile-menu-wrapper").hasClass("hidden")) {
        $("#mobile-menu-wrapper").removeClass("hidden");
    } else {
        $("#mobile-menu-wrapper").addClass("hidden");
    }
});
