<?php


function fix_variables($variables) {
//text_html
$default_inputs = ['text',
    'name',
    'password',
    'email',
    'number',
    'integer',
    'phone',
    'date',
    'date_pick',
    'date_range_pick',
    'date_time_pick',
    'time',
    'time_pick',
    'time_range_pick',
    'edit_textarea',
    'textarea',
    'radio',
    'checkbox',
    'ip',
    'color_pick',
    'button',
    'submit',
    'delete_button'=>'',
    'edit_button'=>'',
    'header',
    'footer',
    'select',
    'multi_dropdown',
    'customer'
   ]; //inputs array


$default_input_icon = array(
    'text'=>'fa fa-fw fa-pencil',
    'name'=>'fa fa-fw fa-user',
    'password'=>'fa fa-fw fa-lock',
    'email'=>'fa fa-fw fa-envelope',
    'number'=>'fa fa-fw fa-list-ol',
    'integer'=>'fa fa-fw fa-list-ol',
    'phone'=>'fa fa-fw fa-phone',
    'date'=>'fa fa-fw fa-calendar-o',
    'date_pick'=>'fa fa-fw fa-calendar',
    'date_range_pick'=>'fa fa-fw fa-calendar',
    'date_time_pick'=>'fa fa-fw fa-calendar',
    'time'=>'fa fa-fw fa-clock-o',
    'time_pick'=>'fa fa-fw fa-clock-o',
    'time_range_pick'=>'fa fa-fw fa-clock-o',
    'edit_textarea'=>'fa fa-fw fa-font',
    'textarea'=>'fa fa-fw fa-font',
    'radio'=>'',
    'checkbox'=>'',
    'ip'=>'fa fa-fw fa-thumb-tack',
    'color_pick'=>'fa fa-fw fa-crosshairs',
    'button'=>'fa fa-fw fa-hand-o-up',
    'submit'=>'fa fa-fw fa-arrow-up',
    'delete_button'=>'fa fa-fw fa-trash-o',
    'edit_button'=>'fa fa-fw fa-edit',
    'header'=>'',
    'footer'=>'',
    'select'=>'',
    'multi_dropdown'=>'',
    'customer'=>''
); //inputs array



                


$default_data_inputmask= ['text'=>'',
    'name'=>'',
    'password'=>'',
    'email'=>'',
    'number'=>'',
    'integer'=>'',
    //'data-inputmask="\'mask\': [\'999-999-9999 [x99999]\',\'+099 99 99 9999[9]-9999\']"  data-mask '
    'phone'=>' data-inputmask=\'"mask": "(999) 999-99999999"\'  data-mask  ',
    //'data-inputmask="\'alias\': \'mm/dd/yyyy\'" data-mask'
    'date'=>'data-inputmask="\'alias\': \'yyyy-mm-dd\'" data-mask',
    'date_pick'=>'',
    'date_range_pick'=>'',
    'date_time_pick'=>'',
    'time'=>'',
    'time_pick'=>'',
    'time_range_pick'=>'',
    'edit_textarea'=>'',
    'textarea'=>'',
    'radio'=>'',
    'checkbox'=>'',
    'ip'=> 'data-inputmask="\'alias\': \'ip\'" data-mask ',
    'color_pick'=>'',
    'button'=>'',
    'submit'=>'',
    'delete_button'=>'',
    'edit_button'=>'',
    'header'=>'',
    'footer'=>'',
    'select'=>'',
    'multi_dropdown'=>'',
    'customer'=>''
   ]; //inputs array



$default_javascript = ['text'=>'$("[data-mask]").inputmask();',
    'name'=>'$("[data-mask]").inputmask();',
    'password'=>'',
    'email'=>'',
    'number'=>'',
    'integer'=>'',
    'phone'=>'',
    'date'=>'$("#|replaced|").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});',
    'date_pick'=>'',
    'date_range_pick'=>'   $("#|replaced|").daterangepicker({timePicker: false, format: \'| YYYY-MM-DD  |\'});',
    'date_time_pick'=>"$('#|replaced|').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY-mm-dd h:mm A'});",
    'time'=>'',
    'time_pick'=>'   $("#|replaced|").timepicker({showInputs: false});   ',
    'time_range_pick'=>'',
    'edit_textarea'=>'$(function () {$("#|replaced|").wysihtml5();});',
    'textarea'=>'',
    'radio'=>'',
    'checkbox'=>'',
    'ip'=>'',
    'color_pick'=>' $("#|replaced|").colorpicker(); ',
    'button'=>'',
    'submit'=>'',
    'delete_button'=>'',
    'edit_button'=>'',
    'header'=>'',
    'footer'=>'',
    'select'=>'',
    'multi_dropdown'=>'',
    'customer'=>''
   ]; //inputs array


    $variables['name'] = (!isset($variables['name'])) ? $variables['type'] : $variables['name'];
    $variables['label'] = (!isset($variables['label'])) ? $variables['name'] : $variables['label'];
   $variables['placeholder'] = (!isset($variables['placeholder'])) ? $variables['label'] : $variables['placeholder'];
   $variables['id'] = (!isset($variables['id'])) ? $variables['name'] : $variables['id'];
   
    
    
    $variables['form_group'] = (!isset($variables['form_group'])) ? 'form-group' : $variables['form_group'];
    $variables['input_group'] = (!isset($variables['input_group'])) ? 'input-group' : $variables['input_group'];
    $variables['form_control'] = (!isset($variables['form_control'])) ? 'form-control' : $variables['form_control'];
if( $variables['type']=='time_pick'){
    $variables['form_control']= 'form-control timepicker';$variables['form_group']='bootstrap-timepicker';
    
}
    
    
  $variables['value'] = (!isset($variables['value'])) ? '' : $variables['value'];

  $variables['onclick'] = (!isset($variables['onclick'])) ? '' : $variables['onclick'];


    //if (!isset($variables['data_inputmask'])) {$variables['data_inputmask']=$default_data_inputmask[$variables['type']]; }
        
    if (!isset($variables['input_icon'])) {
     
        
       $variables['input_icon'] ='
                      <div class="input-group-addon">
                        <i class="'.$default_input_icon[$variables['type']].'"></i>
                      </div>
                      ';
       
        }//input_icon not set
    
        
         if(!isset($variables['javascript'])){
            $variables['javascript']= str_replace('|replaced|', $variables['name'],$default_javascript[$variables['type']]);
             
         }//if(!isset($variables['javascript']))
       

         
         $variables['data_inputmask']=(!isset($variables['data_inputmask']))? $default_data_inputmask[$variables['type']]: $variables['data_inputmask'];
   $variables['input_size']=(!isset($variables['input_size']))? ' input-sm': $variables['input_size'];
   
   if(!isset($variables['button_text'])){
   if($variables['type']=='submit'){$variables['button_text']='submit';}
         
   if($variables['type']=='delete_button'){$variables['button_text']='delete';}
   if($variables['type']=='edit_button'){$variables['button_text']='edit';}
         
   }//$variables['button_text']
   
         return $variables;
    
}//fix)_variables


