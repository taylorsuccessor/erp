/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    
 function my_ajax(url,send_data,button_node,callback){
     
     var button_text=button_node.html();
     var button_padding=button_node.css('padding');
      button_node.css('padding','0 10px');
     button_node.html('<img src="images/wiate.gif" style="width:100%;">');
$.ajax({dataType:"text",type:"post",url:url,data:send_data,success:function(return_data){alert(return_data);	

callback(return_data);
},
error:function(){
	
	
	alert('error,please try again later');
	},
complete:function(){
    button_node.css('padding',button_padding);
     button_node.html(button_text);
	}
    });//ajax

	
     
     
 }//my_ajax   
    
    
    


/*_________________________________pagination_click*/
var pagination_num=0;

function get_rows(target_page,destination,destination_f,sended_data){
	var page=sended_data['page'];
$.ajax({type:"post",url:target_page,data:sended_data,success:function(data,statue){
	var data_arr=new Array(); data_arr=data.split('||=>||');
	
	$(destination).html(data_arr[0]);
	//creat_pagination_ul(totale,selected) rows||=>||totale||=>|| selected
	$('#pages_number_all_div').html(creat_pagination_ul(data_arr[1],page,destination_f));
}});//ajax	
	
	}//get_rows()

function creat_pagination_ul(totale,selected,destination_f){
var pages=Math.ceil(totale/10 );
if(pages==0){return '';}
var ul='';
ul+='<ul class="pagination">'; 
var prev=(selected==0)? pages-1:selected-1;
ul+='<li><a href="#" onclick="'+destination_f+'('+prev+'); return false;">PREV</a></li>';


for (var i=0;i<pages;i++){
ul+='<li  ';if(selected==i){ul+='class="active_page"';}
ul+=' ><a href="#" onclick="'+destination_f+'('+i+');return false;">'+ (i*1+1) +'</a></li>';
}//for each li

var next=(selected==pages-1)? 0:selected+1;
ul+='  <li><a href="#"  onclick="'+destination_f+'('+next+'); return false;">NEXT</a></li>';
ul+='</ul>';

return ul;
	}//create_pagination_ul(totale_links,selected_li)
	
/*_____________________________END____pagination_click*/

/*_______________________________________________________________________pop_message*/
function hide_pop_message(index){$(".alert[index='"+index+"']").remove();}
var message_index=0;
              function pop_message(status,message){
                  
                  
                  var error_template='<div class="alert alert-danger alert-dismissable" index="'+message_index+'" >'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onClick="$(this).parent().remove();">×</button>'+
                    '<h4><i class="icon fa fa-ban"></i> error!</h4>'+message+
                    '</div>';
            
            var success_template='<div class="alert alert-success alert-dismissable"  index="'+message_index+'">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onClick="$(this).parent().remove();">×</button>'+
                    '<h4>	<i class="icon fa fa-check"></i> success </h4>'+message+
                  '</div>';
                   
                   var wait_template='<div class="alert alert-info alert-dismissable"   index="'+message_index+'">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onClick="$(this).parent().remove();">×</button>'+
                   ' <h4><i class="icon fa fa-info"></i> <img src="images/wiate.gif" ></h4>'+message+
                 ' </div>';
                   if(status=='success'){
                       $("body").append(success_template);
                  }//success
                  else if(status=='error'){
                  $("body").append(error_template);
                      
                  }//else error
                  else if(status=='wait'){
                      
                  $("body").append(wait_template);
                      
                  }//wait
                       setTimeout('hide_pop_message('+message_index+')',10000);
                       message_index++;
              }//pop_message(status,message){
  
/*_________________________________________________________________End______pop_message*/
            
/*____________________________________________________________________________delete*/

    var delete_status=false;
 function delete_rows(delete_arr,table,delete_node_arr){
     
     if(delete_arr.length==0){return false;}
     if(delete_status==true){pop_message('wait','please wait until finishing last delete');return false;}
     delete_status=true;
     
     pop_message('wait','please, wait to delete');
     
$.ajax({dataType:"text",type:"post",url:"php_php.php",data:{"delete_arr":delete_arr,'table':table},success:function(return_data){	


var data=new Array();data=return_data.split('||=>||');
pop_message(data[0],data[1]);
for(var i=0;i<delete_node_arr.length;i++){delete_node_arr[i].remove();}//for each delete_node_arr
},
error:function(){
	
	
	alert('error,please try again later');
	},
complete:function(){
      delete_status=false;
	}
    });//delete_rows

	
     
     
 }//my_ajax   
    
    
    
    
       
 /*_____________________________________________________delete_checked();*/
 function delete_checked(table){
 var delete_id_arr=[];
 var delete_node_arr=[];
 
 $(".table input[type='checkbox']:checked").each(function(){
     delete_id_arr.push($(this).attr('id'));
     delete_node_arr.push($(this).parent().parent());
 });
 
 
 delete_rows(delete_id_arr,table,delete_node_arr);
 }//delete_checked
 
 /*____________________________________________________end_delete_checked();*/

/*_______________________________________________________________________END_____delete*/

           
/*____________________________________________________________________________change_status*/

    var change_status_status=false;
 function change_status(change_status_arr,status,table,button_node){
     if(change_status_arr.length==0){return false;}
     var edited_field='status';
         if( button_node !='' && typeof (button_node)=='string' ){edited_field=button_node;}
     if(change_status_status==true){pop_message('wait','please wait until finishing last change status');return false;}
     change_status_status=true;
     
     pop_message('wait','please, wait .....');
     
$.ajax({dataType:"text",type:"post",url:"php_php.php",data:{"change_status_arr":change_status_arr,'table':table,'status':status,'edited_field':edited_field},success:function(return_data){	

alert(return_data);
var data=new Array();data=return_data.split('||=>||');
pop_message(data[0],data[1]);
if(typeof(button_node )!='string'){button_node.addClass('active');}
},
error:function(){
	
	
	alert('error,please try again later');
	},
complete:function(){
      change_status_status=false;
	}
    });//ajax

	
     
     
 }//change_status   
    /*_____________________________________________________change_checked_status();*/
 function change_checked_status(table,status){
 var id_arr=[];
 
 
 $(".table input[type='checkbox']:checked").each(function(){
     id_arr.push($(this).attr('id'));
 });
 change_status(id_arr,status,table,'');
 
 
 }//change_status
 
 /*____________________________________________________end_change_checked_status();*/
   
/*_______________________________________________________________________END_____change_status*/


/*___________________________________________________________check_all__*/    
function uncheck_all(contanir_node){
    $(contanir_node).find("input[type='checkbox']").prop('checked',false);
}//check_all(contanir_node)
/*______________________________________________________END_____check_all__*/
/*___________________________________________________________check_all__*/    
function check_all(contanir_node){
    $(contanir_node).find("input[type='checkbox']").prop('checked',true);
}//check_all(contanir_node)
/*______________________________________________________END_____check_all__*/
/*___________________________________________________________go_to_edit_page()__*/    
function go_to_edit_page(edit_page){

 $(".table input[type='checkbox']:checked").each(function(){
  var   edit_id=$(this).attr("id");
  window.open(edit_page+'?edit_id='+edit_id);   
 });
}//check_all(contanir_node)
/*______________________________________________________EN D_____check_all__*/