<div class="swiper doctors-slider">
            
            <div class="swiper-wrapper">
                
               

                    <?php

            if(mysqli_num_rows($result_data)>0){
                while($row_data = mysqli_fetch_array($result_data)){
                  
               $doc_id=$row_data['doc_Id'];
               $doc_name=$row_data['doc_Name'];
               $doc_age=$row_data['age'];

                 ?>
                <div class="swiper-slide slide">

                    <img src="img/reporting.png" alt="Reports">
                    <h3><?Php echo $doc_name ?></h3>
                    <p>All are the users able to download and View the Reports</p>

                </div>

                <?php

               
                                       }
                                }


                ?>
 
                  <!--<div class="swiper-pagination"></div>-->

            </div>



        </div>