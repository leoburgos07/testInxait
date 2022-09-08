
function cargarDpto(){
    let dptos = [];
    fetch('https://www.datos.gov.co/resource/xdk5-pm3f.json')
    .then(res => res.json())
    .then(response => response.map(function(x){
        if(!dptos.includes(x.departamento)){
            dptos.push(x.departamento);
            let valueDpto = x.departamento.replace(/ /g, "-");
            $("#dptos").append(
                `<option value= ${valueDpto}>${x.departamento}</option>`
            );
        }
    }));
}
$("#dptos").change(function(e){
    $("#ciudades").empty();
    fetch('https://www.datos.gov.co/resource/xdk5-pm3f.json')
    .then(res => res.json())
    .then(response => response.map(function(x){
        const test = e.target.value;
        const valueDpto = test.replace(/-/g, " ");
       // console.log(valueDpto);
        //let valueDpto = e.target.value.replace(/-/g, " ");
        
        if(x.departamento == valueDpto){
            let valueCity = x.municipio.replace(/ /g, "-");
            console.log(valueCity);
            $("#ciudades").append(
                `<option value= ${valueCity}>${x.municipio}</option>`
            );
        }
    }));
   
})



cargarDpto();
