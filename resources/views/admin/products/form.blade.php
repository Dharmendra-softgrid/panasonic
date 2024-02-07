@extends('admin.layouts.app')
@section('styles')
<!-- <link href="{{asset('/')}}assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('/')}}assets/vendor/quill/quill.bubble.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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
    .select2 {
    width:100%!important;
    }
    .specsheetimg{
      width: 120px;
      display: block;
      margin-left: auto;
      margin-right: auto;
      margin-top: 20px;
    }
  </style>
@endsection
@section('content')

    <div class="pagetitle">
      <h1>Create Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section">
  <div class="card">
    <div class="card-body">
      @include('admin.shared.displaymsg')
      <h5 class="card-title">Product</h5>
      <form method="POST" action="{{route('product.store')}}">
        <div class="row">
          <div class="col-lg-12">
            
            
            <!-- Horizontal Form -->
            
            {{ csrf_field() }}
            @if(!empty($product->id))
            <input type="hidden" name="id" value="{{$product->id}}">
            @endif
            <div class="row mb-3">
              <label for="product_title" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control {{$errors->has('title') ? 'border-danger' : '' }} " id="product_title" value="{{old('title',isset($product->title) ? $product->title : '' )}}">
                @if($errors->has('title'))
                <div class="text-danger">{{ $errors->first('title') }}</div>
                @endif
              </div>

            </div>
            <div class="row mb-3">
                  <label for="inputText" class="col-md-2 col-form-label">Meta title</label>
                  <div class="col-md-10">                    
                   <input type="text" name="meta_title" class="form-control" value="{{old('meta_title',isset($product->meta_title) ? $product->meta_title : '')  }}">                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-md-2 col-form-label">Meta keywords</label>
                  <div class="col-md-10">                    
                   <input type="text" name="meta_keywords" class="form-control" value="{{old('meta_keywords',isset($product->meta_keywords) ? $product->meta_keywords : '')  }}">
                 </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-md-2 col-form-label">Meta description</label>
                  <div class="col-md-10"> 
                  <textarea name="meta_description" class="form-control">{{old('meta_description',isset($product->meta_description) ? $product->meta_description : '')  }}</textarea>                   
                  
                 </div>
                </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Product Category</label>
              <div class="col-sm-10">
                <?php $scategories = isset($product->product_categories)  ? $product->product_categories->pluck('id')->toArray() : [];
                 ?>
                <select name="categories[]" class="form-control {{$errors->has('category') ? 'border-danger' : '' }}" id="categories" multiple>
                  
                  @if($categories->isNotEmpty())
                    @foreach($categories as $category)
                      <option value="{{$category->id}}" {{in_array($category->id,old('categories',$scategories)) ? 'Selected': ''}}>{{$category->title}}</option>
                    @endforeach
                  @endif
                </select>
                
                @if($errors->has('categories'))
                <div class="text-danger">{{ $errors->first('categories') }}</div>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Industries</label>
              <div class="col-sm-10">
                <?php $sindustries = isset($product->industries)  ? $product->industries->pluck('id')->toArray() : [];
                 ?>
                <select name="industries[]" class="form-control {{$errors->has('Industries') ? 'border-danger' : '' }}" id="industries" multiple>
                  
                  @if($industries->isNotEmpty())
                    @foreach($industries as $industry)
                      <option value="{{$industry->id}}" {{in_array($industry->id,old('industries',$sindustries)) ? 'Selected': ''}}>{{$industry->title}}</option>
                    @endforeach
                  @endif
                </select>
                
                @if($errors->has('industries'))
                <div class="text-danger">{{ $errors->first('industries') }}</div>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Short Description</label>
              <div class="col-sm-10">
                <textarea name="short_description" class="form-control {{$errors->has('short_description') ? 'border-danger' : '' }} " id="">{{old('short_description',isset($product->short_description) ? $product->short_description : '' )}}</textarea>
                @if($errors->has('short_description'))
                <div class="text-danger">{{ $errors->first('short_description') }}</div>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea name="description" class="form-control {{$errors->has('description') ? 'border-danger' : '' }} content" id="content">{{old('description',isset($product->description) ? $product->description : '' )}}</textarea>
                @if($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Key Features</label>
              <div class="col-sm-10">
                <?php $kf='<ul class="feature_list">
                              <li>Innovative modular design and user-removable expansion packs offer
                                 unparalleled customization
                              </li>
                              <li>State-of-the-art design optimizes thermals for effortless performance</li>
                              <li>Class leading 95db speakers, 5MP infrared webcam with privacy cover
                                 and tetra-array microphones
                              </li>
                              <li>Fully rugged all-weather MIL-STD-810H & IP66 design built with
                                 magnesium alloy
                              </li>
                              <li>Fastest cellular in the industry—up to 2Gbps 4G modem or 5.5Gbps 5G
                                 modem adds Sub6, C-band and mmWave
                              </li>
                           </ul>'; ?>
                <textarea name="key_features" class="form-control {{$errors->has('description') ? 'border-danger' : '' }} content" id="content">{{old('key_features',isset($product->key_features) ? $product->key_features : $kf )}}</textarea>
                @if($errors->has('key_features'))
                <div class="text-danger">{{ $errors->first('key_features') }}</div>
                @endif
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Specifications</label>
              <div class="col-sm-10">
                <div class="card ">
                  <div class="card-body">
                  <div class="row spece-container">
                  
                  
                  <div class="col-sm-12 "><button type="button" class="btn btn-primary btn-sm float-end addspec mt-3"><i class="bi bi-plus"></i> Add Specifications</button></div>
                  <div class="col-sm-12 "><button type="button" class="btn btn-primary btn-sm float-end addspecimage mt-3"><i class="bi bi-plus"></i> Add Specifications image</button></div>
                  <div class="specificationimagecon">
                    @if(!empty($product->specificationimage))
                      <div class="col-sm-3 ">
                        <div class="card" >
                        <input type="hidden" name="speceimage" value="{{$product->specificationimage}}">
                          <img class="" src="{{asset('images/product/'.$product->specificationimage)}}" alt="Card image cap">
                          
                          <div class="card-footer text-center">
                            <button type="button" class="btn btn-danger btn-sm deletespecimage "><i class="bi bi-trash"></i> </button>
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>
                  </div>
                  @if(isset($product) && $product->specifications->isNotEmpty())
                    @foreach($product->specifications as $spec)
                      <div class="row mt-2 ">
                  
                        <label for="inputNumber" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-3"><input type="text" name="specifications[]" class="form-control autocomplete" value="{{$spec->title}}"></div>
                        <label for="inputNumber" class="col-sm-2 col-form-label">Value</label>
                        <div class="col-sm-3"><input type="text" name="specificationsvalue[]" class="form-control" value="{{$spec->value}}"></div>
                        <div class="col-sm-2"><button type="button" class="btn btn-danger btn-sm float-end deletespec "><i class="bi bi-trash"></i></button></div>
                      </div>
                    @endforeach
                  @endif
                @if($errors->has('specifications'))
                <div class="text-danger">{{ $errors->first('specifications') }}</div>
                @endif
              </div>
              </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Accessories</label>
              <div class="col-sm-10">
                <div class="card ">
                  <div class="card-body">
                <div class="row access-container">
                  
                  <div class="col-sm-12"><button type="button" class="btn btn-primary btn-sm float-end addaccess mt-3"><i class="bi bi-plus"></i> Add Accessories</button></div>
                  </div>
                  @if(isset($product) && $product->accessories->isNotEmpty())
                    @foreach($product->accessories as $spec)
                      <div class="row mt-2 ">
                  
                        <label for="inputNumber" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-3"><input type="text" name="accessories[]" class="form-control autocomplete" value="{{$spec->title}}"></div>
                        <label for="inputNumber" class="col-sm-2 col-form-label">Value</label>
                        <div class="col-sm-3"><input type="text" name="accessoriesvalue[]" class="form-control" value="{{$spec->value}}"></div>
                        <div class="col-sm-2"><button type="button" class="btn btn-danger btn-sm float-end deletaccess "><i class="bi bi-trash"></i></button></div>
                      </div>
                    @endforeach
                  @endif
                @if($errors->has('accessories'))
                <div class="text-danger">{{ $errors->first('accessories') }}</div>
                @endif
              </div>
              </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Product Images</label>
              <div class="col-sm-10">               
                <div class="row " id="imagesortable">
                  @if(old('images'))
                    @foreach(old('images') as $image)
                      <div class="col-sm-6 col-md-3 dragimage">
                        <div class="card ">
                        <input type="hidden" name="images[]" value="{{$image}}">
                        <img src="{{asset('images/product/'.$image)}}" class="card-img-top" alt="...">
                        <div class="card-body text-center ">
                          <button type="button" class="btn btn-danger btn-sm mt-3 deleteimage"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      </div>
                    @endforeach
                  @elseif(isset($product) && $product->product_images->isNotEmpty())
                    @foreach($product->product_images as $pimage)
                      <div class="col-sm-6 col-md-3 dragimage">
                        <div class="card ">
                        <input type="hidden" name="images[]" value="{{$pimage->image}}">
                        <img src="{{asset('images/product/'.$pimage->image)}}" class="card-img-top" alt="...">
                        <div class="card-body text-center ">
                          <button type="button" class="btn btn-danger btn-sm mt-3 deleteimage"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      </div>
                    @endforeach
                  @endif
                  <div class="col-sm-6 col-md-3 imageitem unsortable">
                    <div class="card addimage">
                    <img src="{{asset('/')}}images/product/productDefault.png" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                      <button type="button" class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus"></i></button>
                     
                    </div>
                  </div>
                  </div>
                  @if($errors->has('images'))
                <div class="text-danger">{{ $errors->first('images') }}</div>
                @endif
                </div>
              </div>
            </div>
             <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Youtube Video</label>
                  <div class="col-sm-10">               
                    @include('admin.shared.addvideo',['videos'=>(isset($product) && $product->videos->isNotEmpty()) ? $product->videos : ''])
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Section</label>
                  <div class="col-sm-10" id="sectionSortable">               
                    <div class="row bimagec sectionunsortable">
                      
                      
                     
                     
                      <div class="col-sm-12 mb-3"><button type="button" class="btn btn-primary btn-sm float-end addblog"><i class="bi bi-plus"></i> Add Section</button></div>
                    </div>
                    @if(isset($product) && $product->blogs->isNotEmpty())
                      @foreach($product->blogs as $blog)
                      <div class="row ">
                        <div class="col-sm-12">
                          <div class="card p-3">
                            <div class="row ">
                              <div class="col-sm-8">
                                <label for="inputEmail3" class="col-form-label">Title</label>
                                <input type="text" name="blogtitle[]" class="form-control" placeholder="Title" value="{{$blog->title}}">
                                <label for="inputEmail3" class="col-form-label">Description</label>
                                <textarea class="form-control" name="blogdescription[]">{{$blog->description}}</textarea>
                              </div>
                          
                              <div class="col-sm-3">
                                <div class="card addblogimage mb-0">
                                  <input type="hidden" name="blogimage[]" value="{{$blog->image}}">
                                  <img src="{{asset('images/product/'.$blog->image)}}" class="card-img-top" alt="...">
                                  <div class="card-body text-center">
                                    <button type="button" class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus"></i></button>
                           
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-1">
                                <button type="button" class="btn btn-danger btn-sm float-end deleteblogimage"><i class="bi bi-trash"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    @endif
                  </div>
              </div>
               
                  
              <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Spece Sheet</label>
              <div class="col-sm-10">               
                <div class="row " id="specsheet">
                   <div class="col-sm-12 ">
                    <button type="button" class="btn btn-primary btn-sm float-end addspecsheet mt-3" data-type-id="specsheet" data-value-name="specesheet"><i class="bi bi-plus"></i> Add spece sheet</button>
                  </div>
                  @if(!empty($product->specsheets->isNotEmpty()))  
                    @foreach($product->specsheets as $specsheets) 
                      <?php $specsheets = (!empty($specsheets->value))  ? unserialize($specsheets->value) : '';  ?> 
                      @if(!empty($specsheets))
                        @foreach($specsheets as $specsheet)                
                         <div class="col-sm-3 ">
                          <div class="card" >
                            <input type="hidden" name="specesheet[]" value="{{$specsheet}}">
                            <img class="specsheetimg" src="{{asset('specesheet/PDF_file_icon.webp')}}" alt="Card image cap">
                            <div class="card-body mt-3 text-center">
                              <a href="{{asset('specesheet/'.$specsheet)}}" class="card-link mt-3" target="_blank">{{$specsheet}}</a>
                            </div>
                            <div class="card-footer text-center">
                              <button type="button" class="btn btn-danger btn-sm deletespecsheet "><i class="bi bi-trash"></i> </button>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      @endif
                    @endforeach
                  @endif
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Brochures</label>
              <div class="col-sm-10">               
                <div class="row " id="brochures">
                   <div class="col-sm-12 ">
                      <button type="button" class="btn btn-primary btn-sm float-end addspecsheet mt-3" data-type-id="brochures" data-value-name="brochures"><i class="bi bi-plus"></i> Add brochures</button>
                    </div>
                  @if(!empty($product->brochures->isNotEmpty()))  
                    @foreach($product->brochures as $brochures) 
                      <?php $brochures = (!empty($brochures->value))  ? unserialize($brochures->value) : '';  ?> 
                      @if(!empty($brochures))
                        @foreach($brochures as $bs)                
                         <div class="col-sm-3 ">
                          <div class="card" >
                            <input type="hidden" name="brochures[]" value="{{$bs}}">
                            <img class="specsheetimg" src="{{asset('specesheet/PDF_file_icon.webp')}}" alt="Card image cap">
                            <div class="card-body mt-3 text-center">
                              <a href="{{asset('specesheet/'.$bs)}}" class="card-link mt-3" target="_blank">{{$bs}}</a>
                            </div>
                            <div class="card-footer text-center">
                              <button type="button" class="btn btn-danger btn-sm deletespecsheet "><i class="bi bi-trash"></i> </button>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      @endif
                    @endforeach
                  @endif
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10 offset-sm-2">  
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </form><!-- End Horizontal Form -->
    </div>
  </div>
</section>
<form id="imageform " class="d-none">
  <input type="file" name="media" id="productmedia" accept="image/png, image/jpeg, image/jpg, image/gif">
</form>
<form id="blogimage" class="d-none">
  <input type="file" name="media" id="blogimagefile" accept="image/png, image/jpeg, image/jpg, image/gif">
</form>
<form id="specsheetfrm" class="d-none">
  <input type="file" name="media" id="specsheetfile" accept="application/pdf" >
</form>
<form id="specificationimage" class="d-none">
  <input type="file" name="media" id="specificationimagefile" accept="image/png, image/jpeg, image/jpg, image/gif">
</form>
<div id="upload-form-modal" class="modal fade" role="dialog" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      </div>
    </div>
  </div>
  @include('admin.shared.videopopup')
@endsection
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#categories').select2();
    $( "#imagesortable" ).sortable({
       cancel: ".unsortable,input,textarea"     
    });
    $( "#sectionSortable" ).sortable({
       cancel: ".sectionunsortable,input,textarea"     
    });
    $( "#videoSortable" ).sortable({
       cancel: ".videounsortable,input,textarea"     
    });

    $('#industries').select2();
    $('.addimage').click(function(){
      $('#productmedia').click();
    });
    $('.addspec').click(function(){
      var spec=`<div class="row mt-2 ">
                  
                  <label for="inputNumber" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-3"><input type="text" name="specifications[]" class="form-control autocomplete"></div>
                  <label for="inputNumber" class="col-sm-2 col-form-label">Value</label>
                  <div class="col-sm-3"><input type="text" name="specificationsvalue[]" class="form-control"></div>
                  <div class="col-sm-2"><button type="button" class="btn btn-danger btn-sm float-end deletespec "><i class="bi bi-trash"></i></button></div>
                </div>`;
        $('.spece-container').after(spec);
    });

    $('.addres').click(function(){
      var spec=`<div class="row mt-2 ">
                  
                  <label for="inputNumber" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-3"><input type="text" name="resources[]" class="form-control autocomplete"></div>
                  <label for="inputNumber" class="col-sm-2 col-form-label">Value</label>
                  <div class="col-sm-3"><input type="text" name="resourcesvalue[]" class="form-control"></div>
                  <div class="col-sm-2"><button type="button" class="btn btn-danger btn-sm float-end deleteres "><i class="bi bi-trash"></i></button></div>
                </div>`;
        $('.res-container').after(spec);
    });

    $('.addaccess').click(function(){
      var spec=`<div class="row mt-2 ">
                  
                  <label for="inputNumber" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-3"><input type="text" name="accessories[]" class="form-control autocomplete"></div>
                  <label for="inputNumber" class="col-sm-2 col-form-label">Value</label>
                  <div class="col-sm-3"><input type="text" name="accessoriesvalue[]" class="form-control"></div>
                  <div class="col-sm-2"><button type="button" class="btn btn-danger btn-sm float-end deletaccess "><i class="bi bi-trash"></i></button></div>
                </div>`;
        $('.access-container').after(spec);
    });

    $('body').on('click','.deletespec,.deleteres,.deletaccess',function(){
     $(this).closest('.row').remove();
    });
    $('body').on('click','.deleteimage',function(){
      $(this).closest('.col-md-3').remove();
    });
    $('#productmedia').change(function(){
      var file_data = $('#productmedia').prop('files')[0];
      var form_data = new FormData();
      form_data.append('FileInput', file_data);
      form_data.append('path', "images/product");
      form_data.append('type', "productimage");
      form_data.append('_token', "{{csrf_token()}}");
      $.ajax({
          url: "{{route('imageuploader.imagesupload')}}", // point to server-side controller method
          dataType: 'json', // what to expect back from the server
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function (response) {
            if(response.status){
              var cart=`<div class="col-sm-6 col-md-3">
                    <div class="card ">
                    <input type="hidden" name="images[]" value="`+response.filename+`">
                    <img src="`+response.url+`" class="card-img-top" alt="...">
                    <div class="card-body text-center ">
                      <button type="button" class="btn btn-danger btn-sm mt-3 deleteimage"><i class="bi bi-trash"></i></button>
                     
                    </div>
                  </div>
                  </div>`;
                $('.imageitem').before(cart);
                $('#imageform').trigger('reset');
                $('#imagesortable').next('.text-danger').remove();
            }
          },
          error: function (response) {
              if(response.status==422 && typeof(response.responseJSON.errors) != "undefined" && typeof(response.responseJSON.errors.FileInput) != "undefined"){
                $('#imagesortable').after('<div class="text-danger">'+response.responseJSON.errors.FileInput.toString()+'</div>');                
              }else{
                $('#imagesortable').after('<div class="text-danger">'+response.responseJSON.message+'</div>');
              }
          }
      });
    });
  });
  var editorsHight = 500;
  var editorimageuploadurl = "{{route('imageuploader.imagesupload')}}";  
  var csrftoken = "{{csrf_token()}}";  
