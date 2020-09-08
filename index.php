<?php
//print_r($_FILES);

//Get the uploaded file information
if($_POST['submit']=='submit')
{

//print_r($_POST);


$mail_to='hiteshraut22@gmail.com';
$subject="Hello with attachments";
$message="This is a test mail with attachment.";
$from_name="Shubhank Sharma";
$from_mail="shubhank@clipmyimages.com";
$replyto=$_POST['email'];
$eol = "<br/>";
$body="Name:".$_POST['name'].$eol;
$body.="Email:".$_POST['email'].$eol;
$body.="Phone:".$_POST['phone'].$eol;
$body.="Message:".$_POST['message'].$eol;
$eol = PHP_EOL;

$file = $path_of_uploaded_file;
$file_size = filesize($file);
$handle = fopen($file, "r");
$content = fread($handle, $file_size);
fclose($handle);

$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$filename = basename($name_of_uploaded_file);



// Basic headers
$header = "From: ".$from_name." <".$from_mail.">".$eol;
$header .= "Reply-To: ".$replyto.$eol;
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"";

// Put everything else in $message
$message = "--".$uid.$eol;
$message .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= $body.$eol;
$message .= "--".$uid.$eol;
$message .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol;
$message .= "Content-Transfer-Encoding: base64".$eol;
$message .= "Content-Disposition: attachment; filename=\"".$filename."\"".$eol;
$message .= $content.$eol;
$message .= "--".$uid."--";

if (mail($mail_to, $subject, $message, $header))
{
    echo "mail_success";
	$mail_status=true;

//    header("Location:thankyou.html");
}
else
{
    echo "mail_error";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ClipMyImage</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
   <!--  <link href='https://fonts.googleapis.com/css?family=Lato:400,900,300,300italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'> -->
    <!-- Bootstrap Core CSS -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">
  <!--   <link href='https://fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/BootstrapXL.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navstylechange.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
    <link rel="stylesheet" href="css/pure-drawer.css"/>
    <!-- Custom CSS -->
    <link rel="./fonts/stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
    <script src="js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css">
            .fadeInDown{
                    animation-delay: 350ms;
            }
          /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript, 
        if it's not present, don't show loader */
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(image/Preloader_3.gif) center no-repeat #fff;
        }
</style>


<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="disableRightClick">
    <!-- Preloader -->
    <!-- Paste this code after body tag -->
    <div class="se-pre-con"></div>
    <!-- Ends -->
    <!-- Page Navigation Content -->
    <div class="container">
        <div class="row" >
            <div class="col-lg-12 text-center">
                <div class="pure-container" data-effect="pure-effect-slide">
                    <input type="checkbox" id="pure-toggle-left" class="pure-toggle" data-toggle="left"/>
                    <label class="pure-toggle-label" for="pure-toggle-left" data-toggle-label="left"><span class="pure-toggle-icon"></span></label>
                    <nav class="pure-drawer" data-position="left">
                        <div class="menu-list" style="margin-top:90px;">
                            <ul id="menu-content" class="menu-content">
                                <li> <a href="index.php"> HOME</a></li>
                                <li> <a href="aboutus.html"> About Us</a></li>
                                <li> <a href="services.html">Services </a></li>
                                <li data-toggle="collapse" data-target="#service" class="collapsed">
                                    <a href="category.html">Category <span class="arrow"></span></a>
                                </li>  
                                    <ul class="sub-menu" id="service" style="padding-left: 30px;">
                                        <li><a href="cliping-path.html">Clipping path </a></li>
                                        <li><a href="beauty.html">Beauty fashion  </a></li>
                                        <li><a href="mannequine.html">3d mannequine </a></li>
                                         <li><a href="ecomm-shoots.html">E Commerce Shoots </a></li>
                                        <li><a href="jewellery.html">Jewellery and watch </a></li>
                                        <li><a href="masking.html">Masking</a></li>
                                    </ul>
                                <li><a href="contactus.html"> Contact Us</a></li>
                            </ul>
                        </div>    
                        <div class="social-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"  aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"  aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                    <label class="pure-overlay" for="pure-toggle-left" data-overlay="left"></label> 
                </div>
            </div>
        <!-- /.row -->
        </div>
    </div>    
    <!-- End Page Navigation Content -->
    <!-- START REVOLUTION SLIDER -->
	<div class="tp-banner-container">
		<div class="tp-banner" >
			<ul>
				<!-- SLIDE  -->
				<li data-transition="fade" data-slotamount="5" data-masterspeed="700" data-delay="3000" >
					<!-- MAIN IMAGE -->
					<img src="image/slide1.jpg"   alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
					<div class="tp-caption medium_bg_asbestos lfb"
                        data-x="right"
                        data-y=""
                        data-speed="800"
                        data-start="1100"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 6;bottom:5%;">  IMAGE'S SPAEK LOUDER THAN WORDS
					</div>
					    <button id="btns" class="tp-caption mediumlarge_light_white_center fade customout start hvr-outline-out"
                        data-x="right"
                        data-hoffset="-60"
                        data-y="bottom"
                        data-voffset="-120"
                        data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="1000"
                        data-start="500"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">HOVER HERE TO SEE BEFORE</button>
                        <div id="testDiv"></div>
				</li>

				<li data-transition="fade" data-slotamount="5" data-masterspeed="700" data-delay="3000">
					<!-- MAIN IMAGE -->
					<img src="image/slide2.jpg"   alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
					<div class="tp-caption medium_bg_asbestos lfb"
						data-x="right"
						data-y=""
						data-speed="800"
						data-start="1100"
						data-easing="Power4.easeOut"
						data-endspeed="300"
						data-endeasing="Power1.easeIn"
						data-captionhidden="off"
						style="z-index: 6;top:75%;">A PICTURE IS WORTH A THOUSAND WORDS.<br> LET IT SPEAK FOR YOU.
					</div>

					    <button id="btns2" class="tp-caption mediumlarge_light_white_center fade customout start hvr-outline-out"
                        data-x="right"
                        data-hoffset="-60"
                        data-y="bottom"
                        data-voffset="-120"
                        data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="1000"
                        data-start="500"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">HOVER HERE TO SEE BEFORE</button>
					    <div id="testDiv2"></div>
				</li>

				<!-- SLIDE  -->
				<li data-transition="fade" data-slotamount="5" data-masterspeed="700" data-delay="3000" >
					<!-- MAIN IMAGE -->
					<img src="image/slide3.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
					<div  class="tp-caption medium_bg_asbestos lfb"
						data-x="right"
						data-hoffset="-50"
						data-y="445"
						data-speed="800"
						data-start="1100"
						data-easing="Power4.easeOut"
						data-endspeed="300"
						data-endeasing="Power1.easeIn"
						data-captionhidden="off"
						style="z-index: 6;top:75%;">  THE BEAUTY OF AN IMAGE LIES IN THE DETAILS.<br> WE ENHANCE THEM FOR YOU.
                        
					</div>
					    <button id="btns3" class="tp-caption mediumlarge_light_white_center fade customout start  hvr-outline-out"
                        data-x="right"
                        data-hoffset="-60"
                        data-y="bottom"
                        data-voffset="-120"
                        data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="1000"
                        data-start="500"
                        data-easing="Back.easeInOut"
                        data-endspeed="300">HOVER HERE TO SEE BEFORE</button>
						<div id="testDiv3"></div>
				</li>
				<!-- SLIDE  -->
			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</div>
	<!-- END REVOLUTION SLIDER -->
	<!-- About Us -->
    <div class="container"  id="main">
    	<div class="wrapper aboutus">
            <div class="row">
                <div class="col-xl-offset-3 col-lg-offset-3 col-md-offset-2 col-xl-3 col-lg-3 col-md-4 col-sm-6 text-center">
                    <img src="image/img1.png" class="wow fadeInUpBig  grow" alt="" style="margin-bottom: 25px;"/>
                    <div class="text-right wow fadeInUpBig  grow ">
                    	<h2>ABOUT US</h2>
                      
                        <p>ClipMyImages.com is the specialist in Clipping path and Retouching solutions.<br class="media-qu" />We bring your photos alive with the 
                            finesse and expertise of an artiste.</p>
                        <div class="batns-more ">
						    <a href="aboutus.html">KNOW MORE</a>
                    	</div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-3 col-md-4 col-sm-6 text-center hideclass">
                    <img src="image/img2.png" alt="" style="margin-bottom: 30px;" class="wow fadeInUpBig  grow"/>
                    <img src="image/img3.png" alt="" class="wow fadeInUpBig  grow"/>
                </div>
            </div>
        </div>
    </div>
    <!--End  About Us -->

	<!-- Portfoilo  -->
    <div class="row" style="margin:0px;background: #ebebeb;">
        <div class="col-lg-12 text-center headings">
            <h2>PORTFOLIO</h2>
            <p>Explore a curated collection of beautiful images edited by Clipmyimages</p>
        </div>
    </div>
    <section>
        <div class="tabs tabs-style-fillup">
            <div class="content-wrap">
                <section id="section-fillup-1">
                         <figure class="cd-image-container">
                            <img src="image/b2.jpg" alt="Original Image">
                            <span class="cd-image-label" data-type="original"></span>

                            <div class="cd-resize-img"> <!-- the resizable image on top -->
                                <img src="image/b1.jpg" alt="Modified Image">
                                <span class="cd-image-label" data-type="modified"></span>
                            </div>
                            <span class="cd-handle"></span>
                        </figure> <!-- cd-image-container -->
                </section>
                <section id="section-fillup-2">
                           <figure class="cd-image-container">
                            <img src="image/Fa2.jpg" alt="Original Image">
                            <span class="cd-image-label" data-type="original"></span>

                            <div class="cd-resize-img"> <!-- the resizable image on top -->
                                <img src="image/Fa1.jpg" alt="Modified Image">
                                <span class="cd-image-label" data-type="modified"></span>
                            </div>
                            <span class="cd-handle"></span>
                        </figure> <!-- cd-image-container -->

                </section>
                <section id="section-fillup-3">
                        <figure class="cd-image-container">
                            <img src="image/mq2.jpg" alt="Original Image">
                            <span class="cd-image-label" data-type="original"></span>

                            <div class="cd-resize-img"> <!-- the resizable image on top -->
                                <img src="image/mq1.jpg" alt="Modified Image">
                                <span class="cd-image-label" data-type="modified"></span>
                            </div>
                            <span class="cd-handle"></span>
                        </figure> <!-- cd-image-container -->
                </section>
                <section id="section-fillup-4">
                         <figure class="cd-image-container">
                            <img src="image/W2.jpg" alt="Original Image">
                            <span class="cd-image-label" data-type="original"></span>

                            <div class="cd-resize-img"> <!-- the resizable image on top -->
                                <img src="image/W1.jpg" alt="Modified Image">
                                <span class="cd-image-label" data-type="modified"></span>
                            </div>
                            <span class="cd-handle"></span>
                        </figure> <!-- cd-image-container -->
                </section>
                <section id="section-fillup-5">
                        <figure class="cd-image-container">
                            <img src="image/j2.jpg" alt="Original Image">
                            <span class="cd-image-label" data-type="original"></span>

                            <div class="cd-resize-img"> <!-- the resizable image on top -->
                                <img src="image/j1.jpg" alt="Modified Image">
                                <span class="cd-image-label" data-type="modified"></span>
                            </div>
                            <span class="cd-handle"></span>
                        </figure> <!-- cd-image-container -->
                </section>

                <section id="section-fillup-6">
                      
                         <figure class="cd-image-container">
                            <img src="image/M2.jpg" alt="Original Image">
                            <span class="cd-image-label" data-type="original"></span>

                            <div class="cd-resize-img"> <!-- the resizable image on top -->
                                <img src="image/M1.jpg" alt="Modified Image">
                                <span class="cd-image-label" data-type="modified"></span>
                            </div>
                            <span class="cd-handle"></span>
                        </figure> <!-- cd-image-container -->
                </section>
            </div><!-- /content -->
            <nav>
                <ul>
                    <li>
                        <a href="#section-fillup-1" >
                        <div class="row category_thumb media-sizes" style="margin:0px" > 
                            <div class="col-xl-5 col-lg-6 text-center" style="padding:0px">
                                <img src="image/tmb1.jpg">
                            </div>
                            <div class="col-lg-6 text-center media-q" style="padding:0px">
                                <h6>Clipping <br> path</h6>
                                 <hr class="style1">
                            </div>
                        </div>
                        </a>
                        <div class="link-category">
                            <a style="color:#000;    border: none;" href="cliping-path.html">View Gallery</a>
                        </div>
                    </li>
                    <li>
                        <a href="#section-fillup-2" >
                         <div class="row category_thumb" style="margin:0px" > 
                            <div class="col-xl-5 col-lg-6 text-center" style="padding:0px">
                                <img src="image/tmb2.jpg">
                            </div>
                            <div class="col-lg-6 text-center media-q" style="padding:0px">
                                  <h6>Beauty fashion <br/>retouching</h6>
                                  <hr class="style1">
                            </div>
                        </div>
                        </a> 
                        <div class="link-category">
                            <a style="color:#000;    border: none;" href="beauty.html">View Gallery</a>
                        </div>
                   </li>
                    <li>
                        <a href="#section-fillup-3" >
                        <div class="row category_thumb" style="margin:0px" > 
                            <div class="col-xl-5 col-lg-6 text-center" style="padding:0px">
                              <img src="image/tmb3.jpg"> 
                            </div>
                            <div class="col-lg-6 text-center media-q" style="padding:0px">
                                <h6>3d <br> mannequine</h6>
                                <hr class="style1">
                            </div>
                        </div>
                        </a> 
                        <div class="link-category">
                            <a style="color:#000;border: none;" href="mannequine.html">View Gallery</a>
                        </div>
                    </li>
                    <li>
                        <a href="#section-fillup-4" > 
                        <div class="row category_thumb" style="margin:0px" > 
                            <div class="col-xl-5 col-lg-6 text-center" style="padding:0px">
                                <img src="image/tmb4.jpg">
                            </div>
                            <div class="col-lg-6 text-center media-q" style="padding:0px">
                                <h6>E Commerce <br/> Shoots</h6>
                                <hr class="style1">
                            </div>
                        </div> 
                        </a>
                        <div class="link-category">
                            <a style="color:#000;    border: none;" href="ecomm-shoots.html">View Gallery</a>
                        </div>
                    </li>
                    <li>
                        <a href="#section-fillup-5" >
                        <div class="row category_thumb" style="margin:0px" > 
                            <div class="col-xl-5 col-lg-6 text-center" style="padding:0px">
                                <img src="image/tmb5.jpg">
                            </div>
                            <div class="col-lg-6 text-center media-q" style="padding:0px">
                                <h6>Jewellery and <br/> watch </h6>
                                <hr class="style1">
                            </div>
                        </div>
                        </a> 
                        <div class="link-category">
                            <a style="color:#000;    border: none;" href="jewellery.html">View Gallery</a>
                        </div>
                    </li>
                    <li>
                        <a href="#section-fillup-6" >
                        <div class="row category_thumb" style="margin:0px" > 
                            <div class="col-xl-5 col-lg-6 text-center" style="padding:0px">
                               <img src="image/tmb6.jpg"> 
                            </div>
                            <div class="col-lg-6 text-center media-q" style="padding:0px">
                                <h6>Masking</h6>
                                <hr class="style1" style="margin-top: 17px;">
                            </div>
                        </div>
                        </a>
                        <div class="link-category">
                            <a style="color:#000;    border: none;" href="masking.html">View Gallery</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div><!-- /tabs -->
    </section>
    <!-- Portfoilo  -->
    <script type="text/javascript">
        $(document).ready(function(){
        $('.link-category').click(function() {
            var url=$(this).children('a').attr('href');
            window.location.href=url;
            // body...
        })

        })
    </script>   
    <!-- things we do -->
    <div style="background: #f8f8f8;">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12 text-center  headings-2">
                        <h2>SERVICES</h2>
                    </div>
                </div>
                <div class="row thing-we-do" id="main">
                        <div class="col-lg-4 col-md-4 col-sm-4 text-center thing-hover wow fadeInDown">
                            <img src="image/clipingicon.png" alt="" />
                            <h3>CLIPING PATH </h3>
                            <p>Get your images optimized with hand-drawn paths and careful detailing.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 text-center thing-hover wow fadeInDown">
                            <img src="image/photoedit.png" alt="" />
                            <h3>PHOTO RETOUCHING </h3>
                            <p>Fabrics, garments, jewellery or product shots - enhance your images with a distinct allure.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 text-center thing-hover wow fadeInDown">
                           <img src="image/beauty-retouch.png" alt="" />
                           <h3>BEAUTY RETOUCHING</h3>
                           <p>Show the ‘radiant’ you in those exotic portraits and fashion portfolios.</p>
                        </div>
                </div>
                <div class="row thing-we-do" id="main" style="margin-top: 0px;">
                        <div class="col-lg-4 col-md-4 col-sm-4  text-center thing-hover wow fadeInDown">
                            <img src="image/masking.png" alt="" />
                            <h3>MASKING</h3>
                            <p>Add effects, hide layers, blend your images in a pretty background!</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 text-center thing-hover wow fadeInDown">
                            <img src="image/photoedit2.png" alt="" />
                            <h3>PHOTO EDITING</h3>
                            <p>With colour correction, natural shadows, turn your pics into captivating shots.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 text-center thing-hover wow fadeInDown">
                           <img src="image/removal.png" alt="" />
                           <h3>BACKGROUND REMOVAL  </h3>
                           <p>Remove unwanted back drops and put your products into eye-catchy settings.</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--end things we do -->
   
     <!--Testimonial  -->
   
    <div style="background: #ebebeb;">
        <div class="container">
            <div class="row" id="main">
                <div class="col-md-12 wow fadeInDown" data-wow-delay="0.2s" >
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner text-center">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <img src="image/testimonial/viktor.png">
                                            <small>Viktor Harmens</small>
                                            <small>Design and webdevelopment at KV Media</small>
                                            <p>ClipMyImages is very reliable and fast in all retouching services we use and have used them for the last 5 years .When I send them the images they are back within 24 hours. The quality is perfect even with images with a lot of hair (portraits). I highly recommend the service of ClipMyImages. <i class="fa fa-quote-right" aria-hidden="true" style="margin-left: 15px;"></i> </p>

                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <img src="image/testimonial/daniel.png">
                                            <small>Daniel Quat</small>
                                            <small>Manager/Chief Photographer at Daniel Quat Photography, LLC.</small>
                                            <p>ClipMyImages has been an intricate part of my success formula for over a year. Richard's company has a number of excellent photoshop experts I imagine as the retouching he produces is top drawer and makes me look good at a price I can afford. He turns around work very quickly and is very open to making adjustments if they are needed. I highly recommend his work to any photographers wanting to make their life easier by having someone else do some of the retouching. Great Going Clip my Images!!!<i class="fa fa-quote-right" aria-hidden="true" style="margin-left: 15px;"></i> </p>
                                          
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <img src="image/testimonial/phil.png">
                                            <small>Phil Barnett</small>
                                            <small>Owner, PJB Photography Limited</small>
                                            <p>I have used CMI for over three years now and found them to be excellent every time. They deliver very high images quickly and at great value for money. I have even used them for complex album design work and found the results to be fantastic. I would not hesitate in recommending them and I am about to use them again on another major project. Very happy!!! <i class="fa fa-quote-right" aria-hidden="true" style="margin-left: 15px;"></i></p>

                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                               <!-- Quote 4 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <img src="image/testimonial/olivier.png" >
                                            <small>Olivier Brauman</small>
                                            <small>Fashion & Beauty photographer and Film maker</small>
                                            <p>I worked with ClipMy Images several times in the last 5 years  I never had problem with their jobs and the no  delays. They are a expert in high end fashion and model retouching and they are very good with there work.As we say in France, you can work with them 'les yeux fermés"
                                        <i class="fa fa-quote-right" aria-hidden="true" style="margin-left: 15px;"></i></p>

                                        </div>
                                    </div>
                                </blockquote>
                            </div>

                               <!-- Quote 5 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <img src="image/testimonial/john.png" >
                                            <small>John Lyons</small>
                                            <small>Visual Psychologist - Creating Commercial Images to Capture Attention!</small>
                                            <p>I have tested many non-UK re-touching companies and Richard is the best I have encountered. "Clip My Images" maintains the security and confidentiality of my client-images at all times, whilst providing an excellent quality re-touching service within an attractive time-scale. They have impressed me time and again and I have recommended them to my colleagues all over the world. I am very happy to be able to give this testimonial to the quality of their work today. I wish them well with their continued business<i class="fa fa-quote-right" aria-hidden="true" style="margin-left: 15px;"></i></p>

                                        </div>
                                    </div>
                                </blockquote>
                            </div>

                                <!-- Quote 6 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <img src="image/testimonial/bill.png" >
                                            <small>Bill Allen</small>
                                            <small>headshots-by-bill.com</small>
                                            <p>Just a word of endorsement of Richard  @ www.clipmyimage.com I have been a professional portrait photographer since 1953 when i moved to Hollywood to study under the great William Mortensen. Needless to say, when it comes to my work, I am somewhat of a perfectionist. I trust Richard and CMI with all my portrait retouching. He is an excellent graphic artist. His work is flawless and his prices are more than reasonable. Try him, you will be pleased you did. <i class="fa fa-quote-right" aria-hidden="true" style="margin-left: 15px;"></i></p>

                                        </div>
                                    </div>
                                </blockquote>
                            </div>

                                 <!-- Quote 7 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <img src="image/testimonial/tom.png" >
                                            <small>Tom Waugh</small>
                                            <small>Photographer</small>
                                            <p>I came across Clipmyimages  quite by accident and I am so glad that I did! 
                                                Initially I used him and his team for some batch image clipping on a rush job. We discussed my needs over Skype and Richards team did the work in an astoundingly fast time and produced superb results. 
                                                I recommend him to all my other photographic colleagues without hesitation.
                                                 <i class="fa fa-quote-right" aria-hidden="true" style="margin-left: 15px;"></i></p>

                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Carousel Buttons Next/Prev -->
                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End  Testimonial -->

    <!--Get started  -->
 
    <div class="container" id="main">
   	  <div class="wrapper get-st" id="attach-file">
        <div class="row wow fadeInDown  get-start"  >
                <div class="col-lg-offset-2 col-md-offset-1 col-lg-8 col-md-10 col-sm-12 text-center get-starts">
                    <h2>GET STARTED</h2>
                    <p style="font-size: 16px;">Let us make your photos truly incredible! Be it a product shot, selfie pic or group photo, send it to us
                        and we will turn it into a captivating masterpiece! Don’t believe us, try it out for free</p>
                </div>
        </div>
        <form method="POST" name="email_form_attachment" action="" enctype="multipart/form-data"> 
            <div class="row get-start wow fadeInDown">
                <div class="col-lg-offset-4 col-md-offset-3 col-lg-4 col-md-6  col-sm-12">
                    <h6>Full Name:</h6>
                    <input  type="text" name="name"  />
                    <h6>E-mail:</h6>
                    <input type="email" name="email"  />
                    <h6>Mobile:</h6>
                    <input type="number" name="phone"   />
                    <h6>Message:</h6>
                    <textarea rows="4" name="message" ></textarea>
                  
                    <div class="col-xl-12 col-lg-12 col-md-12 upload-f col-xs-12" style="padding:0px;">
                        <div style="display: inline-block;float: left;width:60%;">
                            <input id="uploadFile" disabled="disabled" class="uploadfile" />
                            <div class="fileUpload batns">
                                <span style="float: right;background:#fff;padding: 5px 10px;border: 1px solid #7d7d7d;"><img src="image/attach-icon.png" style="height:20px;width:20px;"> Attach</span>
                                <input id="uploadBtn" type="file" name="uploaded_file" class="upload" />
                            </div>
                        </div>
                        <div style="display: inline-block;float: right;">
                            <input type="submit" class="submit-btn" value="Submit" name='submit' id="image-button">
                        </div>
                    </div>
					<?php
						if(isset($mail_status) && $mail_status)
							{
							echo '<div class="email_status">Thank you. Message sent successfully. </div>';
							}
					?>

					<!--  <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 " style="padding: 0;width:90px;float:right;">
                            <input type="submit" value="Submit" name='submit'><!- <img src="image/submit-icon.png" style="height:20px;width:20px;">  
                    </div> -->
                </div>
            </div>
        </form>
      </div>
    </div>
   
    <!--End Get started  -->

    <!--footer  -->
    <footer>
        <div class="container">
            <div class="row" style="padding:20px 20px 40px;">
                <div class="col-xl-offset-3 col-lg-offset-2 col-md-offset-2 col-xl-1 col-lg-2 col-md-2 col-sm-3" >
                    <h5><a href="aboutus.html">About Us</a></h5>
                    <h5><a href="category.html">Portfolio</a></h5>
                    <h5><a href="services.html">Services</a></h5>
                    <h5><a href="contactus.html">Contact Us</a></h5>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 text-center foot-border">
                    <h5 style="margin: 0;"> <a href="index.php" ><img src="image/logo-bottom.png" alt="clipmyimages" class="foot-logo" ></a></h5>
                    <h5><a href="#!" class="webname">CLIPMYIMAGES.COM</a></h5>
                    <h5><a href="#!">Privacy Policy</a> | <a href="#!">Terms & Conditions</a> | <a href="#!">Services Policies</a></h5>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-2 col-sm-3 foot-social" >
                    <ul>
                        <li><a href="https://www.facebook.com/clipmyimages/" target="_blank"><i class="fa fa-facebook"  aria-hidden="true"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"  aria-hidden="true"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter"  aria-hidden="true"></i></a></li>
                        <li><a href="https://in.linkedin.com/in/richard-cmi-3a693235" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--end footer  -->

    <div id="info" class="hidden-xs hidden-sm">
        <div class="row">
            <div class="col-lg-12 text-center">
            <h4 style="font-size:14px;">Try us for free by uploading an image here! <a id="down-last" href="#attach-file" style="background:#FFF;color: #000;border: 1px solid #000;padding:2px 20px;margin-left: 20px;">Try Us </a></h4>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.1 -->
   <!--  <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script> 
	<script type="text/javascript">
            var revapi;
            jQuery(document).ready(function() {
                   revapi = jQuery('.tp-banner').revolution(
                    {
                        delay:15000,
                        startwidth:1170,
                        startheight:500,
                        hideThumbs:10,
                        fullWidth:"off",
                        fullScreen:"on",
                        fullScreenOffsetContainer: ""
                    });
            });	//ready
    </script>
	
    <script src="js/jquery.mobile.custom.min.js"></script>  <!-- Resource jQuery -->
    <script src="js/main.js"></script> <!-- Resource jQuery -->
    <script src="js/cbpFWTabs.js"></script>
    <script>
        (function() {

            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });

        })();
	   
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script>
    <script src="js/wow.js"></script>
    <script>
          
            new WOW().init();
          
    </script>
    <script>
        $(document).ready(function(){
          // Add smooth scrolling to all links
          $("#down-last").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top 
              }, 800, function(){
           
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
        });
    </script>
    <script type="text/javascript">
        function doSearch(text) {
        if (window.find && window.getSelection) {
        document.designMode = "on";
        var sel = window.getSelection();
        sel.collapse(document.body, 0);

        while (window.find(text)) {
            document.getElementById("button").blur();
            document.execCommand("HiliteColor", false, "yellow");
            sel.collapseToEnd();
        }
        document.designMode = "off";
        } else if (document.body.createTextRange) {
        var textRange = document.body.createTextRange();
        while (textRange.findText(text)) {
            textRange.execCommand("BackColor", false, "yellow");
            textRange.collapse(false);
        }
        }
        }
    </script>

    <script type="text/javascript">
        $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({
        'overflow': 'visible'
        });
        })
    </script>
       <script type="text/javascript">
        $('.disableRightClick').on("contextmenu",function(e){
        // alert('right click disabled');
        return false;
    });
    </script>
   

</body>

</html>
