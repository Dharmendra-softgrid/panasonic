@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
      <h1>Contacts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Contacts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section ">

<div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card">
            <div class="card-body">
              @include('admin.shared.displaymsg')
                <div class="d-flex justify-content-between mt-4">
                  
                  <h5 class="card-title ">Contacts</h5>
                  <div>
                  <a href="{{route('contact.export')}}" class="btn btn-primary"><i class="bi bi-save"></i> Export</a>
                  </div>
              
                </div>
                
                
              
              <table class="table table-bordered">
                <thead>
                  <tr>                    
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Industry</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @if($contacts->isNotEmpty())
                    @foreach($contacts as $i=>$contact)
                      <tr>
                        <td >{{$contact->fname.' '.$contact->lname}}</td>
                        <td >{{$contact->email}}</td>
                        <td >{{$contact->phone}}</td>
                        <td>{{$contact->city}}</td>                        
                        <td>{{$contact->comment}}</td>                        
                        <td>{{$contact->quantity}}</td>                        
                        <td>{{!empty($contact->industryName->title) ? $contact->industryName->title : ''}}</td>                        
                        <td>{{!empty($contact->categoryName->title) ? $contact->categoryName->title : '' }}</td>                        
                        <td>{{date('d M Y H:i:s',strtotime($contact->created_at))}}</td>                        
                        
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4" class="text-center">No record found</td>
                    </tr>
                  @endif

                </tbody>
              </table>
              {{ $contacts->links() }}

            </div>
          </div>
            </div><!-- End Recent Sales -->

            

          </div>
        </div><!-- End Left side columns -->

       

      </div>      
     
</section>
@endsection
@section('scripts')

@endsection