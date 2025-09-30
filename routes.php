<?php
require 'controllers/noteController.php';

$route = $_GET['route'] ?? 'notes.index';

switch ($route) {
    case 'notes.index':
        showNotes();
        break;
    case 'notes.create':
        createNote();
        break;
    case 'notes.store':
        storeNote();
        break;
    case 'notes.delete':
        deleteNote();
        break;
    case 'notes.search':
        $search = $_GET['search'] ?? '';
        $field = $_GET['field'] ?? '';
        $notes = searchNotes($search, $field); // Chiama searchNotes del controller
        include 'views/header.php';
        include 'views/notes.php';
        include 'views/footer.php';
        break;
    default:
        echo "404 - Page not found";
}
