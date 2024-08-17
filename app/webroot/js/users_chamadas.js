function callLogin(){
    $.ajax({
        url: '/Clinic_proejct-cake2/Users/login',
        type: 'GET',
        success: function(){
        }
    })
}

function logoutUser() {
    $.ajax({
        url: '/Clinic_proejct-cake2/Users/logout',
        type: 'POST',
        success: function() { 
            location.reload()
        }
    });
}

HomePage()