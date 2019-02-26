<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/plugin/summernote/summernote.min.js') }}"></script>
<script src="{{ url('js/plugin/icon-picker/fontawesome-iconpicker.min.js') }}"></script>
<script src="{{ url('js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ url('js/plugin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('js/plugin/datatables/datatables.bootstrap4.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#index-table').DataTable({
            pageLength: 10,
            responsive: true,
            processing: true,
        });
        $('.icon-picker').iconpicker();
    });
    $(document).on('click', '#btn-delete', function(e) {
	    e.preventDefault();
	    var link = $(this);
	    swal({
	        title: "Confirm Delete",
	        text: "Are you sure to delete this item?",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes, delete it!",
	        closeOnConfirm: true
	     },
	     function(isConfirm){
	         if(isConfirm){
	            window.location = link.attr('href');
	         }
	         else{
	            swal("cancelled","Deletion Cancelled", "error");
	         }
	     });
	});
</script>