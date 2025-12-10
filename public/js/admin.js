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
    $(".validationError").text('');
    const formData = $("#createRoleForm").serialize();
    $.ajax({
        method: 'POST',
        url : `roles`,
        data: formData,
        success:function(response)
        {
            $(".roleInsertResponse").text(response.message);
            $(".footerBtn").hide();
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            console.log(xhr.responseJSON.errors);
            if(xhr.status == 422){
                var errors = xhr.responseJSON.errors;
                $("#roleNameResponse").text(errors.name);
                $("#roleGuardResponse").text(errors.guard_name);
                $("#assignPermissionResponse").text(errors.permissions);
            }else{
                console.log(xhr.responseJSON);
            }
        }
    });
});

$(document).on('click','.showUpdateRoleForm',function(){
    const roleId = $(this).attr('roleId');
    const url = `roles/${roleId}`;
    $.ajax({
        method: 'GET',
        url: url,
        success:function(response)
        {
            const form = $("#updateRoleForm");
            form.find("input[name='id']").val(response.data.id);
            form.find("input[name='name']").val(response.data.name);
            form.find("select[name='guard_name']").val(response.data.guard_name);
            form.find("input[name='permissions[]']").prop('checked', false);

            const permissions = response.data.permissions.map(p => p.name);
            form.find("input[name='permissions[]']").each(function (){
                if(permissions.includes($(this).val())){
                    $(this).prop('checked',true);
                }
            });

            $("#updateRoleModal").modal('show');
        },
        error:function(xhr)
        {
            alert('Something went wrong.')
            console.log(xhr.responseJSON);
        }
    });
});

