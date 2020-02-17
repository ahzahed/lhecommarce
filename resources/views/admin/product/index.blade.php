@extends('admin.admin_layouts')
@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Product Table</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Product List
        <a href="#" class="btn btn-warning btn-sm" style="float:right;" data-toggle="modal" data-target="#exampleModal">Add New</a>
      </h6>
    </br>
      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
              <th class="wd-15p">Product ID</th>
              <th class="wd-15p">Product Name</th>
              <th class="wd-20p">Image</th>
              <th class="wd-20p">Category</th>
              <th class="wd-20p">Brand</th>
              <th class="wd-20p">Quantity</th>
              <th class="wd-20p">Status</th>
              <th class="wd-20p">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($product as $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->product_name }}</td>
                <td><img src="{{URL::to($value->image_one)}}" height="50px" width="50px" alt=""></td>
                <td>{{ $value->category_name }}</td>
                <td>{{ $value->brand_name }}</td>
                <td>{{ $value->product_quantity }}</td>
                <td>
                    @if($value->status==1) <span class="badge badge-success">Active</span>
                    @else <span class="badge badge-success">Inactive</span> @endif
                </td>
                <td>
                    <a href="{{ URL::to('edit/product/'.$value->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i></a>
                    <a href="{{ URL::to('delete/product/'.$value->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                    <a href="{{ URL::to('view/product/'.$value->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-eye"></i> </a>
                    @if($value->status==1)
                    <a href="{{ URL::to('inactive/product/'.$value->id) }}" class="btn btn-danger btn-sm" title="Inactive"> <i class="fa fa-thumbs-down"></i> </a>
                    @else
                    <a href="{{ URL::to('active/product/'.$value->id) }}" class="btn btn-success btn-sm" title="active"> <i class="fa fa-thumbs-up"></i></a>
                    @endif
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div><!-- table-wrapper -->
    </div><!-- card -->
  </div><!-- sl-pagebody -->
  
@endsection
