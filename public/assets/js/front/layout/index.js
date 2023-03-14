function detechTheme() {
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
}

detechTheme();

$("#switchThemeBtn").on("click", function () {
    localStorage.theme === "dark"
        ? (localStorage.theme = "light")
        : (localStorage.theme = "dark");

    detechTheme();
});
