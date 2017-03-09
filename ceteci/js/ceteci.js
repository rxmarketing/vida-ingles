/*jslint browser: true*/
(function ($) {
    "use strict";
    /*global jQuery, document*/
    $(document).on("ready", function () {
        
        //hightlights even rows
		$('.table-data tr:even').addClass('hightlight');
        
		//changes tr bgrnd color on mouseover
		$('.table-data tr').mouseover(function(){
			$(this).addClass('mouseover');
		})
		// removes class mouseover on mouseOut
		$('.table-data tr').mouseout(function(){
			$(this).removeClass('mouseover');
		})
        
        //dinamic select muni options //////////////////////////////////////////////////////////////////////
        $('#state').on('change', function(){
            var eid = $('#state').val();
            var url = 'php/php_select_munis.php';
            $.ajax({
                type:'POST',
                url:url,
                data:'eid='+eid,
			}) //ends ajax
            .always(function (data) {
                $('#muni option').remove();
                $('#muni').append(data);
			}); //ends always
		}); //end on change
        
        //dinamic select asentamientos options //////////////////////////////////////////////////////////////////////
        $('#muni').on('change', function(){
            var muniid = $('#muni').val();
            alert(muniid);
            var url = 'php/php_select_asent.php';
            $.ajax({
                type:'POST',
                url:url,
                data:'muniid='+muniid,
			}) //ends ajax
            .always(function (data) {
                $('#asentamiento option').remove();
                $('#asentamiento').append(data);
			}); //ends always
		}); //end on change
        
        // DINAMIC SELECT MODULE NAME
		$('#mod_cat_id').on('change', function(){
			var modCatId = $('#mod_cat_id').val();
			//alert(modCatId);
			var url = 'php/php_select_module_name.php';
			$.ajax({
				type:'POST',
				url:url,
				data: 'id=' + modCatId,
			})
			.always(function (data) {
				$('#modNameId option').remove();
				$('#modNameId').append(data);
			});
		});
		
		// DINAMIC SELECT MODULE ID
		$('#groupID').on('change', function(){
			var groupId = $('#groupID').val();
			//alert(groupId);
			var url = 'php/php_select_module.php';
			$.ajax({
				type:'POST',
				url: url,
				data: 'id=' + groupId,
			})
			.always(function(data){
				$('#grp_mod_id option').remove();
				$('#grp_mod_id').append(data);
			});
		}); // ENDS groupID ON CHANGE FUNCTION
		
		// DINAMIC SELECT UNIT ID
		$('#grp_mod_id').on('change', function(){
			var groupModId = $('#grp_mod_id').val();
			//alert(groupModId);
			var url = 'php/php_select_unit.php';
			$.ajax({
				type:'POST',
				url: url,
				data: 'id=' + groupModId,
			})
			.always(function(data){
				$('#mod_unit_id option').remove();
				$('#mod_unit_id').append(data);
			});
		}); // ENDS grp_mod_id ON CHANGE FUNCTION
		
		// View student details modal
		$('.view-data').click(function(){  
			var student_id = $(this).attr('id');
			//$.ajax({
			//	url: "php/select-stud-details.php",
			//	method: "POST",
			//	data: {studentid:student_id},
			//	success: function(data){
			//		$('#student-detail').html(data);
					$('#view-modal').modal("show");
		//}
		//}); // Ends .ajax
    }); // Ends .click function
		
		
		
	}); // Ends document on.ready function
}(jQuery));