@extends('layouts.app')


@section('content')

    <div class="box-title">
        <a href="/admin/contacts/create" class="box-title m-b-20 btn btn-success"><i
                class="glyphicon glyphicon-plus"></i> Add Contact</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contacts Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">PARENT</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">OTHER LANGUAGE DESCRIPTION</th>
                                <th scope="col">ADDRESS</th>
                                <th scope="col">OTHER LANGUAGE ADDRESS</th>
                                <th scope="col">PHONE</th>
                                <th scope="col">FAX</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">WEBSITE</th>
                                <th scope="col">ORDER</th>
                                <th scope="col">MY CONTACT</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $key => $value)
                                <tr>
                                    <td>{{$value->parent->name}}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{!! $value->old !!}</td>
                                    <td>{!! $value->address !!}</td>
                                    <td>{!! $value->ola !!}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>{{$value->fax}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->website}}</td>
                                    <td>{{$value->order}}</td>
                                    <td>{{$value->mine ? 'Yes' : 'No'}}</td>
                                    <td>
                                        <a href="/admin/contacts/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <form style="display: inline-block"
                                              onsubmit="if(confirm('Dou You Really Want To Delete This Contact?') == false ) return false;"
                                              action="/admin/contacts/{{$value->id}}" method="post">
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
        {{ $contacts->links() }}
    </div>
@endsection
