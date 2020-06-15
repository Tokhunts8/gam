@extends('layouts.app')


@section('content')
    <div class="box-title">
        <a href="/admin/about/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add Experience Or Education</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Experience Education Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th>PARENT</th>
                                <th>DESCRIPTION</th>
                                <th>OTHER LANGUAGE DESCRIPTION</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th>TYPE</th>
                                <th>ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expEd as $key => $value)
                                <tr>
                                    <td>{{"{$value->parent->name} {$value->parent->surname}" ?? ''}}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{!! $value->old !!}</td>
                                    <td>{{$value->from->format('d/m/Y')}}</td>
                                    <td>{{$value->to ? $value->to->format('d/m/Y') : ''}}</td>
                                    <td>{{$value->type === 1 ? 'Աշխատանք' : 'Ուսում'}}</td>
                                    <td>
                                        <a href="/admin/about/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This Experience Or Education Of Worker?') == false ) return false;"
                                              action="/admin/about/{{$value->id}}" method="post">
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
        {{ $expEd->links() }}
    </div>
@endsection
