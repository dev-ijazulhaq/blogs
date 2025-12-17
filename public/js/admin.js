const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
sidebarToggle?.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});
$(document).on('click','#closeUnauthorized',function(){
    location.reload();
});

function unauthorizedResponse()
{
    $(".modal").modal('hide');
    $("#unauthorizedModal").modal('show');
    setTimeout(() => {
        location.reload();
    }, 3000);
}


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
            alert("Something went wrong, please try again latter");
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
                alert('Something went wrong, please try again latter');
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
            alert('Something went wrong, please try again latter');
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
            alert("Something went wrong please try again latter.");
        }
    });

});

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
                alert("Something went wrong, Please try again latter");
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



//====//====//====//====//====//====//====//====//====//====//====//====//
//====//====//====//====//====//====//====//====//====//====//====//====//
// Blogs //
//====//====//====//====//====//====//====//====//====//====//====//====//
//====//====//====//====//====//====//====//====//====//====//====//====//


$(document).on('click','#addBlog',function(){
    $(".validationError").text('');
    const form = $("#blogForm");
    const url = form.attr('action');
    const formData = new FormData(form[0]);
    $.ajax({
        method: 'POST',
        url : url,
        data : formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success:function(response)
        {
            $(".blogInsertResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 422){
                let error = xhr.responseJSON.errors;
                $("#responseTitle").text(error.title);
                $("#responseDescription").text(error.description);
                $("#responseCategory").text(error.category_id);
                $("#responseImage").text(error.image);
            }else if(xhr.status == 403){
                unauthorizedResponse();
            }else{
                console.log(xhr.responseJSON);
            }
        },
    });
});

$(document).on('click','.viewUpdateBlog',function(){
    const blogId = $(this).attr('blogId');
    const url = `blogs/${blogId}/edit`;
    $.ajax({
        method: 'GET',
        url : url,
        dataType: 'JSON',
        success:function(response)
        {
            const form = $("#blogUpdateForm");
            const blog = response.data;
            form.find("input[name='id']").val(blog.id);
            form.find("input[name='title']").val(blog.title);
            form.find("textarea[name='description']").val(blog.description);
            form.find("select[name='category_id']").val(blog.category_id);
            form.find("input[name='title']").val(blog.title);
            form.find("input[name='oldImg']").val(blog.image);
            $("#updateBlogImagePreview").attr('src','http://127.0.0.1:8000/storage/blogs/'+blog.image);
            $("#editPostModal").modal('show');
        },
        error:function(xhr)
        {
            if(xhr.status == 403)
            {
               unauthorizedResponse();
            }else{
                alert('Something went wrong, please try again latter..!');
                location.reload();
            }
        }
    });
});

$(document).on('click','#updateBlog',function(){
    $(".validationError").text("");
    const form = $("#blogUpdateForm");
    const blogId = form.find("input[name='id']").val();
    const url = `blogs/${blogId}`;
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
        dataType: 'JSON',
        processData: false,
        contentType: false,
        success:function(response)
        {
            $(".blogInsertResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 422)
            {
                const errors = xhr.responseJSON.errors;
                $("#responseUpdateTitle").text(errors.title);
                $("#responseUpdateDescription").text(errors.description);
                $("#responseUpdateCategory").text(errors.category_id);
            }else if(xhr.status == 403)
            {
                unauthorizedResponse();
            }else{
                alert("Something went wrong..!");
                console.log(xhr.responseJSON);
            }
        }
    });
});

$(document).on('click','.viewDeleteBlog',function(){
    const blogId = $(this).attr('blogId');
    $("#deleteBlogId").val(blogId);
    $("#deleteBlogModal").modal('show');
});

