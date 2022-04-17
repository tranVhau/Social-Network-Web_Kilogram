$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var myID =$("#myIDVal").val();
    var receiver_id ='';


     // Enable pusher logging - don't include this in production
     Pusher.logToConsole = true;

     var pusher = new Pusher('bdf53e2c44d214125a54', {
       cluster: 'ap1'
     });
 
     var channel = pusher.subscribe('my-channel');
     channel.bind('my-event', function(data) {
        // if(myID == data.to){
        //     $('#' + data.from).find('.media-body p').css({'font-weight' : 'bold'});
        // }else if(receiver_id == data.from){
        //     $('#' + data.to).find('.media-body p').css({'font-weight' : 'normal'});
        // }  
        
        if (myID == data.from) {
            $('#' + data.to).click();
        } else if (myID == data.to) {
            if (receiver_id == data.from) {
                // if receiver is selected, reload the selected user ...
                $('#' + data.from).click();
               
            } else {
                // if receiver is not seleted, add notification for that user
                $('#' + data.from).find('.media-body p').css({'font-weight' : 'bold'});
            }
        }

     });



    

    $('.item:last-child').click(function(){
        $('.drop-field').toggle('block');
    })


    $('.user').click(function () {
        receiver_id = $(this).attr('id');
        $.ajax({
            type: "get",
            url: "message/"+receiver_id, 
            cache: false,
            success: function (data) {
                $('#messages').html(data);
                goToBottom(0);
            }
        })
    })


    $(document).on('keyup', '.input-text .submit', function(e){
        var message = $(this).val();
        if(e.keyCode == 13 && message != '' && receiver_id !=''){
            $(this).val('');

            $.ajax({
                type: "post",
                url:"message",
                cache: false,
                data: {'receiver_id': receiver_id, 'message': message},
                success: function(){

                },
                error: function(jqXHR, status, err) {
                    
                },
                compelete: function(){
                    goToBottom(0);
                }
            })
        }
    })
})

function goToBottom(speed) {
    $('.message-wrapper').animate({
        scrollTop: $('.message-wrapper').get(0).scrollHeight
    }, speed);
}
