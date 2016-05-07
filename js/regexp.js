// JavaScript Document
/*____________________________________________________________________________________________________________________*/
/*_____________________________________make_shore("#my_form","<br/>");________return message__________________________*/
/*____________________________________________________________________________________________________________________*/
/*match email passowrd number string any spicial select
email message يحوي نقطة في داخل الجزء الأول
password  from  to message
number    from  to message
f_number  from  to message
string    from  to message
any       from  to message
spicial   regexp="2{4}" message
select    not  message
date      from to message  1990/2 || 1990/12/1
hour       from to message  0:2 || 23:12:1 نظام 24 ساعة 
com_hour(first_hour,first_hour)
com_date(first_date,first_date)

if(!com_hour(first_hour,first_hour)) message+=+'<br> * '+"يجب ان تكون الساعة الأولى أقل من الساعة الثانية";
________________________________________________________*/
/*____________________________________________________________email_function*/
function email(email){
/*  يبدأ بحرف يحوي نقطة ممكن رقم */
var s="^([a-zA-Z]{1}\\w+)\\.{0,1}[a-zA-Z0-9]{0,}@([a-zA-Z]{1}\\w+)\\.(\\w{2,3})";
var emailPattern = new RegExp(s);
var arrResult = email.match(emailPattern);
if(arrResult !=null) return true; else return false; 
}//email
/*__________________________________________________________end_email_function*/

/*____________________________________________________________password_function*/

function password(password,from1,to1){
/*  يبدأ بحرف أورقم من 6 إلى 15 إلا ذا غير */
if(from1==undefined || from1=="" ){ from1="6";}
if(to1==undefined || to1=="" ){to1="15";}
var s="^([a-zA-Z0-9]{"+from1+","+to1+"})$";
var passwordp = new RegExp(s);
var arrResult = password.match(passwordp);
if(arrResult !=null) return true; else return false; 

}//password
/*__________________________________________________________end__password_function*/

/*____________________________________________________________number_function*

function number(number,from1,to1){

if(from1==undefined || from1=="" ){ from1=0;}
if(to1==undefined || to1=="" ){to1=1000;}
var s="^([0-9])$";
var passwordp = new RegExp(s);
var arrResult = number.match(passwordp);
if(arrResult !=null && number >=from1 && number <=to1) return true; else return false; 

}//password
/*__________________________________________________________end__password_function*/


/*____________________________________________________________number_function*/

function number(number,from1,to1){
/*  أرقام من 6 إلى 15 إلا إذا غير*/
if(from1==undefined || from1=="" ){ from1=0;}
if(to1==undefined || to1=="" ){to1=1000;}
var s="^([0-9]{1,})$";
var passwordp = new RegExp(s);
var arrResult = number.match(passwordp);

if(arrResult !=null && from1 <= number*1  && number*1 <= to1) return true; else return false; 

}//password
/*__________________________________________________________end__password_function*/
/*____________________________________________________________phone_function*/

function phone(number,from1,to1){
/*  أرقام من 6 إلى 15 إلا إذا غير*/
if(from1==undefined || from1=="" ){ from1="6";}
if(to1==undefined || to1=="" ){to1="15";}
var s="^([0-9]{"+from1+","+to1+"})$";
var passwordp = new RegExp(s);
var arrResult = number.match(passwordp);
if(arrResult !=null) return true; else return false; 

}//password
/*__________________________________________________________end__phone_function*/
/*____________________________________________________________f_number_function*/

function f_number(number,from1,to1){
/*  أرقام من 6 إلى 15 إلا إذا غير*/
if(from1==undefined || from1=="" ){ from1=0;}
if(to1==undefined || to1=="" ){to1=1000;}
var s="^([0-9]{1,})\.{0,1}[0-9]{0,}$";
var passwordp = new RegExp(s);
var arrResult = number.match(passwordp);

if(arrResult !=null && from1 <= number*1  && number*1 <= to1) return true; else return false; 

}//password
/*__________________________________________________________end__f_number_function*/

/*____________________________________________________________string_function*/

function string(string,from1,to1){
/*  أحرف فقط من 6 إلى 15 إلا إذا غير*/
if(from1==undefined || from1=="" ){ from1="6";}
if(to1==undefined || to1=="" ){to1="15";}
var s="^(([a-zA-Z]){"+from1+","+to1+"})$";
var passwordp = new RegExp(s);
var arrResult = string.match(passwordp);
if(arrResult !=null) return true; else return false; 

}//password
/*__________________________________________________________end__string_function*/

