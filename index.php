<?php

include("model/database.php");
include("model/task_db.php");

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$taskTitle = filter_input(INPUT_POST, "taskTitle", FILTER_SANITIZE_SPECIAL_CHARS);
$taskDesc = filter_input(INPUT_POST, "taskDesc", FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_SPECIAL_CHARS);


if (!$action) 
{
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_SPECIAL_CHARS);
    if (!$action) 
    {
        // page is first opened, no task has been created yet
        // allow user to enter the first task
        $action = 'add_form';
        echo "No task has been created yet.";
    }
}

// POST tasks to database
$taskTitle = filter_input(INPUT_POST, "taskTitle", FILTER_SANITIZE_SPECIAL_CHARS);
if (!$taskTitle) 
{
    // GET tasks from database
    $taskTitle = filter_input(INPUT_GET, "taskTitle", FILTER_SANITIZE_SPECIAL_CHARS);
}


switch ($action) 
{
    case 'view':
        if ($taskTitle) 
        {
            $results = view_task($taskTitle); // retrieve all tasks from database
            include("view/task_form.php"); // display all tasks on the page
        }
        else 
        {
            $error_message = "Invalid data. Check all the fields.";
            include("view/error.php");
        }
        break;

    case 'insert':
        if ($taskTitle && $taskDesc) 
        {
            $count = add_task($taskTitle, $taskDesc);

            // go back to case 'view' to show the updated list
            header("Location: .?action=view&taskTitle={$taskTitle}&created={$count}");
        } 
        else 
        {
            $error_message = "Invalid data";
            include("view/error.php");
        }
        break;

    case 'update':
        if ($id && $taskTitle && $taskDesc) 
        {
            $count = update_task($id, $taskTitle, $taskDesc);
            header("Location: .?action=view&taskTitle={$taskTitle}&updated={$count}");
        } 
        else 
        {
            $error_message = "Invalid data";
            include("view/error.php");
        }
        break;

    case 'delete':
        if ($id) 
        {
            $count = delete_task($id);
            $results = view_task($taskTitle); 
            include("view/task_form.php");
            echo "A task was deleted.";
        }
        break;

    default:
        include("view/add_form.php");
}
