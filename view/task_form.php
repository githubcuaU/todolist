<?php include("header.php") ?>


<section>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="action" value="insert">
        <label class="add-label" for="newTaskTitle">Task Title:</label>
        <input class="add-form" type="text" id="newTaskTitle" name="taskTitle" required>
        <label class="add-label" for="taskDesc">Task Description:</label>
        <input class="add-form" type="text" id="taskDesc" name="taskDesc" required>
        <button class="add-btn">Add</button>
    </form>
</section>


<?php if (($results)) 
{ ?>
    <?php
    foreach ($results as $result) 
    {
        $id = $result["ItemNum"];
        $taskTitle = $result["Title"];
        $taskDesc = $result["Description"];
    ?>

    <form action="." method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input class="task-form-title" type="text" name="taskTitle" value="<?php echo $taskTitle ?>">
        <input class="task-form-desc" type="text" name="taskDesc" value="<?php echo $taskDesc ?>">
        <button class="update-btn">Update</button>
    </form>
    
    <form action="." method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button class="delete-btn">Delete</button>
    </form>

    <?php } ?>
<?php } 

else 
{ ?>
        <p>Task list is empty.</p>
<?php } ?>

<?php include('status.php') ?>
<?php include("footer.php") ?>