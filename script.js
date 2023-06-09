var empleados = [];

function registrarEmpleado() {
    var nombre = document.getElementById('nombre').value;
    var edad = parseInt(document.getElementById('edad').value);
    var estadoCivil = document.getElementById('estadoCivil').value;
    var sexo = document.getElementById('sexo').value;
    var sueldo = document.getElementById('sueldo').value;

    var empleado = {
        nombre: nombre,
        edad: edad,
        estadoCivil: estadoCivil,
        sexo: sexo,
        sueldo: sueldo
    };

    empleados.push(empleado);

    // Reiniciar campos 
    document.getElementById('nombre').value = '';
    document.getElementById('edad').value = '';
    document.getElementById('estadoCivil').value = '';
    document.getElementById('sexo').value = '';
    document.getElementById('sueldo').value = '';

    calcularEstadisticas();
}

function calcularEmpleado() {
    var totalFemenino = 0;
    var totalHombresCasados = 0;
    var totalMujeresViudas = 0;
    var sumaEdadHombres = 0;
    var totalHombres = 0;

    for (var i = 0; i < empleados.length; i++) {
        var empleado = empleados[i];

        if (empleado.sexo === 'Femenino') {
            totalFemenino++;
        }

        if (empleado.sexo === 'Masculino') {
            totalHombres++;

            if (empleado.estadoCivil === 'Casado(a)' && empleado.sueldo === 'mas_de_2500') {
                totalHombresCasados++;
            }

            if (empleado.estadoCivil === 'Viudo(a)' && empleado.sueldo === 'entre_1000_2500') {
                totalMujeresViudas++;
            }

            sumaEdadHombres += empleado.edad;
        }
    }

    var edadPromedioHombres = totalHombres > 0 ? sumaEdadHombres / totalHombres : 0;

    document.getElementById('totalFemenino').textContent = totalFemenino;
    document.getElementById('totalHombresCasados').textContent = totalHombresCasados;
    document.getElementById('totalMujeresViudas').textContent = totalMujeresViudas;
    document.getElementById('edadPromedioHombres').textContent = edadPromedioHombres.toFixed(2);
}
