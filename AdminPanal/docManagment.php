<?php
include "../dBConn.php";

$seq = 0;

// Initialize the SQL query
 $sql = "SELECT * FROM doctors ";

// Check if a filter has been applied
if (isset($_GET['name']) && !empty($_GET['name'])) {
    $name = $_GET['name'];
    $sql .= " WHERE doc_Name LIKE ?";
}

// Prepare the statement
$stmt = $connection->prepare($sql);

// Bind parameters if a filter is applied
if (isset($name)) {
    $searchName = "%" . $name . "%"; // For partial matching
    $stmt->bind_param("s", $searchName);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .form-inline .form-group {
            margin-right: 15px;
        }
        .form-inline {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Patient List</h2>

    <form id="filter-form" class="form-inline" method="GET" action="">
        <div class="form-group">
            <label for="name" class="sr-only">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr><th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Spec</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row_data = $result->fetch_assoc()) {
                    $seq++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $seq; ?></th>
                        <td><?php echo htmlspecialchars($row_data['doc_Id']); ?></td>
                        <td><?php echo htmlspecialchars($row_data['doc_Name']); ?></td>
                        <td><?php echo htmlspecialchars($row_data['doc_email']); ?></td>
                        <td><?php echo htmlspecialchars($row_data['telephone']); ?></td>
                        <td><?php echo htmlspecialchars($row_data['spec']); ?></td>
               
                        
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="5">No patients found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
