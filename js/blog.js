const toggleToggler = toggler => toggler.classList.toggle("hidden");

const toggleBody = body => body.classList.toggle("visible");

const blogConfig = () => {
  let blogTogglers = [...document.querySelectorAll(".blog-toggle")];

  blogTogglers.forEach(a => {
    a.onclick = e => {
      toggleToggler(blogTogglers[0]);
      toggleBody(document.querySelector(".blog-body"));
    };
  });
};