function defualt_input_template($variables){
    
    $variables['type']=($variables['type']=='date')? 'text':$variables['type'];
        
         return '<div class="'. $variables['form_group'].'">
                    <label>'.$variables['label'].'</label>
                    <div class="'.$variables['input_group'] .'">
                                '.$variables['input_icon'].'
                      <input type="'.$variables['type'].'" class="'.$variables['form_control'].' '.$variables['input_size'].'" name="'.$variables['name'].'"  value="'.$variables['value'].'"  placeholder="'.$variables['placeholder'].'"id="'.$variables['id'].'" '.$variables['data_inputmask'].' />
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->';
    
}//defualt_input_template(){}
 
function textarea_template($variables){
    
    
        
         return '<label>'.$variables['label'].'</label>
                 <div class="'. $variables['form_group'].'">
                    

                      <textarea type="'.$variables['type'].'" class="'.$variables['form_control'].' '.$variables['input_size'].'" name="'.$variables['name'].'"  placeholder="'.$variables['placeholder'].'"id="'.$variables['id'].'" '.$variables['data_inputmask'].' style="height:150px;" >'.$variables['value'].' </textarea>
                 
                  </div><!-- /.form group -->';
    
}//textarea_template(){}
 

function select_template($variables){
    
  $html='<div class="'.$variables['form_group'].'">
                      <label>'.$variables['label'].'</label>
                      <select type="'.$variables['type'].'" class="'.$variables['form_control'].' '.$variables['input_size'].'" name="'.$variables['name'].'"  id="'.$variables['id'].'" >';
                        foreach($variables['options'] as $i=>$one_option){
                            $value=(isset($variables['options_value'][$i]))? $variables['options_value'][$i]:$one_option;
                            $html.='<option value="'.$value.'" ';
                            if($value==$variables['value']){$html.=' selected';}
                            $html.='>'.$one_option.'</option>';
                        }//while options
                     $html.=' </select>
                    </div>';
  
  return $html;
}//select_template(){
function button_template($variables){
    
    
    $html='';
    
    $html.= '<button type="'.$variables['type'].'" value="'.$variables['value'].'" onclick=\''.$variables['onclick'].'  return false;\'  class="btn btn-primary '.$variables['input_size'].'" style="margin:0px 10px;">'.$variables['button_text'].'</button>';
                
    return $html;
}//button_template(){

