/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//$(document).ready(function () {
document.addEventListener("load", function(){
    $('#CalendarioWeb').fullCalendar({
        header: {
            left: 'today, prev, next',
            center: 'title',
            right: 'month,basicWeek,basicDay, agendaWeek,agendaDay'
        },
        dayClick: function (date, jsEvent, view) {
            alert("Valor seleccionado:" + date.format());
            alert("Vista actual:" + view.name);
            $(this).css('background-color', 'red');
            $("#modal").modal();

        },

        eventSources: [{

                events: [
                    {
                        id: 1,
                        title: 'Evento 1, reunión de acuerdos',
                        descripcion: "Esta reunion urge",
                        start: '2018-08-09',
                        color: "purple",
                        textColor: "white"
                    },
                    {
                        title: 'Evento 2, fin del proyecto',
                        descripcion: "Ya era hora",
                        start: '2018-08-10',
                        end: '2018-08-19'
                    },
                    {
                        title: 'Evento 3, de nuevo el proyecto',
                        descripcion: "Que pereza",
                        start: '2018-08-12T12:30:00',
                        allDay: false,
                        color: "green",
                        textColor: "black"
                    },
                ],

                color: "black",
                textColor: "yellow"
            }],

        eventClick: function (calEvent, jsEvent, view) {
            $('#tituloEvento').html(calEvent.title);
            $('#descripcionEvento').html(calEvent.descripcion);
            $("#modal").modal();
        }

    });
});