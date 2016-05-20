<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
   <!-- <meta http-equiv="refresh" content="30"> -->
    <title>Pablo Rosa</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Website landing Page for Developers">
    <meta name="author" content="3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <!-- github acitivity css -->
    <link rel="stylesheet" href="assets/plugins/github-activity/dist/github-activity-0.1.1.min.css">
    <link rel="stylesheet" href="assets/plugins/github-activity/dist/octicons/octicons.min.css">


    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
@extends('layouts.app')

@section('content')
    <!-- ******HEADER****** -->
    <header class="header">
        <div class="container">
            <img class="profile-image img-responsive pull-left img-circle" src="assets/images/profile.jpg" alt="Pablo Rosa" />
            <div class="profile-content pull-left">
                <h1 class="name">Pablo Rosa</h1>
                <h2 class="desc">Web App Developer</h2>
                <ul class="social list-inline">
                    <li><a href="https://www.facebook.com/pablo.d.rosa" target="blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="http://www.linkedin.com/in/pablorosadiaz" target="blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="www.github.com/prosa85"><i class="fa fa-github-alt"></i></a></li>
                    <li class="last-item"><a href="#"><i class="fa fa-hacker-news"></i></a></li>
                </ul>
            </div>
            <!--//profile-->
            <a class="btn btn-cta-primary pull-right" href="/contact" target="_blank"><i class="fa fa-paper-plane"></i> Contact Me</a>
        </div>
        <!--//container-->
    </header>
    <!--//header-->

    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12 col-lg-8">
                <section class="about section">
                    <div class="section-inner">
                        <h2 class="heading">About Me</h2>
                        <div class="content">
                            <p>Graduated with a Bachelor’s Degree in Computer Science, with a good combination of cross-functional skills including hardware and software. Working as a computer technician and Web Developer while pursuing a bachelor’s degree, helped understand not only hardware, but also the value working in a team thriving in high pace environments.</p>
                            <p>My objective is to succeed in an environment of growth and excellence and earn a job which provides me job Satisfaction and self development and help me achieve personal as well as organization goals.</p>
                        </div>
                        <!--//content-->
                    </div>
                    <!--//section-inner-->
                </section>
                <!--//section-->

                <section class="latest section">
                    <div class="section-inner">
                        <h2 class="heading">Latest Projects</h2>
                        <div class="content">

                            <div class="item featured text-center">
                                <h3 class="title"><a href="www.gymapp.prosa-developer.com" target="_blank">Gym App</a></h3>
                                <p class="summary">A Web app using Laravel 5.2</p>
                                <div class="featured-image">
                                    <a href="" target="_blank">
                                        <img class="img-responsive project-image" src="assets/gymapp.png" alt="www.gymapp.prosa-developer.com" />
                                    </a>
                                    <div class="ribbon">
                                        <div class="text">New</div>

                                    </div>
                                </div>
                            </div>
                            <div class="item featured text-center">
                                <h3 class="title"><a href="" target="_blank">www.prosa-developer.com</a></h3>
                                <p class="summary">A responsive Bootstrap website</p>
                                <div class="featured-image">
                                    <a href="" target="_blank">
                                        <img class="img-responsive project-image" src="assets/images/projects/project-featured.png" alt="www.prosa-developer.com" />
                                    </a>
                                    
                                </div>
                            </div>

                        </div>
                        <!--//content-->
                    </div>
                    <!--//section-inner-->
                </section>
                <!--//section-->
                <section class="experience section">
                    <!--Skills sect-->
                    <div class="section-inner">
                       
                                    
                                    <h3 class="heading">Work Experience</h3>

                                    <div class="item">
                                    <h3 class="title">Content Developer - <span class="place"><a href="www.link-systems.com">Link Systems International</a></span> <span class="year">(2013 - Present)</span></h3>
                                    <p>Translate and review algorithmic practice /test problems. Interface with Quality Assurance Analysts to Address review comments. Help to identify global issues and suggests ways to improve the accuracy and efficiency of authoring content, as related to the systems and processes utilized. Provide assistance with image creation and design within Adobe Photoshop and Illustrator.</p>
                                    </div>
                                    <div class="item">
                                    <h3 class="title">Web Developer - <span class="place"><a href="www.rya.com.ve">R&A.</a></span> <span class="year">(2010 - 2011)</span></h3>
                                    <p>Developed an intranet application to handle business requests from customers. The application managed and tracked the status of a client’s requests and followed through until completion. The system included online reports and was written in Joomla using Cronoforms, Fabrik using WAMP stack.</p>
                                    </div>
                    </div>
                    <!--//section-inner-->
                </section>
                <section class= "experience section">
                    <div class="section-inner">
                         <h2 class="heading">Skills</h2>
                           <div class="content">
                               
                                    <div>
                                        <h3>Core Strengths</h3>
                                        <u>
                                            <li>Software and Web Development</li>
                                            <li>Database Design and Development</li>
                                            <li>Customer Service and Support</li>
                                            <li>Computer Repairs</li>
                                            <li>Troubleshooting</li>
                                        </u>
                                    </div>
                                    <div>
                                        <h3>Technical Skills</h3>
                                        <u>
                                         <li>Bootstrap, PHP, Sublime, Joomla</li>
                                         <li>HTML5, CSS, Microsoft Office</li>
                                         <li>Angular JS (learning), LAMP and WAMP</li>
                                         <li>Databases: SQL/Server, MySQL, Access</li>
                                         <li>Tools: Visio, Adobe Photoshop and Illustrator, IIS, GIT</li>     
                                        </u>
                                    </div>
                        </div>
                    </div>
                   
                </section>
                <!--//section-->

            </div>
            <!--//primary-->
            <div class="secondary col-md-4 col-sm-12 col-xs-12 col-lg-4">
                <!--sec-->
                <aside class="info aside section">
                    <div class="section-inner">
                        <h2 class="heading sr-only">Basic Information</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-marker"></i><span class="sr-only">Location:</span>Tampa, FL.</li>
                                <li><i class="fa fa-envelope-o"></i><span class="sr-only">Email:</span><a href="assets/php/contactme.php" target="_blank">prosa@prosa-developer.com</a></li>
                                
                            </ul>
                        </div>
                        <!--//content-->
                    </div>
                    <!--//section-inner-->
                </aside>
                <!--//aside-->
            
                <aside class="credits aside section">
                    <div class="section-inner">
                        <h2 class="heading">Credits</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><a href="http://getbootstrap.com/" target="_blank"><i class="fa fa-external-link"></i> Bootstrap 3.2</a></li>
                                <li><a href="http://fortawesome.github.io/Font-Awesome/" target="_blank"><i class="fa fa-external-link"></i> FontAwsome 4.1</a></li>
                                <li><a href="http://jquery.com/" target="_blank"><i class="fa fa-external-link"></i> jQuery</a></li>
                                <li><a href="http://caseyscarborough.com/projects/github-activity/" target="_blank"><i class="fa fa-external-link"></i> GitHub Activity Stream</a></li>
                                <li><a href="https://github.com/sdepold/jquery-rss" target="_blank"><i class="fa fa-external-link"></i> jQuery RSS</a></li>
                            </ul>
                            
                             </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
                
                <aside class="education aside section">
                    <div class="section-inner">
                        <h2 class="heading">Education</h2>
                        <div class="content">
                            <div class="item">                      
                                <h3 class="title"><i class="fa fa-graduation-cap"></i>BS Computer Science</h3>
                                <h4 class="university"><a class="link" href="http://www.luz.edu.ve/" target="_blank">University L.U.Z</a><span class="year">(2005-2010)</span></h4>
                            </div><!--//item-->
                            <div class="item">
                                <h3 class="title"><i class="fa fa-graduation-cap"></i> Front-End Fundamentals</h3>
                                <h4 class="university">Code-Academy <span class="year">(2015)</span></h4>
                            </div><!--//item-->
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
                                <aside class="testimonials aside section">
                    <div class="section-inner">
                        <h2 class="heading">Testimonials</h2>
                        <div class="content">
                            <div class="item">
                                <blockquote class="quote">                                  
                                    <p><i class="fa fa-quote-left"></i>Careful expert with a great skill to analyze and solve problems. Pablo Rosa is on top of his game and there is nobody that he wouldn't help. I had the pleasure to work with him during two years in the university and was impressed with the depth of programming and IT knowledge he possesses. He is very pleasant and easy to work with. Pablo Rosa is one of the most professional people one can come across with.<i class="fa fa-quote-right"></i></p>
                                </blockquote>                
                                <p class="source"><span class="name">Pedro Leon</span><br /><span class="title">PROFESOR</span></p>                                                             
                            </div><!--//item-->
                            
                            <p><a class="more-link" href="https://www.linkedin.com/in/pablorosadiaz" target="_blank"><i class="fa fa-external-link"></i> More on Linkedin</a></p> 
                            
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->
            </div>
            <!--sec-->
        </div>
        <!--//row-->
    </div>
    <!--//masonry-->

    <!-- ******FOOTER****** -->
    <footer class="footer">
        <div class="container text-center">
            <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="" target="_blank">Pablo Rosa</a> Web Developer</small>
        </div>
        <!--//container-->
    </footer>
    <!--//footer-->

    <!-- Javascript -->
    <script type="text/javascript" src="assets/plugins/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jquery-rss/dist/jquery.rss.min.js"></script>
@endsection
