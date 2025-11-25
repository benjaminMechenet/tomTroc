const fileInput = document.getElementById("cover_picture");
const form = document.getElementById("coverForm");
const button = form.querySelector('button[type="submit"]');

fileInput.addEventListener("change", () => {x
    if (fileInput.files.length > 0) {
        form.submit();
    }
});


button.addEventListener("click", (e) => {
  e.preventDefault();
  fileInput.click();
});