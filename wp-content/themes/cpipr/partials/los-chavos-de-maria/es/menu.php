<!-- menu landing page -->
<?php global $lcdm_navbar_theme, $lcdm_active_menu; ?>
<?php $lcdm_navbar_theme = isset($lcdm_navbar_theme) ? $lcdm_navbar_theme : 'light'; ?>
<?php $lcdm_active_menu = isset($lcdm_active_menu) ? $lcdm_active_menu : ''; ?>
<div class="navbar navbar-lcdm navbar-lcdm-<?php echo $lcdm_navbar_theme; ?>">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-nav-lcdm">
                <li class="<?php echo $lcdm_active_menu == 'historias' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-historias' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-historias"></i>
                        <span>HISTORIAS</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'personajes_de_la_recuperacion' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-personajes-de-la-recuperacion' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-personajes"></i>
                        <span>PERSONAJES DE LA<br/>RECUPERACIÓN</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'mapas_de_la_recuperacion' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-mapas-de-la-recuperacion' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-mapa"></i>
                        <span>MAPA DE LA<br/>RECUPERACIÓN</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'graficas' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-graficas' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-graficas"></i>
                        <span>GRÁFICAS</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'documentos' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-documentos' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-documentos"></i>
                        <span>DOCUMENTOS</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'videos' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-videos' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-videos"></i>
                        <span>VIDEOS</span>
                    </a>
                </li>                
                <li class="<?php echo $lcdm_active_menu == 'glosario' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-glosario' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-glosario"></i>
                        <span>GLOSARIO</span>
                    </a>
                </li>
                <li class="lcdm-form-search">
                    <form action="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria-busqueda' ) ) ?>" class="form-search">
                        <input type="text" class="input-medium search-query" name="q"/>
                        <input type="hidden" name="lang" value="es"/>
                        <button type="submit" class="btn"><i class="icon-search"></i></button>
                    </form>
                    <a href="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria' ) ) ?>" class="btn btn-lang active">Español</a>
                    <a href="<?php echo get_permalink( get_page_by_path( 'en-los-chavos-de-maria' ) ) ?>" class="btn btn-lang">English</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade modal-fullscreen modal-lcdm-menu" id="modalNavigation" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"><i class="lcdm-icon lcdm-icon-close"></i></button>
            <div class="lcdm-form-search">
                <form action="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria-busqueda' ) ) ?>" class="form-search">
                    <input type="text" class="input-medium search-query" name="q"/>
                    <input type="hidden" name="lang" value="es"/>
                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                </form>
            </div>
        </div>
        <div class="modal-body clearfix">
            <ul class="nav nav-lcdm-menu">
                <li class="<?php echo $lcdm_active_menu == 'historias' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-historias' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-historias"></i>
                        <span>HISTORIAS<br/>&nbsp;</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'personajes_de_la_recuperacion' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-personajes-de-la-recuperacion' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-personajes"></i>
                        <span>PERSONAJES DE LA<br/>RECUPERACIÓN</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'mapas_de_la_recuperacion' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-mapas-de-la-recuperacion' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-mapa"></i>
                        <span>MAPA DE LA<br/>RECUPERACIÓN</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'graficas' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-graficas' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-graficas"></i>
                        <span>GRÁFICAS<br/>&nbsp;</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'documentos' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-documentos' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-documentos"></i>
                        <span>DOCUMENTOS</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'videos' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-videos' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-videos"></i>
                        <span>VIDEOS</span>
                    </a>
                </li>
                <li class="<?php echo $lcdm_active_menu == 'glosario' ? 'active' : '' ?>">
                    <a href="<?php echo get_permalink( get_page_by_path( 'lcdm-glosario' ) ) ?>">
                        <i class="lcdm-icon lcdm-icon-glosario"></i>
                        <span>GLOSARIO</span>
                    </a>
                </li>
                <li class="lcdm-lang-switcher">
                    <a href="<?php echo get_permalink( get_page_by_path( 'los-chavos-de-maria' ) ) ?>" class="btn btn-lang active">Español</a>
                    <a href="<?php echo get_permalink( get_page_by_path( 'en-los-chavos-de-maria' ) ) ?>" class="btn btn-lang">English</a>
                </li>
            </ul>
        </div>
    </div>
  </div>
</div>