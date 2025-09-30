<form method="get" action="index.php">
    <input type="text" name="search" placeholder="Rechercher...">
    <label for="field">Titre</label>
    <input type="radio" name="field" value="title" />
    <label for="field">Contenu</label>
    <input type="radio" name="field" value="content" />
    <button type="submit">Rechercher</button>
</form>

<ul>
    <?php foreach ($notes as $note): ?>
    <li>
        <strong><?= htmlspecialchars($note['title']) ?></strong>
        <p>
	<div id="rendered"></div>
	<script>
	    // `contentFromDB` = variable PHP échappée en JSON
	    var raw = <?= json_encode($note['content'] ?? "") ?>;
	    var html = marked.parse(raw);
	    document.getElementById('rendered').innerHTML = DOMPurify.sanitize(html);
	</script>
</p>
        <small><?= $note['created_at'] ?></small>
        <a href="index.php?delete=<?= $note['id'] ?>">❌ Supprimer</a>
    </li>
    <?php endforeach; ?>
</ul>

<script>
document.querySelectorAll('.rendered').forEach(el => {
    const raw = el.dataset.md; // récupère le contenu Markdown
    const html = marked.parse(raw); // convertit en HTML
    el.innerHTML = DOMPurify.sanitize(html); // sécurise le HTML
});
</script>