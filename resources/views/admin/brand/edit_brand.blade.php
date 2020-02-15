@extends('admin.admin_layouts')
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Category Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Brand Update</h6>
    </br>
      <div class="table-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  {{--  <input type="hidden" name="id" value="{{$category_id}}">  --}}
                    <label>Brand Name</label>
                    <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}" required>
                </div>
                <div class="form-group">
                    <label>Brand Logo</label>
                    <input type="file" class="form-control" name="brand_logo">
                </div>
                <div class="form-group">
                    <label>Old Logo</label>
                    <img src="{{ URL::to($brand->brand_logo)}}" height="80px" width="80px" alt="">
                    <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- sl-pagebody -->
  
@endsection
