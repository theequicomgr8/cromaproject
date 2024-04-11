<!-- all popup here start -->

<!-- Add Device model popup start  -->
<div class="modal mymodel website_model_content fade" id="add_device_popup" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="form-content">
            <h5 class="modal-title">Add Device</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="form-body">
            <form method="post" action="{{Route('save.device')}}" enctype="multipart/form-data">
                @csrf
               <div class="form-login mb-0">
                  <input type="text" class="my-from-control formbg" id="" name="name" placeholder="Enter Device Name" required>  
               </div>                   
               <div class="form-login mb-0">
                 <div class="img-upload d-flex align-items-center">
                   <div class="custom-button">
                        <div class="img-uploadheading text-center" id="custom-button3">
                           <input type="file" name="pic" required id="real-file3" hidden="hidden" accept="jpeg/png">
                              <img src="{{basepath('images/upload-icon.svg')}}" alt="upload-icon">
                              <span class="custom-text">Upload Icon</span>
                        </div>                       
                        <div class="show-image-data">
                           <span id="custom-text3" class="custom-text" title="No file chosen">No file chosen</span>
                        </div>
                   </div>
                 </div>                 
               </div>
               <div class="form-re text-center">   
                  <button type="submit" class="btn btn-blue m-auto w-100">Submit</button>
               </div>               
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Add Device model popup end  -->

<!-- Add Accessories model popup start  -->
<div class="modal mymodel add_accessories_popup fade" id="add_accessories_popup" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
   <div class="form-content">
      <h5 class="modal-title">Add Accessories</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="form-body">
      <form method="post" action="{{Route('save.accessories')}}" enctype="multipart/form-data">
        @csrf 
         <div class="form-login mb-0">
            <input type="text" class="my-from-control formbg" id="" name="name" placeholder="Enter Accessories Name" required>  
         </div>
         <div class="form-login mb-0">
            <div class="img-upload d-flex align-items-center">
              <div class="custom-button">
                   <div class="img-uploadheading text-center" id="custom-button4">
                      <input type="file" name="pic" required id="real-file4" hidden="hidden" accept="jpeg/png">
                         <img src="{{basepath('images/upload-icon.svg')}}" alt="upload-icon">
                         <span class="custom-text">Upload Icon</span>
                   </div>                       
                  <div class="show-image-data">
                     <span id="custom-text4" class="custom-text" title="No file chosen">No file chosen</span>
                  </div>
              </div>
            </div>                 
          </div>
         <div class="form-re text-center">   
            <button type="submit" class="btn btn-blue m-auto w-100">Submit</button>
         </div>               
      </form>
   </div>
</div>
</div>
</div>
<!-- Add Accessories model popup end  -->

<!-- Add Device Name model popup start  -->
<div class="modal mymodel add_device_name_model fade" id="add_device_name_model" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
   <div class="form-content">
      <h5 class="modal-title">Add Laptop</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="form-body">
      <form method="post" action="{{Route('laptop.save')}}">
        @csrf
         <fieldset class="form-border rounded-3 p-3 text-start">
            <legend class="float-none w-auto px-2 m-0">Laptop Details</legend>
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
            <button type="submit" class="btn btn-blue2 m-auto w-50">Add Laptop</button>
         </div> 
      </form>
   </div>
</div>
</div>
</div>
<!-- Add Device Name model popup end  -->

