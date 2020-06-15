@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/news/{{$news->id}}" method="post"
                      enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit The News</h4>
                        <div class="form-group row">
                            <label for="Title" class="col-sm-3 text-right control-label col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Title" placeholder="Title"
                                       name="title" value="{{$news->title}}">
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="Description"
                                          name="description">{{$news->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olt" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="olt"
                                       placeholder="Other Language Title"
                                       name="olt" value="{{$news->olt}}">
                                @error('olt')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="old" class="col-sm-3 text-right control-label col-form-label">Other
                                Language Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="old"
                                          name="old">{{$news->old}}</textarea>
                                @error('old')
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
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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
