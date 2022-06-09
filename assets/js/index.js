const triggerTabList = document.querySelectorAll(".nav-item");
triggerTabList.forEach((triggerEl) => {
    const tabTrigger = new bootstrap.Tab(triggerEl);

    triggerEl.addEventListener("click", (event) => {
        event.preventDefault();
        tabTrigger.show();
    });
});
