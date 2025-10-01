<h2>Ajouter une nouvelle note</h2>
<form method="POST" action="index.php?route=notes.store">
    <input type="text" name="title" placeholder="Titre" required>
    <textarea id="content" name="content" placeholder="Contenu"></textarea>
    <button type="submit">Ajouter</button>
</form>
<a href="index.php?route=notes.index">Voir mes notes</a>
<script>
    const mde = new SimpleMDE({
        element: document.getElementById("content"),
        placeholder: "Écris ta note en Markdown…",
        spellChecker: false,
        status: false,
        toolbar: ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "preview", "guide"]
    });
</script>
