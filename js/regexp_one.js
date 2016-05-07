
/*_______________________________________________________________________________________________________المتغيرات */
function make_sure_one(input,m_break){

var message="";

/*_______________________________________________________________________________________________________المتغيرات */

var input_node=input;


var this_match=input_node.attr("match");
var this_message=input_node.attr("message");
var this_from=input_node.attr("from");
var this_to=input_node.attr("to");
var this_value=input_node.val();


/*________________________________________________end_email*/

if(this_match=="email"){if(!email(this_value)){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء التأكد من أن البريد حقيقي"; else  message+=m_break+this_message; }//if message
}//if email
/*________________________________________________end_email*/

/*________________________________________________end_password*/
else if(this_match=="password"){
if(!password(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء التحقق من كلمة السر"; else message+=m_break+this_message;}//if message
}//password
/*________________________________________________end_password*/

/*________________________________________________end_number*/
else if(this_match=="number"){
if(!number(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء التأكد من أنه رقم فقط"; else message+=m_break+this_message;}//if message
}//number
/*________________________________________________end_number*/
/*________________________________________________end_number*/
else if(this_match=="phone"){
if(!phone(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+" الرجاء كتابة ررقم هاتف صحيح بين 6 و14 رقم  "; else message+=m_break+this_message;}//if message
}//number
/*________________________________________________end_number*/
/*________________________________________________f_number*/
else if(this_match=="f_number"){
if(!f_number(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء التأكد من أنه رقم حقيقي فقط"; else message+=m_break+this_message;}//if message
}//number
/*________________________________________________end_f_number*/


/*________________________________________________end_string*/
else if(this_match=="string"){
if(!string(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+"يجب أن يكون أحف فقط"; else message+=m_break+this_message;}//if message
}//string
/*________________________________________________end_string*/
/*________________________________________________end_any*/
else if(this_match=="any"){
if(!any(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء التقيد بعدد المحارف المطلوبة"; else message+=m_break+this_message;}//if message
}//any
/*________________________________________________end_any*/

/*________________________________________________end_any*/
else if(this_match=="spicial"){
if(!spical(this_value,input_arr[input_i].getAttribute("regexp"))){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء التأكد من البيانات"; else message+=m_break+this_message;}//if message
}//any
/*________________________________________________end_any*/

/*________________________________________________end_any*/
else if(this_match=="select"){
if(this_value==input_arr[input_i].getAttribute("not")){if(this_message==undefined || this_message=="" )message+=m_break+" الرجاء اختيار قيمة من القائمة المنسدلة"; else message+=m_break+this_message;}//if message
}//any
/*________________________________________________end_any*/


/*________________________________________________hour*/
else if(this_match=="hour"){
if(!hour(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء كتابة وقت حقيقي بالنظام 24"; else message+=m_break+this_message;}//if message
}//any
/*________________________________________________end_hour*/

/*________________________________________________date*/
else if(this_match=="date"){
if(!date(this_value,this_from,this_to)){if(this_message==undefined || this_message=="" )message+=m_break+"الرجاء كتابة تاريخ حقيقي بالشكل 1990/21/1"; else message+=m_break+this_message;}//if message
}//any
/*________________________________________________end_date*/



return message;
}//click make_shore() function

