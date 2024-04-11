  // upload image js all start here 

// first 
var domain="http://127.0.0.1:8000/";

const realFileBtn = document.getElementById("real-file1");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});

// second 

const realFileBtn2 = document.getElementById("real-file2");
const customBtn2 = document.getElementById("custom-button2");
const customTxt2 = document.getElementById("custom-text2");

customBtn2.addEventListener("click", function() {
  realFileBtn2.click();
});

realFileBtn2.addEventListener("change", function() {
  if (realFileBtn2.value) {
    customTxt2.innerHTML = realFileBtn2.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt2.innerHTML = "No file chosen, yet.";
  }
});



// third 

const realFileBtn3 = document.getElementById("real-file3");
const customBtn3 = document.getElementById("custom-button3");
const customTxt3 = document.getElementById("custom-text3");

customBtn3.addEventListener("click", function() {
  realFileBtn3.click();
});

realFileBtn3.addEventListener("change", function() {
  if (realFileBtn3.value) {
    customTxt3.innerHTML = realFileBtn3.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt3.innerHTML = "No file chosen, yet.";
  }
});


// four 

const realFileBtn4 = document.getElementById("real-file4");
const customBtn4 = document.getElementById("custom-button4");
const customTxt4 = document.getElementById("custom-text4");

customBtn4.addEventListener("click", function() {
  realFileBtn4.click();
});

realFileBtn4.addEventListener("change", function() {
  if (realFileBtn4.value) {
    customTxt4.innerHTML = realFileBtn4.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt4.innerHTML = "No file chosen, yet.";
  }
});


// upload image js all end here 



// select js here 
$(document).ready(function(){
    $('.course').select2();   
 }); 
 
 
 
 $(document).on("click",".accessoreis_click_radio",function(){
    //alert('dfdf');
     var cid=$(this).attr('data-cid');
     var name=$(this).attr('data-name');
     $("#searchassname").attr("value",cid);
 });



 // Device Assign to click radio js 
 $(document).on("click",".click_radio",function(){
  
  
  var cid=$(this).attr('data-cid');
 alert(cid);
  var name=$(this).attr('data-name');
  //$("#searchempname").attr("value",cid);

  //$("#searchempname").attr("placeholder",cid);
  // $(".searchempname").attr("value",cid);
  $("input[name='empcode']").val(cid);
  
});

//  document.getElementById('searchempname').addEventListener("keyup",function(this){
//   var res=this.val();
//   alert(res);
//  });


function getemp(input){
  //console.log(input.value);
  var result=input.value;
  $.ajax({
    url : '/getemp',
    type: 'GET',
    data: {result:result},
    success:function(data){
      if(data.status==true){
        //console.log(data.result['0']['id']);
        var ary=data.result;
        $(".search_emp").empty();
        // $("#searchempname").val('');
        var html="";
        //input.value="";
        for(var i=0;i<ary.length;i++){
          console.log(ary[i]['name']);
          html+='<div class="search-assign-persone d-flex align-items-center justify-content-between">';
          html+='<div class="assign-pe-det d-flex gap-2 align-items-center">';
          html+='<img src="http://127.0.0.1:8000/asset/images/user-img/user.svg" alt="user">';
          html+='<h4>"'+ary[i]["name"]+'" <span>"'+ary[i]["empcode"]+'"</span></h4>';
          html+='</div>';
          html+='<input type="radio" name="checked" id="" data-cid="'+ary[i]["empcode"]+'" data-name="'+ary[i]["name"]+'" class="click_radio">';
          html+='</div>';
        }
        $(".search_emp").append(html);
      }else{
        console.log(data.message);
      }
    }
  });
}

//when you click on assign icon then laptop id pass in hidden field
$(document).on("click",".assignclick",function(){
  var id=$(this).attr('data-id');
  $("input[name='deviceid']").attr('value',id);
});


//laptop assign history
$(document).on("click",".laptopassignhistory",function(){
  var id=$(this).attr('data-id');
  var type=$(this).attr('data-type');
  $.ajax({
    url : '/assignhistory',
    type: 'GET',
    data: {id:id,type:type},
    success:function(data){
      console.log(data);
      if(data.status==true){
        var ary=data.result;
        var html="";
        for(var i=0;i<ary.length;i++){
          html+="<tr>";
          html+="<td>";
          html+='<img src="http://127.0.0.1:8000/asset/images/user-img/user.svg" alt="user">';
          html+=ary[i]['empname'];
          html+="</td>";
          html+="<td>"+ary[i]['assigndate']+"</td>";
          html+="<td>NA</td>";
          html+="<td>NA</td>";
          html+="</tr>";
        }
        $("#assignhistorytable").append(html);
      }
    }
  });
});


//device delete
$(document).on("click",".devicedelete",function(){
  var id=$(this).attr('data-id');
  if(confirm("Are You Sure ?")){
    $.ajax({
      url : '/devicedelete',
      type: 'GET',
      data: {id:id},
      success:function(data){
        alert('Delete successfully');
        location.reload();
      }
    });
  }
  
});
 