@extends('admin.admin_layouts')
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Category Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Sub-Category List
        <a href="#" class="btn btn-warning btn-sm" style="float:right;" data-toggle="modal" data-target="#exampleModal">Add Subcategory</a>
      </h6>
      </br>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">ID</th>
              <th class="wd-15p">Sub-Category Name</th>
              <th class="wd-15p">Category Name</th>
              <th class="wd-15p">Action</th>
              <th class="wd-20p"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($subcategory as $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->subcategory_name }}</td>
                <td>{{ $value->category_name }}</td>
                <td>
                    <a href="{{ URL::to('edit/subcategory/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ URL::to('delete/subcategory/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                </td>
                <td></td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- sl-pagebody -->
</div>
  
  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('store.subcategory') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Sub-Category Name</label>
                            <input type="text" class="form-control" name="subcategory_name" placeholder="Sub-Category Name">
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <select name="category_id" id="">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"> {{ $item->category_name   }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
