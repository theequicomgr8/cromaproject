@extends('layout.app')
@section('main')
 
<section class="third-header menulist-details">
         <div class="container">
            <div class="row">
               <div class="grid-two align-items-center">
                  <div class="list-det">
                     <ul class="d-flex gap-3">
                        <li><a data-bs-toggle="modal" data-bs-target="#add_keyboard_name_model" class="btn btn-white"><img src="{{basepath('images/plus-sign.svg')}}" alt="plus-sign"> Add Keyboard</a></li>
                     </ul>
                  </div>
                  <div class="list-det ms-lg-auto">
                     <ul class="d-flex gap-3">
                        <li><span class="btn btn-white">Total: {{$total}}</span></li>
                        <li><span class="btn btn-white blue-text">used: {{$used}}</span></li>
                        <li><span class="btn btn-white green-text">available: {{$total-$used}}</span></li>
                        <li><span class="btn btn-white red-text">Not Working: 5</span></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- header third area end  -->
      
      <!-- Content area start  -->
      <section class="content-area table-section">
         <div class="container">
         <div class="filter-section">
      
            <h2 class="mb-0">Keyboard</h2>
         </div>
      
            <!-- filter list tab section start end -->
            <div class="tab-content1" id="pills-tabContent">
               <table id="keyboard_list_data" class="display device_list_data tabledesignmain" style="width: 100%;">
                  <thead>
                     <tr>
                        <th><span>S.No.</span></th>
                        <th><span>Brand</span></th>
                        <th><span>configuration</span></th>
                        <th><span>Serial No.</span></th>
                        <th><span>Status</span></th>
                        <th><span>Assign to</span></th>              
                        <th><span>Warranty End</span></th>    
                        <th><span>Action </span></th>              
                     
                     </tr>
                  </thead>
               </table>
            </div>
         </div>  
      
      </section>
        

      <!-- Content area end  -->
<!--  Keyboard popup--> 
<div class="modal mymodel add_accessories_name_model fade" id="add_keyboard_name_model" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
 <div class="form-content">
    <h5 class="modal-title">Add Accessories (Keyboard)</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>
 <div class="form-body">
    <form method="post" action="{{Route('keyboard.save')}}" enctype="multipart/form-data">
      @csrf
         <div class="field-set">
            <fieldset class="form-border rounded-3 p-3 text-start upload-img-box">
               <legend class="float-none w-auto px-2 m-0">Accessories Details</legend>
               <div class="d-grid gap-3">                      
                     <div class="row">
                        <div class="col-lg-6 pe-0">
                           <div class="form-re">
                                 <input type="text" name="brand" class="my-from-control" id="yourname" value="" placeholder="Enter Brand Name">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-re">
                                 <input type="text" name="configuration" id="mobile_code1" class="my-from-control" value="" placeholder="Enter Configuration">
                           </div>
                        </div>
                     </div>                       
                     <div class="row">
                        <div class="col-lg-6 pe-0">
                           <div class="form-re">
                                 <input type="text" name="serial_no" id="mobile_code2" class="my-from-control " placeholder="Enter Product Serial No. ">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-re">
                                 <select class="my-from-control selectcol course" name="status" id="" aria-label="Default select example" style="width: 100%;">
                                    <option value="">Select Status</option>
                                    <option>New</option>
                                    <option>Old</option>
                                    <option>In-Use</option>
                                 </select>
                           </div>
                        </div>
                     </div>
               </div>                  
            </fieldset>
            <div id="custom-button" class="custom-button">
               <div class="upload-image text-center">
                  <input type="file" id="real-file1" name="device_pic" hidden="hidden"  accept="jpeg/png" />
                     <img src="{{basepath('images/upload-icon.svg')}}" alt="upload-icon">
                  <span id="custom-text" class="custom-text" title="Upload Device Photo">Upload Device Photo</span>
               </div>                          
            </div>
         </div>

         <div class="field-set mt-2">
            <fieldset class="form-border rounded-3 p-3 text-start upload-img-box">
               <legend class="float-none w-auto px-2 m-0">Invoice Details</legend>
               <div class="d-grid gap-3">                      
                     <div class="row">
                        <div class="col-lg-6 pe-0">
                           <div class="form-re">
                                 <input type="text" name="invoice_no" class="my-from-control" id="yourname" value="" placeholder="Enter Invoice No.">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-re">   
                              <input type="date" name="invoice_date" value="" class="my-from-control" placeholder="Enter Invoice Date" required="">
                           </div>
                        </div>
                     </div>   
                     <div class="form-re">
                        <input type="text" name="invoice_company_name" class="my-from-control" id="yourname" value="" placeholder="Enter Invoice Company Name">
                     </div>  
                     <div class="form-re">   
                        <input type="date" name="warranty_end" value="" class="my-from-control" placeholder="Warranty End Date" required="">
                     </div>             
                   
               </div>                  
            </fieldset>
            <div id="custom-button2" class="custom-button">
               <div class="upload-image text-center">
                  <input type="file" name="invoice_file" id="real-file2" hidden="hidden"  accept="jpeg/png" />
                     <img src="{{basepath('images/upload-icon.svg')}}" alt="upload-icon">
                     <span id="custom-text2" class="custom-text" title="Upload Device Photo">Upload Invoice Copy</span>
                  </div>                          
            </div>
         </div>             


       <div class="form-re text-center mt-3">   
          <button type="submit" class="btn btn-blue2 m-auto w-50">Add Accessories</button>
       </div> 
    </form>
 </div>
</div>
</div>
</div>
 
   
@endsection

@section('script')

<script>
//    $('#device_list_data').DataTable({
//           ajax: 'device_list_data.php',
//           serverSide: true, 
            //     lengthMenu: [
            //     [ 10, 25, 50, -1 ],
            //     [ '10', '25', '50', 'all' ]
            // ],          
            //     dom: 'Bfrtip',
            //     buttons: [
            //           ''
            //     ]
//       });

      var laptop=$("#keyboard_list_data").DataTable({
            "serverSide" : true,
            "processing" : true,
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'all' ]
            ],          
                dom: 'Bfrtip',
                buttons: [
                      ''
                ],
            "ajax" : {
                  "url" : "/keyboard-pagination",
                  "type": "GET",
                  "dataType":'json',
                  data:function(data){

                  }
            },
            "columns":[
                  {"data": "id"},
                  {"data": "brand"},
                  {"data": "configuration"},
                  {"data": "serial_no"},
                  {"data": "status"},
                  {"data": "assign"},
                  {"data": "warranty_end"},
                  {"data": "action"},
            ]
      });
   </script>

   
<script>
   $(document).ready(function(){
   function demo(){
      $('.dt-buttons,.dataTables_filter').wrapAll('<div class="tablefilter"><div class="d-flex justify-content-between align-items-center data-filtertab"></div></div>');
   }
   demo();
   $( ".dataTables_filter label" ).append( '<div class="iconsearch"><i class="fa-regular fa-magnifying-glass"></i></div>' );
   $(".filter-section").prependTo(".data-filtertab");
   $(".filter-data-list").appendTo(".tablefilter");
   $('.dataTables_info').wrapAll('<div class="container nav-datatable"><div class="row d-flex align-items-center justify-content-between"><div class="col-lg-12 col-lg-12"></div></div></div>');
   $('.dataTables_paginate').wrapAll('<div class="container nav-datatable"><div class="row d-flex align-items-center justify-content-between"><div class="col-lg-12 col-lg-12 panigation"></div></div></div>');
   }); 
</script>

   
 

<!-- common js here all   -->



@endsection