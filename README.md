

Requirements:

The index.php should display the ToDo List items if they exist. If no items exist, your page should say something like “No to do list items exist yet.”

You can create a separate page with the form to add an item to the list OR you can put this add item form in the index.php. You will see the latter option in my example.

When you POST a new item to your ToDo List successfully, the user should be taken back to the index.php in order to view the ToDo List that now includes the new item.

The index.php should also have a “Remove” button beside each item of the ToDo List when the list items are displayed. Clicking the remove button should remove the item from the page AND from the associated database table. My example will show the remove buttons as a red letter X, but you can style your buttons however you choose.

The ToDo List application will need a simple database named "todolist" (case-sensitive). You can create the database using myPhPAdmin for MySQL in XAMPP. It should have a table named "todoitems" (again, case-sensitive). The table should have 3 fields: 
    An ItemNum field that is type = INT, Index = Primary, and has auto increment (A_I checkbox).
    A Title field that is Type = VARCHAR and  limited to 20 characters max. 
    A Description field that is Type = VARCHAR and  limited to 50 characters max.


Your project does not need to look like mine. I am providing screenshots as an example. My list container scrolls when the list outgrows the available space. Each red X is a remove button. I put my add item form on the index page, but you can create a separate page for this if you wish.