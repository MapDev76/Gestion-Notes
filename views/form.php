<form method="POST" action="index.php">
  <input type="text" name="title" placeholder="Titre" required>
  <textarea id="content" name="content" required></textarea>
  <button type="submit">Ajouter</button>
</form>
<script>
  const mde = new SimpleMDE({
    element: document.getElementById("content"),
    placeholder: "Écris ta note en Markdown…",
    spellChecker: false, // plus discret pour débuter
    status: false, // cache la barre de statut
    autosave: {
      enabled: true,
      uniqueId: "notes-app-content",
      delay: 1000
    },
    toolbar: ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "preview", "guide"]
  });
</script>