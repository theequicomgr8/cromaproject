@extends('layout.app')
@section('main')
 
<section class="third-header menulist-details">
         <div class="container">
            <div class="row">
               <div class="grid-two align-items-center">
                  <div class="list-det">
                     <ul class="d-flex gap-3">
                        <li><a href="accessories-list.html" class="text-white" style="line-height: 1em;gap: 10px;"><img src="{{basepath('images/back-arrow.svg')}}" alt="back-arrow"> Back to Page</a></li>
                     </ul>
                  </div>
                  <div class="list-det ms-lg-auto">
                     <ul class="d-flex gap-3">
                        <li><span class="btn btn-white"><img src="{{basepath('images/revoke.svg')}}" alt="revoke">Revoke</span></li>
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
            <div class="accessories_details_form">
               <div class="form-content">
                  <h5 class="modal-title">Accessories Details</h5>
               </div>
               <div class="form-body pb-5 pt-4 mt-1">
                  <form>
                     <div class="grid-two">                       
                       <div class="list-first">
                           <div class="text-center mb-4 accessoreis-imgbox">
                              <img src="{{basepath('images/accessories-det-icon.svg')}}" alt="accessories-det-icon">       
                           </div>
                           <div class="d-grid gap-3">
                              <div class="form-re position-relative control-second"> 
                                 <label class="form-label position-absolute">Accessories Name</label>  
                                 <input type="text" value="{{$data[0]->accessoriesName}}" class="my-control position-relative" id=""  placeholder="RAM">
                              </div>  
                              <div class="form-re position-relative control-second"> 
                                 <label class="form-label position-absolute">Category</label>  
                                 <input type="text" value="{{$data[0]->accessoriesCategory}}" class="my-control position-relative" id=""  placeholder="Accessories">
                              </div> 
                              <div class="form-re position-relative control-second"> 
                                 <label class="form-label position-absolute">Configuration</label>  
                                 <input type="text" value="{{$data[0]->configuration}}" class="my-control position-relative" id=""  placeholder="DD4-5 GB / LP">
                              </div>     
                              <div class="form-re position-relative control-second"> 
                                 <label class="form-label position-absolute">Serial No</label>  
                                 <input type="text" value="{{$data[0]->serial_no}}" class="my-control position-relative" id=""  placeholder="HZ90391820">
                              </div> 
                              <div class="form-re position-relative control-second"> 
                                 <label class="form-label position-absolute">Status</label>  
                                 <input type="text" value="{{$data[0]->status}}" class="my-control position-relative" id=""  placeholder="New">
                              </div>                          
                           </div>
                       </div> 
                       <div class="list-second">
              
                        <div class="d-grid gap-3">
                           <div class="form-re position-relative control-second"> 
                              <label class="form-label position-absolute">Status</label>  
                              <input type="text" value="{{$data[0]->status}}" class="my-control position-relative" id=""  placeholder="In-use">
                           </div>  
                           <div class="form-re position-relative control-second"> 
                              <label class="form-label position-absolute">Assign to</label>  
                              <input type="text" value="{{$data[0]->empname}}" class="my-control position-relative" id=""  placeholder="Shubham Gupta: CC-358">
                           </div> 
                           <div class="form-re position-relative control-second"> 
                              <label class="form-label position-absolute">Assign By</label>  
                              <input type="text" value="" class="my-control position-relative" id=""  placeholder="Prince Sharma: CC-282">
                           </div>     
                           <div class="form-re position-relative control-second"> 
                              <label class="form-label position-absolute">Invoice No.</label>  
                              <input type="text" value="{{$data[0]->invoice_no}}" class="my-control position-relative" id=""  placeholder="5843">
                           </div> 
                           <div class="form-re position-relative control-second"> 
                              <label class="form-label position-absolute">Invoice Date</label>  
                              <input type="text" value="{{$data[0]->invoice_date}}" class="my-control position-relative" id=""  placeholder="28/02/2024">
                           </div> 
                           <div class="form-re position-relative control-second"> 
                              <label class="form-label position-absolute">Vendor Name</label>  
                              <input type="text" value="{{$data[0]->invoice_company_name}}" class="my-control position-relative" id=""  placeholder="Kashi IT Soloutions">
                           </div> 
                           <div class="form-re position-relative control-second"> 
                              <label class="form-label position-absolute">Warranty Ends on</label>  
                              <input type="text" value="{{$data[0]->warranty_end}}" class="my-control position-relative" id=""  placeholder="27/06/2024">
                           </div>                          
                        </div>
                    </div>                     
                        
                     </div> 
                 

                  </form>
               </div>
            </div>
         </div>  
      
      </section>

 
   
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

      var laptop=$("#ram_list_data").DataTable({
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
                  "url" : "/ram-pagination",
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