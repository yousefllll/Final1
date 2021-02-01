<?php

                                    <div class="card-body">
                                    <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab41" data-toggle="tab" aria-controls="الاس" href="#tab41" aria-expanded="true">الاسعار</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-tab42" data-toggle="tab" aria-controls="tab42" href="#tab42" aria-expanded="false">المخزون</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab43" data-toggle="tab" aria-controls="tab43" href="#tab43" aria-expanded="false">الصور</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane" id="tab41" aria-expanded="true" aria-labelledby="base-tab41">
                                            <div class="card-body">
                                                <form class="form" action="{{route('product.store')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf



                                                    <div class="form-body">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">سعر المنتج الاصلي  </label>
                                                                    <input type="text" value="" id="price"
                                                                           class="form-control"
                                                                           placeholder="ادخل السعر  "
                                                                           name="price">
                                                                    @error("price")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">سعر خاص </label>
                                                                    <input type="text" value="" id="special_price"
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
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> تاريخ بداية العرض </label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control pickadate">
                                                                        <div class="input-group-append">
									                                 	<span class="input-group-text">
											                         <span class="la la-calendar"></span>
									                            	</span>
                                                                        </div>
                                                                    </div>
                                                                    @error("special_price_start")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> تاريخ نهاية العرض </label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control pickadate">
                                                                        <div class="input-group-append">
									                                 	<span class="input-group-text">
											                         <span class="la la-calendar"></span>
									                            	</span>
                                                                        </div>
                                                                    </div>
                                                                    @error("special_price_end")
                                                                    <span class="text-danger">{{$message}} </span>
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
                                        <div class="tab-pane active" id="tab42" aria-labelledby="base-tab42">
                                            <div class="card-body">
                                                <form class="form" action="{{route('product.store')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf



                                                    <div class="form-body">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Sku  </label>
                                                                    <input type="text" value="" id="price"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           name="sku">
                                                                    @error("sku")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> الكمية </label>
                                                                    <input type="text" value="" id=""
                                                                           class="form-control"
                                                                           placeholder="ادخل الكمية  "
                                                                           name="qty">
                                                                    @error("special_price")
                                                                    <span class="text-danger">{{$message}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mt-1">
                                                                    <input type="checkbox" name="active" value="1"
                                                                           id="switcheryColor4"
                                                                           class="switchery" data-color="success"
                                                                           checked/>
                                                                    <label for="switcheryColor4"
                                                                           class="card-title ml-1">متوفر</label>
                                                                </div>
                                                            </div>
                                                            @error("active")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                            <div class="col-md-6">
                                                                <div class="form-group mt-1">
                                                                    <input type="checkbox" name="active" value="1"
                                                                           id="switcheryColor4"
                                                                           class="switchery" data-color="success"
                                                                           checked/>
                                                                    <label for="switcheryColor4"
                                                                           class="card-title ml-1">ادارة المخزن</label>
                                                                </div>
                                                            </div>
                                                            @error("active")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
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
                                        <div class="tab-pane" id="tab43" aria-labelledby="base-tab43">



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

?>