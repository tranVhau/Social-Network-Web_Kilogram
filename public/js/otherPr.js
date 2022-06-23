$(document).ready(function(){
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    // var postID = 0;
    // // post on click

    // Pusher.logToConsole = true;

    //  var pusher = new Pusher('bdf53e2c44d214125a54', {
    //    cluster: 'ap1'
    //  });
 
    //  var channel = pusher.subscribe('my-channel');
    //  channel.bind('my-event-comment', function(data) {

    //     var html_tag = 
    //     "<div class='content-post-cmt'>"+
    //         "<div class='content-post-pic-cmt'>"+
    //             "<img src='/image/avt/" + data.currUser.avatar +"'/>" +
    //         "</div>"+
    //         "<div class='cmt-box-main'>"+
    //             "<div class='top-cmt'>"+
    //                 "<p class='user-cmt'>" + data.currUser.username + "</p>"+
    //                 "<p class='sub-cmt-time'>1 hour ago</p>"+
    //                 "<p class='cmt-sub'>"+data.comment+ "</p>"+
    //             "</div>"+
    //         "</div>"+
    //     "</div>"
        
    //     // tempPostID =  'content-'+postID+'-right'
    //     // $(tempPostID+' .content-post-main').append(html_tag)
    //     $('.content-'+postID +'-right .content-post-main').append(html_tag)
    // });


    // $('.user-post').click(function(){
    //     postID = $(this).attr('id');
    //     $("#content-post-right-wrapper").attr("class", "content-"+postID+"-right");

    //     $.ajax({
    //         type: 'post',
    //         url: "/comment/post/"+postID,
    //         cache: false,
    //         success: function(data){

    //             $(".content-post-main").html("");
    //             $.each(data.cmtLst, function( index, value) {
    //                 html_comment_tag = "<div class='content-post-cmt'>"+
    //                     "<div class='content-post-pic-cmt'>"+
    //                         "<img src='/image/avt/" + value.avatar + "'/>"+
    //                 "</div>"+
    //                 "<div class='cmt-box-main'>"+
    //                     "<div class='top-cmt'>"+
    //                         "<p class='user-cmt'>"+ value.username +"</p>"+
    //                         "<p class='sub-cmt-time'>1 hour ago</p>"+
    //                         "<p class='cmt-sub'>"+value.comment+ "</p>"+
    //                     "</div>"+
    //                 "</div>"+
    //             "</div>"
    //                 $('.content-post-right .content-post-main').append(html_comment_tag)
    //             });

    //             $('.modal-caption').text(data.postData.caption)
    //             $('.like-post').text(data.postData.likecount + " Likes");
    //             $('.post-photo').attr('src',"/image/post/"+data.postData.imgdir);
    //             $('.user-post-avt').attr('src', "/image/avt/"+data.postData.avatar);
    //             $('.content-post-name').text(data.postData.username)
    //             $('.post-modal').addClass('open');
    //         }
    //     })
    // })

    // $('.modal-post-close').click(function(){
    //     $('.post-modal').removeClass('open');
    // })

    // $(document).on('keyup', '.cmt-box', function(e){
    //     var comment = $(this).val();
    //     if(e.keyCode == 13 && comment != ''){
    //         $(this).val('');

    //         $.ajax({
    //             type: "post",
    //             url:"/comment",
    //             cache: false,
    //             data: {'comment': comment, 'postID': postID},
    //             success: function(){

    //             },
    //             error: function(jqXHR, status, err) {
                    
    //             },
    //             compelete: function(){
                   
    //             }
    //         })
    //     }
    // })

    // follow function 

    $('.follow-btn').add('.follow-btn-1').click(function(){
        
        var followId = $(this).attr('id');
        var _status = "Follow"

        // $(this).removeClass('follow-btn');
        // $(this).addClass('follow-btn-1');
        if($(this).text() == "Following"){
            $(this).text("Follow")
            _status = "Follow"
            $(this).css({'background-color':'RGB(57, 169, 243)', 'border':'none', 'color': 'white', 'margin-left':'50px'})
        }else{     
            $(this).text("Following")
            _status = "Following"
            $(this).css({'background-color':'white', 'color': 'black' ,'border':'1px solid black', 'margin-left':'30px'}) 
        } 
        
        $.ajax({
            type: "post",
            url:"/Kilogram/follow",
            data: {'followId' : followId, 'stat':_status},
            success: function(response){
            }
        })
    })
})