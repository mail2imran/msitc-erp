<?php
$attributes = array('class' => 'dynamic-form', 'id' => '_cestimate');
echo form_open_multipart($form_action, $attributes);
if(isset($estimate)){ ?>
    <input id="id" type="hidden" name="id" value="<?php echo $estimate->id; ?>" />
<?php } ?>


<fieldset class="fieldset-border">
    <legend class="fieldset-border"><?php echo $this->lang->line('application_shipping_estimate_fieldset');?></legend>
    <div class="form-group">
        <label for="shipping_method"><?php echo $this->lang->line('application_select_shipping_method');?></label><br>
        <?php
        $options = array();
        $method_found = false;
        foreach ($shipping_methods as $value):
            $options[$value->name] = $value->name;

            if(isset($estimate)){
                if($value->name == $estimate->shipping_method){
                    $method_found = true;
                }
            }
        endforeach;

        if(isset($estimate)){
            $shipping_method_selected = $estimate->shipping_method;

            if(!$method_found){
                $options[$shipping_method_selected] = $shipping_method_selected;
            }
        }else{
            $shipping_method_selected = "";
        }
        echo form_dropdown('shipping_method', $options, $shipping_method_selected, 'style="width:100%" class="chosen-select"');?>

    </div>

    <div class="form-group">
        <label for="shipping_goods_description'"><?php echo $this->lang->line('application_shipping_goods_description');?> *</label>
        <textarea class="input-block-level form-control" id="shipping_goods_description'" name="shipping_goods_description" required><?php if(isset($estimate)){echo $estimate->shipping_goods_description;} ?></textarea>
    </div>

    <div class="form-group">
        <label for="shipping_total_boxes"><?php echo $this->lang->line('application_shipping_total_boxes');?> *</label>
        <input type="number" name="shipping_total_boxes" class="form-control" id="shipping_total_boxes"  value="<?php if(isset($estimate)){echo $estimate->shipping_total_boxes;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_qty_per_box"><?php echo $this->lang->line('application_shipping_qty_per_box');?> *</label>
        <input type="number" name="shipping_qty_per_box" class="form-control" id="shipping_qty_per_box"  value="<?php if(isset($estimate)){echo $estimate->shipping_qty_per_box;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_box_size_length"><?php echo $this->lang->line('application_shipping_box_size_length');?> *</label>
        <input type="text" name="shipping_box_size_length" class="form-control" id="shipping_box_size_length" value="<?php if(isset($estimate)){echo $estimate->shipping_box_size_length;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_box_size_width"><?php echo $this->lang->line('application_shipping_box_size_width');?> *</label>
        <input type="text" name="shipping_box_size_width" class="form-control" id="shipping_box_size_width" value="<?php if(isset($estimate)){echo $estimate->shipping_box_size_width;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_box_size_height"><?php echo $this->lang->line('application_shipping_box_size_height');?> *</label>
        <input type="text" name="shipping_box_size_height" class="form-control" id="shipping_box_size_height" value="<?php if(isset($estimate)){echo $estimate->shipping_box_size_height;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_box_weight"><?php echo $this->lang->line('application_shipping_box_weight');?> *</label>
        <input type="text" name="shipping_box_weight" class="form-control" id="shipping_box_weight" value="<?php if(isset($estimate)){echo $estimate->shipping_box_weight;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_lebel"><?php echo $this->lang->line('application_shipping_lebel');?></label>
        <div>
            <input id="uploadFile" type="text" name="dummy" class="form-control uploadFile" placeholder="<?php if(isset($estimate->shipping_lebel)){ echo $estimate->shipping_lebel; }else{ echo "Choose File";} ?>" readonly/>
            <div class="fileUpload btn btn-primary">
                <span><i class="fa fa-upload"></i><span class="hidden-xs"> <?php echo $this->lang->line('application_select');?></span></span>
                <input id="uploadBtn" type="file" data-switcher="attachment_description" name="userfile" class="upload switcher" accept="capture=camera" />
            </div>
        </div>
    </div>
</fieldset>

