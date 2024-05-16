function modalServicios(){
    let contenedor = document.getElementById("listaTarjetas");
    contenedor.innerHTML = "";

    let cantidad = 0;
    $.ajax({
        url: '/datos/reportes',
        type: 'POST',
        success: function(response){
            $.each(response, function(i, item){
                $id = item.id;
                contenedor.append(reportesButtons(
                    item.id,
                    item.unidad,
                    item.folio,
                    item.area,
                    item.incidente,
                    item.fecha
                ));
            });
            cantidad = response.length;
        }
    });
    
    $.ajax({
        url: '/datos/desplazamiento',
        type: 'POST',
        success: function(response){
            $.each(response, function(i, item){
                $id = item.id;
                contenedor.append(desplazamientoButtons(
                    item.id,
                    item.area,
                    item.unidad,
                    item.fecha
                ));
            });
            cantidad += response.length;
        }
    });
    
    if(cantidad > 0) $('#listaServicios').modal('show');
    else message("No hay ningún servicio en activo","Haga click para cerrar","info",0,"");
}

function reportesButtons(id,unidad,folio,area,incidente,fecha){
    let ruta = "/etapas?etapa="+id;
    let tarjeta = document.createElement('a');
    tarjeta.setAttribute('href',ruta);
    tarjeta.setAttribute('id','ST-'+id);
    tarjeta.setAttribute('class','service-target');

    let contenedor = document.createElement('div');
    contenedor.setAttribute('class', 'row');
    contenedor.setAttribute('style', 'width: 100%;');

    let identificadores = document.createElement('div');
    identificadores.setAttribute('class', 'col col-sm-4 identificadores');

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

function desplazamientoButtons(id,area,unidad,fecha){
    let tarjeta = document.createElement('div');
    tarjeta.setAttribute('class','service-target');

    let contenedor = document.createElement('div');
    contenedor.setAttribute('class', 'row');
    contenedor.setAttribute('style', 'width: 100%;');

    let identificadores = document.createElement('div');
    identificadores.setAttribute('class', 'col col-sm-4 identificadores');

    let listaIdent = document.createElement('ul');
    listaIdent.setAttribute('class', 'maquina-target');

            let maquinaE = document.createElement('li'); maquinaE.textContent = unidad;
            let areaE = document.createElement('li'); areaE.textContent = area;
        listaIdent.append(areaE);
        listaIdent.append(maquinaE);
    identificadores.append(listaIdent);

    let campoBoton = document.createElement('div');
    campoBoton.setAttribute('class', 'col col-sm-8');
    campoBoton.setAttribute('style', 'align-content: center; text-align-last: center;');

        let boton = document.createElement('button');
        boton.setAttribute('class','btn btn-success');
        boton.setAttribute('type','button');
        boton.setAttribute('onclick','desplazamientoTerminado('+id+')');
        boton.innerHTML = 'Terminar desplazamiento';

    campoBoton.append(boton);

    contenedor.append(identificadores);
    contenedor.append(campoBoton);
    tarjeta.append(contenedor);

    return tarjeta;
}

function desplazamientoTerminado(id){
    let datos = {id: id};
    ajaxMessage('/datos/desplazamiento/terminar',datos);
    $('#listaServicios').modal('hide');
}