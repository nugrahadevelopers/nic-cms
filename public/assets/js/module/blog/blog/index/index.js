function articleTypeSwitchTabs() {
    return {
        active: 1,
        isActive(tab) {
            return tab == this.active;
        },
        setActive(value) {
            this.active = value;
        },
        getClasses(tab) {
            if (this.isActive(tab)) {
                return "w-6 pt-4 border-b-4 border-orange-600 rounded";
            }
            return "";
        },
    };
}
