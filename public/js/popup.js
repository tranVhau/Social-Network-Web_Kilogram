$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // create post popup
    $('.js-buy-ticket').click(function(){
        $('.modal').addClass('open');
    })

    $('.js-modal-close').click(function(){
        $('.modal').removeClass('open');
    })

    $('#upload_form').on('submit',function(event){
        event.preventDefault();
        var x = new FormData(this);
        console.log(x);
        $.ajax({
            type:"post",
            url: "post",
            data:new FormData(this),
            contentType: false,
            processData: false,
            success: function(){
                alert('Upload successfully');
            },
            error: function(){
                alert('Upload failed');
             },
        }) 
    })



    // update profile popup


    $('.modify').click(function(){
        $('.modify-modal').addClass('open');
    })

    $('.modal-mdf-close').click(function(){
        $('.modify-modal').removeClass('open');
    })

    $('#mdf_form').on('submit', function(event){
        event.preventDefault()
        var y =  new FormData(this);
        $.ajax({
            type: 'post',
            url: "profile/mdf",
            data:new FormData(this),
            contentType: false,
            processData: false,

            success: function(data){
                // alert('Your changes have been successful');
                alert(data.success);
            },
            error: function(data){
                alert(data.responseJSON.error);
             },
            
        })
    })
})


