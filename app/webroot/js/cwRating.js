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