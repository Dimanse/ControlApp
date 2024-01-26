document.addEventListener('DOMContentLoaded', function(){
    mostrarEdad();
    formatearFecha();
})

function getEdad(fecha){
    let diferencia = Date.now() - fecha.getTime();
    fecha = new Date(diferencia);
    return Math.abs(fecha.getUTCFullYear() - 1970);
}
// console.log(getEdad(new Date(1979, 6 ,28)))

function mostrarEdad(){
    const edad = document.querySelector('#edad');
    const fecha = document.querySelector('#fecha_nacimiento').textContent;
    // console.log(fecha);
    if(edad){
         edad.textContent = getEdad(new Date(fecha));
    }
}

