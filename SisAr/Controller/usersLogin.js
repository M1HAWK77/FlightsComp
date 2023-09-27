$(document).ready(function () {

    $("#formLogin").submit(function (e) {
        userName = $("#userLogin").val();
        userPw = $("#userPw").val();
        route = "http://localhost/FlightsComp/SisAr/Controller/restPerson.php?user=" + userName.trim() + "&pw=" + userPw.trim();
        alert(route);

        $.ajax({
            url:route,
            type:"GET",
            success: function(result){
                if(result==="false"){
                    alert("Datos Incorrectos");
                }else{
                    obj= JSON.parse(result);
                    dataUser=[obj.dni, obj.name, obj.lastName];
                    createSession(dataUser);
                    window.open("index.html");
                }
            }
        })

    });


    $("#formRegister").submit(function(e){
        dniR= $("#dniR").val();
        nameUserR= $("#nameR").val();
        lnameUserR= $("#lastNameR").val();
        userR= $("#userR").val();
        pwR= $("#pwR").val();

        alert(dniR+ nameUserR+ lnameUserR+ userR+ pwR);

        $.ajax({
            url: "http://localhost/FlightsComp/SisAr/Controller/restPerson.php",
            type: "POST",
            data:{
                dni: dniR,
                name: nameUserR,
                lastName: lnameUserR,
                user: userR,
                pw: pwR 
            },
            success: function(result){
                alert(result);
            }
        })

    })


})

function createSession(us){
    sessionStorage.setItem('userSession', us);
}

