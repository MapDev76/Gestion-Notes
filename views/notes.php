<!-- notes.php -->
<form method="get" action="index.php?route=notes.search">
    <input type="text" name="search" placeholder="Rechercher..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <label for="field">Titre</label>
    <input type="radio" name="field" value="title" <?= isset($_GET['field']) && $_GET['field'] === 'title' ? 'checked' : '' ?> />
    <label for="field">Contenu</label>
    <input type="radio" name="field" value="content" <?= isset($_GET['field']) && $_GET['field'] === 'content' ? 'checked' : '' ?> />
    <button type="submit">Rechercher</button>
</form>

<h2>Mes notes</h2>
<a href="index.php?route=notes.create">+ Ajouter une note</a>
<ul>
    <?php foreach ($notes as $note): ?>
        <li>
            <b><?= htmlspecialchars($note['title']) ?></b> - <span class="rendered" data-md="<?= htmlspecialchars($note['content']) ?>"></span>
            <a href="index.php?route=notes.delete&id=<?= $note['id'] ?>">❌</a>
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
</body>