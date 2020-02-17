@extends('admin.admin_layouts')
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Category Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Coupon Update</h6>
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
        <form method="POST" action="{{ url('update/coupon/'.$coupon->id) }}">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                  <label>Coupon Code</label>
                  <input type="text" class="form-control" name="coupon" value="{{ $coupon->coupon }}">
              </div>
              <div class="form-group">
                  <label>Coupon Discount</label>
                  <input type="text" class="form-control" name="discount" value="{{ $coupon->discount }}">
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- sl-pagebody -->
</div>
  
@endsection
