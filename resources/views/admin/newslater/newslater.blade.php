@extends('admin.admin_layouts')
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Category Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Subscriber List
          <a href="#" class="btn btn-danger btn-sm" style="float:right;" id="delete">All Delete</a>
      </h6>
      </br>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">ID</th>
              <th class="wd-15p">Email</th>
              <th class="wd-15p">Subscribing Time</th>
              <th class="wd-15p">Action</th>
              <th class="wd-20p"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($newslater as $value)
              <tr>
                <td><input type="checkbox">{{ $value->id }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->diffForhumans() }}</td>
                <td>
                    <a href="{{ URL::to('delete/newslater/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
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
  
@endsection
