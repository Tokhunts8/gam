@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/foundation/{{ $foundation->id }}" method="post">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Foundation Titles</h4>
                        <div class="form-group row">
                            <label for="asset" class="col-sm-3 text-right control-label col-form-label">Asset</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="asset" placeholder="Asset"
                                       name="asset" value="{{$foundation->asset}}">
                                @error('asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ola" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Asset</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="ola" placeholder="Other Language
                                Asset"
                                       name="ola" value="{{$foundation->ola}}">
                                @error('ola')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="areas" class="col-sm-3 text-right control-label col-form-label">Areas</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="areas" placeholder="Areas"
                                       name="areas" value="{{$foundation->areas}}">
                                @error('areas')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ols" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Areas</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="ols" placeholder="Other Language
                                Areas"
                                       name="ols" value="{{$foundation->ols}}">
                                @error('ols')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="currency"
                                   class="col-sm-3 text-right control-label col-form-label">Currency</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="currency" placeholder="Currency"
                                       name="currency" value="{{$foundation->currency}}">
                                @error('currency')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="oly" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Currency</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="oly" placeholder="Other Language
                                Currency"
                                       name="oly" value="{{$foundation->oly}}">
                                @error('oly')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maturity"
                                   class="col-sm-3 text-right control-label col-form-label">Maturity</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="maturity" placeholder="Maturity"
                                       name="maturity" value="{{$foundation->maturity}}">
                                @error('maturity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olm" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Maturity</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olm" placeholder="Other Language
                                Maturity"
                                       name="olm" value="{{$foundation->olm}}">
                                @error('olm')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country"
                                   class="col-sm-3 text-right control-label col-form-label">Country</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="country" placeholder="Country"
                                       name="country" value="{{$foundation->country}}">
                                @error('country')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olc" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Country</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olc" placeholder="Other Language
                                Country"
                                       name="olc" value="{{$foundation->olc}}">
                                @error('olc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastText" class="col-sm-3 text-right control-label col-form-label">Foundation Last Text</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="lastText"
                                          name="lastText">{{$foundation->lastText}}</textarea>
                                @error('lastText')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ollt"
                                   class="col-sm-3 text-right control-label col-form-label">Other Language Foundation Last Text</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="ollt"
                                          name="ollt">{{$foundation->ollt}}</textarea>
                                @error('ollt')
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
