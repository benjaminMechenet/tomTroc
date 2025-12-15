const button = document.getElementById("img-button");
const fileInput = document.getElementById("cover_picture");

button.addEventListener("click", (e) => {
  e.preventDefault();
  fileInput.click();
});

const input = document.getElementById("cover_picture");
const preview = document.getElementById("img_preview");

input.addEventListener("change", function () {
  const file = this.files[0];

  if (file && file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
    };

    reader.readAsDataURL(file);
  }
});
