(function ($) {
    function buildContractRow(row) {
        var tipo_asistencia_class = '';
        switch (row.tipo_asistencia) {
            case 'Public Assistance':
                tipo_asistencia_class = 'bg-orange';
            break;
            case 'Asistencia pública':
                tipo_asistencia_class = 'bg-orange';
            break;
            case 'Individual Assistance':
                tipo_asistencia_class = 'bg-yellow';
            break;
            case 'Asistencia individual':
                tipo_asistencia_class = 'bg-yellow';
            break;
        }
        var template =
            '<tr class="' + tipo_asistencia_class + '">' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
            '</tr>' +
            '<tr>' +
                '<td>' + row.categoria + '</td>' +
                '<td>' + numeral(row.total_obligado).format('$0,0.00') + '</td>' +
                '<td>' + numeral(row.total_desembolsado).format('$0,0.00') + '</td>' +
                '<td>' + row.fecha_ultimo_pago + '</td>' +
            '</tr>';
        return template;
    }

    function buildContractsHeader() {
        var template = '';
        switch (LCDM_LANG) {
          case 'en':
            template =
            '<thead>' +
                '<tr>' +
                    '<th>CATEGORY / PROGRAM</th>' +
                    '<th>TOTAL OBLIGATED / APPROVED</th>' +
                    '<th>TOTAL DISBURSED</th>' +
                    '<th>DATE OF LAST PAYMENT</th>' +
                '</tr>'
            '</thead>';
          break;
          default:
            template =
              '<thead>' +
                  '<tr>' +
                      '<th>CATEGORÍA / PROGRAMA</th>' +
                      '<th>TOTAL OBLIGADO / APROBADO</th>' +
                      '<th>TOTAL DESEMBOLSADO</th>' +
                      '<th>FECHA DE ÚLTIMO PAGO</th>' +
                  '</tr>'
              '</thead>';
          break;
        }
        return template;
    }

    function buildContractsTable (data, city) {
        var template = '<div class="table-scroll"><div class="table-responsive"><table>';
        template += buildContractsHeader();
        template += '<tbody>';

        for (var i=0; i < data.length; i++) {
            var row = buildContractRow(data[i]);
            template += row;
        }
        template += '</tbody>';
        template += '</table></div></div>';

        var download_link = WP_ADMIN_POST_URL + '?action=export_contracts&city=' + city + '&lang=' + LCDM_LANG;

        var downloadTxt = 'DESCARGAR';
        var updatedTxt = 'Fecha Actualización';
        if (LCDM_LANG == 'en') {
          downloadTxt = 'DOWNLOAD';
          updatedTxt = 'Updated at';
        }

        template += '<div class="contracts-export">' + 
            '<div>' + updatedTxt + ': 15/08/2019' + 
                '<a href="' + download_link + '" class="btn btn-blue" target="_blank">' + downloadTxt + '</a>' + 
            '</div>' +
        '</div>';
        return template;
    }

    function buildAssistanceLegend () {
        var template = '';
        switch (LCDM_LANG) {
          case 'en':
            template = 
              '<div class="assistance-type-legend">' +
                  '<div class="assistance-type assistance-type-th">TYPE OF<br/>ASSISTANCE</div>' +
                  '<div class="assistance-type assistance-type-icon orange"><i class="fa fa-circle"></i> Public<br/>assistance</div>' +
                  '<div class="assistance-type assistance-type-icon yellow"><i class="fa fa-circle"></i> Individual<br/>assistance</div>' +
              '</div>';
          break;
          default:
            template = 
              '<div class="assistance-type-legend">' +
                  '<div class="assistance-type assistance-type-th">TIPO DE<br/>ASISTENCIA</div>' +
                  '<div class="assistance-type assistance-type-icon orange"><i class="fa fa-circle"></i> Asistencia<br/>pública</div>' +
                  '<div class="assistance-type assistance-type-icon yellow"><i class="fa fa-circle"></i> Asistencia<br/>individual</div>' +
              '</div>';
          break;
        }
        return template;
    }

    $('#jsmap-puertorico').JSMaps({
        map: 'puertoRico',
        onStateClick: function (data) {
            /* data = { name: '', text: '' } */
            $.ajax({
                beforeSend: function (qXHR) {
                    $('#jsmap-description').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                type: 'get',
                url: WP_ADMIN_AJAX_URL + '?action=pr_cities_contracts&lang=' + LCDM_LANG + '&city=' + data.name,
                success: function (response) {
                    var table = buildContractsTable(response.data, data.name);
                    $('#jsmap-description').html(table);
                    $('.jsmaps-text').append(buildAssistanceLegend());
                }
            });
        }
    });

    $('.nice-select').niceSelect().on('change', function (event) {
        $('#jsmap-puertorico').trigger('stateClick', $(this).val());
    });

    $('#jsmap-puertorico').trigger('stateClick', 'San Juan');

})(jQuery);