/*__________________________________________________________________________combar_hours*/
function com_hour(prev_hour,post_hour){

var from_hour_arr=new Array();
from_hour_arr=prev_hour.split(":");

var my_hour_arr=new Array();
my_hour_arr=post_hour.split(":");

var s="^([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})$";
var hourp = new RegExp(s);
var arrResult = prev_hour.match(hourp);

var ss="^([0-9]{1,2}):([0-9]{1,2})$";
					
var q = new RegExp(ss);
var arrResult2 = prev_hour.match(q);

var error=false;
if(arrResult !=null ){
if(my_hour_arr[0]*1 < from_hour_arr[0]*1 ){return false;}//the hour in the rang

if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the muinut >
	if(my_hour_arr[1]*1 == from_hour_arr[1]*1 ){
		if(my_hour_arr[2]*1 < from_hour_arr[2]*1){error=true;}
		
		}//if the minute same
}

}//if the time ??:??:??
else if(arrResult2 !=null ){
if(my_hour_arr[0]*1 < from_hour_arr[0]*1 ){return false;}//the hour in the rang

	if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the muinut >

	}

	}//if the time ??:??
	else{return false;}
	
	if(error==true) return false; else return true;
	
	}//combar _hours


/*_______________________________________________________________________end___combar_hours*/


/*__________________________________________________________________________combar_date*/
function com_date(prev_hour,post_hour){

var from_hour_arr=new Array();
from_hour_arr=prev_hour.split("/");

var my_hour_arr=new Array();
my_hour_arr=post_hour.split("/");

var s="^([0-9]{2,4}):([0-9]{1,2}):([0-9]{1,2})$";
var hourp = new RegExp(s);
var arrResult = prev_hour.match(hourp);

var ss="^([0-9]{2,4}):([0-9]{1,2})$";
					
var q = new RegExp(ss);
var arrResult2 = prev_hour.match(q);

var error=false;
if(arrResult !=null ){
if(my_hour_arr[0]*1 < from_hour_arr[0]*1 ){return false;}//the date in the rang

if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the month >
	if(my_hour_arr[1]*1 == from_hour_arr[1]*1 ){
		if(my_hour_arr[2]*1 < from_hour_arr[2]*1){error=true;}
		
		}//if the mounth same
}

}//if the date ????/??/??
else if(arrResult2 !=null ){
if(my_hour_arr[0]*1 < from_hour_arr[0]*1 ){return false;}//the date in the rang

	if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the month >

	}

	}//if the date ????/??
	else{return false;}
	
	if(error==true) return false; else return true;
	
	}//combar _date


/*_______________________________________________________________________end___combar_date*/



/*____________________________________________________________hour*/

function hour(hour,from1,to1){

if(from1==undefined || from1=="" ){ from1="00:00:00";}
var from_hour_arr=new Array();
from_hour_arr=from1.split(":");

if(to1==undefined || to1=="" ){to1="23:59:59";}
var to_hour_arr=new Array();
to_hour_arr=to1.split(":");

var my_hour_arr=new Array();
my_hour_arr=hour.split(":");

var s="^([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})$";
var hourp = new RegExp(s);
var arrResult = hour.match(hourp);

var ss="^([0-9]{1,2}):([0-9]{1,2})$";
					
var q = new RegExp(ss);
var arrResult2 = hour.match(q);
var error=false;
if(my_hour_arr[1]*1 > 59 || my_hour_arr[2]*1 > 59  || my_hour_arr[0]*1 > 59 ) error=true;
if(arrResult !=null ){
if(my_hour_arr[0]*1 < from_hour_arr[0]*1 || my_hour_arr[0]*1 > to_hour_arr[0]*1  && error==false   ){return false;}//the hour in the rang

if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the muinut >
	if(my_hour_arr[1]*1 == from_hour_arr[1]*1 ){
		if(my_hour_arr[2]*1 < from_hour_arr[2]*1){error=true;}
		
		}//if the minute same
}

if(my_hour_arr[0]*1 == to_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 > to_hour_arr[1]*1 ){error=true;}//the muinut >
	if(my_hour_arr[1]*1 == to_hour_arr[1]*1 ){
		if(my_hour_arr[2]*1 > to_hour_arr[2]*1){error=true;}
		}//if the minute same
		
}//if from hor minute == my hour minute
}//if the time ??:??:??
else if(arrResult2 !=null ){
if(my_hour_arr[0]*1 < from_hour_arr[0]*1 || my_hour_arr[0]*1 > to_hour_arr[0]*1  && error==false   ){return false;}//the hour in the rang

	if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the muinut >

	}

