(function(){
    const anchoPantalla = window.innerWidth;
    console.log(anchoPantalla);
    mostrarHoraTratamiento();
    function mostrarHoraTratamiento(){
        const ocultarTd = document.querySelectorAll('#td');
        const ocultarTh = document.querySelectorAll('#th');
        const ocultarTdObservaciones = document.querySelectorAll('#td-observaciones');
        const ocultarThObservaciones = document.querySelectorAll('#th-observaciones');
        if(anchoPantalla < 768){
            ocultarTd.forEach(td => {
                td.classList.add('table__ocultar')
            })
            ocultarTh.forEach(th => {
                th.classList.add('table__ocultar')
            })
            ocultarTdObservaciones.forEach(tdObservaciones => {
                tdObservaciones .classList.add('table__ocultar')
            })
            ocultarThObservaciones.forEach(thObservaciones => {
                thObservaciones.classList.add('table__ocultar')
            })
           
            

        }
    }
})();