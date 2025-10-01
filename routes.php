<?php
require 'controllers/noteController.php';
$route = $_GET['route'] ?? 'notes.index';
switch ($route) {

    case 'notes.index':
        $notes = getNotes();
        include 'views/header.php';
        include 'views/notes_list.php';
        include 'views/footer.php';
        break;
    case 'notes.create':
        include 'views/header.php';
        include 'views/form.php';
        include 'views/footer.php';
        break;
    case 'notes.store':
        storeNote();
        header("Location: index.php?route=notes.index");
        break;
    case 'notes.edit':
        $note = getNoteById($_GET['id']);
        include 'views/header.php';
        include 'views/edit_form.php';
        include 'views/footer.php';
        break;
    case 'notes.update':
        updateNote($_POST['id'], $_POST['title'], $_POST['content']);
        header("Location: index.php?route=notes.index");
        break;
    case 'notes.delete':
        deleteNoteById($_GET['id']);
        header("Location: index.php?route=notes.index");
        break;
    case 'notes.search':
        $search = $_GET['search'] ?? '';
        $field = $_GET['field'] ?? '';
        $notes = findNotesBySearch($search, $field);
        include 'views/header.php';
        include 'views/notes_list.php';
        include 'views/footer.php';
        break;
    default:
        echo "404 - Page not found";
}
