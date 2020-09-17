$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


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

   

    $('#vehicle').change(function(e){
        // var value= $(this).children("option:selected").val();
        var regNo = e.target.value;
        var date = document.getElementById('date').value;
        console.log(regNo);
        console.log(date);
        $.ajax({
            type:"get",    
            url:"/vehicle/"+date+"/"+regNo+"/availableSeats",

            success:function (data) {
                var len = Object.keys(data.seats).length;
                //console.log(len);
                $('#seats').empty();
                if(len>0)
                {
                    $.each(data.seats,function(index,seats){
                        //console.log(seats.seatNumber);
                        $('#seats').append("<input type='checkbox' name='seats[]' value='" + seats.seatNumber + "' />" + seats.seatNumber);
                    })
                    console.log('success');
                }
                if(len==0)
                {
                    $('#seats').append("<b>No seat available for the day</b>");
                }
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


