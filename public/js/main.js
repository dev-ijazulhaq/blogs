
// Add subtle shadow effect when scrolled
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 10) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});


$(document).on("click",'#postComment',function(){
    const user_id = $("#user_id").val();
    if(user_id){
        const form = $("#commentForm");
        const url = form.attr('action');
        const formData = form.serialize();
        console.log(formData);
        $.ajax({
            method: 'POST',
            url : url,
            data: formData,
            dataType: 'json',
            success:function(response)
            {
                $("#successResponseInComment").text(response.message);
                setTimeout(() => {
                    location.reload();
                }, 2000);
            },
            error:function(xhr)
            {
                if(xhr.status == 422)
                {
                    $("#errorResponseInComment").text(xhr.responseJSON.errors.comment);
                }else if(xhr.status == 403)
                {
                    alert("Your account is unauthorized for this action");
                }else{
                    console.log(xhr);
                }
            }
        });
    }else{
        $("#loginNotificationModal").modal('show');
    }
});