@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Company Datatable (Total Records - {{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">ASSET</th>
                                <th scope="col">OTHER LANGUAGE ASSET</th>
                                <th scope="col">AREAS</th>
                                <th scope="col">OTHER LANGUAGE AREAS</th>
                                <th scope="col">CURRENCY</th>
                                <th scope="col">OTHER LANGUAGE CURRENCY</th>
                                <th scope="col">MATURITY</th>
                                <th scope="col">OTHER LANGUAGE MATURITY</th>
                                <th scope="col">COUNTRY</th>
                                <th scope="col">OTHER LANGUAGE COUNTRY</th>
                                <th scope="col">FOUNDATION LAST TEXT</th>
                                <th scope="col">OTHER LANGUAGE FOUNDATION LAST TEXT</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($foundation as $key => $value)
                                <tr>
                                    <td>{{$value->asset}}</td>
                                    <td>{{$value->ola}}</td>
                                    <td>{{$value->areas}}</td>
                                    <td>{{$value->ols}}</td>
                                    <td>{{$value->currency}}</td>
                                    <td>{{$value->oly}}</td>
                                    <td>{{$value->maturity}}</td>
                                    <td>{{$value->olm}}</td>
                                    <td>{{$value->country}}</td>
                                    <td>{{$value->olc}}</td>
                                    <td>{!! $value->lastText !!}</td>
                                    <td>{!! $value->ollt !!}</td>
                                    <td>
                                        <a href="/admin/foundation/{{$value->id}}/edit" data-toggle="tooltip"
                                           data-placement="top"
                                           title="Edit" class="btn btn-primary btn-circle tooltip-primary"
                                           style="padding: 10px">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
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
@endsection
