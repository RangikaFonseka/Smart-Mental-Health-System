<?php
session_start();
include '../dBConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $docid = $_POST['docID'];
    $docName = $_POST['docName'];
    $docemail = $_POST['docemail'];

    // Check if a new profile photo is uploaded
    $profilePhotoUpdated = isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] == 0;
    $infoUpdated = (!empty($docName) || !empty($docemail)) || $profilePhotoUpdated;

    if ($infoUpdated) {
        if ($profilePhotoUpdated) {
            $targetDir = "../doc_profile/imgs/";
            $targetFile = $targetDir . basename($_FILES["profilePhoto"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the file is an actual image
            $check = getimagesize($_FILES["profilePhoto"]["tmp_name"]);
            if ($check !== false) {
                // Allow certain file formats
                $allowedTypes = ["jpg", "jpeg", "png", "gif"];
                if (in_array($imageFileType, $allowedTypes)) {
                    // Check file size
                    if ($_FILES["profilePhoto"]["size"] <= 5000000) {
                        // Check if the directory exists
                        if (!is_dir($targetDir)) {
                            mkdir($targetDir, 0755, true); // Create the directory if it doesn't exist
                        }

                        // Upload the file
                        if (move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $targetFile)) {
                            // Update user profile with new image in the database
                            $sql = "UPDATE doctors SET 
                                    doc_Name='$docName', 
                                    doc_email='$docemail', 
                                    doc_img='$targetFile'
                                    WHERE doc_Id='$docid'";

                            if ($connection->query($sql) === TRUE) {
                                $relativePath = "doc_profile/imgs/" . basename($targetFile);
                                echo json_encode(['newImageUrl' => $relativePath]);

                            } else {
                                echo "Error updating profile: " . $connection->error;
                            }
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        echo "Sorry, your file is too large.";
                    }
                } else {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            } else {
                echo "File is not an image.";
            }
        } else {
        
            $sql = "UPDATE doctors SET ";
            if (!empty($docName)) {
                $sql .= "doc_Name='$docName'";
            }
            if (!empty($docemail)) {
                if (!empty($doc_Name)) {
                    $sql .= ", ";
                }
                $sql .= "doc_email='$docemail'";
            }
            $sql .= " WHERE doc_Id='$docid'";

            if ($connection->query($sql) === TRUE) {
                echo json_encode(['newImageUrl' => null]); // No new image URL
            } else {
                echo "Error updating profile: " . $connection->error;
            }
        }
    } else {
        echo "No data to update.";
    }
}
?>
