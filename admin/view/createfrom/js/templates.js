// Function to handle form submission with validation
async function handleFormSubmit(formId) {
    const form = document.getElementById(formId);
    if (!form) return;

    // Get all input fields in the form
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    console.log(data)

    // Validate the form fields
    if (!validateForm(data, formId)) {
        return;
    }

    // Show loading state using SweetAlert
    Swal.fire({
        title: 'Submitting...',
        text: 'Please wait while we submit your form.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // If validation passes, proceed with submission
    try {
        // Simulate API call (replace this with actual API integration)
        const response = await fetch(baseurl+'/templates/create', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });

        response.json().then(data => {
            if (data.status) {
                // Show success message using SweetAlert
                Swal.fire({
                    title: 'Success!',
                    text: 'Form submitted successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                }).then(() => {
                    form.reset(); // Reset the form after successful submission
                });
            } else {
                // Show error message using SweetAlert
                Swal.fire({
                    title: 'Error!',
                    text: data.message || 'Failed to submit form. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                });
            }
        });
    } catch (error) {
        console.error('Error submitting form:', error);
        // Show error message using SweetAlert
        Swal.fire({
            title: 'Error!',
            text: 'An error occurred while submitting the form.',
            icon: 'error',
            confirmButtonText: 'OK',
        });
    }
}

// Validation function for each form
function validateForm(data, formId) {
    let isValid = true;

    switch (formId) {
        case 'basic_text_template':
            if (!data.elementname || !data.content) {
                Swal.fire({
                    title: 'Validation Error!',
                    text: 'Basic Text Template: All fields are required.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
                isValid = false;
            }
            break;

        case 'authentication_template':
            if (!data.elementname || !data.codeExpirationMinutes || !data.content) {
                Swal.fire({
                    title: 'Validation Error!',
                    text: 'Authentication Template: All fields are required.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
                isValid = false;
            } else if (isNaN(data.codeExpirationMinutes) || data.codeExpirationMinutes <= 0) {
                Swal.fire({
                    title: 'Validation Error!',
                    text: 'Authentication Template: Code expiration must be a positive number.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
                isValid = false;
            }
            break;

        case 'utility_template':
            if (!data.elementname || !data.languagecode || !data.content) {
                Swal.fire({
                    title: 'Validation Error!',
                    text: 'Utility Template: All fields are required.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
                isValid = false;
            }
            break;

        case 'marketing_template_with_image':
            if (!data.elementname || !data.content) {
                Swal.fire({
                    title: 'Validation Error!',
                    text: 'Marketing Template with Image: All fields are required.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
                isValid = false;
            }
            break;

        case 'catalog_template':
            if (!data.elementname || !data.content) {
                Swal.fire({
                    title: 'Validation Error!',
                    text: 'Catalog Template: All fields are required.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                });
                isValid = false;
            }
            break;

        default:
            Swal.fire({
                title: 'Error!',
                text: 'Unknown form type.',
                icon: 'error',
                confirmButtonText: 'OK',
            });
            isValid = false;
    }

    return isValid;
}

// Attach event listeners to all forms
async function templatesActive() {
    const formIds = [
        'basic_text_template',
        'authentication_template',
        'utility_template',
        'marketing_template_with_image',
        'catalog_template',
    ];

    formIds.forEach((formId) => {
        const form = document.getElementById(formId);
        if (form) {
            form.addEventListener('submit', (event) => {
                event.preventDefault(); // Prevent default form submission
                handleFormSubmit(formId); // Handle form submission with validation
            });
        }
    });
}