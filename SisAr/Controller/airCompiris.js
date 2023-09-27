$(document).ready(function () {


    var numFlight = "";

    $.ajax({
        url: "http://localhost/6toSemestre/GestionDePruebas/compiFlights/SisAr/Controller/restFlights.php",
        type: "GET",
        dataType: "json",
        success: function (datos) {

            let obj = datos;

            for (let k in obj) {
                $("#tableSelect").append(

                    `<tr>
                            <td hidden> ${obj[k].idFlight} </td>
                            <td> ${obj[k].nameAirline} </td>
                            <td> ${obj[k].idPlane} </td>
                            <td> ${obj[k].departure} </td>
                            <td> ${obj[k].arrival} </td> 
                            <td> ${obj[k].departureTime + " - " + obj[k].arrivalTime} </td> 
                            <td> ${obj[k].typeTrip} </td> 
                            <td> ${obj[k].availableSeats} </td> 
                            <td> ${obj[k].price} </td> 
                            <td><button type="button" class="btn btn-info btnBook"><i class="fas fa-times"></i> book</button></td>
                            </tr>`
                );

                $(".selectCities").append(

                    `<option value=${obj[k].departure}></option>`
                );

            }
        }

    });


    $("#searchFlight").click(function () {
        dateDep = $("#start-date").val();
        dateArr = $("#end-date").val();
        cityDep = $("#inpDepCiu").val();
        cityArr = $("#inpArrCiu").val();
        typeTrip = $("#selectTripType").val();
        //alert(dateDep.toString()+dateArr.toString()+cityArr+cityDep+typeTrip);

        $.ajax({
            url: "http://localhost/6toSemestre/GestionDePruebas/compiFlights/SisAr/Controller/restFlights.php",
            type: "POST",
            data: {
                'departureCity': cityDep,
                'arrivalCity': cityArr,
                'departureTime': dateDep,
                'arrivalTime': dateArr,
                'typeTrip':typeTrip
            },
            success: function (dataFli) {

                let obj = JSON.parse(dataFli);
                $("#tableSelect").empty();

                for (let i in obj) {

                    $("#tableSelect").append(

                        `<tr>
                            <td hidden> ${obj[i].idFlight} </td>
                            <td> ${obj[i].nameAirline} </td>
                            <td> ${obj[i].idPlane} </td>
                            <td> ${obj[i].departure} </td>
                            <td> ${obj[i].arrival} </td> 
                            <td> ${obj[i].departureTime + " - " + obj[i].arrivalTime} </td> 
                            <td> ${obj[i].typeTrip} </td> 
                            <td> ${obj[i].availableSeats} </td> 
                            <td> ${obj[i].price} </td> 
                            <td><button type="button" class="btn btn-info btnBook"><i class="fas fa-times"></i> book</button></td>
                            </tr>`
                    );

                }

            }

        })

    });


    $(document).on('click', '.btnBook', function () {
        fila = $(this).closest('tr');
        numFlight = fila.find("td:eq(0)").text();
        $("#modalBook").modal("show");   
    });


    $("#formBook").submit(function(){
        amountTickets=$("#numPersons").val();
        const value = sessionStorage.getItem('userSession');
        var arrayValue = value.split(",");
        alert(numFlight);

        route= "http://localhost/6toSemestre/GestionDePruebas/compiFlights/SisAr/Controller/restFlights.php?idFlightBelong="+numFlight+"&dniUser="+arrayValue[0]+"&numTickets="+amountTickets;


        $.ajax({
            url: route,
            type: "PUT",
            data: {
                'idFlightBelong': numFlight,
                'dniUser': arrayValue[0],
                'numTickets':amountTickets
            },
            success: function (msg) {
                alert(msg);
            }

        })
        
    }); 

})