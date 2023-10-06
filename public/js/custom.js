(function () {
    const radioMontoMin = document.querySelector('#monto-variable');
    const radioMontoMax = document.querySelector('#monto-maximo');
    const inputMonto = document.querySelector('#form-check-monto-variable .input-group');
    const inputNacimiento = document.querySelector('input[name="nacimiento"]');
    const groupApoderado =  document.querySelector('#apoderado-group');



    //muestra monto de retiro
    if(inputMonto) {
        radioMontoMin.addEventListener('click', ()=> {
            inputMonto.classList.remove('d-none');
        })
        radioMontoMax.addEventListener('click', ()=>{
            inputMonto.classList.add('d-none');
        })
    }

    //muestra el campo rut apoderado 
    if(inputNacimiento) {
        inputNacimiento.addEventListener('blur',()=>{
            console.log(inputNacimiento.value)
            mayorDeEdad(inputNacimiento.value);
            
        })
    }
    function mayorDeEdad(fecha) {
        //comprueba Momement.js
        try {
            moment();
        } catch (error) {
            return console.warn('No existe moment.js');
        }
        const birthday = fecha;
        const age =  moment().diff(birthday, 'years');
        console.log(age);
        if(age < 18) {
            groupApoderado.classList.remove('d-none');
            console.log('menor')
        }
        if(groupApoderado.classList.contains('d-none') == false && age >= 18 ) {
            groupApoderado.classList.add('d-none');
            console.log('mayor')
        } 
    }
})();



$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    //mas y menos del acordion
    $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find(".material-icons").text('remove_circle_outline');
    }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find(".material-icons").text('add_circle_outline');
    });
    
    //evita el click del tooltip
    $('a.tooltip-btn').on('click', function(e) {
        e.preventDefault();
    })
    $('#afiliado-si, #afiliado-no').on('click', function(){
        showBeneficiario()
    });


    $('#tootltipCarnet').popover({
        trigger: 'focus',
        html: true,
        content: "<img src='https://retiro10rentasvitalicias.rentanacional.cl/images/cedulas.jpg' class='cedula-image'>",
        boundary: 'viewport'
    })

    

});


// function showBeneficiario() {
//     if($('#afiliado-no').is(":checked")) {
//         console.log('aqui')
//         $('#aviso-beneficiario').removeClass('d-none');
//         $("#box-beneficiario").removeClass('d-none');
//     } else {
//         $('#aviso-beneficiario').addClass('d-none');
//         $("#box-beneficiario").addClass('d-none');

//     }
// }
