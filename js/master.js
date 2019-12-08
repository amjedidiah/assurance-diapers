window.onload = () => {
    const host = window.location.host.includes("localhost")
            ? `localhost/${window.location.pathname.split("/")[1]}`
            : window.location.host,
        isHTTP = host.includes("localhost") ? `http` : `https`,
        baseURL = `${isHTTP}://${host}/actions/`;

    

    setCarouselParams(Date.now()); // Carousel.js
    blogConfig(); // Blog.js
    setActiveLink(); //Header.js

    // Form Submisssion
    [...document.querySelectorAll("form")].forEach(form =>
        form.addEventListener("submit", e => {
            e.preventDefault();
            [...form.classList].includes("form-disabled")
                ? ""
                : formSubmit(form, baseURL);
        })
    );
};

window.onscroll = () => headerConfig(); //Header.js
