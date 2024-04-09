  // upload image js all start here 

// first 

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
 
 // Device Assign to click radio js 
 $(document).on("click",".click_radio",function(){
     var cid=$(this).attr('data-cid');
     var name=$(this).attr('data-name');
     $("#searchname").attr("value",cid);
 });
 
 $(document).on("click",".accessoreis_click_radio",function(){
     var cid=$(this).attr('data-cid');
     var name=$(this).attr('data-name');
     $("#searchassname").attr("value",cid);
 });
 