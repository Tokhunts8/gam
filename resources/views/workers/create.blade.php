@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/workers" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Add New Worker</h4>
                        <div class="form-group row">
                            <label for="Name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Name" placeholder="Name"
                                       name="name" value="{{old('name')}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Surname" class="col-sm-3 text-right control-label col-form-label">Surname</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Surname" placeholder="Surname"
                                       name="surname" value="{{old('surname')}}">
                                @error('surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-sm-3 text-right control-label col-form-label">Position</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="position" placeholder="Position"
                                       name="position" value="{{old('position')}}">
                                @error('position')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="oln" class="col-sm-3 text-right control-label col-form-label">Other Language Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="oln" placeholder="Other Language Name"
                                       name="oln" value="{{old('oln')}}">
                                @error('oln')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ols" class="col-sm-3 text-right control-label col-form-label">Other Language Surname</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ols" placeholder="Other Language Surname"
                                       name="ols" value="{{old('ols')}}">
                                @error('ols')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olp" class="col-sm-3 text-right control-label col-form-label">Other Language Position</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="olp" placeholder="Other Language Position"
                                       name="olp" value="{{old('olp')}}">
                                @error('olp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="parent">Parent
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="parent" name="parent_id" required>
                                    @foreach($blogs as $key => $value)
                                        <option @if($value->id === old('parent_id')) selected @endif
                                        value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Order" class="col-sm-3 text-right control-label col-form-label">Order</label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="Order" placeholder="Order"
                                       value="{{old('order')}}" name="order">
                                @error('order')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="validatedCustomFile">Image
                                Upload</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="image">
                                    <label class="custom-file-label" for="validatedCustomFile"
                                           style="width: 100%; height:36px;">Choose file...</label>
                                </div>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
