<script>
    let dt;

    function createDataTable(ruta){
        dt = new DataTable('#tabla',{
            autoWidth: true,
            language:{
                lengthMenu: "_MENU_ Filas por página",
                info: "Mostrando la página _PAGE_ de _PAGES_",
                search: "Buscar",
                infoEmpty: "Sin datos",
                emptyTable: "Este grupo no tiene nada asignado aún"
            }
        });

        drawDataTable(ruta);
    }

    function drawDataTable(ruta,datos){
        $.ajax({
            url: ruta,
            type: 'POST',
            data: datos,
            success: function(response){
                //console.log(response);
                dt.clear();
                dt.rows.add( response ).draw();
                dt.columns.adjust().draw();
            }
        });
    }
</script>