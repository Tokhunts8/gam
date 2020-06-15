@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="/admin/company/{{ $company->id }}" method="post">
                    @method("PUT")
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Edit Company Name</h4>
                        <div class="form-group row">
                            <label for="Name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Name" placeholder="Name"
                                       name="name" value="{{$company->name}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="oln" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Name</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="oln" placeholder="Other Language
                                Name"
                                       name="oln" value="{{$company->oln}}">
                                @error('oln')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="About" class="col-sm-3 text-right control-label col-form-label">About</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="About" placeholder="About"
                                       name="menuAbout" value="{{$company->menuAbout}}">
                                @error('menuAbout')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olma" class="col-sm-3 text-right control-label col-form-label">Other Language
                                About</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olma" placeholder="Other Language
                                About"
                                       name="olma" value="{{$company->olma}}">
                                @error('olma')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Name"
                                   class="col-sm-3 text-right control-label col-form-label">Foundation</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="Name" placeholder="Foundation"
                                       name="menuFoundation" value="{{$company->menuFoundation}}">
                                @error('menuFoundation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olmf" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Foundation</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olmf" placeholder="Other Language
                                Foundation"
                                       name="olmf" value="{{$company->olmf}}">
                                @error('olmf')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="News"
                                   class="col-sm-3 text-right control-label col-form-label">News</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="News" placeholder="News"
                                       name="news" value="{{$company->news}}">
                                @error('news')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olnn" class="col-sm-3 text-right control-label col-form-label">Other Language
                                News</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olnn" placeholder="Other Language
                                News"
                                       name="olnn" value="{{$company->olnn}}">
                                @error('olnn')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newsMore"
                                   class="col-sm-3 text-right control-label col-form-label">More News</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="newsMore" placeholder="More News"
                                       name="newsMore" value="{{$company->newsMore}}">
                                @error('newsMore')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olnm" class="col-sm-3 text-right control-label col-form-label">Other Language
                                More News</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olnm" placeholder="Other Language
                                Foundation"
                                       name="olnm" value="{{$company->olnm}}">
                                @error('olnm')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact"
                                   class="col-sm-3 text-right control-label col-form-label">Contact</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="contact" placeholder="Contact"
                                       name="contact" value="{{$company->contact}}">
                                @error('contact')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olc" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Contact</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olc" placeholder="Other Language
                                Foundation"
                                       name="olc" value="{{$company->olc}}">
                                @error('olc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="links"
                                   class="col-sm-3 text-right control-label col-form-label">Useful Links</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="links" placeholder="Useful Links"
                                       name="links" value="{{$company->links}}">
                                @error('links')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="oll" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Useful Links</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="oll" placeholder="Other Language
                                Useful Links"
                                       name="oll" value="{{$company->oll}}">
                                @error('oll')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="settings"
                                   class="col-sm-3 text-right control-label col-form-label">Settings</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="settings" placeholder="Settings"
                                       name="settings" value="{{$company->settings}}">
                                @error('settings')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ols" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Settings</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="ols" placeholder="Other Language
                                Settings"
                                       name="ols" value="{{$company->ols}}">
                                @error('ols')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="law"
                                   class="col-sm-3 text-right control-label col-form-label">Laws</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="law" placeholder="Laws"
                                       name="law" value="{{$company->law}}">
                                @error('law')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ollaw" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Laws</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="ollaw" placeholder="Other Language
                                Laws"
                                       name="ollaw" value="{{$company->ollaw}}">
                                @error('ollaw')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rules"
                                   class="col-sm-3 text-right control-label col-form-label">Rules</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="rules" placeholder="Rules"
                                       name="rules" value="{{$company->rules}}">
                                @error('rules')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olr" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Rules</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olr" placeholder="Other Language
                                Rules"
                                       name="olr" value="{{$company->olr}}">
                                @error('olr')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="settingTitle" class="col-sm-3 text-right control-label col-form-label">Settings Title</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="settingTitle"
                                          name="settingTitle">{{$company->settingTitle}}</textarea>
                                @error('settingTitle')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olst"
                                   class="col-sm-3 text-right control-label col-form-label">Other Language Settings Title</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="olst"
                                          name="olst">{{$company->olst}}</textarea>
                                @error('olst')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="work"
                                   class="col-sm-3 text-right control-label col-form-label">Work</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="work" placeholder="Work"
                                       name="work" value="{{$company->work}}">
                                @error('work')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="olw" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Work</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="olw" placeholder="Other Language
                                Work"
                                       name="olw" value="{{$company->olw}}">
                                @error('olw')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education"
                                   class="col-sm-3 text-right control-label col-form-label">Education</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="education" placeholder="Education"
                                       name="education" value="{{$company->education}}">
                                @error('education')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ole" class="col-sm-3 text-right control-label col-form-label">Other Language
                                Education</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="ole" placeholder="Other Language
                                Education"
                                       name="ole" value="{{$company->ole}}">
                                @error('ole')
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