function radio_template($variables){
$html='<label>
                      <input type="'.$variables['type'].'" name="'.$variables['name'].'" value="'.$variables['value'].'" class="minimal" '; 
if(isset($variables['checked'])){ $html.='checked';}
$html.=' />
                          '.$variables['label'].'
                    </label>';

return $html;
}//radio_template


function header_template($variables){
$html=' <div class="box-header">
                  <h3 class="box-title">'.$variables['label'].'</h3>
                </div>';

return $html;
}//radio_template




function get_form_html($inputs){
    $form_html='';
    $javascript='';
$footer_buttons='';
    
       
       
    foreach($inputs as $variables){
    $variables = fix_variables($variables);
    
    if ($variables['type']=='textarea'){ $form_html.=textarea_template($variables);}
    else if ($variables['type']== 'edit_textarea'){ $form_html.=textarea_template($variables);}
     else if ($variables['type']== 'select'){ $form_html.=select_template($variables);}
     else if ($variables['type']== 'submit' || $variables['type']== 'button' || $variables['type']== 'delete_button' || $variables['type']== 'edit_button' ){ $footer_buttons.=button_template($variables);}
    else if ($variables['type']== 'radio' || $variables['type']== 'checkbox'  ){ $form_html.=radio_template($variables);}
    else if ($variables['type']=='customer'){$form_html.=$variables['html'];}
    else if ($variables['type']=='header'){$form_html.=header_template($variables);}
     else{$form_html.=defualt_input_template($variables);}
        
    
    $javascript.=$variables['javascript'];
    }//for each input in $inputs
    
    return array(
        'form_html'=>$form_html,
        'javascript'=>$javascript,
        'footer'=>'<div class="box-footer">'.$footer_buttons.'</div>'
    );
}//get_form_html()


 /*___________________________________________________________________________________________________________________________how_to_use*
$inputs_arr=    array(
   
        array('type'=>'color_pick'), 
    array('type'=>'edit_textarea'),
    
    array('type'=>'select','options'=>array('mohammad','hashim'),'options_value'=>array('5')),
    
    array('type'=>'phone'),
    array('type'=>'submit','value'=>'','onclick'=>'my_ajax("php.php",get_form_value("#my_form"),function(data){alert(data);});'),
    array('type'=>'radio','name'=> 'name_radio','value'=>'abdullah','label'=>'select label abdullah'),
    array('type'=>'delete_button','value'=>'','onclick'=>'my_ajax("php.php",{"delete":5},function(data){alert(data);});')
    ,array('type'=>'button','button_text'=>'my_button')
    ,array('type'=>'customer','html'=>'<hr><hr><br><br>')
    ,array('type'=>'radio','name'=> 'name_radio','value'=>'mohammd','label'=>'select label mohammad')
    ,array('type'=>'radio','name'=> 'name_radio','value'=>'hashim','label'=>'select label hashim')
    ,array('type'=>'radio','name'=> 'name_radio','value'=>'khalid','label'=>'select label khalid')
    
        
); //all_inputs

$form=get_form_html($inputs_arr);

echo $form['form_html'];
echo '<script>'.$form['javascript'].'</script>';
 echo $form['footer'];   
 /*__________________________________________________________________________________________________________________End_________how_to_use*/
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script>
    
 function get_form_value(form_id){
     var values={};
     
        var radio_name_arr=new Array();
     $(form_id).find('textarea,input,select').each(function(){
        
        
        var type=$(this).attr('type');
         if(type!='radio'  && type!='button' && type!='submet'){
             
             values[$(this).attr('name')]=$(this).val();
         }else if(type=='radio'){
             var name=$(this).attr('name');
             if(!radio_name_arr.indexOf(name)> -1){values[name]=$('input[name="'+name+'"]:checked').val();}//radio has been get value
             radio_name_arr.push(name);
             
             
             
         }
         
         
     });//each input
     
     
     return values;
     
 }//get_form_value(){}   
    
    </script>
    