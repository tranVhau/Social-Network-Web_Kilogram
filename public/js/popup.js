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
                $('.modal').removeClass('open');
                
            },
            error: function(){
                alert('Upload failed');
             },
        }) 
    })

    save_img = document.querySelector("#chose-img");
    save_img.onchange = function (e) {
        if (e.target.files.length > 0) {
            src = URL.createObjectURL(e.target.files[0]);
            image = document.querySelector(".img-container img");
            image.src = src;
        }
    }

    
    // post on click
    $('.post').click(function(){
        postID = $(this).attr('id');
        // alert(postID);
        
        $.ajax({
            type: 'post',
            url: "comment/post/"+postID,
            cache: false,
            success: function(data){
                $('.modal-caption').text(data.caption)
                $('.like-post').text(data.likecount + " Likes");
                $('.post-photo').attr('src',"image/post/"+data.imgdir);
                $('.user-post-avt').attr('src', "image/avt/"+data.avatar);
                $('.content-post-name').text(data.username)
                // alert(data.likecount);
                // $('.time-post').text(c)


                $('.post-modal').addClass('open');
            }
        })
    })

    $('.modal-post-close').click(function(){
        // postID = $(this).attr('id');
        // alert(postID);
        $('.post-modal').removeClass('open');
    })


    // modify
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
                $('.modify-modal').removeClass('open');
                
            },
            error: function(data){
                alert(data.responseJSON.error);
             },
            
        })
    })
})


