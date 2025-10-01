<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Gestionnaire de notes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dompurify@3.x/dist/purify.min.js"></script>
</head>

<body>
    <header>
        <h1>Gestionnaire de notes</h1>
        <!-- Barre de recherche  -->
        <form method="get" action="index.php" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Rechercher..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <label><input type="radio" name="field" value="title" <?= (isset($_GET['field']) && $_GET['field'] === 'title') ? 'checked' : '' ?>> Titre</label>
            <label><input type="radio" name="field" value="content" <?= (isset($_GET['field']) && $_GET['field'] === 'content') ? 'checked' : '' ?>> Contenu</label>
            <button type="submit">Rechercher</button>
        </form>
        <hr>
    </header>
    <main>