$(document).on('click','#updateRole',function(){
    $(".validationError").text('');
    const form = $("#updateRoleForm");
    const formData = form.serialize();
    const roleId = form.find("input[name='id']").val();
    const url = `roles/${roleId}`;
    $.ajax({
        method: 'PATCH',
        url: url,
        data: formData,
        success:function(response)
        {
            $(".footerBtn").hide();
            $(".roleUpdateResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 422)
            {
                const errors = xhr.responseJSON.errors;
                $("#updateRoleNameResponse").text(errors.name);
                $("#updateRoleGuardResponse").text(errors.guard_name);
                $("#updateAssignPermissionResponse").text(errors.permissions);
            }else{
                console.log(xhr.responseText);
                alert("Something went wrong.");
            }
        }
    });
});

$(document).on('click','.showDeleteRoleForm',function(){
    const roleId = $(this).attr('roleId');
    const form = $("#deleteRoleForm");
    form.find("input[name='id']").val(roleId);
    $("#roleDeleteModal").modal('show');
});

$(document).on('click','#deleteRole',function(){
    const form = $("#deleteRoleForm");
    const formData = form.serialize();
    const roleId = form.find("input[name='id']").val();
    const url = `roles/${roleId}`;
    $.ajax({
        method: 'DELETE',
        url: url,
        data: formData,
        success:function(response)
        {
            $(".footerBtn").hide();
            $(".deleteRoleResponse").text(response.message);
            setTimeout( () => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            console.log(xhr.responseText);
            alert('Something went wrong.');
        }
    });
});



// $(document).on('click','#addCategory',function(){
//     const form = $('#storeCategoryForm');
//     const formData = form.serialize();
//     const url = form.attr('action');
//     $.ajax({
//         method: 'POST',
//         url: url,
//         data: formData,
//         success:function(response)
//         {
//             $(".categoryInsertResponse").text(response.message);
//             setTimeout(() => {
//                 location.reload();
//             }, 2000);
//         },
//         error:function(xhr)
//         {
//             if(xhr.status == 422)
//             {
//                 const errors = xhr.responseJSON;
//             }else{
//                 console.log(xhr.responseJSON);
//                 alert('Something went wrong, please try again letter');
//             }
//         }
//     });
// });


//====//====//====//====//====//====//====//====//====//====//====//====//
//====//====//====//====//====//====//====//====//====//====//====//====//
// Categories //
//====//====//====//====//====//====//====//====//====//====//====//====//
//====//====//====//====//====//====//====//====//====//====//====//====//

$(document).on('click','#addCategory',function(){
    $(".validationError").text('');
    const form = $("#storeCategoryForm");
    const url = form.attr('action');
    const formData = new FormData(form[0]);
    $.ajax({
        method: 'POST',
        url: url,
        data: formData,
        contentType: false,
        processData: false,
        success:function(response)
        {
            $(".categoryInsertResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 422)
            {
                let errors = xhr.responseJSON.errors;
                $("#responseName").text(errors.name);
                $("#responseImage").text(errors.image);
            }else{
                console.log(xhr.responseJSON);
                alert('Something went wrong, please try again latter');
            }
        }
    });

});

$(document).on('click','.showEditCategoryModel',function(){
    $("#editCategoryModel").modal('show');
    const categoryId = $(this).attr('categoryId');
    const url = `categories/${categoryId}`;
    $.ajax({
        method: 'GET',
        url: url,
        dataType: 'json',
        success:function(response)
        {
            const data = response.data;
            $("#editCategoryId").val(data.id);
            $("#editCategoryname").val(data.name);
            $("#editCategoryOldImage").val(data.image);
            $("#categoryEditImagePreview").attr('src','http://127.0.0.1:8000/storage/categories/'+data.image);
        },
        error:function(xhr)
        {
            console.log(xhr.responseJSON);
            alert("Something went wrong please try again litter.");
        }
    });

});

// $(document).on('click','#editCategory',function(){
//     const form = $("#editCategoryForm");
//     const categoryId = form.find("input[name='id']").val();
//     const formData = new FormData(form[0]);
//     const url = `categories/${categoryId}`;

//     formData.append('_method','PATCH');


//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf_token]"').attr('content')
//         },
//     });

//     $.ajax({
//         method: 'POST',
//         url: url,
//         data: formData,
//         contentType: false,
//         processData: false,
//         success:function(response)
//         {
//             console.log(response);
//         },
//         error:function(xhr)
//         {
//             console.log(xhr);
//         }
//     });
// });

// $(document).on('click','#editCategory',function(){
//     const form = $("#editCategoryForm");
//     const categoryId = form.find('input[name="id"]').val();
//     const url = `categories/${categoryId}`;
//     const formData = new FormData(form[0]);
//     formData.append('_method','PATCH');
//     $.ajaxSetup({
//         header: {
//             'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
//         },
//     });
//     $.ajax({
//         method: 'POST',
//         url: url,
//         data: formData,
//         contentType: false,
//         processData: false,
//         success:function(response){
//             console.log(response);
//         },
//         error:function(xhr){
//             console.log(xhr.responseJSON);
//         }
//     });
// });

$(document).on('click','#editCategory',function(){
    $(".validationError").text('');
    const form = $("#editCategoryForm");
    const categoryId = form.find('input[name="id"]').val();
    const url = `categories/${categoryId}`;
    const formData = new FormData(form[0]);
    formData.append('_method','PATCH');
    $.ajaxSetup({
        header: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
    });
    $.ajax({
        method: 'POST',
        url: url,
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success:function(response)
        {
            $(".categoryEditResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 422){
                let errors = xhr.responseJSON.errors;
                $("#editResponseName").text(errors.name);
            }else{
                alert("Something went wrong, Please try again litter");
                console.log(xhr.responseJSON)
            }
        }
    });
});



$(document).on('click','.showDeleteCategoryModel',function(){
    $("#categoryDeleteModal").modal('show');
    const categoryId = $(this).attr('categoryId');
    const form = $("#deleteCategoryForm");
    form.find('input[name="id"]').val(categoryId);
});

$(document).on('click','#deleteCategory',function(){
    const form = $("#deleteCategoryForm");
    const categoryId = form.find('input[name="id"]').val();
    const url = `categories/${categoryId}`;
    const formData = form.serialize();
    $.ajaxSetup({
        header : {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
    });
    $.ajax({
        method: 'DELETE',
        url: url,
        dataType: 'json',
        data: formData,
        success:function(response)
        {
            $(".deleteCategoryResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            },2000);
        },
        error:function(xhr){
            console.log(xhr.responseJSON);
        }
        
    });
});