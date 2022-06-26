<div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 
            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo ('ID') ?></th>
                            <th><?php echo ('Restaurant') ?></th>
                            <th><?php echo ('Level') ?></th> 
                            <th><?php echo ('status') ?></th>
                            <th><?php echo ('action') ?></th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($addonslist)) { ?>
                            <?php $sl = $pagenum+1; ?>
                            <?php foreach ($addonslist as $addons) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $addons->add_store_name; ?></td>
                                    <td><?php if($currency->position==1)?> <?php echo $addons->price; ?> <?php if($currency->position==2){echo $currency->curr_icon;}?></td>
                                    <td><?php if($addons->is_active==1){echo "Active";}else{echo "Inactive";} ?></td>
                                    <td class="center">
                                    <?php if($this->permission->method('stores','update')->access()): ?>
                                        <a href="<?php echo base_url("stores/store/create/$addons->add_store_id") ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
                                         <?php endif; 
										 if($this->permission->method('stores','delete')->access()): ?>
                                        <a href="<?php echo base_url("stores/store/delete/$addons->add_store_id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                         <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                <div class="text-right"></div>
            </div>
        </div>
    </div>
</div>
 
