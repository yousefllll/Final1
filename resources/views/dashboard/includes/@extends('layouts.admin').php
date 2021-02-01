@extends('layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">
                                        المنتجات </a>
                                </li>
                                <li class="breadcrumb-item active"> أضافه منتج
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> أضافة منتج جديد </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                
                                
                                        </form>

                                        <div class="card-body">
                                    <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-tab43" data-toggle="tab" aria-controls="tab43" href="#tab43" aria-expanded="false">الصور</a>
                                        </li>
                                    </ul>
                                    
                                    

                                                    <div class="form-body">
                                                    <div class="tab-pane-avtive" id="tab43" aria-labelledby="base-tab43">



<div class="col-md-12 col-sm-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light portlet-fit portlet-datatable ">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">Images List</span>
            </div>
        </div>
{{--                                                    @foreach($images as $image)--}}

{{--                                                        <div class="col-md-4"  >--}}

{{--                                                            <div class="card-header card-header-primary">--}}
{{--                                                                <h4 class="card-title">show Photo</h4>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="card-body">--}}
{{--                                                                <img  src="{{URL::asset("$image->image")}}" alt="" height="200" width="270">--}}

{{--                                                            </div>--}}
{{--                                                            <a class="btn green " href="{{route('deleteimage',['id'=>$image])}}">Delete</a>--}}

{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
    </div>
</div>
{{-- @endif --}}
<div class="row">

    <div class="col-sm-10 offset-sm-1">
        <h2 class="page-heading">Upload your Images <span id="counter"></span></h2>
        <form method="POST" action=""
              enctype="multipart/form-data" class="dropzone" id="myDropzoneForm">
            {{ csrf_field() }}
            <div class="dz-message">
                <div class="col-xs-8">
                    <div class="message">
                        <p>Drop files here or Click to Upload</p>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

{{--Dropzone Preview Template--}}
<div id="preview" style="display: none;">

    <div class="dz-preview dz-file-preview">
        <div class="dz-image"><img data-dz-thumbnail /></div>

        <div class="dz-details">
            <div class="dz-size"><span data-dz-size></span></div>
            <div class="dz-filename"><span data-dz-name></span></div>
        </div>
        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
        <div class="dz-error-message"><span data-dz-errormessage></span></div>



        <div class="dz-success-mark">

            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>Check</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                </g>
            </svg>

        </div>
        <div class="dz-error-mark">

            <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                <title>error</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                        <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                    </g>
                </g>
            </svg>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane-avtive" id="tab41" aria-expanded="true" aria-labelledby="base-tab41">
                                            <div class="card-body">
                                                <form class="form" action="{{route('admin.products.all.store')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf

                                                   
<ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-tab41" data-toggle="tab" aria-controls="tab41" href="#tab41" aria-expanded="true">الاسعار</a>
                                        </li>
                                        
                                        
                                    </ul>
                                    
                                    <div role="tabpanel" class="tab-pane-avtive" id="tab41" aria-expanded="true" aria-labelledby="base-tab41">
                                            <div class="card-body">
                                                <form class="form" action="{{route('admin.products.all.store')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="product_id" value="{{$id}}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">سعر المنتج الاصلي  </label>
                                                                    <input type="number" value="{{old('price')}}" id="price"
                                                                           class="form-control"
                                                                           placeholder="ادخل السعر"
                                                                           name="price">
                                                                    @error("price")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">سعر خاص </label>
                                                                    <input type="number" value="{{old('special_price')}}" id="special_price"
                                                                           class="form-control"
                                                                           placeholder="ادخل السعر  "
                                                                           name="special_price">
                                                                    @error("special_price")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">نوع السعر
                                                            </label>
                                                            <select name="special_price_type" class="select2 form-control" multiple>
                                                                <optgroup label="من فضلك أختر النوع ">
                                                                    <option value="percent">نسبة مئوية</option>
                                                                    <option value="fixed">سعر</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('special_price_type')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> تاريخ البداية
                                                            </label>

                                                            <input type="date" id="price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price_start')}}"
                                                                   name="special_price_start">

                                                            @error('special_price_start')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> تاريخ النهاية
                                                            </label>
                                                            <input type="date" id="price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price_end')}}"
                                                                   name="special_price_end">

                                                            @error('special_price_end')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                
                        
                                            </div>
                                                    
                                            <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                                <li class="nav-item">
                                                 <a class="nav-link active" id="base-tab42" data-toggle="tab" aria-controls="tab42" href="#tab42" aria-expanded="false">المخزون</a>
                                                </li>
                                                </ul>
                                        </div>
                                        <div class="tab-pane-avtive" id="tab42" aria-labelledby="base-tab42">
                                            <div class="card-body">
                                                

                                                    <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> كود  المنتج
                                                            </label>
                                                            <input type="text" id="sku"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('sku')}}"
                                                                   name="sku">
                                                            @error("sku")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">تتبع الكميات داخل المستودع
                                                            </label>
                                                            <select name="manage_stock" class="select2 form-control" id="manageStock">
                                                                <optgroup label="من فضلك أختر النوع ">
                                                                    <option value="1" selected>اتاحة التتبع</option>
                                                                    <option value="0">عدم اتاحة التتبع</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('manage_stock')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                  <!-- QTY  -->

                                                            <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">حالة المنتج في المستودع
                                                            </label>
                                                            <select name="in_stock" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر  ">
                                                                    <option value="1">متاح</option>
                                                                    <option value="0">غير متاح </option>
                                                                </optgroup>
                                                            </select>
                                                            @error('in_stock')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6"   id="qtyDiv">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الكمية
                                                            </label>
                                                            <input type="text" id="sku"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('qty')}}"
                                                                   name="qty">
                                                            @error("qty")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="button" class="btn btn-warning mr-1"
                                                                onclick="history.back();">
                                                            <i class="ft-x"></i> تراجع
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i> حفظ
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@stop

@section('script')

    <script>
        $(document).on('change','#manageStock',function(){
           if($(this).val() == 1 ){
                $('#qtyDiv').show();
           }else{
               $('#qtyDiv').hide();
           }
        });
    </script>
    @stop