<!-- Add Accessories Name model popup start  -->
<div class="modal mymodel add_accessories_name_model fade" id="add_accessories_name_model" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
 <div class="form-content">
    <h5 class="modal-title">Add Accessories (Ram)</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>
 <div class="form-body">
    <form>
         <div class="field-set">
            <fieldset class="form-border rounded-3 p-3 text-start upload-img-box">
               <legend class="float-none w-auto px-2 m-0">Accessories Details</legend>
               <div class="d-grid gap-3">                      
                     <div class="row">
                        <div class="col-lg-6 pe-0">
                           <div class="form-re">
                                 <input type="text" class="my-from-control" id="yourname" value="" placeholder="Enter Brand Name">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-re">
                                 <input type="text" id="mobile_code1" class="my-from-control" value="" placeholder="Enter Configuration">
                           </div>
                        </div>
                     </div>                       
                     <div class="row">
                        <div class="col-lg-6 pe-0">
                           <div class="form-re">
                                 <input type="text" id="mobile_code2" class="my-from-control " placeholder="Enter Product Serial No. ">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-re">
                                 <select class="my-from-control selectcol course" id="" name="course" aria-label="Default select example" style="width: 100%;">
                                    <option value="null">Select Status</option>
                                    <option>#1</option>
                                    <option>#2</option>
                                    <option>#3</option>
                                    <option>#4</option>
                                 </select>
                           </div>
                        </div>
                     </div>
               </div>                  
            </fieldset>
            <div id="custom-button" class="custom-button">
               <div class="upload-image text-center">
                  <input type="file" id="real-file1" hidden="hidden"  accept="jpeg/png" />
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
                                 <input type="text" class="my-from-control" id="yourname" value="" placeholder="Enter Invoice No.">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-re">   
                              <input type="date" name="from" value="" class="my-from-control" placeholder="Enter Invoice Date" required="">
                           </div>
                        </div>
                     </div>   
                     <div class="form-re">
                        <input type="text" class="my-from-control" id="yourname" value="" placeholder="Enter Invoice Company Name">
                     </div>  
                     <div class="form-re">   
                        <input type="date" name="from" value="" class="my-from-control" placeholder="Warranty End Date" required="">
                     </div>             
                   
               </div>                  
            </fieldset>
            <div id="custom-button2" class="custom-button">
               <div class="upload-image text-center">
                  <input type="file" id="real-file2" hidden="hidden"  accept="jpeg/png" />
                     <img src="{{basepath('images/upload-icon.svg')}}" alt="upload-icon">
                     <span id="custom-text2" class="custom-text" title="Upload Device Photo">Upload Invoice Copy</span>
                  </div>                          
            </div>
         </div>             


       <div class="form-re text-center mt-3">   
          <button type="button" class="btn btn-blue2 m-auto w-50">Add Accessories</button>
       </div> 
    </form>
 </div>
</div>
</div>
</div>
<!-- Add Accessories Name model popup end  -->

<!-- Assign to (Device) model popup start  -->
<div class="modal mymodel assign_device_popup fade" id="assign_device_popup" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
   <div class="form-content">
      <h5 class="modal-title">Assign to</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="form-body">
      <form method="post" action="{{Route('laptop.assign')}}" >
         @csrf
         <input type="hidden" name="deviceid">
         <fieldset class="form-border rounded-3 p-3 text-start">
            <legend class="float-none w-auto px-2 m-0">Laptop Assign</legend>
            <div class="d-grid gap-3">
               <div class="form-re">   
                  <input type="date" name="assign_date" value="" class="my-from-control"  placeholder="Assign on" required>
               </div>
               <div class="form-re">   
                  <input type="text" name="empcode" required  class="my-from-control searchempname" id="searchempname" onkeyup="getemp(this)"  placeholder="Search by employee name, employee Id 1">
               </div> 
               <!-- search list here assign persone name and id  -->
               <div class="assign-list-date d-grid gap-3 search_emp">
                  @php 
                  $employee=App\Models\Employee::where('status','1')->limit(3)->get();
                  @endphp 
                  @foreach($employee as $value)
                  <div class="search-assign-persone d-flex align-items-center justify-content-between">
                     <div class="assign-pe-det d-flex gap-2 align-items-center">
                        <img src="{{basepath('images/user-img/user.svg')}}" alt="user">
                        <h4>{{$value->name}} <span>{{$value->empcode}}</span></h4>
                     </div>
                     <input type="radio" name="checked" id="" data-cid="{{$value->empcode}}" data-name="{{$value->name}}" class="click_radio" >
                  </div>
                  @endforeach 
                  <!--
                  <div class="search-assign-persone d-flex align-items-center justify-content-between">
                     <div class="assign-pe-det d-flex gap-2 align-items-center">
                        <img src="{{basepath('images/user-img/user.svg')}}" alt="user">
                        <h4>Isha Singh <span>CC-318</span></h4>
                     </div>
                     <input type="radio" name="checked" id="" data-cid="CC-318" data-name="Isha Singh" class="click_radio">
                  </div>
                  <div class="search-assign-persone d-flex align-items-center justify-content-between">
                     <div class="assign-pe-det d-flex gap-2 align-items-center">
                        <img src="{{basepath('images/user-img/user.svg')}}" alt="user">
                        <h4>Pankaj Sharma <span>CC-308</span></h4>
                     </div>
                     <input type="radio" name="checked" id="" data-cid="CC-308" data-name="Pankaj Sharma" class="click_radio">
                  </div>--> 
               </div>
            </div>
         </fieldset>
         <div class="form-re text-center">   
            <button type="submit" class="btn btn-blue2 m-auto w-50">Assign</button>
         </div> 
      </form>
   </div>
</div>
</div>
</div>
<!-- Assign to (Device) model popup end  -->

