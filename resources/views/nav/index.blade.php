@extends('layouts.app')


@section('content')
    <div class="box-title">
        <a href="/admin/nav/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add Nav Value</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Nav Chart Datatable (Total Records - {{$count}})</h5>
                    <form action="/admin/nav" method="get">
                        <div class="form-group row">
                            <label for="start" class="col-sm-1  control-label col-form-label">Start Date</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control datepicker-autoclose" id="start"
                                       placeholder="dd/mm/yyyy" value="{{old('start')}}"
                                       name="start">
                                @error('start')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-1 control-label col-form-label">End Date</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control datepicker-autoclose" id="end"
                                       placeholder="dd/mm/yyyy" value="{{old('end') ?? date('d/m/Y')}}"
                                       name="end">
                                @error('end')
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
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">PARENT</th>
                                <th scope="col">VALUE</th>
                                <th scope="col">CREATED AT</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nav as $key => $value)
                                <tr>
                                    <td>{{$value->parent->name}}</td>
                                    <td>{{$value->value}}</td>
                                    <td>{{$value->created_at->format('d/m/Y')}}</td>
                                    <td>
                                        <a href="/admin/nav/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This Nav Value?') == false ) return false;"
                                              action="/admin/nav/{{$value->id}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger btn-circle tooltip-danger"
                                                    style="padding: 10px"
                                                    data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination_block">
        {{ $nav->links() }}
    </div>
@endsection
