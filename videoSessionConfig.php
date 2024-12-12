<?php

session_start();

include 'dBconn.php';

if(isset($_POST["submit_data"])){

  $patient_id=$_POST['patient_id'];  
  $appo_id=$_POST['appo_id'];
  $doc_id=$_POST['doc_id'];
  




            $query_data = "select * from appointment_info where apo_Id='$appo_id';";
            $result_data = mysqli_query($connection,$query_data);

             if(mysqli_num_rows($result_data)>0){
                while($row_data = mysqli_fetch_array($result_data)){
                  
               $link=$row_data['inv_Link'];
              // $age=$row_data['p_Age'];

          } 
       }
 }

?>



<!DOCTYPE html>
<html>
<head>
    <title>Jitsi Meet Integration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="jitsi-container"></div>

    <script src="https://meet.jit.si/external_api.js"></script>
    <script>
        $(document).ready(function() {
            const domain = 'meet.jit.si';
            const options = {
                roomName: '<?php echo "$link"  ?>', // Specify your desired room name
                width: '100%',
                height: 500,
                parentNode: document.querySelector('#jitsi-container'),
                userInfo: {
                    displayName: 'User Name' // Set the display name of the user
                },
                configOverwrite: { prejoinPageEnabled: false }
            };

            const api = new JitsiMeetExternalAPI(domain, options);

            api.addEventListener('videoConferenceJoined', () => {
                console.log('Video conference joined');
            });

            api.addEventListener('participantJoined', function(event) {
                console.log('Participant joined:', event);
            });

            api.addEventListener('participantLeft', function(event) {
                console.log('Participant left:', event);
            });

            api.addEventListener('readyToClose', function(event) {
                console.log('Ready to close:', event);
            });

            // You can add more event listeners as needed

            // To leave the meeting programmatically:
            // api.executeCommand('hangup');
        });
    </script>
</body>
</html>
