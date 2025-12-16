if (document.getElementById("messageForm")) {
  const discussionContainer = document.getElementById("discussion-holder");
  discussionContainer.scrollTop = discussionContainer.scrollHeight;

  document
    .getElementById("messageForm")
    .addEventListener("submit", async function (e) {
      e.preventDefault();

      const params = new URLSearchParams(window.location.search);
      const id = params.get("id");

      const form = e.target;
      const formData = new FormData(form);
      const messageContent = formData.get("content");

      const container = document.getElementById("messagesContainer");

      formData.append("id", id);

      const response = await fetch("index.php?action=sendMessage", {
        method: "POST",
        body: formData,
      });

      if (container && messageContent.trim() !== "") {
        const div = document.createElement("div");

        div.classList.add(
          "sended",
          "col-11",
          "col-lg-9",
          "align-self-end",
          "my-2"
        );
        const now = new Date();
        const formattedDate =
          String(now.getDate()).padStart(2, "0") +
          "." +
          String(now.getMonth() + 1).padStart(2, "0") +
          " " +
          String(now.getHours()).padStart(2, "0") +
          ":" +
          String(now.getMinutes()).padStart(2, "0");

        div.innerHTML = `<div class="text-sm text-grey me-2 mb-2 text-end">
                          ${formattedDate}
                        </div>
                        <p class="p-3 d-block bg-light-blue rounded">
                          ${messageContent}
                        </p>`;

        container.appendChild(div);
        discussionContainer.scrollTop = discussionContainer.scrollHeight;
      }

      const discussion = document.getElementById(id);
      if (!discussion) {
        window.location.reload();
      }

      form.reset();
    });
}

const rows = document.querySelectorAll("tr[data-href]");

if (rows) {
  rows.forEach((row) => {
    row.addEventListener("click", () => {
      window.location.href = row.getAttribute("data-href");
    });
  });
}
