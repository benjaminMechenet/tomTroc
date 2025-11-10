const fileInput = document.getElementById("profile_picture");
const form = document.getElementById("profileForm");

fileInput.addEventListener("change", () => {
  if (fileInput.files.length > 0) {
    form.submit();
  }
});

const button = form.querySelector('button[type="submit"]');
button.addEventListener("click", (e) => {
  e.preventDefault();
  fileInput.click();
});

document.querySelectorAll(".label").forEach((label) => {
  label.addEventListener("click", () => {
    const id = parseInt(label.dataset.id);
    let newState;

    if (label.classList.contains("label-available")) {
      label.classList.remove("label-available");
      label.classList.add("label-not-available");
      label.textContent = "non dispo.";
      newState = 0;
    } else {
      label.classList.remove("label-not-available");
      label.classList.add("label-available");
      label.textContent = "disponible";
      newState = 1;
    }

    fetch("index.php?action=updateLabel", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id: id, available: newState }),
    })
      .then((response) => response.json())
      .catch((err) => console.error(err));
  });
});
