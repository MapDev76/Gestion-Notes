<h2>Mes notes</h2>
<a href="index.php?route=notes.create">+ Ajouter une note</a>
<ul>
    <?php foreach ($notes as $note): ?>
        <li>
            <a href="index.php?route=notes.edit&id=<?= $note['id'] ?>">
                <b><?= htmlspecialchars($note['title']) ?></b>
            </a>
            <div class="rendered" data-md="<?= htmlspecialchars($note['content']) ?>"></div>
            <a href="index.php?route=notes.delete&id=<?= $note['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette note ?')">❌</a>
        </li>
    <?php endforeach; ?>
</ul>
<script>
    document.querySelectorAll('.rendered').forEach(el => {
        const raw = el.dataset.md;
        const html = marked.parse(raw);
        el.innerHTML = DOMPurify.sanitize(html);
    });
</script>
