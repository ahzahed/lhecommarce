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
        <h6 class="card-body-title">New Product Add <a href="#" class="btn btn-success btn-sm pull-right">All Product</a></h6>
        <p class="mg-b-20 mg-sm-b-30">New Product Add form</p>

        <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_name" placeholder="Product Name">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_code">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_quantity">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="category_id">
                                @foreach ($category as $value)
                                    <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Sub-Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="subcategory_id"></select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="brand_id">
                                @foreach ($brand as $item)
                                    <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" data-role="tagsinput" name="product_size">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" data-role="tagsinput" name="product_color">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Selling price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="selling_price">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="discount_price">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="product_details" id="editor" cols="30" rows="10"></textarea>
                        </div>
                    </div><!-- col-4 -->
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="video_link">
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label>Image One (Main Thumbnail)<span class="text-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required>
                            <span class="custom-file-control"></span>
                            <img id="one">
                        </label>
                    </div><!-- col -->
                    <div class="col-lg-4 mg-t-40 mg-lg-t-0">
                        <label>Image Two<span class="text-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);" required>
                            <span class="custom-file-control custom-file-control-primary"></span>
                            <img id="two">
                        </label>
                    </div><!-- col -->
                    <div class="col-lg-4 mg-t-40 mg-lg-t-0">
                        <label>Image Three<span class="text-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);" required>
                            <span class="custom-file-control custom-file-control-inverse"></span>
                            <img id="three">
                        </label>
                    </div><!-- col -->
                    <div class="row p-3">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1">
                                <span>Hot Deal</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1">
                                <span>Best Rated</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1">
                                <span>Mid Slider</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1">
                                <span>Hot New</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="buyone_getone" value="1">
                                <span>Buy One Get One</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1">
                                <span>Trend Product</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1">
                                <span>Main Slider</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
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
