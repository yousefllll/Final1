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
                                <li class="breadcrumb-item"><a href="">  المنتجات </a>
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
                                
                                
                                        

                                        <div class="card-body">
                                    <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-tab43" data-toggle="tab" aria-controls="tab43" href="#tab43" aria-expanded="false">الصور</a>
                                        </li>
                                    </ul>
                                    
                                    <div class="tab-content px-1 pt-1">


                                                    <div class="form-body">
                                                    <div class="tab-pane-avtive" id="tab43" aria-labelledby="base-tab43">



                                        <div class="col-md-12 col-sm-12">
                                        <div class="card-content collapse show">
                                    <div class="card-body">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <form class="form"
                                              action="{{route('admin.products.images.store.db')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="product_id" value="{{$id}}">
                                            <div class="form-body">

                                                
                                                <div class="form-group">
                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                        <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
                                                    </div>
                                                    <br><br>
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
                                                    <input type="hidden" name="product_id" value="{{$id}}">
                                                   
<ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-tab41" data-toggle="tab" aria-controls="tab41" href="#tab41" aria-expanded="true">الاسعار</a>
                                        </li>
                                        
                                        
                                    </ul>                            
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
                                                
                                            <form class="form" action="{{route('admin.products.all.store')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$id}}">
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

<script>

var uploadedDocumentMap = {}
Dropzone.options.dpzMultipleFiles = {
   paramName: "dzfile", // The name that will be used to transfer the file
   //autoProcessQueue: false,
   maxFilesize: 5, // MB
   clickable: true,
   addRemoveLinks: true,
   acceptedFiles: 'image/*',
   dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
   dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
   dictCancelUpload: "الغاء الرفع ",
   dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
   dictRemoveFile: "حذف الصوره",
   dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هذا ",
   headers: {
       'X-CSRF-TOKEN':
           "{{ csrf_token() }}"
   }

   ,
   url: "{{route('admin.products.images.store')}}", // Set the url
   success:
       function (file, response) {
           $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
           uploadedDocumentMap[file.name] = response.name
       }
   ,
   removedfile: function (file) {
       file.previewElement.remove()
       var name = ''
       if (typeof file.file_name !== 'undefined') {
           name = file.file_name
       } else {
           name = uploadedDocumentMap[file.name]
       }
       $('form').find('input[name="document[]"][value="' + name + '"]').remove()
   }
   ,
   // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
   init: function () {

           @if(isset($event) && $event->document)
       var files =
       {!! json_encode($event->document) !!}
           for (var i in files) {
           var file = files[i]
           this.options.addedfile.call(this, file)
           file.previewElement.classList.add('dz-complete')
           $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
       }
       @endif
   }
}
</script>
    @stop
