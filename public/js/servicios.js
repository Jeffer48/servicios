function modalServicios(){
    $.ajax({
        url: '/datos',
        type: 'GET',
        success: function(response){
            $.each(response, function(i, item){
                $('#listaTarjetas').append(createButtons(
                    item.id,
                    item.unidad,
                    item.folio,
                    item.area,
                    item.incidente,
                    item.fecha
                ));
            });
        }
    });
    $('#listaServicios').modal('show');
}

function createButtons(id,unidad,folio,area,incidente,fecha){
    let tarjeta = document.createElement('div');
    tarjeta.setAttribute('class','service-target');

    let contenedor = document.createElement('div');
    contenedor.setAttribute('class', 'row');
    contenedor.setAttribute('style', 'width: 100%;');

    let identificadores = document.createElement('div');
    identificadores.setAttribute('class', 'col col-sm-4');

        let listaIdent = document.createElement('ul');
        listaIdent.setAttribute('class', 'maquina-target');
            let maquinaE = document.createElement('li'); maquinaE.textContent = unidad;
            let folioE = document.createElement('li'); folioE.textContent = folio;
        listaIdent.append(maquinaE);
        listaIdent.append(folioE);
    identificadores.append(listaIdent);

    let info = document.createElement('div');
    info.setAttribute('class', 'col col-sm-8');

        let listaInfo = document.createElement('ul');
        listaInfo.setAttribute('class', 'info-target');
            let areaE = document.createElement('li'); areaE.textContent = "Area: "+area;
            let incidenteE = document.createElement('li'); incidenteE.textContent = "Incidente: "+incidente;
            let fechaE = document.createElement('li'); fechaE.textContent = "Fecha: "+fecha;
        listaInfo.append(areaE);
        listaInfo.append(incidenteE);
        listaInfo.append(fechaE);
    info.append(listaInfo);

    contenedor.append(identificadores);
    contenedor.append(info);

    tarjeta.append(contenedor);

    return tarjeta;
}