@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">My profile</h4>
                        </div>
                        <div class="card-body">
                            <h3>Strengths</h3>
                            <p>
                                @foreach($profile->strengths as $strength)
                                    <span>{{$strength->name}}</span>,
                                @endforeach
                            </p>
                            <br/>
                            <h3>Interests</h3>
                            <p>
                                @foreach($profile->interests as $interest)
                                    <span>{{$interest->name}}</span>,
                                @endforeach
                            </p>
                            <br/>
                            <h3>Experiences</h3>
                            <ul>
                                @foreach($profile->experiences as $experience)
                                    <li>
                                        <small>{{$experience->category}}</small>
                                        <h4>{{$experience->name}}</h4>
                                        <p>
                                            @if(property_exists($experience,'fromMonth'))
                                                <small>{{$experience->fromMonth}}/{{$experience->fromYear}} </small>
                                            @endif
                                            -
                                            @if(property_exists($experience,'toMonth'))
                                                <small>{{$experience->toMonth}}/{{$experience->toYear}}</small>
                                            @endif
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                            <br/>
                            <h3>Jobs</h3>
                            <ul>
                                @foreach($profile->jobs as $job)
                                    <li>
                                        <small>{{$job->category}}</small>
                                        <h4>{{$job->name}}</h4>
                                        <p>
                                            @if(property_exists($job,'additionalInfo'))
                                                {!! $job->additionalInfo !!}
                                            @endif
                                            @if(property_exists($job,'fromMonth'))
                                                <small>{{$job->fromMonth}}/{{$job->fromYear}} </small>
                                            @endif
                                            -
                                            @if(property_exists($job,'toMonth'))
                                                <small>{{$job->toMonth}}/{{$job->toYear}}</small>
                                            @endif
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="javascript:;">
                                <img class="img" src="{{$profile->person->picture}}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray">{{$profile->person->professionalHeadline}}</h6>
                            <h4 class="card-title">{{$profile->person->name}}</h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">My Network</h4>
                        </div>
                        <div class="card-body">
                            @foreach($persons as $person)
                                <div class="row">

                                    <div class="col-sm-4">
                                        @if(property_exists($person->metadata, 'picture'))
                                            <img style="width: 100px;height: 100px;border-radius: 50%"
                                                 src="{{$person->metadata->picture}}"/>
                                        @endif
                                    </div>
                                    <div class="col-sm-8">
                                        <p>
                                            <a href="{{url('/profile/'.$person->metadata->publicId)}}">{{$person->metadata->name}}  </a><br/>
                                            @if(property_exists($person->metadata, 'role'))
                                                <small>{{$person->metadata->role}}</small>
                                            @endif
                                        </p>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection