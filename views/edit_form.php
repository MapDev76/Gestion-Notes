<h2>Modifier la note</h2>
<form method="POST" action="index.php?route=notes.update">
    <input type="hidden" name="id" value="<?= $note['id'] ?>">
    <input type="text" name="title" placeholder="Titre" value="<?= htmlspecialchars($note['title']) ?>" required>
    <textarea id="content" name="content" placeholder="Contenu"><?= htmlspecialchars($note['content']) ?></textarea>
    <button type="submit">Mettre à jour</button>
    <a href="index.php?route=notes.index">Retour à la liste</a>
</form>
<script>
    const mde = new SimpleMDE({
        element: document.getElementById("content"),
        placeholder: "Écris ta note en Markdown…",
        spellChecker: false,
        status: false,
        toolbar: ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "preview", "guide"]
    });
</script>
