<?php

include "../subHeader.php";

$total = 0;

if (isset($_POST["submit_data"])) {

    $dataArray = array();

    for ($i = 1; $i <= 18; $i++) {
        $questionKey = 'q' . $i;
        if (isset($_POST[$questionKey])) {
            $dataArray[] = (int)$_POST[$questionKey]; 
        }
    }

    $Washing = $dataArray[3] + $dataArray[9] + $dataArray[15]; 
    $Obsessing = $dataArray[4] + $dataArray[10] + $dataArray[16]; 
    $Ordering = $dataArray[1] + $dataArray[7] + $dataArray[13]; 
    $Checking = $dataArray[0] + $dataArray[6] + $dataArray[12]; 
    $Neutralising = $dataArray[2] + $dataArray[8] + $dataArray[14]; 

    foreach ($dataArray as $val) {
        $total += $val; 
    }

    function washingText($total) {
        if($total <= 3) {
            return "Washing\nIndividuals in this range may experience mild difficulty in touching objects that have been touched before and engage in minimal washing due to feeling contaminated.\nThese symptoms may cause some distress but typically do not significantly interfere with daily activities.";
        } else if ($total > 4 && $total <= 8) {
            return "Washing\nScores in this range suggest moderate difficulty in touching objects and moderate washing due to contamination fears.\nIndividuals may spend more time than usual engaging in washing behaviors and may experience noticeable distress or interference in daily life due to these symptoms.";
        } else {
            return "Washing\nScores in this range indicate severe difficulty in touching objects and excessive washing due to contamination fears.\nIndividuals may spend a significant amount of time on washing behaviors, leading to marked distress and impairment in functioning.\nThese symptoms may significantly impact daily activities, relationships, and overall quality of life.";
        }
    }

    function obsessingText($total) {
        if($total <= 3) {
            return "Obsessing\nIndividuals in this range may experience mild difficulty in controlling unpleasant thoughts and minimal excessive unpleasant thoughts.\nThese thoughts may cause occasional distress but generally do not disrupt daily functioning significantly.";
        } else if ($total > 4 && $total <= 8) {
            return "Obsessing\nScores in this range suggest moderate difficulty in controlling unpleasant thoughts and moderate excessive unpleasant thoughts.\nIndividuals may experience more frequent intrusive thoughts and may struggle to manage or dismiss these thoughts, leading to noticeable distress and interference in daily life.";
        } else {
            return "Obsessing\nScores in this range indicate severe difficulty in controlling unpleasant thoughts and a high level of excessive unpleasant thoughts.\nIndividuals may experience persistent, distressing obsessions that significantly interfere with daily activities, relationships, and overall well-being.";
        }
    }

    function orderingText($total) {
        if($total <= 3) {
            return "Ordering\nIndividuals in this range may experience mild challenges with ordering objects.\nThese challenges may cause minor inconvenience but do not typically lead to significant distress or interference in daily life.";
        } else if ($total > 4 && $total <= 8) {
            return "Ordering\nScores in this range suggest moderate challenges with ordering objects. Individuals may struggle to maintain order and organization, leading to occasional frustration or difficulty finding items.";
        } else {
            return "Ordering\nScores in this range indicate severe challenges with ordering objects. Individuals may experience significant distress and frustration due to difficulty maintaining order and organization, leading to impairment in daily functioning and activities.";
        }
    }

    function checkingText($total) {
        if($total <= 3) {
            return "Checking\nIndividuals in this range may exhibit mild to moderate levels of excessive checking behaviors.\nThese behaviors may cause some inconvenience or take up more time than usual but do not typically lead to significant distress or interference in daily life.";
        } else if ($total > 4 && $total <= 8) {
            return "Checking\nScores in this range suggest moderate levels of excessive checking behaviors.\nIndividuals may engage in frequent checking of items such as doors, locks, or appliances, leading to noticeable disruption in daily activities and occasional distress.";
        } else {
            return "Checking\nScores in this range indicate severe levels of excessive checking behaviors. Individuals may experience significant distress and impairment due to frequent and time-consuming checking behaviors, leading to disruption in daily activities, relationships, and overall well-being.";
        }
    }

    function neutralisingText($total) {
        if($total <= 3) {
            return "Neutralising\nIndividuals in this range may exhibit mild compulsions related to counting or minimal excessive feelings towards numbers.\nThese behaviors may be occasional and do not typically lead to significant distress or interference in daily life.";
        } else if ($total > 4 && $total <= 8) {
            return "Neutralising\nScores in this range suggest moderate compulsions related to counting or moderate excessive feelings towards numbers.\nIndividuals may engage in frequent counting behaviors or have heightened sensitivity to numbers, leading to occasional distress or disruption in daily activities.";
        } else {
            return "Neutralising\nScores in this range indicate severe compulsions related to counting or excessive feelings towards numbers.\nIndividuals may experience significant distress and impairment due to compulsive counting behaviors or intense preoccupation with numbers, leading to disruption in daily activities, relationships, and overall well-being.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Typing Effect</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>
  .typing-container {
    
    padding: 20px;
    margin-bottom: 15px;
    border-radius: 5px;
   
    
  }

  .wrapcontainer {
    margin-top: 70px;
    height: 90vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    
  }

  .typing-text {
    font-family: 'Arial', sans-serif;
    font-size: 1.7rem;
    white-space: pre-wrap;
    word-wrap: break-word;
    text-transform:none ;
    padding-right: 15px;
  }
</style>
</head>

<body>

<div class="wrapcontainer"> 
  <div class="typing-container">
    <div class="typing-text" id="typing-washing"></div>
  </div>
  <div class="typing-container">
    <div class="typing-text" id="typing-obsessing"></div>
  </div>
  <div class="typing-container">
    <div class="typing-text" id="typing-ordering"></div>
  </div>
  <div class="typing-container">
    <div class="typing-text" id="typing-checking"></div>
  </div>
  <div class="typing-container">
    <div class="typing-text" id="typing-neutralising"></div>
  </div>
</div> 

<script>
const textsToType = {
  washing: <?php echo json_encode(washingText($Washing)); ?>,
  obsessing: <?php echo json_encode(obsessingText($Obsessing)); ?>,
  ordering: <?php echo json_encode(orderingText($Ordering)); ?>,
  checking: <?php echo json_encode(checkingText($Checking)); ?>,
  neutralising: <?php echo json_encode(neutralisingText($Neutralising)); ?>
};

function typeText(elementId, text, callback) {
  const element = document.getElementById(elementId);
  element.textContent = ''; 
  let index = 0;
  const typingInterval = setInterval(() => {
    element.textContent += text[index];
    index++;
    if (index >= text.length) {
      clearInterval(typingInterval);
      element.style.borderRight = 'none'; 
      if (callback) callback();
    }
  }, 6); // Adjust typing speed as needed
}

function startTyping() {
  typeText('typing-washing', textsToType.washing, () => {
    typeText('typing-obsessing', textsToType.obsessing, () => {
      typeText('typing-ordering', textsToType.ordering, () => {
        typeText('typing-checking', textsToType.checking, () => {
          typeText('typing-neutralising', textsToType.neutralising);
        });
      });
    });
  });
}

document.addEventListener('DOMContentLoaded', startTyping);
</script>
</body>
</html>
