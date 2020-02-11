@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Opportunity</h4>
                        </div>
                        <div class="card-body">
                            <h3>Strengths</h3>
                            <p>
                                @foreach($opportunity->strengths as $strength)
                                    <span>{{$strength->name}}</span>,
                                @endforeach
                            </p>
                            <br/>
                            <h3>Details</h3>
                            <p>
                                @foreach($opportunity->details as $detail)
                                    <span>{{$detail->content}}</span>,
                                @endforeach
                            </p>
                            <br/>
                            <h3>Languages</h3>
                            <p>
                                @foreach($opportunity->languages as $language)
                                    <span>{{$language->language->name  }}/ {{$language->fluency  }}</span>,
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="javascript:;">
                                <img class="img" src="{{$opportunity->owner->picture}}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">{{$opportunity->owner->professionalHeadline}}</h6>
                            <h4 class="card-title">{{$opportunity->owner->name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection