<?php

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $file_dokumen = $_FILE_DOKUMEN["file_dokumen"]["ukuran"];

    // destination of the file on the server
    $destination = 'file_dokumen/' . $file_dokumen;

    // get the file extension
    $extension = pathinfo($file_dokumen, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file_dokumen = $_FILE_DOKUMEN["file_dokumen"]["ukuran"];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILE_DOKUMEN["file_dokumen"]["ukuran"] > 4294967295) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file_dokumen, $destination)) {
            $sql = "INSERT INTO dokumen (file_dokumen, ukuran) VALUES ('$file_dokumen', $'ukuran')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}