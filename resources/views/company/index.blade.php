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
                                <th scope="col">NAME</th>
                                <th scope="col">OTHER LANGUAGE NAME</th>
                                <th scope="col">ABOUT</th>
                                <th scope="col">OTHER LANGUAGE ABOUT</th>
                                <th scope="col">FOUNDATION</th>
                                <th scope="col">OTHER LANGUAGE FOUNDATION</th>
                                <th scope="col">NEWS</th>
                                <th scope="col">OTHER LANGUAGE NEWS</th>
                                <th scope="col">LOAD MORE</th>
                                <th scope="col">OTHER LANGUAGE LOAD MORE</th>
                                <th scope="col">CONTACT</th>
                                <th scope="col">OTHER LANGUAGE CONTACT</th>
                                <th scope="col">USEFUL LINKS</th>
                                <th scope="col">OTHER LANGUAGE USEFUL LINKS</th>
                                <th scope="col">SETTINGS</th>
                                <th scope="col">OTHER LANGUAGE SETTINGS</th>
                                <th scope="col">LAWS</th>
                                <th scope="col">OTHER LANGUAGE LAWS</th>
                                <th scope="col">RULES</th>
                                <th scope="col">OTHER LANGUAGE RULES</th>
                                <th scope="col">SETTINGS TITLE</th>
                                <th scope="col">OTHER LANGUAGE SETTINGS TITLE</th>
                                <th scope="col">WORK</th>
                                <th scope="col">OTHER LANGUAGE WORK</th>
                                <th scope="col">EDUCATION</th>
                                <th scope="col">OTHER LANGUAGE EDUCATION</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($company as $key => $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->oln}}</td>
                                    <td>{{$value->menuAbout}}</td>
                                    <td>{{$value->olma}}</td>
                                    <td>{{$value->menuFoundation}}</td>
                                    <td>{{$value->olmf}}</td>
                                    <td>{{$value->news}}</td>
                                    <td>{{$value->olnn}}</td>
                                    <td>{{$value->newsMore}}</td>
                                    <td>{{$value->olnm}}</td>
                                    <td>{{$value->contact}}</td>
                                    <td>{{$value->olc}}</td>
                                    <td>{{$value->links}}</td>
                                    <td>{{$value->oll}}</td>
                                    <td>{{$value->settings}}</td>
                                    <td>{{$value->ols}}</td>
                                    <td>{{$value->law}}</td>
                                    <td>{{$value->ollaw}}</td>
                                    <td>{{$value->rules}}</td>
                                    <td>{{$value->olr}}</td>
                                    <td>{!! $value->settingTitle !!}</td>
                                    <td>{!! $value->olst !!}</td>
                                    <td>{{$value->work}}</td>
                                    <td>{{$value->olw}}</td>
                                    <td>{{$value->education}}</td>
                                    <td>{{$value->ole}}</td>
                                    <td>
                                        <a href="/admin/company/{{$value->id}}/edit" data-toggle="tooltip"
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
