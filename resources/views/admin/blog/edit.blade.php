@extends('admin.admin_layouts')

@section('admin_content')
@php
    $category=DB::table('post_category')->get();
@endphp

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="#">Starlight</a>
    <span class="breadcrumb-item active">Product Section</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Post Update <a href="#" class="btn btn-success btn-sm pull-right">All Post</a></h6>

        <form action="{{url('update/post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Post Tittle [English] <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="post_title_en" value="{{$post->post_title_en}}">
                </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Post Tittle [Bangla] <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="post_title_bn" value="{{$post->post_title_bn}}">
                </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                    <select class="form-control" name="category_id">
                        @foreach ($category as $value)
                            <option value="{{ $value->id }}" <?php if($value->id == $post->category_id){echo "selected";} ?>>{{ $value->category_name_en }}</option>
                        @endforeach
                    </select>
                </div>
                </div><!-- col-4 -->

                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="form-control-label">Product Details [English]: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" name="details_en" id="editor" cols="30" rows="10">
                        {{$post->details_en}}
                    </textarea>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                    <div class="form-group">
                    <label class="form-control-label">Product Details [Bangla]: <span class="tx-danger">*</span></label>
                    <textarea class="form-control" name="details_bn" id="editor1" cols="30" rows="10">
                        {{$post->details_bn}}
                    </textarea>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <label>Image One (Main Thumbnail)<span class="text-danger">*</span></label>
                    <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);">
                    <span class="custom-file-control"></span>
                    <img id="image">
                    </label>
                </div><!-- col -->

                <div class="col-lg-4">
                    <label>Old Image<span class="text-danger">*</span></label>
                    <label class="custom-file">
                    <img src="{{ URL::to($post->post_image) }}" height="80px" width="80px" alt="">
                    <input type="hidden" name="old_image" value="{{ $post->post_image }}">
                    </label>
                </div><!-- col -->
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
<script>
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image')
                    .attr('src',e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
