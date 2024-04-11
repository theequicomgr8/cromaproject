@extends('layout.app')
@section('main')
 
<section class="third-header menulist-details">
         <div class="container">
            <div class="row">
               <div class="grid-two align-items-center">
                  <div class="list-det">
                     <ul class="d-flex gap-3">
                        <li><a data-bs-toggle="modal" data-bs-target="#add_device_name_model" class="btn btn-white"><img src="{{basepath('images/plus-sign.svg')}}" alt="plus-sign"> Add Laptop</a></li>
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
      
            <h2 class="mb-0">Laptops</h2>
         </div>
      
            <!-- filter list tab section start end -->
            <div class="tab-content1" id="pills-tabContent">
               <table id="laptop_list_data" class="display device_list_data tabledesignmain" style="width: 100%;">
                  <thead>
                     <tr>
                        <th><span>S.No.</span></th>
                        <th><span>System ID</span></th>
                        <th><span>Brand</span></th>
                        <th><span>Ram</span></th>
                        <th><span>Processor</span></th>
                        <th><span>HDD/SSD</span></th>              
                        <th><span>Status </span></th>    
                        <th><span>Action </span></th>              
                     
                     </tr>
                  </thead>
               </table>
            </div>
         </div>  
      
      </section>
        

      <!-- Content area end  -->

 
   
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

      var laptop=$("#laptop_list_data").DataTable({
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
                  "url" : "/laptop-pagination",
                  "type": "GET",
                  "dataType":'json',
                  data:function(data){

                  }
            },
            "columns":[
                  {"data": "id"},
                  {"data": "systemid"},
                  {"data": "brand"},
                  {"data": "ram"},
                  {"data": "processor"},
                  {"data": "HDD"},
                  // {"data": "SSD"},
                  {"data": "status"},
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