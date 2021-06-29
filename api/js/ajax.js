$( document ).ready(function() {

var url = "http://localhost/bluefox/";
var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* tampilkan data */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url+'api/read.php',
        data: {page:page}
    }).done(function(data){
    	total_page = Math.ceil(data.total/10);
    	current_page = page;

    	$('#pagination').twbsPagination({
	        totalPages: total_page,
	        visiblePages: current_page,
	        onPageClick: function (event, pageL) {
	        	page = pageL;
                if(is_ajax_fire != 0){
	        	  getPageData();
                }
	        }
	    });

    	manageRow(data.data);
        is_ajax_fire = 1;

    });

}

/* tampilkan  data */
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url+'api/read.php',
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}


/* tambahkan data baru pada table */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+value.user_name+'</td>';
	  	rows = rows + '<td>'+value.user_email+'</td>';
                rows = rows + '<td>'+value.user_address+'</td>';
	  	rows = rows + '<td data-id="'+value.user_id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-user" class="btn btn-primary btn-sm edit-user"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button> ';
        rows = rows + '<button class="btn btn-danger btn-sm remove-user"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* tambah user */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-user").find("form").attr("action");
    var user_name = $("#create-user").find("input[name='user_name']").val();
    var user_email = $("#create-user").find("input[name='user_email']").val();
    var user_address = $("#create-user").find("input[name='user_address']").val();

    if(user_name != '' && user_email != '' && user_address != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{user_name:user_name, user_email:user_email, user_address:user_address}
        }).done(function(data){
            $("#create-user").find("input[name='user_name']").val('');
            $("#create-user").find("input[name='user_email']").val('');
            $("#create-user").find("input[name='user_address']").val('');
            getPageData();
            $(".modal").modal('hide');
            alert('Data berhasil ditambah')
        });
    }else{
        alert('Ada data yang kosong')
    }


});

/* hapus user */
$("body").on("click",".remove-user",function(){
    var user_id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: url + 'api/delete.php',
        data:{user_id:user_id}
    }).done(function(data){
        c_obj.remove();
        getPageData();
        alert('Data berhasil dihapus')
    });

});


/* Edit user */
$("body").on("click",".edit-user",function(){

    var user_id = $(this).parent("td").data('id');
    var user_name = $(this).parent("td").prev("td").prev("td").prev("td").text();
    var user_email = $(this).parent("td").prev("td").prev("td").text();
    var user_address = $(this).parent("td").prev("td").text();
    $("#edit-user").find("input[name='user_name']").val(user_name);
    $("#edit-user").find("input[name='user_email']").val(user_email);
    $("#edit-user").find("input[name='user_address']").val(user_address);
    $("#edit-user").find("input[name='user_id']").val(user_id);

});


/* Update user */
$(".crud-edit").click(function(e){

    e.preventDefault();
    var form_action = $("#edit-user").find("form").attr("action");
    var user_name = $("#edit-user").find("input[name='user_name']").val();
    var user_email = $("#edit-user").find("input[name='user_email']").val();
    var user_address = $("#edit-user").find("input[name='user_address']").val();
    var user_id = $("#edit-user").find("input[name='user_id']").val();

    if(user_name != '' && user_email != '' && user_address != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: url + form_action,
            data:{user_name:user_name, user_email:user_email, user_address:user_address,user_id:user_id}
        }).done(function(data){
            getPageData();
            $(".modal").modal('hide');
            alert('Data berhasil diedit')
        });
    }else{
        alert('Ada data yang kosong')
    }

});
});
