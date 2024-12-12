<?php
session_start();
include '../dBConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['PatientID'];
    $User_Name = $_POST['User_Name'];
    $email = $_POST['email'];

    // Check if a new profile photo is uploaded
    $profilePhotoUpdated = isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] == 0;
    $infoUpdated = (!empty($User_Name) || !empty($email)) || $profilePhotoUpdated;

    if ($infoUpdated) {
        if ($profilePhotoUpdated) {
            $targetDir = "../img/profileImg/";
            
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
                            $sql = "UPDATE patient_info SET 
                                    p_Name='$User_Name', 
                                    p_Email='$email', 
                                    p_Img='$targetFile'
                                    WHERE p_Id='$id'";

                            if ($connection->query($sql) === TRUE) {
                                $relativePath = "img/profileImg/" . basename($targetFile);
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
            // Only update user information if no new profile photo is uploaded
            $sql = "UPDATE patient_info SET ";
            if (!empty($User_Name)) {
                $sql .= "p_Name='$User_Name'";
            }
            if (!empty($email)) {
                if (!empty($User_Name)) {
                    $sql .= ", ";
                }
                $sql .= "p_Email='$email'";
            }
            $sql .= " WHERE p_Id='$id'";

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
