<script>
    $(document).ready(function() {
        createDataTable("{{route('get-reportes')}}");
    });

    function verModalServicios(id){
        $.ajax({
            url: "{{route('getViewServices')}}",
            type: 'POST',
            data: {id: id},
            success: function(response){
                if(response.id_area == 1){
                    document.getElementById('CPrioridad').style = "display: none;";
                    document.getElementById('CDestino').style = "display: none;";
                    document.getElementById('CHospital').style = "display: none;";
                }else{
                    document.getElementById('CPrioridad').style = "display: flex;";
                    document.getElementById('CDestino').style = "display: flex;";
                    document.getElementById('CHospital').style = "display: flex;";
                }
                document.getElementById('LFechaInit').innerHTML = response.fecha;
                document.getElementById('LArea').innerHTML = response.area;
                document.getElementById('LUnidad').innerHTML = response.unidad;
                document.getElementById('LIncidente').innerHTML = response.incidente;
                document.getElementById('LRadioUbicacion').innerHTML = response.radio_ubicacion;

                document.getElementById('LRadrioOperador').innerHTML = response.radio_operador;
                document.getElementById('LReportante').innerHTML = response.reportante;
                document.getElementById('LTurno').innerHTML = response.turno;
                document.getElementById('LFecha').innerHTML = response.fecha_captura;
                document.getElementById('LOperador').innerHTML = response.operador;
                document.getElementById('LJefeServicio').innerHTML = response.jefe;
                document.getElementById('LPersonal1').innerHTML = response.personal_1;
                document.getElementById('LPersonal2').innerHTML = response.personal_2;
                document.getElementById('LPersonal3').innerHTML = response.personal_3;
                document.getElementById('LPersonal4').innerHTML = response.personal_4;
                document.getElementById('LServicio').innerHTML = response.servicio;
                document.getElementById('LLocalidad').innerHTML = response.localidad;
                document.getElementById('LLugar').innerHTML = response.lugar;
                document.getElementById('LEtapasUbicacion').innerHTML = response.etapas_ubicacion;

                document.getElementById('LFolio').innerHTML = response.folio;

                document.getElementById('LNombre').innerHTML = response.nombre;
                document.getElementById('LSexo').innerHTML = response.sexo;
                document.getElementById('LEdad').innerHTML = response.edad;
                document.getElementById('LApoyo').innerHTML = response.apoyo;
                document.getElementById('LPrioridad').innerHTML = response.prioridad;
                document.getElementById('LDestino').innerHTML = response.destino;
                document.getElementById('LHospital').innerHTML = response.hospital;

                document.getElementById('LDescripcion').innerHTML = response.desc_evento;
                document.getElementById('LIncorporacion').innerHTML = response.incorporacion;

                document.getElementById('LCrum').innerHTML = response.folio_crum;
                document.getElementById('Lc5i').innerHTML = response.folio_c5i;

                document.getElementById('LUsuario').innerHTML = response.usuario;
            }
        });
        $("#VerModificarServicio").modal("show");
    }
</script>