</script>

<script src="{{asset('/')}}assets/vendor/tinymce/tinymce.min.js"></script> 
<script type="text/javascript" src="{{asset('/')}}assets/js/fileuploader.js"></script> 
<script type="text/javascript" src="{{asset('/')}}assets/js/editors.js"></script>

<script type="text/javascript">
  $(document).on('keydown.autocomplete', '.autocomplete', function() {
    var txt = (this);
    $(this).autocomplete({
        source: "{{route('product.getspecifications')}}",
        minLength: 2
        
      });
    });
</script>
<script type="text/javascript" src="{{asset('/')}}assets/js/addvideo.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var bimage;
    $('body').on('click','.addblogimage',function(){
      bimage = $(this);
      $('#blogimagefile').click();
    });
    $('#blogimagefile').change(function(){
      var file_data = $('#blogimagefile').prop('files')[0];
      var form_data = new FormData();
      form_data.append('FileInput', file_data);
      form_data.append('path', "images/product");
      form_data.append('type', "productblogimage");
      form_data.append('_token', "{{csrf_token()}}");
      $.ajax({
          url: "{{route('imageuploader.imagesupload')}}", // point to server-side controller method
          dataType: 'json', // what to expect back from the server
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function (response) {
            if(response.status){
              bimage.find('input').val(response.filename);
              bimage.find('img').attr('src',response.url);

            }
            $('#blogimage')[0].reset();
          },
          error: function (response) {
              $('#msg').html(response); // display error response from the server
          }
      });
    });
    $('.addblog').click(function(){
      var spec=`<div class="row ">
                  <div class="col-md-12">
                    <div class="card p-3">
                      <div class="row">
                      <div class="col-sm-8">
                        <label for="inputEmail3" class="col-form-label">title</label>
                        <input type="text" name="blogtitle[]" class="form-control" placeholder="Title">
                        <label for="inputEmail3" class="col-form-label">Description</label>
                        <textarea class="form-control" name="blogdescription[]"></textarea>
                      </div>
                      <div class="col-sm-3">
                        <div class="card addblogimage mb-0">
                          <input type="hidden" name="blogimage[]" class="hiddenblogimage">
                          <img src="{{asset('/')}}images/product/productDefault.png" class="card-img-top" alt="...">
                          <div class="card-body text-center">
                            <button type="button" class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus"></i></button>
                          </div>
                        </div>
                      </div>
                     
                      <div class="col-sm-1"><button type="button" class="btn btn-danger btn-sm float-end deleteblogimage"><i class="bi bi-trash"></i></button></div>
                      </div>
                    </div>
                  </div>
                </div>

                    `;
        $('.bimagec').after(spec);
    });
    $('body').on('click','.deleteblogimage',function(){
     $(this).closest('.row').remove();
    });


    $('body').on('click','.addspecsheet',function(){
      bimage = $(this);
      $('#specsheetfile').click();
    });
    $('body').on('click','.deletespecsheet',function(){
      $(this).closest('.col-sm-3 ').remove();
      /*var speccontent = ` <div class="col-sm-12 "><button type="button" class="btn btn-primary btn-sm float-end addspecsheet mt-3"><i class="bi bi-plus"></i> Add spece sheet</button></div>`;
      $('#specsheet').html(speccontent);*/
    });
    $('#specsheetfile').change(function(){
      var file_data = $('#specsheetfile').prop('files')[0];
      var form_data = new FormData();
      form_data.append('FileInput', file_data);
      form_data.append('path', "specesheet");
      form_data.append('type', "pdf");
      form_data.append('_token', "{{csrf_token()}}");

      var rtype= bimage.data('type-id');
      var rfield= bimage.data('value-name');

      var ptitle = $('#product_title').val();
      var len = $('input[name="'+rfield+'[]"]').length;
      console.log(len);
      var file_name = rfield+' '+ptitle;

      if(len > 0){
        file_name += '-'+len;
      }
      form_data.append('file_name', file_name);

      $.ajax({
          url: "{{route('imageuploader.imagesupload')}}", // point to server-side controller method
          dataType: 'json', // what to expect back from the server
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function (response) {
            if(response.status){
              var speccontent = `<div class="col-sm-3 ">
                    <div class="card" >
                    <input type="hidden" name="`+rfield+`[]" value="`+response.filename+`">
                      <img class="specsheetimg" src="{{asset('specesheet/PDF_file_icon.webp')}}" alt="Card image cap">
                      <div class="card-body mt-3 text-center">
                        <a href="`+response.url+`" class="card-link mt-3" target="_blank">`+response.filename+`</a>
                      </div>
                      <div class="card-footer text-center">
                        <button type="button" class="btn btn-danger btn-sm deletespecsheet "><i class="bi bi-trash"></i> </button>
                      </div>
                    </div>
                  </div>`;
               $('#'+rtype).append(speccontent);  
            }else{
              if(typeof(response.errors.FileInput) != "undefined"){
                $('.addspecsheet').after('<div class="text-danger">'+response.errors.FileInput.toString()+'</div>');                
              }
              
            }
            $('#specsheetfrm')[0].reset();
          },
          error: function (response) {
              if(response.status==422 && typeof(response.responseJSON.errors) != "undefined" && typeof(response.responseJSON.errors.FileInput) != "undefined"){
                $('.addspecsheet').after('<div class="text-danger">'+response.responseJSON.errors.FileInput.toString()+'</div>');                
              }else{
                $('.addspecsheet').after('<div class="text-danger">'+response.responseJSON.message+'</div>');
              }
          }
      });
    });

    $('body').on('click','.addspecimage',function(){
      bimage = $(this);
      $('#specificationimagefile').click();
    });
    $('body').on('click','.deletespecimage',function(){
      bimage = $(this);
      $('.specificationimagecon').html(''); 
    });

    $('#specificationimagefile').change(function(){
      var file_data = $('#specificationimagefile').prop('files')[0];
      var form_data = new FormData();
      form_data.append('FileInput', file_data);
      form_data.append('path', "images/product");
      form_data.append('type', "specificationImage");
      form_data.append('_token', "{{csrf_token()}}");
      $.ajax({
          url: "{{route('imageuploader.imagesupload')}}", // point to server-side controller method
          dataType: 'json', // what to expect back from the server
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          type: 'post',
          success: function (response) {
            if(response.status){
              var speccontent = `<div class="col-sm-3 ">
                    <div class="card" >
                    <input type="hidden" name="speceimage" value="`+response.filename+`">
                      <img class="" src="`+response.url+`" alt="Card image cap">
                      
                      <div class="card-footer text-center">
                        <button type="button" class="btn btn-danger btn-sm deletespecimage "><i class="bi bi-trash"></i> </button>
                      </div>
                    </div>
                  </div>`;
               $('.specificationimagecon').html(speccontent);  
            }else{
              if(typeof(response.errors.FileInput) != "undefined"){
                $('.addspecsheet').after('<div class="text-danger">'+response.errors.FileInput.toString()+'</div>');                
              }
              
            }
            $('#specsheetfrm')[0].reset();
          },
          error: function (response) {
              if(response.status==422 && typeof(response.responseJSON.errors) != "undefined" && typeof(response.responseJSON.errors.FileInput) != "undefined"){
                $('.addspecsheet').after('<div class="text-danger">'+response.responseJSON.errors.FileInput.toString()+'</div>');                
              }else{
                $('.addspecsheet').after('<div class="text-danger">'+response.responseJSON.message+'</div>');
              }
          }
      });
    });

  })
</script>
@endsection
