@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/assetAllocation" method="post">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Add New Asset Allocation</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="parent">Parent
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="parent" name="parent_id">
                                    @foreach($blogs as $key => $value)
                                        <option @if($value->id === old('parent_id') || ($parent && $value->id === $parent->parent_id)) selected @endif
                                        value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
                                <input type="text" class="form-control" id="oln" placeholder="Other Language Name"
                                       name="oln" value="{{old('oln')}}">
                                @error('oln')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Value" class="col-sm-3 text-right control-label col-form-label">Value</label>
                            <div class="col-sm-9">
                                <input type="number" step="any" min="0.01" max="100.00" required class="form-control"
                                       id="Value" placeholder="Value"
                                       name="value" value="{{old('value')}}">
                                @error('value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 text-right control-label col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker-autoclose" id="date"
                                       placeholder="dd/mm/yyyy" value="{{old('created_at') ?? date('d/m/Y')}}"
                                       name="created_at">
                                @error('created_at')
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
