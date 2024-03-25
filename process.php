<?php
// process.php contains the called apon PHP methods for the file index.html

// POST method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assign values from the post into author and message
    $author = $_POST["author"];
    $message = $_POST["message"];

    // Som filen är skapt nu kan en tom 'post' göras
  
    // Open "data.txt" in append mode
    $file = fopen("data.txt", "a");
    // Basically if file data.txt exists
    if ($file) {
        // Format the data into an entry
        $entry = date("Y-m-d H:i:s") . " - Author: $author\nMessage: $message\n\n";

        // Write the entry to the file
        fwrite($file, $entry);

        // Close the file
        fclose($file);

        // Redirect back to the guestbook page (optional)
        header("Location: index.html");
        exit;
    } else {
        echo "Error opening the file.";
    }
}
?>
