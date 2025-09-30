
<?php
require 'models/db.php';
require 'models/noteModel.php';

function showNotes()
{
    $notes = getNotes(); // Chiama la funzione getNotes() da noteModel.php
    include 'views/header.php';
    include 'views/notes.php';
    include 'views/footer.php';
}

function createNote()
{
    include 'views/header.php';
    include 'views/form.php';
    include 'views/footer.php';
}

function storeNote()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        addNote($_POST['title'], $_POST['content']);
    }
    header("Location: index.php?route=notes.index");
}

function deleteNote()
{
    if (isset($_GET['id'])) {
        deleteNoteById($_GET['id']);
    }
    header("Location: index.php?route=notes.index");
}

function searchNotes($search, $field)
{
    global $pdo;
    return findNotesBySearch($pdo, $search, $field); // Usa la funzione del model
}
