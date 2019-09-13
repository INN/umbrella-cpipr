<?php
    get_template_part('partials/los-chavos-de-maria/header');
    
    $lcdm_active_menu = 'mapas_de_la_recuperacion';
    get_template_part('partials/los-chavos-de-maria/en/header');
    get_template_part('partials/los-chavos-de-maria/en/menu');
?>


    <!-- Mapa de la recuepracion section -->
    <div class="lcdm-section lcdm-section-map">            
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span1"></div>
                <div class="span10">
                    <div class="recovery-map">
                        <div class="lcdm-dropdown clearfix">
                            <select class="nice-select">
                                <option value="Adjuntas">Adjuntas</option>
                                <option value="Aguada">Aguada</option>
                                <option value="Aguadilla">Aguadilla</option>
                                <option value="Aguas Buenas">Aguas Buenas</option>
                                <option value="Aibonito">Aibonito</option>
                                <option value="Arecibo">Arecibo</option>
                                <option value="Arroyo">Arroyo</option>
                                <option value="Añasco">Añasco</option>
                                <option value="Barceloneta">Barceloneta</option>
                                <option value="Barranquitas">Barranquitas</option>
                                <option value="Bayamón">Bayamón</option>
                                <option value="Cabo Rojo">Cabo Rojo</option>
                                <option value="Caguas">Caguas</option>
                                <option value="Camuy">Camuy</option>
                                <option value="Canóvanas">Canóvanas</option>
                                <option value="Carolina">Carolina</option>
                                <option value="Cataño">Cataño</option>
                                <option value="Cayey">Cayey</option>
                                <option value="Ceiba">Ceiba</option>
                                <option value="Ciales">Ciales</option>
                                <option value="Cidra">Cidra</option>
                                <option value="Coamo">Coamo</option>
                                <option value="Comerío">Comerío</option>
                                <option value="Corozal">Corozal</option>
                                <option value="Culebra">Culebra</option>
                                <option value="Dorado">Dorado</option>
                                <option value="Fajardo">Fajardo</option>
                                <option value="Florida">Florida</option>
                                <option value="Guayama">Guayama</option>
                                <option value="Guayanilla">Guayanilla</option>
                                <option value="Guaynabo">Guaynabo</option>
                                <option value="Gurabo">Gurabo</option>
                                <option value="Guánica">Guánica</option>
                                <option value="Hatillo">Hatillo</option>
                                <option value="Hormigueros">Hormigueros</option>
                                <option value="Humacao">Humacao</option>
                                <option value="Isabela">Isabela</option>
                                <option value="Jayuya">Jayuya</option>
                                <option value="Juana Díaz">Juana Díaz</option>
                                <option value="Juncos">Juncos</option>
                                <option value="Lajas">Lajas</option>
                                <option value="Lares">Lares</option>
                                <option value="Las Marías">Las Marías</option>
                                <option value="Las Piedras">Las Piedras</option>
                                <option value="Loíza">Loíza</option>
                                <option value="Luquillo">Luquillo</option>
                                <option value="Manatí">Manatí</option>
                                <option value="Maricao">Maricao</option>
                                <option value="Maunabo">Maunabo</option>
                                <option value="Mayagüez">Mayagüez</option>
                                <option value="Moca">Moca</option>
                                <option value="Morovis">Morovis</option>
                                <option value="Naguabo">Naguabo</option>
                                <option value="Naranjito">Naranjito</option>
                                <option value="Orocovis">Orocovis</option>
                                <option value="Patillas">Patillas</option>
                                <option value="Peñuelas">Peñuelas</option>
                                <option value="Ponce">Ponce</option>
                                <option value="Quebradillas">Quebradillas</option>
                                <option value="Rincón">Rincón</option>
                                <option value="Río Grande">Río Grande</option>
                                <option value="Sabana Grande">Sabana Grande</option>
                                <option value="Salinas">Salinas</option>
                                <option value="San Germán">San Germán</option>
                                <option value="San Juan" selected>San Juan</option>
                                <option value="San Lorenzo">San Lorenzo</option>
                                <option value="San Sebastián">San Sebastián</option>
                                <option value="Santa Isabel">Santa Isabel</option>
                                <option value="Toa Alta">Toa Alta</option>
                                <option value="Toa Baja">Toa Baja</option>
                                <option value="Trujillo Alto">Trujillo Alto</option>
                                <option value="Utuado">Utuado</option>
                                <option value="Vega Alta">Vega Alta</option>
                                <option value="Vega Baja">Vega Baja</option>
                                <option value="Vieques">Vieques</option>
                                <option value="Villalba">Villalba</option>
                                <option value="Yabucoa">Yabucoa</option>
                                <option value="Yauco">Yauco</option>
                            </select>
                        </div>
                        <div id="jsmap-puertorico" class="jsmaps-wrapper"></div>
                        <div id="jsmap-description" class="jsmaps-table-wrapper"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_template_part('partials/los-chavos-de-maria/footer'); ?>