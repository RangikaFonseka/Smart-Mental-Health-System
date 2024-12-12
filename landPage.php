<?php  

session_start();

include 'header.php';

include 'dBconn.php';


$patient_id=$_SESSION['patient_id'];

            $query_data = "select * from doctors order by doc_Id asc;";
            $result_data = mysqli_query($connection,$query_data);
         

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<link rel="stylesheet" href="css/footerStyle.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<style type="text/css">
    
*{
    font-family: 'poppins',sans-serif;
    margin:0;
    padding:0;
    box-sizing: border-box;
    outline:none;
    border:none;
    text-transform: capitalize;
    transition:all .2s ease-out;
    text-decoration: none;
}

:root {
  --blue: #3385ff;
  --light-green: #99c2ff;
  --gray: #b3b3b3;
  --white: #ccffff;
  --black: #444444;
}

 html {
  font-size: 65.5%;
  overflow-x: hidden;
  scroll-behavior: smooth;
  scroll-padding-top: 7rem;
}


body{
  font-family: montserrat;
  background-color:#cceeff;
}


section{
max-width: 1200px;
margin:0 auto;
padding:2rem;

}



@media(max-width:991px){


    html{

        font-size:55%;

    }

   

}




@media(max-width:768px){


    .doctor .row .col-1 img {

    border: 1px solid;
    position: absolute;
    width: 250px;
    height: auto;
    margin: 20px;
    object-fit: cover;
}
    

}







@media(max-width:450px){


    html{

        font-size:50%;

    }

   

    .doctor .row .col-1 img {

    border: 1px solid;
    position: absolute;
    width: 250px;
    height: auto;
    margin: 20px;
    object-fit: cover;
}

}



.home{

margin-top: 1rem;

}

.home .row{

  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap:1.5rem;

}

.home .row .content{

flex:1 1 40rem;
text-align: center;
}


.home .row .image{

flex:1 1 35rem;

}


.home .row .image img{

height:75%;
width:75%;

}



.home .row .content h3{

margin-bottom: 1rem;
font-size: 8rem;
color:black;

}




.btn{

display: inline-block;
margin-top: 1rem;
border-radius: 5rem;
background-color: var(--light-green);

cursor: pointer;
color:var(--white);
font-size: 1.8rem;
padding: 0.5rem 2rem;



}


.count .box-container{

  display:grid;
  grid-template-columns: repeat(auto-fit,minmax(27rem,1fr));
  grid-gap:1.5rem;
  align-items: flex-start;


}

.count .box-container .box{

background-color:#005ce6;
border-radius:.5rem;
padding:2rem;
display: flex;
align-items: center;
justify-content: center;
grid-gap:1.5rem;

}

.count .box-container .box i{

  font-size: 4rem;
  color:white;


}

.count .box-container .box .content h3{

  font-size:2rem;
  color:white;
  margin-bottom:.5rem;

}


.count .box-container .box .content p{

  font-size:1.6rem;
  color:white;



}



.about .row{

margin-top:10rem;
display: flex;
align-items: center;
grid-gap: 1.5rem;
flex-wrap: wrap;


}

.about .row .image{

flex:1 1 40rem;


}

.about .row .image img{

width: 75%;
height: 75%;

}


.about .row .content {

text-align: center;
flex: 1 1 40rem;

}


.about .row .content h3{

  font-size: 3rem;
  color: black;

}

.about .row .content p{

  padding: 1rem 0;
  line-height: 2;
  font-size: 1.6rem;
  color:black;

}

.topic{


font-size:4.5rem;
margin-top: 15px;
margin-bottom: 15px;



}




.facility{


padding-top:80px;
height: 500px;


}


.facility .slide {
  width:30rem;
  height:350px;
  background-color: #4da6ff;
  border-radius: 0.5rem;
  text-align: center;
  padding: 2rem;
  margin-bottom:5rem;
}

.facility .slide img {
  height: 15rem; /* Adjust the height as needed */
  width: 60%;
  margin-bottom: 1rem;
}

.facility .slide h3 {
  margin: 1rem 0;
  font-size: 1.5rem; /* Adjust the font size as needed */
  color: white;
}

