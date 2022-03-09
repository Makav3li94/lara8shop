@extends('admin.admin_layout')

@section('content')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Product</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Product</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product</h4>
                    <h6 class="box-subtitle">Edit  product</h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('admin.products.update',$product->id)}}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Brand <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control" id="" required data-validation-required-message="This field is required">
                                                            @foreach($brands as $brand)
                                                                <option value="{{$brand->id}}" {{$product->brand_id ==$brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->has('brand_id'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('brand_id')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id"  onchange="getSubCategory()" class="form-control" id="category_id" required
                                                                data-validation-required-message="This field is required">
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" {{$product->category_id ==$category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->has('category_id'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('category_id')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Sub Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="sub_category_id" onchange="getSubSubCategory()" id="sub_category_id" class="form-control" required
                                                                data-validation-required-message="This field is required">
                                                            @foreach($subCategories as $subCategory)
                                                                <option value="{{$subCategory->id}}" {{$product->sub_category_id ==$subCategory->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->has('sub_category_id'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('sub_category_id')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Sub Category <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="sub_sub_category_id" id="sub_sub_category_id" class="form-control" required
                                                                data-validation-required-message="This field is required">
                                                            @foreach($subSubCategories as $subSubCategory)
                                                                <option value="{{$subSubCategory->id}}" {{$product->sub_sub_category_id ==$subSubCategory->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->has('sub_sub_category_id'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('sub_sub_category_id')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{$product->name}}" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>
                                                    @if($errors->has('name'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('name')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>نام محصول <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name_fa" value="{{$product->name_fa}}" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>
                                                    @if($errors->has('name_fa'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('name_fa')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Code<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="code" value="{{$product->code}}" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>
                                                    @if($errors->has('code'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('code')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Quantity<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="qty" value="{{$product->qty}}" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>
                                                    @if($errors->has('qty'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('qty')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Tags<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="tags" value="{{$product->tags}}" data-role="tagsinput" placeholder="add tags"/></div>
                                                    +
                                                </div>
                                                @if($errors->has('tags'))
                                                    <div class="form-control-feedback">
                                                        <small>
                                                            {{$errors->first('tags')}}
                                                        </small>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>برچسب محصول<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="tags_fa" value="{{$product->tags_fa}}" data-role="tagsinput" placeholder="add tags"/></div>
                                                    +
                                                </div>
                                                @if($errors->has('tags_fa'))
                                                    <div class="form-control-feedback">
                                                        <small>
                                                            {{$errors->first('tags_fa')}}
                                                        </small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product size<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="size" value="{{$product->size}}" data-role="tagsinput" placeholder="add tags"/></div>
                                                    +
                                                </div>
                                                @if($errors->has('size'))
                                                    <div class="form-control-feedback">
                                                        <small>
                                                            {{$errors->first('size')}}
                                                        </small>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>اندازه محصول<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="size_fa" value="{{$product->size_fa}}" data-role="tagsinput" placeholder="add tags"/></div>
                                                    +
                                                </div>
                                                @if($errors->has('size_fa'))
                                                    <div class="form-control-feedback">
                                                        <small>
                                                            {{$errors->first('size_fa')}}
                                                        </small>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product colors<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="color" value="{{$product->color}}" data-role="tagsinput" placeholder="add tags"/></div>
                                                    +
                                                </div>
                                                @if($errors->has('color'))
                                                    <div class="form-control-feedback">
                                                        <small>
                                                            {{$errors->first('color')}}
                                                        </small>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>رنگ محصول<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="color_fa" value="{{$product->color_fa}}" data-role="tagsinput" placeholder="add tags"/></div>
                                                    +
                                                </div>
                                                @if($errors->has('color_fa'))
                                                    <div class="form-control-feedback">
                                                        <small>
                                                            {{$errors->first('color_fa')}}
                                                        </small>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Selling price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_prize" class="form-control" required value="{{$product->selling_prize}}"
                                                               data-validation-required-message="This field is required">
                                                    </div>
                                                    @if($errors->has('selling_prize'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('selling_prize')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Product Discount price<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount" class="form-control" value="{{$product->discount}}" required data-validation-required-message="This field is required">
                                                    </div>
                                                    @if($errors->has('discount'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('discount')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Short Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="excerpt" id="excerpt" class="form-control" required placeholder="Textarea text">{{$product->excerpt}}"</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>خلاصه توضیحات <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="excerpt_fa" id="excerpt_fa" class="form-control" required placeholder="Textarea text">{{$product->excerpt_fa}}"</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Long Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="description" name="description" rows="10" cols="80">{!! $product->description !!}"</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>توضیحات کامل <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="description_fa" name="description_fa" rows="10" cols="80">{!! $product->description_fa !!}"</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <img src="" id="product_image" alt="">
                                                    <h5>Product Main image <span class="text-danger">*</span></h5>
                                                    <img src="{{asset($product->image)}}" alt="{{$product->name}}" width="100">
                                                    <div class="controls">
                                                        <input type="file" name="image" onchange="handleImage(this)" class="form-control" ></div>
                                                    @if($errors->has('image'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('image')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mt-4">
                                                    <div class="row" id="preview_multiImg">
                                                        @foreach($multiImgs as  $multiImg)
                                                            <img src="{{asset($multiImg->image)}}" alt="{{$product->name}}" width="100">
                                                        @endforeach
                                                    </div>
                                                    <h5>Product Multi image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" id="multiImg" multiple class="form-control" >
                                                    </div>
                                                    @if($errors->has('image'))
                                                        <div class="form-control-feedback">
                                                            <small>
                                                                {{$errors->first('image')}}
                                                            </small>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="hot_deals" id="hot_deals" {{$product->hot_deals == 1 ? 'checked' : ''}} value="1">
                                                            <label for="hot_deals">Hot deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="featured" id="featured" {{$product->featured == 1 ? 'checked' : ''}} value="1">
                                                            <label for="featured">Featured</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="status" id="status" {{$product->status == 1 ? 'checked' : ''}} value="1">
                                                            <label for="status">Status</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" name="special_offer" id="special_offer" {{$product->special_offer == 1 ? 'checked' : ''}} value="1">
                                                            <label for="special_offer">Special offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" name="special_deal" id="special_deal" {{$product->special_deal == 1 ? 'checked' : ''}} value="1">
                                                            <label for="special_deal">Special deal</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary" value="Submit"></div>
                            </form>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection



@section('scripts')

    <script>
        $(document).ready(function () {
            getSubCategory()

        })

        function getSubCategory() {
            var category_id = $('#category_id').val()
            if (category_id) {
                $.ajax({
                    url: "{{url('admin/subsubcategories/ajax')}}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (!$.trim(data)) {
                            $('#sub_category_id').empty()
                            $('#sub_category_id').append('<option value="">Notting found !</option>')
                        } else {
                            $('#sub_category_id').empty()
                            $.each(data, function (key, val) {
                                $('#sub_category_id').append('<option value="' + key + '">' + val + '</option>')
                            })
                        }
                        setTimeout(function () {
                            getSubSubCategory()
                        }, 300);
                    }
                })
            } else {
                $('#sub_category_id').empty()
                console.log('An Error Happened')
            }
        }

        function getSubSubCategory() {
            var sub_category_id = $('#sub_category_id').val()
            if (sub_category_id) {
                $.ajax({
                    url: "{{url('admin/subsubcategories/getsubsub')}}/" + sub_category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        if (!$.trim(data)) {
                            $('#sub_sub_category_id').empty()
                            $('#sub_sub_category_id').append('<option value="">Notting found !</option>')
                        } else {
                            $('#sub_sub_category_id').empty()
                            $.each(data, function (key, val) {
                                $('#sub_sub_category_id').append('<option value="' + key + '">' + val + '</option>')
                            })
                        }

                    }
                })
            } else {
                $('#sub_sub_category_id').empty()
                console.log('sub An Error Happened')
            }
        }

        function handleImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#product_image').attr('src', e.target.result).width(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


    </script>
    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_multiImg').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
    <script src="{{asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
    <script src="{{asset('backend/js/pages/editor.js')}}"></script>
@endsection