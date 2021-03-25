<!-- header landing page -->
<header class="header-chavos-maria">
    <div class="container-fluid clearfix">
        <?php if ( is_active_sidebar( 'top_bar_lcdm_english' ) ) : ?>
        <?php dynamic_sidebar( 'top_bar_lcdm_english' ); ?>
        <?php endif; ?> 
        <div class="lcdm-logo-wrapper">
            <a class="lcdm-logo" href="<?php echo get_permalink( get_page_by_path( 'en-los-chavos-de-maria' ) ) ?>">
                <img alt="" src="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm-en.png' ?>" srcset="<?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm-en@2x.png 2x' ?>, <?php echo get_stylesheet_directory_uri(). '/images/los-chavos-de-maria/logo-lcdm-en@3x.png 3x' ?>"/>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="modal" data-target="#modalNavigation">
                <i class="lcdm-icon lcdm-icon-menu"></i>
            </button>
        </div>
    </div>
</header>

<div class="header-top-bar hidden-xs">
        <a href="/" class="lcdm-cpi">
            <span>
                <i class="fa fa-home"></i><br/>
            </span>
               Go to CPI Home
        </a> 
        <form action="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria-busqueda' ) ) ?>" class="form-search">
            <input type="text" class="input-medium search-query" name="q"/>
            <input type="hidden" name="lang" value="en"/>
            <button type="submit" class="btn"><i class="icon-search"></i></button>
        </form>

        <a href="<?php echo get_permalink( get_page_by_path( 'en-los-chavos-de-maria' ) ) ?>" class="btn btn-lang active">English</a>
        <a href="<?php echo get_term_link( 'los-chavos-de-maria', 'series' ) ?>" class="btn btn-lang">Español</a>
        
    </div>
    <style>

    .lcdm-cpi{
        border: 2px solid white;
        display: inline-block;
        border-radius: 15px;
        color: white;
        font-family: "Roboto Condensed",Helvetica,Arial,sans-serif;
        font-size: 14px;
        text-transform: uppercase;
        padding: 3px 20px;
        font-weight: bold;
        font-style: italic;
        display: flex;
        align-items: center;
    }

    .lcdm-cpi:hover{
        color:#000;
        text-decoration:none;
    }

    .lcdm-cpi > span{
        display:inline-block;
        font-size:26px;
        line-height:1;
        vertical-align:center;
        margin-right:7px;
    }

    .header-top-bar{
        background:#5270AF;
        display:flex;
        flex-direction: row;
        align-items: center;
        padding:20px 15px;
    }

    .header-top-bar .form-search{
        margin-left: auto;
        background: #FFF;
        border-radius: 15px;
        overflow: hidden;
        margin-right:12px;
        margin-bottom:0;
        width:25%;
        display: flex;
        align-items: center;
    }

    .header-top-bar .form-search + a{
        margin-right:12px;
    }

    .header-top-bar .form-search .btn{
        font-size: 16px;
        padding: 2px 8px;
        width:55px;
    }

    .header-top-bar .form-search .search-query{
        border:none;
        outline:0;
        width:calc(100% - 55px);
    }

    .navbar-lcdm .navbar-nav{
        text-align:center;
    }

    .navbar-lcdm .navbar-nav > li {
        float: none;
        display: inline-block;
    }

    .header-top-bar .btn-lang.active{
        background:#FFF;
        color:#000;
    }

    .btn-lang {
        background-color: #000;
        border-color: #000;
        color: #fff;
    }

    #modalNavigation .nav-lcdm-menu > li > a.btn-lang{
        color:#FFF;
    }

    </style>