<?php


include "IntroHeader.php";

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>


   <style type="text/css">
   	


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


</head>
<body>


<section class="test">
<h1 class="heading">Testing</h1>

    <div class="box-test">

        <div class="box">
           
            <h2>Personality Test</h2>
            <p>The MBTI (Myers-Briggs Type Indicator) personality test categorizes individuals into 16 different personality types It aims to provide insights into how people perceive the world and make decisions, helping to understand personal strengths, communication styles, and potential career paths.</p>
            <a href="mbti.php" class="btn">Strat test</a>
        </div>

        <div class="box">
          
            <h2>Depression Test</h2>
            <p>A depression test is a psychological assessment designed to evaluate symptoms commonly associated with depression.These tests can help individuals assess their mental health and may suggest seeking professional help if symptoms indicate significant distress or impairment.

</p>
           <a href="BDI_test.php" class="btn">Strat test</a>
        </div>

        <div class="box">
          
            <h2>OCD Test</h2>
            <p>An OCD (Obsessive-Compulsive Disorder) test is a screening tool used to assess the presence of symptoms related to OCD. This test can provide insights into whether someone might benefit from further evaluation or treatment by a mental health professional specializing in OCD.</p>
            <a href="ocdTest.php" class="btn">Strat test</a>
        </div>

    </div>

    </section>


</body>
</html>