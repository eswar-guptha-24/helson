<?php
include('header.php');
?>
<style>
    .full-width-header .rs-header.header-transparent {
    position: relative;
}
.error {
    color: red;
    margin-bottom: 10px;
}
.success{
    color:green;
    margin-bottom:10px;
}
    </style>
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs img3">
            <div class="breadcrumbs-inner text-center">
                <h1 class="page-title">Careers</h1>
                <ul>
                    <li>
                        <a class="active" href="index.php">Home</a>
                    </li>
                    <li>Careers</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

                    <!-- Contact Section Start -->
                    <div class="rs-contact pt-120 md-pt-80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 pl-70 md-pl-15 md-pb-40 pb-80">
                            <div class="contact-widget">
                               <div class="sec-title2 mb-40">
                                   <span class="sub-text contact mb-15 text-center">Get In Touch</span>
                                   <h2 class="title testi-title text-center">We're Ready To Help You Send Us Message.
</h2>
                               </div>
                                <div id="careers-form-messages"></div>
                                <form id="careers-form" method="post" action="careersMailer.php" enctype= "multipart/form-data"> 
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                                <input class="from-control" type="text" id="name" name="name" placeholder="Name" required="">
                                            </div> 
                                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                                <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail" required="">
                                            </div>   
                                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                                <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone Number" required="">
                                            </div>   
                                            <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                                <input class="from-control" type="file" id="file" name="file" placeholder="Your Resume" required="">
                                            </div>
                                      
                                            <div class="col-lg-12 mb-30">
                                                <textarea class="from-control" id="message" name="message" placeholder="Your message Here"></textarea>
                                            </div>
                                        </div>
                                        <div class="btn-part">                                            
                                            <div class="form-group mb-0">
                                                <input class="readon learn-more submit" type="submit" value="Submit Now">
                                            </div>
                                        </div> 
                                    </fieldset>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Section Start -->

        </div> 
        <!-- Main content End -->
<?php
include('footer.php');
?>