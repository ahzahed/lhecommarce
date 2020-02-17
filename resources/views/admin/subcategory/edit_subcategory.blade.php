@extends('admin.admin_layouts')
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Category Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Sub-Category Update</h6>
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
        <form method="POST" action="{{ url('update/subcategory/'.$subcategory->id) }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Subcategory Name</label>
                    <input type="text" class="form-control" name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
                </div>
                <div class="form-group">
                    <label>Category Name</label>
                    <select name="category_id" id="">
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" <?php if($item->id==$subcategory->category_id){echo "selected";} ?>> 
                                {{ $item->category_name }}
                            </option>
                        @endforeach
                    </select>
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