.facility .slide p {
  line-height: 1.5rem; /* Adjust the line height as needed */
  font-size: 1.2rem; /* Adjust the font size as needed */
  color: white;
}




.about .row{

margin-top:10rem;
display: flex;
align-items: center;
grid-gap: 1.5rem;
flex-wrap: wrap;


}

.about .row .image{

flex:1 1 40rem;


}

.about .row .image img{

width: 75%;
height: 75%;

}


.about .row .content {

text-align: center;
flex: 1 1 40rem;

}


.about .row .content h3{

  font-size: 3rem;
  color: black;

}

.about .row .content p{

  padding: 1rem 0;
  line-height: 2;
  font-size: 1.6rem;
  color:black;

}




.doctors .row{

margin-top:10rem;
margin-bottom:10rem ;
display: flex;
align-items: center;
grid-gap: 1.5rem;
flex-wrap: wrap;
background-color: #dff2f5;
padding:3.5rem;


}

.doctors .row .image{

flex:1 1 40rem;


}

.doctors .row .image img{

width:100%;
height:100%;

}


.doctors .row .content {

text-align: left;
flex: 1 1 40rem;

}


.doctors .row .content h3{

  font-size: 3rem;
  color: black;

}

.doctors .row .content p{

  padding: 1rem 0;
  line-height: 2;
  font-size: 1.6rem;
  color:black;

}

.doc-btn{

    display: inline-block;
    margin-top: 1rem;
    border-radius:1rem;
    background-color: var(--light-green);

    cursor: pointer;
    color:var(--white);
    font-size: 1.8rem;
    padding: 0.5rem 2rem;

}






.blogs{
   
    background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
    padding:15px 9%;
    padding-bottom: 100px;
    margin-bottom: 60px;
}

.blogs .heading{
    text-align: center;
    padding-bottom: 15px;
    color:#fff;
    text-shadow: 0 5px 10px rgba(0,0,0,.2);
    font-size: 50px;
}

.blogs .box-blogs{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
    gap:15px;
}

.blogs .box-blogs .box{
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    background: #fff;
    text-align: center;
    padding:30px 20px;
}

.blogs .box-blogs .box img{
    height: 80px;
}

.blogs .box-blogs .box h3{
    color:#444;
    font-size: 22px;
    padding:10px 0;
}

.blogs .box-blogs .box p{
    color:#777;
    font-size: 15px;
    line-height: 1.8;
}

.blogs .box-blogs .box .btn{
    margin-top: 10px;
    display: inline-block;
    background:#333;
    color:#fff;
    font-size: 17px;
    border-radius: 5px;
    padding: 8px 25px;
}

.blogs .box-blogs .box .btn:hover{
    letter-spacing: 1px;
}

.blogs .box-blogs .box:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.03);
}

@media (max-width:768px){
    .blogs{
        padding:20px;
    }
}




.test{
   background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
    padding:15px 9%;
    margin-top: 120px;
    padding-bottom: 130px;
    margin-bottom:20px;
    
}

.test .heading{
    text-align: center;
    padding-bottom: 15px;
    color:#fff;
    text-shadow: 0 5px 10px rgba(0,0,0,.2);
    font-size: 50px;
}

.test .box-test{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
    gap:15px;
}

.test .box-test .box{
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
    border-radius: 5px;
    background: #fff;
    text-align: center;
    padding:30px 20px;
}

.test .box-test .box img{
    height: 80px;
}

.test .box-test .box h3{
    color:#444;
    font-size: 22px;
    padding:10px 0;
}

.test .box-test .box p{
    color:#777;
    font-size: 15px;
    line-height: 1.8;
}

.test .box-test .box .btn{
    margin-top: 10px;
    display: inline-block;
    background:#333;
    color:#fff;
    font-size: 17px;
    border-radius: 5px;
    padding: 8px 25px;
}

.test .box-test .box .btn:hover{
    letter-spacing: 1px;
}

.test .box-test .box:hover{
    box-shadow: 0 10px 15px rgba(0,0,0,.3);
    transform: scale(1.03);
}