if(my_hour_arr[0]*1 == to_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 > to_hour_arr[1]*1 ){error=true;}//the muinut >

}
	}//if the time ??:??
	else{return false;}
	
	if(error==true) return false; else return true;
}//hour
/*__________________________________________________________end_hour*/



/*____________________________________________________________date*/

function date(date,from1,to1){
	
if(from1==undefined || from1=="" ){ from1="1940/1/1";}
var from_hour_arr=new Array();
from_hour_arr=from1.split("/");

if(to1==undefined || to1=="" ){to1="2100/1/1";}
var to_hour_arr=new Array();
to_hour_arr=to1.split("/");

var my_hour_arr=new Array();
my_hour_arr=date.split("/");


var s="^([0-9]{2,4})/([0-9]{1,2})/([0-9]{1,2})$";
var hourp = new RegExp(s);
var arrResult = date.match(hourp);

var ss="^([0-9]{2,4})/([0-9]{1,2})$";
					
var q = new RegExp(ss);
var arrResult2 =date.match(q);
var error=false;

if(my_hour_arr[1]*1 > 12 || my_hour_arr[2]*1 > 31 ) error=true;

if(arrResult !=null ){
if(my_hour_arr[0]*1 < from_hour_arr[0]*1 || my_hour_arr[0]*1 > to_hour_arr[0]*1  && error==false   ){return false;}//the hour in the rang

if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the muinut >
	if(my_hour_arr[1]*1 == from_hour_arr[1]*1 ){
		if(my_hour_arr[2]*1 < from_hour_arr[2]*1){error=true;}
		
		}//if the minute same
}

if(my_hour_arr[0]*1 == to_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 > to_hour_arr[1]*1 ){error=true;}//the muinut >
	if(my_hour_arr[1]*1 == to_hour_arr[1]*1 ){
		if(my_hour_arr[2]*1 > to_hour_arr[2]*1){error=true;}
		}//if the minute same
		
}//if from hor minute == my hour minute
}//if the time ??:??:??
else if(arrResult2 !=null ){
	
	if(my_hour_arr[0]*1 < from_hour_arr[0]*1 || my_hour_arr[0]*1 > to_hour_arr[0]*1   && error==false  ){ return false;}//the hour in the rang

	if(my_hour_arr[0]*1 == from_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 < from_hour_arr[1]*1 ){error=true;}//the muinut >

	}

if(my_hour_arr[0]*1 == to_hour_arr[0]*1 ){
	if(my_hour_arr[1]*1 > to_hour_arr[1]*1 ){error=true;}//the muinut >

}
	}//if the time ??:??
	else{return false;}
	
	if(error==true) return false; else return true;
}//date
/*__________________________________________________________end_date*/



/*____________________________________________________________string_function*/

function any(any,from1,to1){
/* أي شي بين الرقمين*/
if(from1==undefined || from1=="" ){ from1="6";}
if(to1==undefined || to1=="" ){to1="15";}
var s="^(.{"+from1+","+to1+"})$";
var passwordp = new RegExp(s);
var arrResult = any.match(passwordp);
if(arrResult !=null) return true; else return false; 

}//password
/*__________________________________________________________end__string_function*/


/*____________________________________________________________string_function*/

function spical(spicial,s_regexp){
/* تعبير منتظم*/

var passwordp = new RegExp(s_regexp);
var arrResult = spicial.match(passwordp);
if(arrResult !=null) return true; else return false; 

}//password
/*__________________________________________________________end__string_function*/

/*_______________________________________________________________________________________________________المتغيرات */
function make_sure(form,m_break){

var message="";

/*_______________________________________________________________________________________________________المتغيرات */

var form_node=document.getElementById(form);
var input_arr=form_node.getElementsByTagName("input");
input_arr.add=form_node.getElementsByTagName("textarea");
input_arr.add=form_node.getElementsByTagName("select");

for (var input_i=0;input_i<input_arr.length;input_i++){

var this_match=input_arr[input_i].getAttribute("match");
var this_message=input_arr[input_i].getAttribute("message");
var this_from=input_arr[input_i].getAttribute("from");
var this_to=input_arr[input_i].getAttribute("to");
var this_value=input_arr[input_i].value;


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

}//for each input


return message;
}//click make_shore() function

