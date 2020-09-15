$(document).ready(function () {
    $('#vehicleType').change(function(e){
        // var value= $(this).children("option:selected").val();
        var value = e.target.value;

        console.log(value);
        $.ajax({
            type:"get",    
            url:"/vehicleType/"+value+"/vehicles",

            success:function (data) {
                $('#vehicle').empty();

                $.each(data.vehicles,function(index,vehicle){
                    $('#vehicle').append('<option value="'+vehicle.regNo+'">'+vehicle.regNo+'</option>');
                })
                console.log('success');
            }
        });
    });

    $('#bookingId').change(function(e){
        // var value= $(this).children("option:selected").val();
        var value = e.target.value;
        console.log(value);
        $.ajax({
            type:"get",    
            url:"/booking/"+value+"/refund",
            success:function (data) {
                $('#PasName').val(data.name);
                console.log('success');
            }
        });
    });
});