@media (max-width:768px){
    .test{
        padding:20px;
    }
}









    
</style>


  <body>

    <section class="home" id="home">
    	
    	<div class="row">
    		
    		<div class="content">
    			<h3>Mental <span>Care System</span> </h3>
    			

    		</div>

    		<div class="image">
    			 <img src="img/home.png" alt="homeImage">
			</div>

    	</div>

    </section>


    <section class="count" id="">

    	<div class="box-container">
    	
    	<div class="box">
    		
    		<i class="fa fa-user"></i>
    		<div class="content">
    			
    			<h3>1000+</h3>
    			<p>Users</p>


    		</div>


    	</div>


    	<div class="box">
    		
    		<i class="fa fa-user-md"></i>
    		<div class="content">
    			
    			<h3>100+</h3>
    			<p>Doctors</p>


    		</div>


    	</div>


    	<div class="box">
    		
    		<i class="fa fa-tasks" aria-hidden="true"></i>
    		<div class="content">
    			
    			<h3>50+</h3>
    			<p>Task</p>


    		</div>


    	</div>


    	
	</div>
    </section>


    <section class="about" id="about">

    	<div class="row">
    		
    		<div class="image" >
    			
    			<img src="img/contact.png">

    		</div>


    	

    	<div class="content">
    		
    		<h3>About us</h3>

    	<p>At Smart Mental Healthcare, we combine advanced technology, medical expertise, and personalized care to help individuals manage stress, improve mental well-being, and enhance their quality of life. Our platform offers easy access to mental health resources, professional consultations, and innovative tools designed to support emotional wellness. With a focus on user-friendly solutions and holistic care, we empower individuals to take control of their mental health journey..</p>

    	<a href="contactForm.php" class="btn">contact</a>

    	</div>

    	</div>

    </section>







<section class="test" id="test">

    <h1 class="heading">Testing</h1>

    <div class="box-test">

        <div class="box">
           
            <h2>Personality Test</h2>
            <p>The MBTI (Myers-Briggs Type Indicator) personality test categorizes individuals into 16 different personality types  It aims to provide insights into how people perceive the world and make decisions, helping to understand personal strengths, communication styles, and potential career paths.</p>
            <a href="mbti.php" class="btn">Strat test</a>
        </div>

        <div class="box">
          
            <h2>Depression Test</h2>
            <p>A depression test is a psychological assessment designed to evaluate symptoms commonly associated with depression.These tests can help individuals assess their mental health and may suggest seeking professional help if symptoms indicate significant distress or impairment.</p>
           <a href="BDI_test.php" class="btn">Strat test</a>
        </div>

        <div class="box">
          
            <h2>OCD Test</h2>
            <p>An OCD (Obsessive-Compulsive Disorder) test is a screening tool used to assess the presence of symptoms related to OCD. This test can provide insights into whether someone might benefit from further evaluation or treatment by a mental health professional specializing in OCD.</p>
            <a href="ocdTest.php" class="btn">Strat test</a>
        </div>

    </div>

