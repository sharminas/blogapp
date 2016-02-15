$(document).ready(function(){
    $(".voteup").click(function() {
        var Id = $(this).children("span").text();
        $(this).children("#like").load("/comments/voteup/"+Id);
    });
});
$(document).ready(function(){
    $(".votedown").click(function() {
        var Id = $(this).children("span").text();
        $(this).children("#dislike").load("/comments/votedown/"+Id);
    });
});


 function cwRating(id,type,target){
    $.ajax({
        type:'POST',
        url:'rating.php',
        data:'id='+id+'&type='+type,
        success:function(msg){
            if(msg == 'err'){
                alert('Some problem occured, please try again.');
            }else{
                $('#'+target).html(msg);
            }
        }
    });
}