
<?php

function getNotes() {
    global $pdo;
    return $pdo->query("SELECT * FROM notes ORDER BY created_at DESC")->fetchAll();
}

function addNote($title, $content) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
    $stmt->execute([htmlspecialchars($title), htmlspecialchars($content)]);
}

function deleteNoteById($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$id]);
}


function findNotesBySearch($search, $field = null) {
    global $pdo;
    $query = "SELECT * FROM notes WHERE ";
    $params = [];

    if ($field === 'title') {
        $query .= "title LIKE ? ORDER BY created_at DESC";
        $params = ["%{$search}%"];
    } elseif ($field === 'content') {
        $query .= "content LIKE ? ORDER BY created_at DESC";
        $params = ["%{$search}%"];
    } else {
        $query .= "(title LIKE ? OR content LIKE ?) ORDER BY created_at DESC";
        $params = ["%{$search}%", "%{$search}%"];
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

function getNoteById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM notes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updateNote($id, $title, $content) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([htmlspecialchars($title), htmlspecialchars($content), $id]);
}

