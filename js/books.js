const input = document.getElementById("search");
const books = document.querySelectorAll("#books .book");
const container = document.getElementById("books");
const alertNotice = document.getElementById("alertNotice");

input.addEventListener("input", () => {
  const term = input.value.toLowerCase();

  if (
    Array.from(books).some((b) => b.textContent.toLowerCase().includes(term))
  ) {
    container.classList.add("row-cols-4");
    alertNotice.classList.add("d-none");
  } else {
    container.classList.remove("row-cols-4");
    alertNotice.classList.remove("d-none");
  }

  books.forEach((book) => {
    const text = book.textContent.toLowerCase();
    book.style.display = text.includes(term) ? "" : "none";
  });
});
