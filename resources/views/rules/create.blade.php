@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/rule" method="post">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Add New Rule</h4>
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
                            <label for="oln" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="oln"
                                       placeholder="Other Language Name"
                                       name="oln" value="{{old('oln')}}">
                                @error('value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-sm-3 text-right control-label col-form-label">URL</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="url" placeholder="URL"
                                       name="url" value="{{old('url')}}">
                                @error('value')
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
                            <label class="col-sm-3 text-right control-label col-form-label"
                                   for="type">Type</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="type" name="type">
                                    <option @if(1 === old('type')) selected @endif value="1">Օրենք
                                    </option>
                                    <option @if(2 === old('type')) selected @endif value="2">Կանոնկարգ
                                    </option>
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