</section>









    <section class="facility" id="facility">
        
      <h1 class="topic"> Our Facilities</h1>
        


        <div class="swiper facility-slider">
            
            <div class="swiper-wrapper">
                
                

                <a href="appo_show.php" class="swiper-slide slide">

                    <img src="img/apo_view.png" alt="Appoinment">
                    <h3>Appoinment View</h3>
                    <p>Patients are able to view scheduled appointments. </p>

                </a>

               

               <a href="appointmentBook.php" class="swiper-slide slide">

                    <img src="img/online.png" alt="Appoinment">
                    <h3>Appoinment Book</h3>
                    <p>Patients are able to book appointments.</p>

                </a>


                <div class="swiper-slide slide">

                    <a href="paReport.php">

                    <img src="img/payment.png" alt="Reports">
                    <h3>Reports</h3>
                    <p>Patients are able to view medical reports.</p>

                    </a>

                </div>

                 <a href="audioInterface.php" class="swiper-slide slide">

                    <img src="img/audio.png" alt="Appoinment">
                    <h3>Listning Music</h3>
                    <p>Patients are able to listen to relaxing music..</p>

                </a>

                  

            </div>



        </div>

    </section>






    <section class="doctors" id="doctors">

        <div class="row">

            
            <div class="image" >
                
                <img src="img/docSide.jpg">

            </div>


        

            <div class="content">
            
            <h3>Our Doctors</h3>

             <p>You can obtain information about the doctors available for booking appointments.This will help you gain a clear understanding of the doctor when choosing one.</p>

            <a href="doc_Profile/docInfo.php" class="doc-btn">Lern more</a>

           </div>

        </div>

    </section>  


   <section class="blogs" id="blogs">

    <h1 class="heading">Our Blogs</h1>

    <div class="box-blogs">

        <div class="box">
            <img src="img/blogImg/img1.png" alt="Anxiety Disorders">
            <h3>Anxiety Disorders</h3>
            <p>Anxiety disorders affect millions, causing excessive worry, fear, and panic. Learn more about symptoms and treatments.</p>
            <a href="blog_pdf/Anxiety Disorders.pdf" class="btn">Read More</a>
        </div>

        <div class="box">
            <img src="img/blogImg/img2.png" alt="Depression">
            <h3>Depression</h3>
            <p>Depression is more than sadness. It affects daily life and can become debilitating without proper care. Read how to manage it.</p>
            <a href="#" class="btn">Read More</a>
        </div>

        <div class="box">
            <img src="img/blogImg/img3.png" alt="Bipolar Disorder">
            <h3>Bipolar Disorder</h3>
            <p>Extreme mood swings characterize bipolar disorder. Discover the symptoms and ways to manage this complex condition.</p>
            <a href="#" class="btn">Read More</a>
        </div>

        <div class="box">
            <img src="img/blogImg/img4.png" alt="Obsessive-Compulsive Disorder">
            <h3>Obsessive-Compulsive Disorder</h3>
            <p>OCD involves intrusive thoughts and compulsive behaviors. Explore how this disorder can affect daily life and ways to cope.</p>
            <a href="#" class="btn">Read More</a>
        </div>

        <div class="box">
            <img src="img/blogImg/img1.png" alt="Personality Disorders">
            <h3>Personality Disorders</h3>
            <p>Personality disorders influence how individuals interact with others. Learn more about different types and treatments available.</p>
            <a href="#" class="btn">Read More</a>
        </div>

        <div class="box">
            <img src="img/blogImg/img3.png" alt="Substance Use Disorders">
            <h3>Substance Use Disorders</h3>
            <p>Substance use disorders involve the harmful use of alcohol and drugs. Find out how to recognize and treat this condition.</p>
            <a href="#" class="btn">Read More</a>
        </div>

    </div>

</section>












    </section> 


    <!--footer start-->




        <footer class="footer">
        <div class="footer-container">
            <!-- Quick Links Section -->
            <div class="footer-section">
                <h5>Quick links</h5>
                <ul class="quick-links">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <!-- Quick Links Section -->
            <div class="footer-section">
                <h5>Quick links</h5>
                <ul class="quick-links">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <!-- Quick Links Section -->
            <div class="footer-section">
                <h5>Quick links</h5>
                <ul class="quick-links">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-container">
            <ul class="social">
                <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                <li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Email</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
    <p><u><a href="#">Smart Mental Healthcare</a></u> is dedicated to providing innovative mental health solutions to improve emotional well-being and daily stress management.</p>
    <p class="h6">&copy; All rights reserved. <a class="text-green ml-2" href="#" target="_blank">Smart Mental Healthcare</a></p>
</div>

    </footer>




    <!--footer end-->


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        

var swiper = new Swiper(".facility-slider", {
   
  spaceBetween: 20,
  grabCursor: false,
  loop: false,
  clickable: true,
  centeredSlides: true,
  slidesPerView:1.3,
  initialSlide: 1,
  pagination: {
    el: ".swiper-pagination",
  },
  breakpoints: {
    640: {
      slidesPerView: 1.3,
    },
    768: {
      slidesPerView: 2.5,
    },
    998: {
      slidesPerView: 3.5,
    },
  },
});










    </script>

  </body>





</html>












