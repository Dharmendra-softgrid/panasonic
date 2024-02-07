@extends('admin.layouts.app')
@section('styles')
<!-- <link href="{{asset('/')}}assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('/')}}assets/vendor/quill/quill.bubble.css" rel="stylesheet"> -->
  <style type="text/css">
    .tox-promotion,.tox-statusbar__branding{
      display: none;
    }
    .addimage{
      cursor: pointer;
    }
    
    .card-img-top {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
  </style>
@endsection

@section('content')
<div class="pagetitle">
      <h1>Case Study</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Case Study</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
     <section class="section">
      <div class="row">
        <div class="col-lg-12">

        
          

          <div class="card">
            <div class="card-body">
              @include('admin.shared.displaymsg')
              
              <form method="POST" action="{{route('casestudy.store')}}" enctype="multipart/form-data"> 
                {{ csrf_field() }}
              <h5 class="card-title">Case Study</h5>
                <div class="row mb-3">
                  <label for="inputText" class="col-md-2 col-form-label">Title</label>
                  <div class="col-md-10">
                    @if(!empty($casestudy->id))
                   <input type="hidden" name="id" value="{{$casestudy->id}}">
                   @endif
                   <input type="text" name="title" class="form-control" value="{{old('title',isset($casestudy->name) ? $casestudy->name : '')  }}" placeholder="Title" required>
                   @if($errors->has('title'))
                  <div class="text-danger">{{ $errors->first('title') }}</div>
                  @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-md-2 col-form-label">Type</label>
                  <div class="col-md-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" id="pdf" value="pdf" @if(old('type',!empty($casestudy->filename) ? 'pdf' : 'video') == 'pdf')checked="" @endif>
                      <label class="form-check-label" for="pdf">
                        Pdf
                      </label>
                    </div>
                   <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" id="youTubeVideo" value="video" @if(old('type',!empty($casestudy->filename) ? 'pdf' : 'video') == 'video')checked="" @endif >
                      <label class="form-check-label" for="youTubeVideo">
                        Youtube Video
                      </label>
                    </div>
                   
                  </div>
                </div>
                <div class="row mb-3 {{old('type',!empty($casestudy->filename) ? 'pdf' : 'video') == 'video' ? 'd-none' : ''}}" id="file-con">
                  <label for="inputText" class="col-md-2 col-form-label">File</label>
                  <div class="col-md-10">
                    
                   <input type="file" name="filename" class="form-control" value="" accept=".pdf">
                   @if($errors->has('filename'))
                  <div class="text-danger">{{ $errors->first('filename') }}</div>
                  @endif
                  </div>
                </div>
                <div class="row mb-3 {{old('type',!empty($casestudy->filename) ? 'pdf' : 'video') == 'video' ? '' : 'd-none'}}" id="video-con">
                  <label for="inputText" class="col-md-2 col-form-label">Video Url</label>
                  <div class="col-md-10">
                    
                   <input type="text" name="videourl" class="form-control" value="{{old('videourl',!empty($casestudy->video) ? $casestudy->video : '')}}" placeholder="Youtube video url">
                   @if($errors->has('videourl'))
                  <div class="text-danger">{{ $errors->first('videourl') }}</div>
                  @endif
                  </div>
                </div>
               
                <div class="row">
                  <div class="col-md-10 offset-md-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>

        </div>

       
      </div>
    </section>
<form id="imageform " class="d-none">
  <input type="file" name="media" id="productmedia" accept="image/png, image/jpeg, image/jpg, image/gif">
</form>
@include('admin.shared.videopopup')
@endsection
@section('scripts')
<script src="{{asset('/')}}assets/vendor/tinymce/tinymce.min.js"></script>  
<!-- <script src="{{asset('/')}}assets/vendor/quill/quill.min.js"></script>
<script src="https://unpkg.com/quill-html-edit-button@2.2.7/dist/quill.htmlEditButton.min.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
  $('input[type=radio][name=type]').change(function() {
    if (this.value == 'pdf') {
        $('#file-con').removeClass('d-none');
        $('#video-con').addClass('d-none');
    }
    else if (this.value == 'video') {
        $('#file-con').addClass('d-none');
        $('#video-con').removeClass('d-none');
    }
});
  

</script>
@endsection