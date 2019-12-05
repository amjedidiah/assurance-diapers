const formSubmit = (form, baseURL) => {
    let fields = [...form.querySelectorAll(".form-control")],
        action = form.getAttribute("action"),
        method = form.getAttribute("method"),
        formData = {},
        btn = form.querySelector(`[type="submit"]`),
        btnVal = btn.innerHTML,
        spinner = `<i class="fas fa-spinner fa-pulse"></i>`,
        responseDiv = form.querySelector("div.form-response");

    fields.forEach(input => {
        formData[input.getAttribute("id")] = input.value;
    });

    let errorFieldsObject = validateFormData(formData),
        ajaxUrl = `${baseURL}${action}`,
        data = `dummy=`;

    if (!isEmptyObject(errorFieldsObject)) {
        for (let [errorField, errorValue] of Object.entries(
            errorFieldsObject
        )) {
            handleFormFieldError(form, errorField, errorValue);
        }
    } else {
        for (let [field, value] of Object.entries(formData)) {
            data += `&${field}=${value}`;
        }

        //set up ajax call here putting spinner beforeSend and btnVal onComplete
        $.ajax({
            beforeSend: () => (
                (btn.innerHTML = spinner),
                responseDiv.classList.remove("text-success"),
                responseDiv.classList.remove("text-danger")
            ),
            url: ajaxUrl,
            data,
            method,
            success: result => (
                (responseDiv.innerHTML = result),
                responseDiv.classList.add(
                    result.includes("rror") ? "text-danger" : "text-success"
                )
            ),
            error: (xhr, status, error) => (
                (responseDiv.innerHTML = error),
                responseDiv.classList.add("text-danger")
            ),
            complete: xhr => (btn.innerHTML = btnVal)
        });
    }
};

const validateFormData = formData => {
    errorFields = {};
    for (let [key, value] of Object.entries(formData)) {
        key.includes("mail")
            ? validateEmail(value) !== ""
                ? (errorFields[key] = validateEmail(value))
                : ""
            : "";
    }
    return errorFields;
};

const validateEmail = email =>
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) === true
        ? ""
        : "Please provide a valid email address";

const handleFormFieldError = (form, fieldId, title) => {
    //disable all errors
    [...form.querySelectorAll(".form-control")].forEach(field =>
        field.classList.remove("border-danger")
    );

    let field = form.querySelector(`#${fieldId}`);
    field.setAttribute("title", title);
    field.classList.add("border");
    field.classList.add("border-danger");
    $(`#${fieldId}`).tooltip("show");
};

const isEmptyObject = obj => {
    for (let key in obj) {
        if (obj.hasOwnProperty(key)) return false;
    }
    return true;
};
