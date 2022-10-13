@extends('layouts.admin-master', ['pageName'=> 'userImage', 'title' => 'Add user-image'])

@push('admin-css')
  
@endpush

@section('admin-content')


<main id="myuser">
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
                        <form @submit.prevent="saveData">
                            @csrf
                            
                            {{-- <input type="hidden" name="old_image" value="{{ @$userImage->image }}"> --}}
                            <div class="row">
                                <div class="col-md-7 mb-2">
                                    <label for="name" class="mb-2"> User Name <span class="text-danger">*</span> </label>
                                    {{-- <input type="text" name="name" value="{{ @$userImage->name }}" class="form-control mb-2" id="name" placeholder="Enter User"> --}}
                                    <input type="text" class="form-control mb-2" v-model="myuser.name">
                                    @error('name') <span style="color: red">{{$message}}</span> @enderror


                                    <label for="address" class="mb-2"> User Address <span class="text-danger">*</span> </label>
                                    {{-- <textarea name="address" id="address" rows="4" class="form-control">{{ @$userImage->address }}</textarea> --}}
                                    <textarea rows="4" class="form-control" v-model="myuser.address"></textarea>
                                    @error('address') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <div class="col-md-5 mb-2">
                                    <label for="user_image" class="mb-2">User Image</label>
                                    <input class="form-control image" id="user_image" type="file" onchange="mainThambUrl(this)">
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
<script src="{{ asset('admin/js/vue/vue.min.js') }}"></script>
<script src="{{ asset('admin/js/vue/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/vue/vue-select.min.js') }}"></script>
<script src="{{ asset('admin/js/vue/moment.min.js') }}"></script>
<script>
    Vue.component('v-select', VueSelect.VueSelect);
    const app = new Vue({
        el: '#myuser',
        data() {
            return {
                myuser: {  
                    // id: parseInt({{ $id ?? '' }}),       
                    name: '',
                    address: '',
                },
                imageUrl: '',
				selectedFile: null,
            }
        },

        created(){
           
        },
        methods: {    
            previewImage(){
				if(event.target.files.length > 0){
					this.selectedFile = event.target.files[0];
					this.imageUrl = URL.createObjectURL(this.selectedFile);
				} else {
					this.selectedFile = null;
					this.imageUrl = null;
				}
			},
            saveData(){
                let fd = new FormData();
                // fd.append('image', this.selectedFile);
                fd.append('data', JSON.stringify(this.myuser));

                let url = '/user-store';
                // if(this.myuser.id != 0){
                //     url = '/user-store';
                // }       

                axios.post(url , fd)
                .then(res => {
                    alert(res.data.message);
                    if(res.data.success){
                        // if(this.myuser.id != 0){
                        //     window.location.href = "/userimage-list";
                        // }
                        this.resetForm();
                    }
                })
                .catch(err => {
                    console.log(err.response.data.message)
                })
            },
            resetForm() {
                this.myuser.name = '';
                this.myuser.address = '';
            }
        }
    })
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
