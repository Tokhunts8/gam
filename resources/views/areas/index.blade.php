@extends('layouts.app')


@section('content')
    <div class="box-title">
        <a href="/admin/areas/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add Area Value</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Areas Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">PARENT</th>
                                <th scope="col">NAME</th>
                                <th scope="col">OTHER LANGUAGE NAME</th>
                                <th scope="col">VALUE</th>
                                <th scope="col">CREATED AT</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($areas as $key => $value)
                                <tr>
                                    <td>{{$value->parent->name}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->oln}}</td>
                                    <td>{{$value->value}}</td>
                                    <td>{{$value->created_at->format('d/m/y')}}</td>
                                    <td>
                                        <a href="/admin/areas/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This Area Value?') == false ) return false;"
                                              action="/admin/areas/{{$value->id}}" method="post">
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
        {{ $areas->links() }}
    </div>
@endsection
