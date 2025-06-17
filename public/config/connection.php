<?php
$conn = mysqli_connect("localhost", "root", "", "db_laundry");
if (!$conn) {
    echo "DB Connection Failed";
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function cud($query)
{
    global $conn;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
