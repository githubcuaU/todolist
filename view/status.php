<?php
$created = filter_input(INPUT_GET, "created", FILTER_UNSAFE_RAW);
$updated = filter_input(INPUT_GET, "updated", FILTER_UNSAFE_RAW);

if ($created) 
{
    echo "A task was created.";
}

if ($updated) 
{
    echo "A task was updated.";
}