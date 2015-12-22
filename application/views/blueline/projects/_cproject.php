<?php 
$attributes = array('class' => '', 'id' => '_project');
echo form_open($form_action, $attributes);
if(isset($project)){ ?>
<input id="id" type="hidden" name="id" value="<?php echo $project->id; ?>" />
<?php } ?>


<input type="hidden" name="reference" class="form-control" id="reference" value="<?php if(isset($project)){echo $project->reference;} else{ echo $core_settings->project_reference;} ?>" required/>

<input type="hidden" name="company_id" value="<?php echo $this->client->company->id; ?>" />

<input type="hidden" class="hidden" id="progress" name="progress" value="<?php if(isset($project)){echo $project->progress;}else{echo "0";} ?>">

<input type="hidden" name="progress_calc" value="<?php if(isset($project) && $project->progress_calc == "1"){ echo $project->progress_calc; } else { echo '0'; } ?>" />


<div class="form-group">
                          <label for="name"><?=$this->lang->line('application_name');?> *</label>
                          <input type="text" name="name" class="form-control" id="name"  value="<?php if(isset($project)){echo $project->name;} ?>" required/>
</div>

<div class="form-group">
    <label for="textfield"><?=$this->lang->line('application_description');?> *</label>
    <textarea class="input-block-level form-control"  id="textfield" name="description" required><?php if(isset($project)){echo $project->description;} ?></textarea>
</div>

<div class="form-group">
    <label for="product_link"><?=$this->lang->line('application_link');?> *</label>
    <textarea class="input-block-level form-control" id="product_link" name="product_link" required><?php if(isset($project)){echo $project->product_link;} ?></textarea>
</div>

<div class="form-group">
    <label for="product_qty"><?=$this->lang->line('application_qty');?> *</label>
    <input type="text" name="product_qty" class="form-control" id="product_qty"  value="<?php if(isset($project)){echo $project->product_qty;} ?>" required/>
</div>

<div class="form-group">
    <label for="project_budget"><?=$this->lang->line('application_budget');?> *</label>
    <input type="text" name="project_budget" class="form-control" id="project_budget"  value="<?php if(isset($project)){echo $project->project_budget;} ?>" required/>
</div>

<div class="form-group">
    <label for="custom_logo"><?=$this->lang->line('application_custom_logo');?></label><br>
    <?php
    $options = array();
    $options['1'] = 'Yes';
    $options['0'] = 'No';
    if(isset($project)){$custom_logo_selected = $project->custom_logo;}else{$custom_logo_selected = "1";}
    echo form_dropdown('custom_logo', $options, $custom_logo_selected, 'style="width:100%" class="chosen-select"');?>

</div>

<div class="form-group">
    <label for="custom_packaging"><?=$this->lang->line('application_custom_packaging');?></label><br>
    <?php
    $options = array();
    $options['1'] = 'Yes';
    $options['0'] = 'No';
    if(isset($project)){$custom_packaging_selected = $project->custom_packaging;}else{$custom_packaging_selected = "1";}
    echo form_dropdown('custom_packaging', $options, $custom_packaging_selected, 'style="width:100%" class="chosen-select"');?>

</div>

<div class="form-group">
    <label for="reference_photo"><?=$this->lang->line('application_reference_photo');?></label>
    <div>
        <input id="uploadFile" type="text" name="dummy" class="form-control uploadFile" placeholder="<?php if(isset($project->reference_photo)){ echo $project->reference_photo; }else{ echo "Choose File";} ?>" disabled="disabled" />
        <div class="fileUpload btn btn-primary">
            <span><i class="fa fa-upload"></i><span class="hidden-xs"> <?=$this->lang->line('application_select');?></span></span>
            <input id="uploadBtn" type="file" data-switcher="attachment_description" name="reference_photo" class="upload switcher" accept="capture=camera" />
        </div>
    </div>
</div>

<input type="hidden" name="start" id="start" value="<?php if(isset($project)){echo $project->start;} else{ echo date('Y-m-d');} ?>" required/>
<input type="hidden" name="end" id="end" value="<?php if(isset($project)){echo $project->end;} else{ echo date('Y-m-d',strtotime('+1 year'));} ?>" required/>
<input type="hidden" name="phases" id="phases"  value="<?php if(isset($project)){echo $project->phases;}else{echo "Planning, Developing, Testing";} ?>" required/>

<div class="form-group">
          <label for="category"><?=$this->lang->line('application_category');?></label>
          <input type="text" name="category" class="form-control typeahead" id="category"  value="<?php if(isset($project)){echo $project->category;} ?>"/>
</div>


        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>