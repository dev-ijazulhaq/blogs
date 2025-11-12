const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
sidebarToggle?.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});


$("#addPermission").on("click",function(e){
    e.preventDefault();
    $(".validationError").text('');
    let formURL = $("#storePermissionForm").attr('action');
    let formData = $("#storePermissionForm").serialize();
    $.ajax({
        method : 'POST',
        url: formURL,
        data: formData,
        success:function(response){
            $(".footerBtn").addClass('d-none');
            $(".permissionInsertResponse").addClass('d-block');
            $(".insertResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr){
            if(xhr.status == 422){
                let errors = xhr.responseJSON.errors;
                $("#responseName").text(errors.name);
                $("#responseGuard").text(errors.guard_name);
            }else{
                alert('Something went wrong, please try again');
                console.log(xhr.responseText);
            }

        }
    }); 
});

$(document).on('click','.getPermission',function(e){
    e.preventDefault();
    const permissionId = $(this).attr('permissionId');
    $.ajax({
        method: 'GET',
        url: `permissions/${permissionId}`,
        success:function(response){
            const form = $("#updatePermissionForm");
            form.find("input[name='id']").val(response.data.id);
            form.find("input[name='name']").val(response.data.name);
            form.find("select[name='guard_name']").val(response.data.guard_name);
            $("#permissionUpdateModal").modal('show');
        },
        error:function(xhr){
            alert("Something went wrong, please try again litter");
            console.log(xhr.responseText);
        }
    });
});


$(document).on('click','#updatePermission',function(e){
    e.preventDefault();
    $(".updateResponse").text('');
    $(".footerBtn").show();
    const form = $("#updatePermissionForm");
    const formData = form.serialize();
    const permissionId = form.find("input[name='id']").val();
    const url =  `permissions/${permissionId}`;
    $.ajax({
        method: 'PATCH',
        url: url,
        data: formData,
        success:function(response)
        {
            $(".updateResponse").text(response.message);
            $(".footerBtn").hide();
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 422){
                var errors = xhr.responseJSON.errors;
                $("#responseUpdateName").text(errors.name);
                $("#responseUpdateGuard").text(errors.guard_name);
            }else{
                console.log(xhr.responseText);
                alert('Something went wrong, please try again litter');
            }
        }
    });
});

$(document).on('click','.showDeletePermission',function(e){
    e.preventDefault();
    const permissionId = $(this).attr('permissionId');
    const form = $("#deletePermissionForm");
    form.find("input[name='id']").val(permissionId);
    $("#permissionDeleteModal").modal('show');
});

$(document).on('click','#deletePermission',function(e){
    e.preventDefault();
    const form = $("#deletePermissionForm");
    const formData = form.serialize();
    const permissionId = form.find("input[name='id']").val();
    const url = `permissions/${permissionId}`;
    $.ajax({
        method: 'DELETE',
        url: url,
        data: formData,
        success:function(response){
            $(".footerBtn").hide();
            $(".deleteResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr){
            console.log(xhr.responseJSON);
            alert('Something went wrong, please try again litter');
        }
    });
});


/// Roles

$(document).on('click','#addNewRole',function(e){
    e.preventDefault();
    const formData = $("#createRoleForm").serialize();
    console.log(formData);
    $.ajax({
        method: 'POST',
        url: `roles`,
        data: formData,
        success:function(response)
        {
            console.log(response);
        },
        error:function(xhr)
        {
            console.log(xhr.responseText);
        }
    });
});