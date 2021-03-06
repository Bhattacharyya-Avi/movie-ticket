@extends('backend.master')

@section('contents')
<hr>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" margin-left: 15px; !important;">
    Add Category
</button>
<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">category list</h5>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->details}}</td>
                            <td>
                                
                                @if (!empty($category->deleted_at))
                                <a href="{{route('admin.category.restore',$category->id)}}"><i class="material-icons">settings_backup_restore</i></a>
                                
                                @else
                                <a href="{{route('admin.category.edit',$category->id)}}"><i class="material-icons">edit</i></a>
                                <a href="{{route('admin.category.delete',$category->id)}}"><i class="material-icons">delete</i></a>
                                @endif
                                
                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.category.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Category Name 
                        <span style="color: red">*</span>
                    </label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                    placeholder="category name">
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Category Details
                        <span style="color: red">*</span>
                    </label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
    </div>
</div>
</div>



{{-- </div> --}}

@endsection
