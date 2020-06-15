@extends('layouts.app')


@section('content')
    <div class="box-title">
        <a href="/admin/news/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add News</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">News Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">TITLE</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">OTHER LANGUAGE TITLE</th>
                                <th scope="col">OTHER LANGUAGE DESCRIPTION</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $key => $value)
                                <tr>
                                    <td>{{$value->title}}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{{$value->olt}}</td>
                                    <td>{!! $value->old !!}</td>
                                    <td>
                                        <img src="{{asset($value->image)}}"
                                             class="blog-image"
                                             alt="image">
                                    </td>
                                    <td>
                                        <a href="/admin/news/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This News?') == false ) return false;"
                                              action="/admin/news/{{$value->id}}" method="post">
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
        {{ $news->links() }}
    </div>
@endsection
