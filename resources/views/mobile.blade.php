@extends('layout.app')
@section('main')
 
<section class="third-header menulist-details">
         <div class="container">
            <div class="row">
               <div class="grid-two align-items-center">
                  <div class="list-det">
                     <ul class="d-flex gap-3">
                        <li><a data-bs-toggle="modal" data-bs-target="#add_mobile_name_model" class="btn btn-white"><img src="{{basepath('images/plus-sign.svg')}}" alt="plus-sign"> Add Mobile</a></li>
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
      
            <h2 class="mb-0">Mobile</h2>
         </div>
      
            <!-- filter list tab section start end -->
            <div class="tab-content1" id="pills-tabContent">
               <table id="mobile_list_data" class="display device_list_data tabledesignmain" style="width: 100%;">
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
<div class="modal mymodel add_desktop_name_model fade" id="add_mobile_name_model" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
   <div class="form-content">
      <h5 class="modal-title">Add Mobile</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="form-body">
      <form method="post" action="{{Route('mobile.save')}}">
        @csrf
         <fieldset class="form-border rounded-3 p-3 text-start">
            <legend class="float-none w-auto px-2 m-0">Mobile Details</legend>
            <div class="d-grid gap-3">
               <div class="form-re">
                  <input type="text" name="brand" class="my-from-control" id="yourname" value="" placeholder="Enter Brand Name Specification Here">
               </div>
               <div class="form-re">
                  <!-- <input type="text" id="mobile_code1" class="my-from-control" value="" placeholder="Enter Ram Specification Here"> -->
                  <select name="ram" id="" class="my-from-control">
                    <option value="">Select Ram</option>
                    @php 
                    $rams=App\Models\Customram::all();
                    @endphp
                    @foreach($rams as $value)
                    <option value="{{$value->storage}}">{{$value->storage."GB"}}</option>
                    @endforeach
                  </select>
               </div>
               <div class="form-re">
                  <input type="text" name="processor" id="mobile_code2" class="my-from-control " placeholder="Enter Processor Specification Here ">
               </div>
               <div class="form-re">
                  <input type="text" name="hdd" class="my-from-control"  placeholder="Enter HDD Specification Here">
               </div>
               <div class="form-re">
                  <input type="text" name="ssd" class="my-from-control"  placeholder="Enter SDD Specification Here">
               </div>
               <div class="form-re">
                  <select class="my-from-control selectcol course" id="" name="status" aria-label="Default select example">
                     <option value="">Status</option>
                     @php 
                     $status=App\Models\Status::all();
                     @endphp
                     @foreach($status as $value)
                     <option value="{{$value->name}}">{{$value->name}}</option>
                     @endforeach
                     
                  </select>
               </div>
               
            </div>
         </fieldset>
         <div class="form-re text-center">   
            <button type="submit" class="btn btn-blue2 m-auto w-50">Add Mobile</button>
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

      var laptop=$("#mobile_list_data").DataTable({
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
                  "url" : "/mobile-pagination",
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