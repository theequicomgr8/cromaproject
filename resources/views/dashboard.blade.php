@extends('layout.app')
@section('main')
<section class="third-header menulist-details">
         <div class="container">
            <div class="row">
               <div class="grid-two align-items-center">
                  <div class="heading">
                     <h3>Assets Management Dashboard</h3>
                  </div>
                  <div class="list-det ms-lg-auto">
                     <ul class="d-flex gap-3">
                        <li><a data-bs-toggle="modal" data-bs-target="#add_device_popup" class="btn btn-white"><img src="{{basepath('images/plus-sign.svg')}}" alt="plus-sign"> Device</a></li>
                        <li><a data-bs-toggle="modal" data-bs-target="#add_accessories_popup" class="btn btn-white"><img src="{{basepath('images/plus-sign.svg')}}" alt="plus-sign"> Accessories</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- header third area end  -->
      
      <!-- Content area start  -->
      <section class="content-area">
         <div class="container">
            <div class="row">
               <div class="assist-list d-grid gap-5">               
                  <div class="assist-list-box">
                   <h4>Devices</h4>
                     <div class="grid-four mt-4">
                        @foreach($data as $key => $value)
                        @php
                        $color=["bg-grad-green1","bg-grad-blue1","bg-grad-orange1","bg-grad-red1","bg-grad-green2","bg-grad-pink1","bg-grad-blue2","bg-grad-sk1","bg-grad-sk2","bg-grad-sk3"];
                        //$k = array_rand($color);
                        //$col = $color[$k];
                        $col=$color[$key];
                        @endphp
                        <a href="{{$value->blade_name}}" class="ass-box-list1 {{$col}} d-flex align-items-center gap-3">
                           <img src="{{basepath('device/'.$value->pic)}}" alt="laptop-icon"> 
                           <h3>{{$value->name}}</h3>
                        </a>
                        @endforeach
                        <!--<a href="device-lists.html" class="ass-box-list1 bg-grad-green1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/pc-monitor.svg')}}" alt="laptop-icon"> 
                           <h3>Desktop</h3>
                        </a>
                        <a href="device-lists.html" class="ass-box-list1 bg-grad-blue1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/mobile.svg')}}" alt="laptop-icon"> 
                           <h3>Mobile</h3>
                        </a>
                        <a href="device-lists.html" class="ass-box-list1 bg-grad-orange1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/sim.svg')}}" alt="laptop-icon"> 
                           <h3>Sim</h3>
                        </a>
                        <a href="device-lists.html" class="ass-box-list1 bg-grad-red1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/frejune.svg')}}" alt="laptop-icon"> 
                           <h3>Frejune</h3>
                        </a>
                        <a href="device-lists.html" class="ass-box-list1 bg-grad-green2 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/keys.svg')}}" alt="laptop-icon"> 
                           <h3>Keys</h3>
                        </a>
                        <a href="device-lists.html" class="ass-box-list1 bg-grad-pink1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/laptop-icon.svg')}}" alt="laptop-icon"> 
                           <h3>UPS</h3>
                        </a>
                        <a href="device-lists.html" class="ass-box-list1 bg-grad-blue2 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/house-keeping.svg')}}" alt="laptop-icon"> 
                           <h3>House Keeping</h3>
                        </a>-->
                  
                     </div>
                  </div>
                  <div class="assist-list-box">
                     <h4>accessories</h4>
                       <div class="grid-five mt-4">
                          @foreach($accessories as $value)
                          <a href="{{$value->blade_name}}" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                             <img src="{{basepath('accessories/'.$value->pic)}}" alt="laptop-icon"> 
                             <h3>{{$value->name}}</h3>
                          </a>
                          @endforeach
                          <!--<a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/mouse.svg')}}" alt="laptop-icon"> 
                           <h3>Mouse</h3>
                        </a>   
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/keyboard.svg')}}" alt="laptop-icon"> 
                           <h3>Keyboard</h3>
                        </a>
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/cable.svg')}}" alt="laptop-icon"> 
                           <h3>Cable</h3>
                        </a>
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/harddisk.svg')}}" alt="laptop-icon"> 
                           <h3>Hard Disk</h3>
                        </a>
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/graphic-card.svg')}}" alt="laptop-icon"> 
                           <h3>Graphic Card</h3>
                        </a>
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/monitor.svg')}}" alt="laptop-icon"> 
                           <h3>Monitor</h3>
                        </a>
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/headphone.svg')}}" alt="laptop-icon"> 
                           <h3>Headphones</h3>
                        </a>
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/laptop-icon.svg')}}" alt="laptop-icon"> 
                           <h3>House Keeping</h3>
                        </a>
                        <a href="accessories-list.html" class="ass-box-list2 bg-grad-black1 d-flex align-items-center gap-3">
                           <img src="{{basepath('images/assos-img/laptop-icon.svg')}}" alt="laptop-icon"> 
                           <h3>House Keeping</h3>
                        </a>-->
                       </div>
                  </div>
               </div>
            </div>
         </div>
      </section> 
 
        

      <!-- Content area end  -->

 
   
@endsection

@section('script')



   
 

<!-- common js here all   -->



@endsection