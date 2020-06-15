@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/contacts" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Add New Contact</h4>
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="parent">Parent
                            </label>
                            <div class="col-sm-9">
                                <select class="select2 form-control custom-select" id="parent" name="parent_id"
                                        required>
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
                            <label for="Address"
                                   class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="Address"
                                          name="address">{{old('address')}}</textarea>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ola" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Address</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="ola" placeholder="Other Language Address"
                                          name="ola">{{old('ola')}}</textarea>
                                @error('ola')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Phone" placeholder="Phone"
                                       value="{{old('phone')}}" name="phone">
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Fax" class="col-sm-3 text-right control-label col-form-label">Fax</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Fax" placeholder="Fax"
                                       value="{{old('fax')}}" name="fax">
                                @error('fax')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Email" placeholder="Email"
                                       value="{{old('email')}}" name="email">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Website"
                                   class="col-sm-3 text-right control-label col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Website" placeholder="Website"
                                       value="{{old('website')}}" name="website">
                                @error('website')
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
                            <label class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="mine"
                                           name="mine" {{old('mine') ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="mine">My Contact</label>
                                </div>
                                @error('mine')
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