<!-- Assign History (Device) model popup start  -->
<div class="modal mymodel assign_device_histroy_popup fade" id="assign_device_histroy_popup" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
   <div class="form-content">
      <h5 class="modal-title">Assign History</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="form-body">
      <form>
         <fieldset class="form-border rounded-3 p-3 text-start">
            <legend class="float-none w-auto px-2 m-0">Laptop Assign</legend>
           <div class="tab-content">
            <table class="mytable table-bordered" style="width: 100%;">
               <thead>
                 <tr>
                   <th>Employee Details</th>
                   <th>Assign on</th>
                   <th>Return on</th>
                   <th>Assign by</th>
                 </tr>
               </thead>
               <tbody id="assignhistorytable">
                 <!-- <tr>
                   <td>
                     <div class="assign-pe-det d-flex gap-2 align-items-center">
                        <img src="{{basepath('images/user-img/user.svg')}}" alt="user">
                        <h4>Shubham Gupta <span>CC-358</span></h4>
                     </div>
                   </td>
                   <td>15/02/2024</td>
                   <td>N/A</td>
                   <td>Prince</td>
                 </tr>  -->
                  
               </tbody>
             </table>
           </div> 
    
         </fieldset>

      </form>
   </div>
</div>
</div>
</div>
<!-- Assign History (Device) model popup end  -->

<!-- Assign to (Accessories) model popup start  -->
<div class="modal mymodel accessories_device_popup fade" id="accessories_device_popup" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
     <div class="form-content">
        <h5 class="modal-title">Assign to</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="form-body">
        <form>
           <fieldset class="form-border rounded-3 p-3 text-start">
              <legend class="float-none w-auto px-2 m-0">Accessories Assign</legend>
              <div class="d-grid gap-3">
                 <div class="form-re">   
                    <input type="date" name="from" value="" class="my-from-control"  placeholder="Assign on" required>
                 </div>
                 <div class="form-re"> 
                   <label class="form-label">Please Confirm Assign to?</label>
                   <div class="checkbox-list mt-1">
                       <div class="role-details">
                          <label for="radio1">
                            <input id="radio1" name="14" type="radio" class="radio main" value="1">
                          </label>
                          <span>Employee</span>
                        </div>
                        <div class="role-details">
                          <label for="radio2">
                            <input id="radio2" name="14" type="radio" class="radio main" value="2">
                          </label>
                          <span>Device</span>
                        </div> 
                   </div> 
                 </div> 
                 <div class="form-re">   
                    <input type="text" value="" class="my-from-control" id="searchassname"  placeholder="Search by employee name, employee Id">
                 </div> 
              
                 <!-- search list here assign persone name and id  -->
                 <div class="assign-list-date d-grid gap-3">
                    <div class="search-assign-persone d-flex align-items-center justify-content-between">
                       <div class="assign-pe-det d-flex gap-2 align-items-center">
                          <img src="{{basepath('images/user-img/user.svg')}}" alt="user">
                          <h4>Shubham Gupta <span>CC-358</span></h4>
                       </div>
                       <input type="radio" name="checked" id="" data-cid="CC-358" data-name="Shubham Gupta" class="accessoreis_click_radio">
                    </div>
                    <div class="search-assign-persone d-flex align-items-center justify-content-between">
                       <div class="assign-pe-det d-flex gap-2 align-items-center">
                          <img src="{{basepath('images/user-img/user.svg')}}" alt="user">
                          <h4>Isha Singh <span>CC-318</span></h4>
                       </div>
                       <input type="radio" name="checked" id="" data-cid="CC-318" data-name="Isha Singh" class="accessoreis_click_radio">
                    </div>
                    <div class="search-assign-persone d-flex align-items-center justify-content-between">
                       <div class="assign-pe-det d-flex gap-2 align-items-center">
                          <img src="{{basepath('images/user-img/user.svg')}}" alt="user">
                          <h4>Pankaj Sharma <span>CC-308</span></h4>
                       </div>
                       <input type="radio" name="checked" id="" data-cid="CC-308" data-name="Pankaj Sharma" class="accessoreis_click_radio">
                    </div> 
                 </div>
              </div>
           </fieldset>
           <div class="form-re text-center">   
              <button type="button" class="btn btn-blue2 m-auto w-50">Assign</button>
           </div> 
        </form>
     </div>
  </div>
</div>
</div>
<!-- Assign to (Accessories) model popup end  -->


<!-- all popup here end  -->

<!-- footer here  -->
<section class="footer-section">
<div class="container">
<div class="row">
   <div class="text-center footerlinks">
      <p class="mb-0">Copyright © 2008-2024 Croma Campus(P)Ltd.All rights Reserved.</p>
   </div>
</div>
</div>
</section>

<script src="{{basepath('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="{{basepath('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{basepath('js/dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/ashl1/datatables-rowsgroup@fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>
<script src="{{basepath('js/custom.js')}}"></script>

   </body>
</html>