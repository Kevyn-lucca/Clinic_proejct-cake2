
function logoutUser() {
    $.ajax({
        url: '/clinica_project/Users/logout',
        type: 'POST',
        success: function() { 
            location.reload()
        }
    });
}


