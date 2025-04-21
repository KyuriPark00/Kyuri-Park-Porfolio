// js/contact.js

const form = document.querySelector("#contact-form-con form");

if (form) {
  const submitBtn = form.querySelector("button[type='submit']");

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(form);
    submitBtn.disabled = true;

    fetch("process_contact.php", {
      method: "POST",
      body: formData
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert("Message sent successfully!");
          form.reset();
        } else {
          alert("Error: " + data.error);
        }
      })
      .catch(() => alert("An unexpected error occurred."))
      .finally(() => {
        submitBtn.disabled = false;
      });
  });
}