$(document).on('click','#deleteBlog',function(){
    const formData = $("#deleteBlogForm").serialize();
    const blogId = $("#deleteBlogId").val();
    const url = `blogs/${blogId}`;
    $.ajax({
        method: 'DELETE',
        url: url,
        data: formData,
        dataType: 'json',
        success:function(response)
        {
            console.log(response);
            $(".deleteBlogResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 403)
            {
                unauthorizedResponse();
            }else{
                alert('Something went wrong..!');
                console.log(xhr.responseJSON);
            }
        }
        
    });
});



//====//====//====//====//====//====//====//====//====//====//====//====//
//====//====//====//====//====//====//====//====//====//====//====//====//
// USERS ACCOUNTS //
//====//====//====//====//====//====//====//====//====//====//====//====//
//====//====//====//====//====//====//====//====//====//====//====//====//




$(document).on('click','#addUser',function(){
    $(".validationError").text('');
    const form = $("#storeUserForm");
    const formData = form.serialize();
    $.ajax({
        method: 'POST',
        url : 'usersAccounts',
        data: formData,
        dataType: 'JSON',
        success:function(response)
        {
            $(".userInsertResponse").text(response.message);
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
                $("#responseEmail").text(errors.email);
                $("#responseRole").text(errors.role);
                $("#responsePassword").text(errors.password);
            }else{
                console.log(xhr.responseJSON);
                alert("Somethings went wrong, please try again latter");
            }
        }
    });
});

$(document).on('click','.editUserAccount',function(){
    const userId = $(this).attr('userId');
    const url = `usersAccounts/${userId}/edit`;
    $.ajax({
        method: 'GET',
        url: url,
        dataType: 'json',
        success:function(response)
        {
            const userData = response.data;
            const form = $("#editUserForm");
            form.find("input[name='id']").val(userData.id);
            form.find("input[name='name']").val(userData.name);
            form.find("input[name='email']").val(userData.email);
            form.find("select[name='role']").val(userData.role);
            $("#userEditModel").modal('show');
        },
        error:function(xhr)
        {
            alert('Something went wrong, please try again latter..')
            console.log(xhr.responseJSON);
        }
    });
});

$(document).on('click','#updateUser',function(){
    const form = $("#editUserForm");
    const userId = form.find("input[name='id']").val();
    const formData = form.serialize();
    const url = `usersAccounts/${userId}`;
    $.ajax({
        method: 'PATCH',
        url: url,
        data: formData,
        success:function(response)
        {
            $(".userUpdateResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            if(xhr.status == 422)
            {
                const error = xhr.responseJSON.errors;
                $("#responseUpdateName").text(error.name);
                $("#responseUpdateEmail").text(error.email);
                $("#responseUpdateRole").text(error.role);
                $("#responseUpdatePassword").text(error.password);
            }else{
                console.log(xhr.responseJSON);
                alert("User updating failed..!");
            }
        }
    });
});


$(document).on('click','.actionUserAccount',function(){
    const userId = $(this).attr("userId");
    const userStatus = $(this).attr("userStatus");
    $("#userActionId").val(userId);
    let newStatus = 1;
    if(userStatus == 1){
        newStatus = 0;
    }
    $("#userActionStatus").val(newStatus);
    if(userStatus == 0)
    {
        $("#actionOnAccount").text('Enable');
    }else{
        $("#actionOnAccount").text('Disable');
    }
    $("#userActionModal").modal('show');
});

$(document).on('click','#actionOnAccount',function(){
    const form = $("#userActionForm");
    const userId = form.find("input[name='id']").val();
    const userStatus = Number(form.find("input[name='status']").val());
    const formData = form.serialize();
    const url = `usersAccounts/${userId}/${userStatus}`;
    $.ajax({
        method: 'PATCH',
        url: url,
        data: formData,
        dataType: 'json',
        success:function(response)
        {
            $(".actionAccountResponse").text(response.message);
            setTimeout(() => {
                location.reload();
            }, 2000);
        },
        error:function(xhr)
        {
            console.log(xhr.responseJSON);
            alert("Something went wrong, please try again latter..")
        }
    });
});