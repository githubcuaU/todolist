<?php

function view_task($taskTitle)
{
    global $db;
    $query = 'SELECT * FROM todoitems';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function add_task($taskTitle, $taskDesc)
{
    global $db;
    $count = 0;
    $query = 
    'INSERT INTO todoitems (Title, Description)
    VALUES (:taskTitle, :taskDesc)';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskTitle', $taskTitle);
    $statement->bindValue(':taskDesc', $taskDesc);

    if ($statement->execute()) 
    {
        $count = $statement->rowCount();
    }

    $statement->closeCursor();
    return $count;
}

function update_task($id, $taskTitle, $taskDesc)
{
    global $db;
    $count = 0;
    $query = 
    'UPDATE todoitems
    SET Title = :taskTitle, Description = :taskDesc
    WHERE ItemNum = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->bindValue(":taskTitle", $taskTitle);
    $statement->bindValue(":taskDesc", $taskDesc);
    
    if ($statement->execute()) 
    {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}

function delete_task($id)
{
    global $db;
    $count = 0;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    if ($statement->execute()) 
    {
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}
