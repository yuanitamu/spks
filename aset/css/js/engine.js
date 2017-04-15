function coba() {
    alert("berhasil");
}

function save() {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var dept = document.getElementById('dept').value;
    var phone = document.getElementById('phone').value;

    alert(fname + lname + dept + phone);

    var dataString = 'first_name=' + fname + '&last_name=' + lname + '&dept=' + dept + '&phone=' + phone;
    var baseURL = "http://localhost/mobile/jQueryMobile_latihan/services/";



    alert(dataString);
    $.ajax({
        type: "POST",
        url: baseURL + "service.php",
        data: dataString,
        success: function (result) {
            alert(result);
        }
    });
}

$('#page2').bind('pageinit', function (event) {
//    alert("halaman 2 dibuka");
//    var content = "<li><a href='#page3'>Hula</a></li>";
//    $('#employeeList').append(content);
    getData();
});

function getData(argument) {
    var employee;
    $.getJSON(baseURL + 'service_get.php', function (data) {
        employee = data.employees;
        
        $.each(employee, function(index, employee){
           alert(employee.firstname+" "+); 
        })
        alert(data);
    });
};