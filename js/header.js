const headerConfig = () => {
    let header = document.querySelector("#header"),
        elementOffset = $("#header").offset().top,
        detOffset = $("#headerDet").offset().top;

    elementOffset >= detOffset
        ? header.classList.add("white-header", "shadow-sm")
        : header.classList.remove("white-header", "shadow-sm");
};

const setActiveLink = () => {
    $("#header .nav-item").removeClass("active");

    let { pathname } = window.location;

    if (pathname.includes("about"))
        $("#header .nav-item#aboutNav").addClass("active");
    else if (pathname.includes("products"))
        $("#header .nav-item#productsNav").addClass("active");
    else if (pathname.includes("contact"))
        $("#header .nav-item#contactNav").addClass("active");
    else document.querySelector("#header .nav-item").classList.add("active");
};
