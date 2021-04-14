<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'informe';
    get_template_part('partials/los-chavos-de-maria/es/header');
    get_template_part('partials/los-chavos-de-maria/es/menu');
?>

        <div class="owl-hero-carousel">
            <div class="owl-theme">
                <div class="owl-hero-item" style="background-color: #000">
                <video class="video-background" width="100%" height="100%" autoplay muted loop>
                    <source src="<?php echo get_stylesheet_directory_uri(); ?>/images/los-chavos-de-maria/reportes-header.mp4" type="video/mp4">
                    <source src="<?php echo get_stylesheet_directory_uri(); ?>/images/los-chavos-de-maria/reportes-header.webm" type="video/webm">
                    Your browser does not support the video tag.
                </video>
                    <!-- <div class="lcdm-owl-overlay"></div> -->

                    <div class="owl-hero-caption">
                        <div class="container-fluid">
                            <div class="owl-hero-post">
                                <div style="display: flex;flex-flow: row wrap;justify-content: space-between;align-items: flex-start;">
                                    <div style="max-width: 800px;">
                                        <h2 class="owl-hero-post-title">Sin infomarción ante el desastre:
                                        Gestión de la información para
                                        el manejo de riesgos
                                        socioambientales en Puerto Rico</h2>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-journalist">
            <div class="container-fluid">
                <p><strong>Investigadores e investigadoras:</strong></p>
                <p>Annette M. Martínez Orabona, JD, MALD // Luis A. Avilés, MPH, MS, PhD // Marinilda Rivera Díaz, MSW, PhD, MSc // Luis José Torres Asencio, JD, LLM</p>
            </div>
        </div>

        <?php $subtitle = get_post_meta(get_the_ID(), 'subtitle', true); ?>
        <?php if ($subtitle): ?>
        <div class="container-fluid lcdm-section-post-subtitle">
            <div class="lcdm-post-subtitle">
                <div class="text-holder">
                        <h4><?php echo $subtitle; ?></h4>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="iframe-holder">
            <div class="wrap">
            <iframe src="https://embed.documentcloud.org/documents/20615101-lcdm-resumen-ejecutivo/?embed=1&amp;title=1" title="LCDM - Resumen Ejecutivo (Hosted by DocumentCloud)" style="border: 1px solid #aaa;" sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-popups-to-escape-sandbox" width="700" height="905"></iframe>
            </div>
        </div>

        <div class="descarga-pdf">
            <div class="container-fluid">
                <?php $descarga_pdf_metro = get_post_meta(get_the_ID(), 'descarga_pdf_metro', true); ?>
                <?php if ($descarga_pdf_metro): ?>
                    <a class="btn btn-blue" target="_blank" href="<?php echo $descarga_pdf_metro; ?>"><i class="fa fa-download"></i>DESCARGA EL PDF METRO</a>
                <?php endif; ?>
                <?php $descarga_pdf_resumen = get_post_meta(get_the_ID(), 'descarga_pdf_resumen', true); ?>
                <?php if ($descarga_pdf_resumen): ?>
                    <a class="btn btn-blue" target="_blank" href="<?php echo $descarga_pdf_resumen; ?>"><i class="fa fa-download"></i>DESCARGA EL PDF RESUMEN</a>
                <?php endif; ?>
                <?php $descarga_pdf_completo = get_post_meta(get_the_ID(), 'descarga_pdf_completo', true); ?>
                <?php if ($descarga_pdf_completo): ?>
                    <a class="btn btn-blue" target="_blank" href="<?php echo $descarga_pdf_completo; ?>"><i class="fa fa-download"></i>DESCARGA EL PDF COMPLETO</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="lcdm-section lcdm-section-post resumen">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>
        

        <style>

        .resumen li,
        .resumen p{
            font-size:16px;
            font-family: "Roboto", Helvetica, Arial, sans-serif;
        }

        .resumen h1,
        .resumen h2,
        .resumen h3,
        .resumen h4{
            font-family: "roboto condensed bold" , Helvetica, Arial, sans-serif !important;
        }

        .resumen h6{
            font-size: 14px;
            font-weight: normal;
        }

        .resumen blockquote{
            border-left:5px solid #496FA4;
            line-height:1.1;
        }
        .resumen blockquote p{
            line-height:1.1;
            font-weight:bold;
            font-family: Merriweather;
            font-size:28px;
        }

        .descarga-pdf{
            padding:30px 15px 0;
            text-align:center;
        }

        .descarga-pdf .btn{
            font-size: 18px;
            padding: 12px 20px;
            margin:8px;
            border-radius: 35px;
            border:3px solid transparent;
        }

        .descarga-pdf .btn:hover{
            border-color:#5270AF;
            background:#FFF;
            color:#5270AF;
        }

        .descarga-pdf .btn i{
            margin-right:15px;
        }

        .hero-journalist{
            padding:20px 0;
        }

        .hero-journalist p{
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-weight: bold;
            font-style: italic;
            color:#B9B9B9;
            line-height:1.2;
            font-size:16px;
            margin:0;
        }

        .hero-journalist p strong{
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            font-weight: bold;
            font-style: italic;
            color:#000;
        }

        .lcdm-section-post-subtitle .lcdm-post-subtitle{
            border-bottom:none;
            padding-bottom:50px;
        }

        .iframe-holder{
            background:#CFCFD1;
            padding:30px 15px;
        }

        .iframe-holder .wrap{
            display:flex;
            align-content: center;
            align-items:center;
            max-width:700px;
            margin: 0 auto;
        }
        
        .iframe-holder h5{
            font-weight:normal;
            font-style:italic;
            padding-right:15px;
            font-size:18px;
            line-height:1.2;
        }

        .owl-hero-caption{
            position:relative;
        }

        .video-background{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: cover;
        }

        .text-holder{
            max-width:650px;
            margin:0 auto;
        }

        .text-holder h4{
            font-family: Merriweather,"Times New Roman",Times,serif;
            font-weight: 300;
            font-size:22px;
            padding:0;
        }

        .text-holder a{
            text-decoration:underline;
        }

        @media(min-width:1060px){
            
            .resumen h2{
                font-size:50px;
            }
        }

        @media(max-width:767px){
            .iframe-holder .wrap{
                flex-direction:column;
            }

            .iframe-holder iframe{
                width:95%;
                margin: 0 auto;
            }
        }

        
        </style>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>