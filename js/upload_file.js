// JavaScript Document
function progressHandlingFunction(e){
	        $('#upload_img_progress_div').parent().css({"display":"block"});

	        $('#upload_img_progress_div').css({"width":"0"});

    if(e.lengthComputable){
   //     $('#upload_img_progress_div').attr({value:e.loaded,max:e.total});
   var width_per=e.loaded/e.total * 100;
        console.log();$('#upload_img_progress_div').css('width',width_per+"%");
    }
}

function upload_file(file_input,target,success){

// var formData = new FormData($('form')[0]);
 var formData = new FormData();
 formData.append("upload_files",true);
   var fileInput = document.getElementById(file_input);


   for(var i = 0; i < fileInput.files.length; i ++ ){formData.append('file', fileInput.files[i]);}// for each file in th array

 
    $.ajax({
        url: target,  //Server script to process data
        type: 'POST',
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){ // Check if upload property exists
                myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
            }
            return myXhr;
        },
        //Ajax events
        beforeSend:  function(){},
        success:  function(data){success(data);
			},
        error: function(){},
		complete:function(){$('#upload_img_progress_div').parent().hide("fast");},
        // Form data
        data: formData,
        //Options to tell jQuery not to process data or worry about content-type.
        cache: false,
        contentType: false,
        processData: false
    });//ajax
}//upload_file(file_input)	



function start_upload(file_node,preview_node,heddin_node){

upload_file(file_node,'upload_file.php',function(data){
			var data_arr=new Array(); data_arr=data.split("||=>||");
			
			if(data_arr[0].trim()=="success"){
			var last_file=data_arr[data_arr.length - 1 ];
			$(preview_node).css('backgroundImage',"url(upload_files/"+last_file+")");
			$(heddin_node).val(last_file);
			}//if upload success
			else{pop_message("error, please try again later ! ");}//else error not uploded
			
});//function upload file

}//change user_img_input
