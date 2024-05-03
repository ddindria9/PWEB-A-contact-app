<?php

include 'database.php'; // Include database connection
include 'models.php';   // Include necessary models or classes

// Retrieve data from the database and create User objects
$users = array(
    new User(1, "Dewan Perwakilan Rakyat", "Rowokangkung, Lumajang", "Active", "081230481811"),
    new User(2, "Mahkamah Konstitusi", "Gumukmas, Jember", "Pension", "081347582693"),
    new User(3, "Dewan Perwakilan Daerah", "Blambangan, Banyuwangi", "Active", "085264738177")
);

// Display users in a table
echo "<table>";
echo "<tr><th>CURRENT JOB</th><th>NAME</th><th>ADDRESS</th><th>Status</th><th>PHONE NUMBER</th><th>Actions</th></tr>";
foreach ($users as $user) {
    echo "<tr>";
    echo "<td>{$user->id}</td>";
    echo "<td>{$user->CURRENT_JOB}</td>";
    echo "<td>{$user->NAME}</td>";
    echo "<td>{$user->ADDRESS}</td>";
    echo "<td>{$user->Status}</td>";
    echo "<td>{$user->PHONE_NUMBER}</td>";
    echo "<td>{$user->Action}</td>";
    echo "<td><button>Edit</button> <button>Delete</button></td>";
    echo "</tr>";
}
echo "</table>";

// Close the database connection
$conn->close();
?>