<fieldset class="fieldset-border">
    <legend class="fieldset-border"><?php echo $this->lang->line('application_shipping_address_fieldset');?></legend>
    <div class="form-group">
        <label for="shipping_name"><?php echo $this->lang->line('application_shipping_contact');?> *</label>
        <input type="text" name="shipping_name" class="form-control" id="shipping_name"  value="<?php if(isset($address)){echo $address->shipping_name;} ?>" required/>
    </div>


    <div class="form-group">
        <label for="shipping_company"><?php echo $this->lang->line('application_shipping_company');?></label>
        <input type="text" name="shipping_company" class="form-control" id="shipping_company"  value="<?php if(isset($address)){echo $address->shipping_company;} ?>"/>
    </div>


    <div class="form-group">
        <label for="shipping_address'"><?php echo $this->lang->line('application_shipping_address');?> *</label>
        <textarea class="input-block-level form-control" id="shipping_address'" name="shipping_address" required><?php if(isset($address)){echo $address->shipping_address;} ?></textarea>
    </div>

    <div class="form-group">
        <label for="shipping_city"><?php echo $this->lang->line('application_shipping_city');?> *</label>
        <input type="text" name="shipping_city" class="form-control" id="shipping_city"  value="<?php if(isset($address)){echo $address->shipping_city;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_state"><?php echo $this->lang->line('application_shipping_state');?></label>
        <input type="text" name="shipping_state" class="form-control" id="shipping_state"  value="<?php if(isset($address)){echo $address->shipping_state;} ?>"/>
    </div>

    <div class="form-group">
        <label for="shipping_zip"><?php echo $this->lang->line('application_shipping_zip');?> *</label>
        <input type="text" name="shipping_zip" class="form-control" id="shipping_zip"  value="<?php if(isset($address)){echo $address->shipping_zip;} ?>" required/>
    </div>

    <div class="form-group">
        <label for="shipping_country"><?php echo $this->lang->line('application_shipping_country');?> *</label>

        <?php
        $options = $geolib->getCountryAssociativeArray();
        if(isset($address)){$country_selected = $address->shipping_country;}else{$country_selected = "";}
        echo form_dropdown('shipping_country', $options, $country_selected, 'style="width:100%" class="chosen-select"');?>

    </div>

    <div class="form-group">
        <label for="shipping_phone"><?php echo $this->lang->line('application_shipping_phone');?></label>
        <input type="text" name="shipping_phone" class="form-control" id="shipping_phone"  value="<?php if(isset($address)){echo $address->shipping_phone;} ?>"/>
    </div>

    <!--
    <div class="form-group">
        <label for="shipping_email"><?php echo $this->lang->line('application_shipping_email');?> *</label>
        <input type="text" name="shipping_email" class="form-control" id="shipping_email"  value="<?php if(isset($address)){echo $address->shipping_email;} ?>" required/>
    </div>
    -->

    <input type="hidden" name="shipping_email" id="shipping_email" value="<?php if(isset($address)){echo $address->shipping_email;} ?>"/>

    <!--<div class="form-group">
        <label for="shipping_website"><?php echo $this->lang->line('application_shipping_website');?> *</label>
        <input type="text" name="shipping_website" class="form-control" id="shipping_website"  value="<?php if(isset($address)){echo $address->shipping_website;} ?>" required/>
    </div>
    -->
    <input type="hidden" name="shipping_website" id="shipping_website" value="<?php if(isset($address)){echo $address->shipping_website;} ?>"/>
</fieldset>

<fieldset class="fieldset-border">
    <legend class="fieldset-border"><?php echo $this->lang->line('application_shipping_estimate_settings_fieldset');?></legend>
    <?php if(isset($estimate)){ ?>
        <div class="form-group">
            <label for="status"><?php echo $this->lang->line('application_status');?></label>
            <?php $options = array(
                'Open'  => $this->lang->line('application_Open'),
                'Sent'    => $this->lang->line('application_Sent'),
                'Accepted' => $this->lang->line('application_Accepted'),
                'Declined' => $this->lang->line('application_Declined'),
                'Invoiced' => $this->lang->line('application_Invoiced'),
                'Revised' => $this->lang->line('application_Revised')
            );
            echo form_dropdown('estimate_status', $options, $estimate->estimate_status, 'style="width:100%" class="chosen-select"'); ?>

        </div>
    <?php } ?>

    <div class="form-group">
        <label for="issue_date"><?php echo $this->lang->line('application_issue_date');?></label>
        <input id="issue_date" type="text" name="issue_date" class="datepicker form-control" value="<?php if(isset($estimate)){echo $estimate->issue_date;} ?>"  required/>
    </div>
    <div class="form-group">
        <label for="due_date"><?php echo $this->lang->line('application_due_date');?></label>
        <input id="due_date" type="text" name="due_date" class="required datepicker form-control" value="<?php if(isset($estimate)){echo $estimate->due_date;} ?>"  required/>
    </div>
    <div class="form-group">
        <label for="currency"><?php echo $this->lang->line('application_currency');?></label>
        <input id="currency" type="text" name="currency" class="required form-control" value="<?php if(isset($estimate)){ echo $estimate->currency; }else { echo $core_settings->currency; } ?>" required/>
    </div>
    <div class="form-group">
        <label for="currency"><?php echo $this->lang->line('application_discount');?></label>
        <input class="form-control" name="discount" id="appendedInput" type="text" value="<?php if(isset($estimate)){ echo $estimate->discount;} ?>"/>
    </div>
    <div class="form-group">
        <label for="terms"><?php echo $this->lang->line('application_terms');?></label>
        <textarea id="terms" name="terms" class="textarea required form-control" style="height:100px"><?php if(isset($estimate)){echo $estimate->terms;}else{ echo $core_settings->estimate_terms; }?></textarea>
    </div>
    <div class="form-group">
        <label for="terms"><?php echo $this->lang->line('application_custom_tax');?></label>
        <input class="form-control" name="tax" type="text" value="<?php if(isset($estimate)){ echo $estimate->tax;}else{echo $core_settings->tax;} ?>"/>
    </div>
    <div class="form-group">
        <label for="terms"><?php echo $this->lang->line('application_second_tax');?></label>
        <input class="form-control" name="second_tax" type="text" value="<?php if(isset($estimate)){ echo $estimate->second_tax;} ?>"/>
    </div>
</fieldset>

<div class="modal-footer">
    <input type="submit" name="send" class="btn btn-primary" value="<?php echo $this->lang->line('application_save');?>"/>
    <a class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('application_close');?></a>
</div>

<?php echo form_close(); ?>
