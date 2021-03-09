

$('#save').on('click', function (e) {
    e.preventDefault(); 
    simpan();    
});

$('#edit').on('click', function (e) {
    e.preventDefault(); 
    ubah();    
});

$('#delete').on('click', function (e) {
    e.preventDefault(); 
    if (confirm("Are you sure?")) {
    hapus();  
    }
    return false;  
});




function simpan (){
    $.ajax({
        type: "POST",
        url: "save",
        data: {
           "status" : $('#status').val(),
           "position" : $('#position').val(),
        },
        success: function (response) {
            window.location.href = '/'; 
        },
        failure: function (response) {
            alert(response.responseText);
            alert("Failure");
        },
        error: function (response) {
            alert(response);
            alert("Error");
        }
});
};

function ubah (){
    $.ajax({
        type: "POST",
        url: "/ubah",
        data: {
           "user_id" : $('#user_id').val(),
           "status" : $('#status').val(),
           "position" : $('#position').val(),
        },
        success: function (response) {           
            window.location.href = '/'; 
        },
        failure: function (response) {
            alert(response.responseText);
            alert("Failure");
        },
        error: function (response) {
            alert(response);
            alert("Error");
        }
});
};

function hapus (){
    $.ajax({
        url:'delete/' + $('#user_id').val(),
        type: 'GET',
        success: function (response) {           
            window.location.href = '/'; 
        },
        failure: function (response) {
            alert(response.responseText);
            alert("Failure");
        },
        error: function (response) {
            alert(response);
            alert("Error");
        }
});
};

