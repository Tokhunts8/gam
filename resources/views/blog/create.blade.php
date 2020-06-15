@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/blog" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Add New Blog</h4>
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
                            <label for="Description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="Description"
                                          name="description">{{old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="oln" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="oln" placeholder="Other Language Name"
                                       name="oln" value="{{old('oln')}}">
                                @error('oln')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="old" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="old" name="old">{{old('old')}}</textarea>
                                @error('old')
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
                            <label class="col-sm-3 text-right control-label col-form-label" for="parent">Parent
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="parent" name="parent_id">
                                    <option value="" @if(null === old('parent_id')) selected @endif>Չունի</option>
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
                            <label class="col-sm-3 text-right control-label col-form-label"
                                   for="section">Section</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="section" name="section">
                                    <option @if(1 === old('section')) selected @endif value="1">Մեր մասին
                                    </option>
                                    <option @if(2 === old('section')) selected @endif value="2">Մեր ֆոնդը
                                    </option>
                                </select>
                                @error('section')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="validatedCustomFile">Image
                                Or File Upload</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="image">
                                    <label class="custom-file-label" for="validatedCustomFile"
                                           style="width: 100%; height:36px;">Choose file...</label>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="type">type
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="type" name="type">
                                    @foreach($types as $key => $value)
                                        <option @if($value->id === old('type')) selected @endif
                                        value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
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
