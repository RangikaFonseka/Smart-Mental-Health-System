<?php
$total = 0;
$stageDescription = "";

// Process form data and calculate total
if (isset($_POST["submit_data"])) {
    $dataArray = array();

    for ($i = 1; $i <= 21; $i++) {
        $questionKey = 'q' . $i;
        if (isset($_POST[$questionKey])) {
            $dataArray[] = $_POST[$questionKey];
        }
    }

    foreach ($dataArray as $val) {
        $total += $val;
    }

    // Determine stage of depression
    if ($total <= 10) {
        $stageDescription = "This range suggests typical mood fluctuations that are a part of everyday life. Everyone experiences moments of sadness or stress, but these feelings are temporary and usually pass without significant impact on daily activities.";
        $stageClass = "alert-success";
    } elseif ($total > 10 && $total <= 16) {
        $stageDescription = "A score in this range indicates some mild emotional distress, such as occasional sadness or irritability. While these feelings may linger longer than usual, they generally do not interfere significantly with daily functioning.";
        $stageClass = "alert-warning";
    } elseif ($total > 16 && $total <= 20) {
        $stageDescription = "This stage suggests that you are experiencing symptoms that border on clinical depression. Feelings of sadness, fatigue, or a lack of motivation may be more noticeable and begin to affect your mood and energy.";
        $stageClass = "alert-warning";
    } elseif ($total > 20 && $total <= 30) {
        $stageDescription = "Individuals in this range may struggle with persistent sadness, low energy, and difficulty enjoying daily activities. These symptoms may impact work, relationships, and self-care.";
        $stageClass = "alert-danger";
    } elseif ($total > 30 && $total <= 40) {
        $stageDescription = "Severe depression involves intense and overwhelming feelings of despair, hopelessness, and fatigue. Immediate professional intervention is highly recommended at this stage.";
        $stageClass = "alert-danger";
    } else {
        $stageDescription = "Scores above 40 indicate extreme and potentially life-threatening depression. Urgent medical and psychological help is necessary to ensure safety and begin treatment.";
        $stageClass = "alert-danger";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depression Assessment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
        }
        .result-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .result-card h3 {
            color: #6c757d;
        }
        .score {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
        }
        .alert {
            font-size: 1.1rem;
            padding: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="text-primary">Depression Stage Assessment</h1>
        <p class="text-muted">Understand your emotional state with a quick assessment</p>
    </div>

    <div class="result-card text-center">
        <h3>Your Results</h3>
        <p class="score">Total Score: <?php echo $total; ?></p>

        <!-- Dynamic stage description with alert style -->
        <div class="alert <?php echo $stageClass; ?>" role="alert">
            <strong><?php echo $stageDescription; ?></strong>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
