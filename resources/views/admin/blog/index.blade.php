@extends('admin.admin_layouts')
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Post Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Post List
        <a href="#" class="btn btn-warning btn-sm" style="float:right;" data-toggle="modal" data-target="#exampleModal">Add New</a>
      </h6>
      </br>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">Post Title</th>
              <th class="wd-15p">Category</th>
              <th class="wd-15p">Image</th>
              <th class="wd-15p">Action</th>
              <th class="wd-20p"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($post as $value)
              <tr>
                <td>{{ $value->post_title_en }}</td>
                <td>{{ $value->category_name_en }}</td>
                <td><img src="{{URL::to($value->post_image)}}" height="50px" width="50px" alt=""></td>
                <td>
                    <a href="{{ URL::to('edit/post/'.$value->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i></a>
                    <a href="{{ URL::to('delete/post/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
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
