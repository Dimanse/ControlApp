(function(){
    const anchoPantalla = window.innerWidth;
    console.log(anchoPantalla);
    mostrarHoraTratamiento();
    function mostrarHoraTratamiento(){
        const ocultarTd = document.querySelector('#td');
        const ocultarTh = document.querySelector('#th');
        const ocultarTdObservaciones = document.querySelector('#td-observaciones');
        const ocultarThObservaciones = document.querySelector('#th-observaciones');
        if(anchoPantalla < 768){
            ocultarTd.classList.add('table__ocultar');
            ocultarTh.classList.add('table__ocultar');
            ocultarTdObservaciones.classList.add('table__ocultar');
            ocultarThObservaciones.classList.add('table__ocultar');

        }
    }
})();