@extends('layouts.app')


@section('content')
    <div class="box-title">
        <a href="/admin/workers/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add Workers</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Workers Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">PARENT</th>
                                <th scope="col">NAME</th>
                                <th scope="col">SURNAME</th>
                                <th scope="col">POSITION</th>
                                <th scope="col">OTHER LANGUAGE NAME</th>
                                <th scope="col">OTHER LANGUAGE SURNAME</th>
                                <th scope="col">OTHER LANGUAGE POSITION</th>
                                <th scope="col">ORDER</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($workers as $key => $value)
                                <tr>
                                    <td>{{$value->parent->name ?? ''}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->surname}}</td>
                                    <td>{{$value->position}}</td>
                                    <td>{{$value->oln}}</td>
                                    <td>{{$value->ols}}</td>
                                    <td>{{$value->olp}}</td>
                                    <td>{{$value->order}}</td>
                                    <td>
                                        @if($value->image)
                                            <img src="{{asset($value->image)}}"
                                                 class="blog-image"
                                                 alt="image">
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/workers/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This Worker?') == false ) return false;"
                                              action="/admin/workers/{{$value->id}}" method="post">
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
        {{ $workers->links() }}
    </div>
@endsection
