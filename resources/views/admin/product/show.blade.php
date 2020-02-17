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
        <h6 class="card-body-title">View Product <a href="#" class="btn btn-success btn-sm pull-right">All Product</a></h6>
        <p class="mg-b-20 mg-sm-b-30">View You Single Porduct</p>

            <div class="form-layout">
                @foreach ($product as $value)
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->product_name }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->product_code }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->product_quantity }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->category_name }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Sub-Category: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->subcategory_name }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->brand_name }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->product_size }}</strong>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->product_color }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->product_price }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Selling price: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->selling_price }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                        <strong>{!! $value->product_details !!}</strong>
                    </div>
                </div><!-- col-4 -->
                
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                        <strong>{{ $value->video_link }}</strong>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <label>Image One (Main Thumbnail)<span class="text-danger">*</span></label>
                        <label class="custom-file">
                        <img src="{{URL::to($value->image_one)}}" style="height: 80px; width:80px;" alt="">
                    </label>
                </div><!-- col -->
                <div class="col-lg-4 mg-t-40 mg-lg-t-0">
                    <label>Image Two<span class="text-danger">*</span></label>
                    <label class="custom-file">
                        <img src="{{URL::to($value->image_two)}}" style="height: 80px; width:80px;" alt="">
                    </label>
                </div><!-- col -->
                <div class="col-lg-4 mg-t-40 mg-lg-t-0">
                    <label>Image Three<span class="text-danger">*</span></label>
                    <label class="custom-file">
                        <img src="{{URL::to($value->image_three)}}" style="height: 80px; width:80px;" alt="">
                    </label>
                </div><!-- col -->
                <br><br><br><hr class="m-5 p-5">

                <div class="row p-3">
                    <div class="col-lg-4">
                        <label>
                            @if ($value->hot_deal==1)
                                <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Hot Deal</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if ($value->best_rated==1)
                                <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Best Rated</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if ($value->mid_slider==1)
                                <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Mid Slider</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if ($value->hot_new==1)
                                <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Hot New</span>
                        </label>
                    </div>
                    <div class="col-lg-4">
                        <label>
                            @if ($value->trend==1)
                                <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                            <span>Trend Product</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
            @endforeach
            </div><!-- form-layout -->
      </div><!-- card -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
@endsection
