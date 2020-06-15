@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/currencies" method="post">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Currency Value</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="parent">Parent
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="parent" name="parent_id">
                                    @foreach($blogs as $key => $value)
                                        <option @if($value->id === $currency->parent_id) selected @endif
                                        value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="currency">Currency
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="currency" name="currency">
                                    @foreach($currencies as $key => $value)--}}
                                    <option @if($key === $currency->country) selected
                                            @endif value="{{$key}}">{{$key}}</option>
                                    @endforeach
                                </select>
                                @error('currency')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Value" class="col-sm-3 text-right control-label col-form-label">Value</label>
                            <div class="col-sm-9">
                                <input type="number" step="any" min="0.01" max="100.00" required class="form-control"
                                       id="Value" placeholder="Value"
                                       name="value" value="{{$currency->value}}">
                                @error('value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 text-right control-label col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker-autoclose" id="date"
                                       placeholder="dd/mm/yyyy" value="{{$currency->created_at->format('d/m/Y')}}"
                                       name="created_at">
                                @error('created_at')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" style="display: none">
                        <label for="id" class="col-sm-3 text-right control-label col-form-label">ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"
                                   id="id" placeholder="Value"
                                   name="id" value="{{$currency->id}}">
                            @error('id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
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
