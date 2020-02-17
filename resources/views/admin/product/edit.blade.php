@extends('admin.admin_layouts')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="#">Starlight</a>
    <span class="breadcrumb-item active">Product Section</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Product</h6>
        <p class="mg-b-20 mg-sm-b-30">New Product Add form</p>
        @foreach ($product as $product)
        <form action="{{ url('update/product/withoutphoto/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" placeholder="Product Name">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_quantity" value="{{ $product->product_quantity }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Discount: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price }}">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="category_id">
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}" <?php if($category->id == $product->category_id){echo "selected";} ?>>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Sub-Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="subcategory_id">
                                @foreach ($subcategory as $subcategory)
                                    <option value="{{ $subcategory->id }}" <?php if($subcategory->id == $product->subcategory_id){echo "selected";} ?>>{{ $subcategory->subcategory_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="brand_id">
                                @foreach ($brand as $item)
                                    <option value="{{ $item->id }}" <?php if($product->brand_id==$item->id){echo "selected";} ?> >{{ $item->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" data-role="tagsinput" name="product_size" value="{{ $product->product_size }}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" data-role="tagsinput" name="product_color" value="{{ $product->product_color }}">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_price" value="{{ $product->product_price }}">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Selling price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="product_details" id="editor" cols="30" rows="10">{{ $product->product_details }}</textarea>
                        </div>
                    </div><!-- col-4 -->
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="video_link" value="{{ $product->video_link }}">
                        </div>
                    </div><!-- col-4 -->

                    <div class="row p-3">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1" <?php if($product->hot_deal==1){echo "checked";} ?>>
                                <span>Hot Deal</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1" <?php if($product->best_rated==1){echo "checked";} ?>>
                                <span>Best Rated</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1" <?php if($product->mid_slider==1){echo "checked";} ?>>
                                <span>Mid Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1" <?php if($product->hot_new==1){echo "checked";} ?>>
                                <span>Hot New</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1" <?php if($product->trend==1){echo "checked";} ?>>
                                <span>Trend Product</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1" <?php if($product->main_slider==1){echo "checked";} ?>>
                                <span>Main Slider</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">Update</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            
            </div><!-- form-layout -->
        </form>
        @endforeach
      </div><!-- card -->
    </div><!-- sl-pagebody -->

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Product with Photo</h6>
            <div class="row">
                <form action="{{ url('update/product/photo/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-4">
                    <label>Image One (Main Thumbnail)<span class="text-danger">*</span></label>
                        <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);">
                        <span class="custom-file-control"></span>
                        <input type="hidden" name="old_one" value="{{ $product->image_one }}">
                        <img id="one">
                    </label>
                    <img src="{{URL::to($product->image_one)}}" height="80px" width="80px" alt="">
                </div><!-- col -->
                <div class="col-lg-4 mg-t-40 mg-lg-t-0">
                    <label>Image Two<span class="text-danger">*</span></label>
                        <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);">
                        <span class="custom-file-control custom-file-control-primary"></span>
                        <input type="hidden" name="old_two" value="{{ $product->image_two }}">
                        <img id="two">
                    </label>
                    <img src="{{URL::to($product->image_two)}}" height="80px" width="80px" alt="">
                </div><!-- col -->
                <div class="col-lg-4 mg-t-40 mg-lg-t-0">
                    <label>Image Three<span class="text-danger">*</span></label>
                        <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);">
                        <span class="custom-file-control custom-file-control-inverse"></span>
                        <input type="hidden" name="old_three" value="{{ $product->image_three }}">
                        <img id="three">
                    </label>
                    <img src="{{URL::to($product->image_three)}}" height="80px" width="80px" alt="">
                </div><!-- col -->
                <button class="btn btn-info mg-r-5" type="submit">Update Photo</button>
            </form>
            </div>
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url:"{{url('/get/subcategory/')}}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key,value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name+'<option>');
                        });
                    },
                });
            }else
            alert('danger');
        });
    });
</script>

//For Image show
<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#one')
                    .attr('src',e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function readURL1(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#two')
                    .attr('src',e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function readURL2(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#three')
                    .attr('src',e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
