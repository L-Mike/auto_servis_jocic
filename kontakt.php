<?php

// require 'phpmailer/class.phpmailer.php';
// require 'phpmailer/class.phpmaileroauth.php';
// require 'phpmailer/class.phpmaileroauthgoogle.php';
// require 'phpmailer/class.pop3.php';
// require 'phpmailer/class.smtp.php';
require 'phpmailer/PHPMailerAutoload.php';

$msg = "";
if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_text']) && isset($_POST['contact_phone'])) {
    $contact_name = $_POST['contact_name'];
    $contact_email = $_POST['contact_email'];
    $contact_text = $_POST['contact_text'];
    $contact_phone = $_POST['contact_phone'];
    
    if(!empty($contact_name) && !empty($contact_email) && !empty($contact_text)) {
        if(strlen($contact_name)>25 || strlen($contact_email)>50 || strlen($contact_text)>1000) {
        $msg = '<div class="alert alert-danger">Prekoračili ste maksimalan broj karaktera za neko od polja.</div>';
    } else {

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.autoservisjocic.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'contact@autoservisjocic.com';                 // SMTP username
            $mail->Password = '1101988710134';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom($contact_email);
            $mail->addAddress('contact@autoservisjocic.com');
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Poruka sa web sajta';
            $mail->Body = 'Ime: ' . '<strong>' . $contact_name . '</strong>' . '<br>' . 'E-mail: ' . '<strong>' . $contact_email . '</strong>' . '<br>' . 'Telefon: ' . '<strong>' . $contact_phone . '</strong>' . '<br>' . 'Poruka: ' . '<strong>' . $contact_text . '</strong>';
            $mail->AltBody = $contact_text;
        
            $mail->send();
            $msg = '<div class="alert alert-success">Hvala Vam što ste nas kontaktirali. Vaš Auto Servis Jočić.</div>';
        } catch (Exception $e) {
            $msg = '<div class="alert alert-danger">Došlo je do greške. Molimo Vas, pokušajte ponovo.</div>';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
}

?>

<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">

<head>
    <meta charset="UTF-8">
    <title>Kontakt - Auto Servis Jočić</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Plugin Global Hide Admin Tool Bar Active-->
    <!-- This website is patched against a big problem not solved from WordPress 3.3+ to date -->
    <!-- SEO Ultimate (http://www.seodesignsolutions.com/wordpress-seo/) -->
    <meta name="description" content="Kompanija Auto Šlep Jočić uspešno posluje već dugi niz godina. Naša kompanija se bavi prevozom svih vrsta: putničkih, poluteretnih, teretnih, havarisanih i nesispravnih vozila, kao i svih vrsta plovnih objekata, mašina, bagera i traktora.">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Kontakt - Auto Servis Jočić">
    <meta property="og:description" content="Kompanija Auto Šlep Jočić uspešno posluje već dugi niz godina. Naša kompanija se bavi prevozom svih vrsta: putničkih, poluteretnih, teretnih, havarisanih i nesispravnih vozila, kao i svih vrsta plovnih objekata, mašina, bagera i traktora.">
    <meta property="og:url" content="https://autoservisjocic.com/">
    <meta property="og:site_name" content="Auto Servis Jočić">
    <meta property="og:image" content=""/>
    <meta name="twitter:card" content="summary">
    <!-- Code Inserter module -->
    <meta name="google-site-verification" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
    <link rel="stylesheet" id="siteorigin-panels-front-css" href="https://reynoldstowinginc.com/wp-content/plugins/siteorigin-panels/css/front.css?ver=2.4.21" type="text/css" media="all">
    <link rel="stylesheet" id="child-theme-css" href="css/styles.css" type="text/css" media="all">
    <link rel="stylesheet" id="jquery-ui-css" href="https://reynoldstowinginc.com/wp-content/plugins/accordions/assets/frontend/css/jquery-ui.min.css?ver=4.7.5" type="text/css" media="all">
    <link rel="stylesheet" id="accordions_style-css" href="https://reynoldstowinginc.com/wp-content/plugins/accordions/assets/frontend/css/style.css?ver=4.7.5" type="text/css" media="all">
    <link rel="stylesheet" id="accordions_themes.style-css" href="https://reynoldstowinginc.com/wp-content/plugins/accordions/assets/global/css/themes.style.css?ver=4.7.5" type="text/css" media="all">
    <link rel="stylesheet" id="accordions_themes.Tabs.style-css" href="https://reynoldstowinginc.com/wp-content/plugins/accordions/assets/global/css/themesTabs.style.css?ver=4.7.5" type="text/css" media="all">
    <link rel="stylesheet" id="font-awesome-css" href="css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="edsanimate-animo-css-css" href="https://reynoldstowinginc.com/wp-content/plugins/animate-it/assets/css/animate-animo.css?ver=4.7.5" type="text/css" media="all">
    <link rel="stylesheet" id="contact-form-7-css" href="https://reynoldstowinginc.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.6" type="text/css" media="all">
    <link rel="stylesheet" id="bwg_frontend-css" href="https://reynoldstowinginc.com/wp-content/plugins/photo-gallery/css/bwg_frontend.css?ver=1.3.27" type="text/css" media="all">
    <link rel="stylesheet" id="bwg_font-awesome-css" href="css/font-awesome.css" type="text/css" media="all">
    <link rel="stylesheet" id="sow-button-base-css" href="css/styles.css" type="text/css" media="all">
    <link rel="stylesheet" id="sow-button-atom-c72dbf736e48-css" href="css/styles.css" type="text/css" media="all">
    <link rel="stylesheet" id="gsfw-stylesheet-css" href="https://reynoldstowinginc.com/wp-content/plugins/genesis-variable-footer-widgets/css/style.min.css?ver=1.1" type="text/css" media="all">
    <link rel="stylesheet" id="simple-social-icons-font-css" href="https://reynoldstowinginc.com/wp-content/plugins/simple-social-icons/css/style.css?ver=2.0.1" type="text/css" media="all">
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/jquery/jquery.js?ver=1.12.4"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/sticky-menu-or-anything-on-scroll/assets/js/jq-sticky-anything.min.js?ver=2.0.1"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/themes/genesis/lib/js/skip-links.js?ver=4.7.5"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/simple-social-icons/svgxuse.js?ver=1.1.21"></script>
    <link rel="https://api.w.org/" href="https://reynoldstowinginc.com/wp-json/">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://reynoldstowinginc.com/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://reynoldstowinginc.com/wp-includes/wlwmanifest.xml">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Fauna+One" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#000000">
    <meta name="theme-color" content="#000000">
</head>

<body class="home page-template-default page page-id-2 siteorigin-panels siteorigin-panels-home header-image nolayout" itemscope="" itemtype="http://schema.org/WebPage" style="overflow-x: hidden;">
    <div class="site-container">

        <div style="position:relative;z-index: 100;" class="animated bounceInDown duration3 delay0">
            <header class="site-header" itemscope="" itemtype="http://schema.org/WPHeader">
                <div class="wrap">
                    <div class="title-area">
                        <a href="index"><img src="images/logo.png"></a>
                    </div>
                    <div class="widget-area header-widget-area">
                        <section id="simple-social-icons-3" class="widget-1 widget-first widget-odd header-widget-1   animated slideInDown delay1 duration3 widget simple-social-icons">
                            <div class="widget-1 widget-first widget-odd widget-wrap">
                                <ul class="aligncenter">
                                    <li class="ssi-facebook">
                                        <a href="#" target="_blank" style="background-color: #3B5998;">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="ssi-twitter">
                                        <a href="#" target="_blank" style="background-color: #00aced;">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="ssi-youtube">
                                        <a href="#" target="_blank" style="background-color: #bb0000;">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>
                        <section id="sow-editor-3" class="widget-2 widget-last widget-even header-widget-2    widget widget_sow-editor">
                            <div class="widget-2 widget-last widget-even widget-wrap">
                                <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                    <div class="siteorigin-widget-tinymce textwidget">
                                        <div class="animated fadeInLeftBig delay1 duration3"><strong style="font-family: Oswald; text-transform: uppercase;">24/7 pomoć na putu</strong>
                                            <br> <strong><font size="6"><a href="tel: +381600987987"><span class="fa fa-phone fa-lg" style="color: #fc7d20"></span> 0600-987-987</a></font></strong>
                                            <br> <strong><font size="4"><a href="mailto: auto.slep.jocic@gmail.com"><span class="fa fa-envelope fa-lg" style="color: #fc7d20"></span> auto.slep.jocic@gmail.com</a></font></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </header>
            <div class="container">
                <nav class="navbar navbar-inverse" style="background-color: #000;">
                    <ul class="nav navbar-nav navbar-right languages">
                      <li class="active"><a href="#" hreflang="RS" style="color: #fc7d20; font-family: Oswald; font-weight: bold; padding: 4px;"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/flags/4x3/rs.svg" style="height: 36px; width: 36px;"><small> SR</small></a></li>
                      <li><a class="languages-link" href="en/home" hreflang="EN" style="color: #fc7d20;"><img src="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/flags/4x3/gb.svg" style="height: 36px; width: 36px;"> <small> EN</small></a></li>
                    </ul>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color: #000; border: 2px solid #fc7d20; outline: none;">
                            <span class="icon-bar" style="background-color: #fc7d20;"></span>
                            <span class="icon-bar" style="background-color: #fc7d20;"></span>
                            <span class="icon-bar" style="background-color: #fc7d20;"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav nav-menu">
                            <li><a class="menu-link" href="index">POČETNA</a></li>
                            <li><a class="menu-link" href="o-nama">O NAMA</a></li>
                            <li><a class="menu-link" href="foto-galerija">FOTO GALERIJA</a></li>
                            <li><a class="menu-link" href="video-galerija">VIDEO GALERIJA</a></li>
                            <li><a class="menu-link" href="utisci">UTISCI</a></li>
                            <li class="active"><a href="kontakt" style="background-color: #fc7d20; color: #000; border-bottom: 2px solid #fff; border-right: 2px solid #fff; font-family: Oswald; font-weight: bold;">KONTAKT</a></li>
                        </ul>
                    </div>
            </nav>
            </div>
        </div>
        <div class="site-inner">
            <div class="content-sidebar-wrap">
                <main class="content" id="genesis-content">
                    <article class="post-2 page type-page status-publish entry" itemscope="" itemtype="http://schema.org/CreativeWork">
                        <div class="entry-content" itemprop="text">
                            <div id="pl-2">
                                <div class="panel-grid" id="home-1">
                                    <div class="panel-row-style-animatedslideInRightdelay2duration6  animated slideInRight delay2 duration6 panel-row-style" style="border-left: 1px solid rgba(255, 255, 255, 0.5);border-right: 1px solid rgba(255, 255, 255, 0.5);border-top: 1px solid rgba(255, 255, 255, 0.5);padding: 60px 0px;background-color:#757575;background-image: url('images/hero_image.png');background-size: cover;"> </div>
                                </div>
                                <div class="panel-grid" id="home-2">
                                    <div style="padding: 30px 60px;background-color:#000;" class="panel-row-style">
                                        <div class="panel-grid-cell" id="pgc-2-home-2-0">
                                            <div class="so-panel widget widget_sow-editor panel-first-child" id="panel-2-1-0-0" data-index="1">
                                                <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                                    <h3 class="widget-title" style="font-size: 34px;"><strong>KONTAKT</strong></h3>
                                                    <div class="siteorigin-widget-tinymce textwidget"> </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <?php echo $msg ?>
                                                        <form method="post" action="kontakt.php">
                                                            <input type="text" placeholder="Ime" name="contact_name" maxlength="25" style="width: 100%; margin-bottom: 20px;">
                                                            <br>
                                                            <input type="email" placeholder="E-mail adresa" name="contact_email" maxlength="50" style="width: 100%; margin-bottom: 20px;">
                                                            <br>
                                                            <input type="phone" placeholder="Kontakt telefon" name="contact_phone" maxlength="50" style="width: 100%; margin-bottom: 20px;">
                                                            <br>
                                                            <textarea placeholder="Vaša poruka..." name="contact_text" maxlength="1000" style="width: 100%; margin-bottom: 20px;"></textarea>
                                                            <br>
                                                            <input type="submit" value="POŠALJI" id="submit">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
                <aside class="sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar" id="genesis-sidebar-primary">
                    <h2 class="genesis-sidebar-title screen-reader-text">Primary Sidebar</h2>
                </aside>
            </div>
            <aside class="sidebar sidebar-secondary widget-area" role="complementary" aria-label="Secondary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar" id="genesis-sidebar-secondary">
                <h2 class="genesis-sidebar-title screen-reader-text">Secondary Sidebar</h2>
            </aside>
        </div>
        <div class="contact-section">
            <div class="wrap"> </div>
        </div>
        <div class="footer-widgets gsfw-footer-widgets-3" id="genesis-footer-widgets">
            <div class="wrap">
                <div class="footer-widgets-1 widget-area">
                    <section id="sow-editor-6" class="widget-1 widget-first widget-odd   widget widget_sow-editor">
                        <div class="widget-1 widget-first widget-odd widget-wrap">
                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                <div class="siteorigin-widget-tinymce textwidget">
                                    <div class="footer-header-title-1">KONTAKT</div>
                                    <div class="footer-phone-image">
                                        <div class="footer-phone-2-last">
                                            <strong style="color: #fc7d20;"><font size="5">Tel: <a href="tel: +381600987987">0600-987-987</a></font></strong></div>
                                    </div>
                                    <div class="footer-address-image">
                                        <div class="footer-address-1-last"><strong style="color: #fc7d20;">Lokacija:</strong></div>
                                        <div class="footer-address-2-last"><strong style="color: #fc7d20;">Cara Dušana 262, Zemun</strong></div>
                                        <div class="footer-address-3-last"><strong style="color: #fc7d20;">Beograd, Srbija</strong></div>
                                    </div>
                                    <div class="footer-email-image">
                                        <div class="footer-email-1-last"><strong style="color: #fc7d20;">E-mail:</strong></div>
                                        <div class="footer-email-2-last"><strong><a href="mailto: auto.slep.jocic@gmail.com">auto.slep.jocic.@gmail.com</a></strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="simple-social-icons-4" class="widget-2 widget-last widget-even widget simple-social-icons">
                        <div class="widget-2 widget-last widget-even widget-wrap">
                            <ul class="aligncenter">
                                    <li class="ssi-facebook">
                                        <a href="#" target="_blank" style="background-color: #3B5998;">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="ssi-twitter">
                                        <a href="#" target="_blank" style="background-color: #00aced;">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="ssi-youtube">
                                        <a href="#" target="_blank" style="background-color: #bb0000;">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="footer-widgets-2 widget-area">
                    <section id="sow-editor-5" class="widget-1 widget-first widget-last widget-odd   widget widget_sow-editor">
                        <div class="widget-1 widget-first widget-last widget-odd widget-wrap">
                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                <div class="siteorigin-widget-tinymce textwidget">
                                    <div class="footer-header-title-1">MAPA</div>
                                    <div class="embed-responsive embed-responsive-4by3">
                                      <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2828.145203942084!2d20.376416015212296!3d44.859338679098364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a642b25229ab7%3A0xd9cf275875424b9c!2sAUTO+SERVIS!5e0!3m2!1sen!2srs!4v1496437527173" width="600" height="450" frameborder="0" style="border:0" allowfullscreen>
                                      </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="footer-widgets-3 widget-area">
                    <section id="sow-editor-6" class="widget-1 widget-first widget-odd   widget widget_sow-editor">
                        <div class="widget-1 widget-first widget-odd widget-wrap">
                            <div class="so-widget-sow-editor so-widget-sow-editor-base">
                                <div class="siteorigin-widget-tinymce textwidget">
                                    <div class="footer-header-title-1">PARTNERI</div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td style="border-top: none;"><img src="images/saobracajno-tehnicka-skola-zemun.png" style="height: 50px; width: 50px;" title="Saobraćajno Tehnička Škola Zemun"></td>
                                                    <td style="border-top: none;"><img src="images/parking-servis.gif" style="height: 50px; width: 50px;" title="Parking servis Beograd"></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-top: none;"><img src="images/vila-elena.jpg" style="height: 50px; width: 50px;" title="Vila Elena"></td>
                                                    <td style="border-top: none;"><img src="images/pss.jpg" style="height: 50px; width: 50px;" title="Peugeot servis Spona"></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-top: none;"><img src="images/auto-mika.png" style="height: 50px; width: 50px;" title="Auto Mika"></td>
                                                    <td style="border-top: none;"><img src="images/japanx.jpg" style="height: 50px; width: 50px;" title="Japan X"></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-top: none;"><img src="images/euro07.png" style="height: 50px; width: 50px;" title="Euro 07"></td>
                                                    <td style="border-top: none;"><img src="images/gazela.png" style="height: 50px; width: 50px;" title="Gazela Komerc"></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-top: none;"><img src="images/markoni.jpg" style="height: 50px; width: 50px;" title="Auto Biro"></td>
                                                    <td style="border-top: none;"><img src="images/gfd.png" style="height: 50px; width: 50px;" title="Gume - Felne Danko"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="site-footer" itemscope="" itemtype="http://schema.org/WPFooter">
            <div class="wrap">
                <p>Copyright ©&nbsp;2017 · AUTO SERVIS JOČIĆ</p>
            </div>
        </footer>
    </div>
    <!--Plugin Global Hide Admin Tool Bar Active-->
    <!-- This website is patched against a big problem not solved from WordPress 3.3+ to date -->
    <div class="scroll-back-to-top-wrapper"> <span class="scroll-back-to-top-inner">
					<i class="fa fa-2x fa-angle-double-up"></i>
			</span> </div>
    <script type="text/javascript">
        var recaptchaWidgets = [];
        var recaptchaCallback = function() {
            var forms = document.getElementsByTagName('form');
            var pattern = /(^|\s)g-recaptcha(\s|$)/;
            for (var i = 0; i < forms.length; i++) {
                var divs = forms[i].getElementsByTagName('div');
                for (var j = 0; j < divs.length; j++) {
                    var sitekey = divs[j].getAttribute('data-sitekey');
                    if (divs[j].className && divs[j].className.match(pattern) && sitekey) {
                        var params = {
                            'sitekey': sitekey,
                            'theme': divs[j].getAttribute('data-theme'),
                            'type': divs[j].getAttribute('data-type'),
                            'size': divs[j].getAttribute('data-size'),
                            'tabindex': divs[j].getAttribute('data-tabindex')
                        };
                        var callback = divs[j].getAttribute('data-callback');
                        if (callback && 'function' == typeof window[callback]) {
                            params['callback'] = window[callback];
                        }
                        var expired_callback = divs[j].getAttribute('data-expired-callback');
                        if (expired_callback && 'function' == typeof window[expired_callback]) {
                            params['expired-callback'] = window[expired_callback];
                        }
                        var widget_id = grecaptcha.render(divs[j], params);
                        recaptchaWidgets.push(widget_id);
                        break;
                    }
                }
            }
        }

    </script>
    <div id="su-footer-links" style="text-align: center;"></div>
    <link rel="stylesheet" id="siteorigin-widget-icon-font-fontawesome-css" href="https://reynoldstowinginc.com/wp-content/plugins/so-widgets-bundle/icons/fontawesome/style.css?ver=4.7.5" type="text/css" media="all">
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/jquery/ui/accordion.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/jquery/ui/tabs.min.js?ver=1.11.4"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/animate-it/assets/js/animo.min.js?ver=1.0.3"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/animate-it/assets/js/jquery.ba-throttle-debounce.min.js?ver=1.1"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/animate-it/assets/js/viewportchecker.js?ver=1.4.4"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/animate-it/assets/js/edsanimate.js?ver=1.4.4"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var edsanimate_options = {
            "offset": "75",
            "hide_hz_scrollbar": "1",
            "hide_vl_scrollbar": "0"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/animate-it/assets/js/edsanimate.site.js?ver=1.4.5"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var _wpcf7 = {
            "recaptcha": {
                "messages": {
                    "empty": "Please verify that you are not a robot."
                }
            }
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.6"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var scrollBackToTop = {
            "scrollDuration": "500",
            "fadeDuration": "0.5"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/scroll-back-to-top/assets/js/scroll-back-to-top.js"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var sticky_anything_engage = {
            "element": "#menu-main",
            "topspace": "0",
            "minscreenwidth": "0",
            "maxscreenwidth": "999999",
            "zindex": "1",
            "legacymode": "1",
            "dynamicmode": "",
            "debugmode": "",
            "pushup": "",
            "adminbar": "1"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/plugins/sticky-menu-or-anything-on-scroll/assets/js/stickThis.js?ver=2.0.1"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/comment-reply.min.js?ver=4.7.5"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/hoverIntent.min.js?ver=1.8.1"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/themes/genesis/lib/js/menu/superfish.min.js?ver=1.7.5"></script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-content/themes/genesis/lib/js/menu/superfish.args.min.js?ver=2.2.7"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var FB_WP = FB_WP || {};
        FB_WP.queue = {
            _methods: [],
            flushed: false,
            add: function(fn) {
                FB_WP.queue.flushed ? fn() : FB_WP.queue._methods.push(fn)
            },
            flush: function() {
                for (var fn; fn = FB_WP.queue._methods.shift();) {
                    fn()
                }
                FB_WP.queue.flushed = true
            }
        };
        window.fbAsyncInit = function() {
                FB.init({
                    "xfbml": true
                });
                if (FB_WP && FB_WP.queue && FB_WP.queue.flush) {
                    FB_WP.queue.flush()
                }
            }
            /* ]]> */

    </script>
    <script type="text/javascript">
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https:\/\/connect.facebook.net\/en_US\/all.js";
            fjs.parentNode.insertBefore(js, fjs)
        }(document, "script", "facebook-jssdk"));

    </script>
    <script type="text/javascript" src="https://reynoldstowinginc.com/wp-includes/js/wp-embed.min.js?ver=4.7.5"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&amp;render=explicit&amp;ver=2.0"></script>
    <div id="fb-root" class=" fb_reset">
        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div>
                <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/0F7S7QWJ0Ac.js?version=42#channel=f23b03c84a3f8&amp;origin=https%3A%2F%2Freynoldstowinginc.com" style="border: none;"></iframe>
            </div>
        </div>
        <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
            <div></div>
        </div>
    </div>
    <div style="background-color: #fff; border: 1px solid #ccc; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2); position: absolute; left: 0px; top: -10000px; transition: visibility 0s linear 0.3s, opacity 0.3s linear; opacity: 0; visibility: hidden; z-index: 2000000000;">
        <div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: #fff; opacity: 0.05;  filter: alpha(opacity=5)"></div>
        <div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0; height: 0; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;"></div>
        <div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0; height: 0; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;"></div>
        <div style="z-index: 2000000000; position: relative;">
            <iframe src="https://www.google.com/recaptcha/api2/bframe?hl=en&amp;v=r20170524165316&amp;k=6LcCpR0UAAAAAEPjkfyMKpGMrh8_lBr_1WavAxSk#d3jefzhyufso" title="recaptcha challenge" frameborder="0" scrolling="no" name="d3jefzhyufso" style="width: 100%; height: 100%;"></iframe>
        </div>
    </div>
</body>

</html>
