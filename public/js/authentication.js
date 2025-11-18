$(document).on('click','#accountRegistration',function(){
    $(".validationError").text('');
    const form = $("#registrationForm");
    const formData = form.serialize();
    const url = `auth/register`;
    $.ajax({
        method: 'POST',
        url: url,
        data: formData,
        success:function(response)
        {
            window.location.href = '/email/verify';
        },
        error:function(xhr)
        {
            if(xhr.status == 422)
            {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function(key, message){
                    form.find("#response_"+key).text(message);
                });
            }else{
                console.log(xhr.responseJSON);
                alert('Somethings went wrong.');
            }
        }
    });
});