@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/about/{{$expEd->id}}" method="post">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit The Experience Or Education</h4>
                        <div class="form-group row">
                            <label for="Description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="Description"
                                          name="description">{{$expEd->description}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="old" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="old" name="old">{{$expEd->old}}</textarea>
                                @error('old')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="From" class="col-sm-3 text-right control-label col-form-label">From</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker-autoclose" id="From"
                                       placeholder="dd/mm/yyyy" value="{{$expEd->from->format('d/m/Y')}}"
                                       name="from" required>
                                @error('from')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="To" class="col-sm-3 text-right control-label col-form-label">To</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker-autoclose" id="To"
                                       placeholder="dd/mm/yyyy"
                                       value="{{$expEd->to ? $expEd->to->format('d/m/Y') : ''}}"
                                       name="to">
                                @error('to')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="parent">Parent
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="parent" name="parent_id"
                                        required>
                                    @foreach($workers as $key => $value)
                                        <option @if($value->id === $expEd->parent_id) selected @endif
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
                                   for="Type">Type</label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="Type" name="type" required>
                                    <option @if(1 === $expEd->type) selected @endif value="1">Աշխատանք
                                    </option>
                                    <option @if(2 === $expEd->type) selected @endif value="2">Ուսում
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
