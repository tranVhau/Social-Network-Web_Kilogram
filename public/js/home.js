$(document).ready(function () {  

    var postID = 0;

    Pusher.logToConsole = true;

     var pusher = new Pusher('bdf53e2c44d214125a54', {
       cluster: 'ap1'
     });
 
     var channel = pusher.subscribe('my-channel');
     channel.bind('my-event-comment', function(data) {

        var html_tag = 
        "<div class='content-post-cmt'>"+
            "<div class='content-post-pic-cmt'>"+
                "<img src='https://pdp.edu.vn/wp-content/uploads/2021/01/hinh-anh-cute-de-thuong.jpg'/>"+
            "</div>"+
            "<div class='cmt-box-main'>"+
                "<div class='top-cmt'>"+
                    "<p class='user-cmt'>username</p>"+
                    "<p class='sub-cmt-time'>1 hour ago</p>"+
                    "<p class='cmt-sub'>"+data.comment+ "</p>"+
                "</div>"+
            "</div>"+
        "</div>"
        
        $('.content-post-right .content-post-main').append(html_tag)
    });


    // $('.post').click(function(){
    //     // postID = $(this).attr('id');
    //     // alert(postID);
    //     $('.post-modal').addClass('open');
    // })

    $(".icon-comment").click(function() {
        postID = $(this).attr('id');

        $.ajax({
            type: 'post',
            url: "comment/post/"+postID,
            cache: false,
            success: function(data){

                $.each(data.cmtLst, function( index, value) {
                    html_tag = "<div class='content-post-cmt'>"+
                        "<div class='content-post-pic-cmt'>"+
                            "<img src='"+ value.avatar +"'/>"+
                    "</div>"+
                    "<div class='cmt-box-main'>"+
                        "<div class='top-cmt'>"+
                            "<p class='user-cmt'>"+ value.username +"</p>"+
                            "<p class='sub-cmt-time'>1 hour ago</p>"+
                            "<p class='cmt-sub'>"+value.comment+ "</p>"+
                        "</div>"+
                    "</div>"+
                "</div>"

                $('.content-post-right .content-post-main').append(html_tag)
                });
                

                $('.modal-caption').text(data.postData.caption)
                $('.like-post').text(data.postData.likecount + " Likes");
                $('.post-photo').attr('src',"image/post/"+data.postData.imgdir);
                $('.user-post-avt').attr('src', "image/avt/"+data.postData.avatar);
                $('.content-post-name').text(data.postData.username)
                


                $('.post-modal').addClass('open');

                // alert(data.postData.username)
            }
        })
      });



      $(document).on('keyup', '.cmt-box', function(e){
        var comment = $(this).val();
        if(e.keyCode == 13 && comment != ''){
            $(this).val('');

            $.ajax({
                type: "post",
                url:"comment",
                cache: false,
                data: {'comment': comment, 'postID': postID},
                success: function(){

                },
                error: function(jqXHR, status, err) {
                    
                },
                compelete: function(){
                   
                }
            })
        }
    })
    

    $('.modal-post-close').click(function(){
        // postID = $(this).attr('id');
        // alert(postID);
        $('.post-modal').removeClass('open');
    })


    

    $('.icon-like-0').add('.icon-like-1').click(function() {
        postID = $(this).attr('id');
        color = $(this).css("color");

        if(color === "rgb(81, 81, 81)"){
            $(this).css({'color': '#ff607c'});
        }
        else{
            $(this).css({'color': 'rgb(81, 81, 81)'});
        }
        $.ajax({
            type: "post",
            url: "/Home/like",
            data: {'postID' : postID},
            success: function (data) {
                $('.like-count-'+postID).text(data.likecount)
            }
        })
      });



    $('.follow-btn').click(function(){
        followId = $(this).attr('id');
        

        if($(this).text() == "Following"){
            $(this).text("Follow")
            $(this).css({'color': 'RGB(76, 136, 245)', 'font-style':'normal' })
        }else{
            $(this).text("Following")
            $(this).css({ 'color': 'RGB(126, 127, 128)', 'font-style':'ITALIC' })
        }  
        $.ajax({
            type: "post",
            url: "/Home/follow",
            data: {'followID' : followId},
            success: function (data) {
               
            },
            error: function(data){
                
             },
        });
    });
    
})