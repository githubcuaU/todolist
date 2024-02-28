<?php include("header.php") ?>

<!-- page is first opened, no task has been created yet. Allow user to enter the first task -->
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

<?php include('status.php') ?>
<?php include("footer.php") ?>