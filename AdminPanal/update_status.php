<?php


include "../dBConn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['doc_Id']) && isset($_POST['action'])) {
        $doc_Id = $_POST['doc_Id'];
        $action = $_POST['action'];

        if ($action == 'approve') {
            $status = 'approved';
        } elseif ($action == 'reject') {
            $status = 'rejected';
        } else {
            echo "Invalid action";
            exit;
        }

        $sql = "UPDATE doctors SET status = ? WHERE doc_Id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("si", $status, $doc_Id);
        if ($stmt->execute()) {
            echo "Doctor status updated successfully.";
        } else {
            echo "Error updating doctor status: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Required data not received.";
    }
} else {
    echo "Invalid request method.";
}
?>
