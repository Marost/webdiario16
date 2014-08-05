<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="no-js ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="no-js ie8 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html dir="ltr" lang="es-ES" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>Pinfinity Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/default.css" type="text/css">
    <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css" type="text/css">

    <script src="js/modernizr.js" type="text/javascript"></script>
</head>

<body>
<header id="header">

    <div id="site-head">
        <div class="wrap group">
            <hgroup class="logo">
                <h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
            </hgroup>
        </div><!-- .wrap < #header -->
    </div><!-- #site-head -->

    <nav>
        <div class="wrap group">
            <ul id="navigation" class="group">
                <li class="current_page_item"><a href="index.php">Inicio</a></li>
                <li><a href="contact.php">Nueva publicidad</a></li>
            </ul>
        </div><!-- .wrap < nav -->
    </nav>
</header>

<div id="page">
    <section id="main">
        <div class="wrap group">
            <div id="box-container">
                <div id="entry-listing" class="group">


                    <article id="post-189" class="post-189 category-blog-posts entry box format-standard">
                        <div class="entry-content-cnt">
                            <div class="entry-content">
                                <a href="#" title="Permalink to A blog post with a featured image."></a>
                                <p>Let&#8217;s light this fire one more time, Mike, and witness this great nation at its best. The surface is fine and powdery. I can kick it up loosely with my toe. It does adhere in fine layers, like powdered charcoal, to the sole and sides of my boots. I only[...]</p>
                            </div>
                        </div>

                        <div class="entry-desc">
                            <h1><a href="#" title="Permalink to A blog post with a featured image.">A blog post with a featured image.</a></h1>
                        </div>
                    </article>


                    <article id="post-62" class="post-62 category-blog-posts entry box format-standard">
                        <div class="entry-content-cnt">
                            <div class="entry-content">
                                <a href="#" title="Permalink to A Space Odyssey"></a>
                                <p>The vehicle explodes, literally explodes, off the pad. The simulator shakes you a little bit, but the actual liftoff shakes your entire body and soul. The surface is fine and powdery. I can kick it up loosely with my toe. It does adhere in fine layers, like powdered charcoal, to the simulator shakes you a little bit, but the actual liftoff shakes your entire body and soul. [...]</p>
                            </div>
                        </div>

                        <div class="entry-desc">
                            <h1><a href="#" title="Permalink to A Space Odyssey">A Space Odyssey</a></h1>
                        </div>
                    </article>


                    <article id="post-180" class="post-180 category-quotes entry box format-quote">
                        <div class="entry-content-cnt">
                            <div class="entry-content">
                                <blockquote>
                                    <p>Not everything that can be counted counts, and not everything that counts can be counted.</p><cite><a href="#">-Albert Einstein</a></cite>
                                </blockquote>
                            </div>
                        </div>

                        <div class="entry-desc">
                            <h1><a href="#" title="Permalink to Yet another Quote">Yet another Quote</a></h1>
                        </div>
                    </article>



                </div><!-- #entry-listing -->

            </div>
        </div><!-- .wrap < #main -->
    </section><!--  #main -->

    <footer id="footer">
        <div class="wrap group">
            <div class="footer-text">
                <a href="#">Pinfinity</a> &mdash; A Pinterest like site template.
            </div>
        </div>
    </footer>
</div><!-- #page -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/jquery.isotope.js" type="text/javascript"></script>
<script src="js/jquery.fitvids.js" type="text/javascript"></script>
<script src="js/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="js/jquery.formLabels1.0.js" type="text/javascript"></script>
<script src="js/jquery.jplayer.js" type="text/javascript"></script>
<script src="js/jquery.ias.min.js" type="text/javascript"></script>

<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr-min.js"></script><![endif]-->
<script defer src="js/scripts.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery.ias({
        container   : "#entry-listing",
        item        : ".entry",
        pagination  : ".nav",
        next        : "#nextpage",
        loader  : "images/ajax-loader.gif",
        onRenderComplete: function(items) {
            var $newElems = jQuery(items).addClass("newItem");

            $newElems.hide().imagesLoaded(function(){
                if( jQuery(".flexslider").length > 0) {
                    jQuery(".flexslider").flexslider({
                        'controlNav': true,
                        'directionNav': true
                    });
                }
                jQuery(this).show();
                jQuery('#infscr-loading').fadeOut('normal');
                jQuery("#entry-listing").isotope('appended', $newElems );
                loadAudioPlayer();
            });
        }
    });
</script>
</body>
</html>