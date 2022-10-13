@extends('layouts.admin-master', ['pageName'=> 'userImage', 'title' => 'Add user-image'])

@push('admin-css')
  
@endpush

@section('admin-content')


<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        @if(@$userImage)
                        <i class="fas fa-edit mr-1"></i>Update User Image
                        @else
                        <i class="fas fa-plus mr-1"></i>Add User Image
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ (@$userImage) ? route('user-image.index', $userImage->id) : route('user-image.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="old_image" value="{{ @$userImage->image }}">
                            <div class="row">
                                <div class="col-md-7 mb-2">
                                    <label for="name" class="mb-2"> User Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ @$userImage->name }}" class="form-control mb-2" id="name" placeholder="Enter User">
                                    @error('name') <span style="color: red">{{$message}}</span> @enderror


                                    <label for="address" class="mb-2"> User Address <span class="text-danger">*</span> </label>
                                    <textarea name="address" id="address" rows="4" class="form-control">{{ @$userImage->address }}</textarea>
                                    @error('address') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <div class="col-md-5 mb-2">
                                    <label for="user_image" class="mb-2">User Image</label>
                                    <input class="form-control" id="user_image" type="file" name="image" onchange="mainThambUrl(this)">
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="{{(@$userImage) ? asset($userImage->image) : asset('uploads/no.png') }}" id="mainThmb" style="width: 150px;height: 120px;">
                                    </div>
                                        @error('image') <span style="color: red">{{$message}}</span> @enderror
                                </div>
                            </div>

                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                    <button type="submit" class="btn btn-info">{{(@$userImage)?'Update':'Save'}}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card my-3">
                    <div class="card-header">
                        <i class="fas fa-list mr-1"></i>
                        User List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (@$userImage as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                        <td>{{ $item->address }}</td>
                                        
                                       
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    
</main>
@endsection

@push('admin-js')
<script>
   
</script>

<script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(150)
                  .height(120);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>

@endpush
