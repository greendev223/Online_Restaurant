
<div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
               
                <div class="panel-body">
                    <fieldset class="border p-2">
                       <legend  class="w-auto"><?php echo $title; ?></legend>
                    </fieldset>
					<div class="row bg-brown">
                             <div class="col-sm-12 kitchen-tab" id="option">
                                                <input id="chkbox-1760" type="checkbox" class="individual" name="tax" value="tax" <?php if($taxinfo->tax==1){ echo "checked";}?>>
                                                <label for="chkbox-1760" style="display:inline-flex">
                                                    <span class="radio-shape">
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                   <?php echo display('tex_enable') ?>
                                                </label>
                                                
                            </div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
<script>

$('input[type="checkbox"]').click(function(){
	var csrf = $('#csrfhashresarvation').val();
            if($(this).is(":checked")){
               var menuid=$(this).val();
			   var ischeck=1;
			   var dataString = 'menuid='+menuid+'&status=1&csrf_test_name='+csrf;
            }
            else if($(this).is(":not(:checked)")){
                var menuid=$(this).val();
				var ischeck=0;
				var dataString = 'menuid='+menuid+'&status=0&csrf_test_name='+csrf;
            }
			
                $.ajax({
				type: "POST",
				url: "<?php echo base_url()?>taxsetting/taxsettingback/settingenable",
				data: dataString,
				success: function(data){
					if(ischeck==1){
						swal("Enable", "Tax Enable", "success");
						}
						else{
						swal("Disable", "Tax Enable", "warning");
						}
				    }
			    });
        });

</script>