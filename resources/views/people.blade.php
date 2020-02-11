@extends('layouts.app', ['activePage' => 'people', 'titlePage' => __('people')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">People</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th width="10%">Image</th>
                                <th width="20%">Name</th>
                                <th width="20%">Location</th>
                                <th width="20%">Description</th>
                                <th width="20%">Skills</th>
                                </thead>
                                <tbody>
                                @foreach($results->results as $result)
                                    <tr>
                                        <td>
                                            <a href="{{url('/profile/'.$result->username)}}">
                                                <img src="{{$result->picture}}" style="width: 50%;border-radius: 50%">
                                            </a>
                                        </td>
                                        <td>
                                            {{$result->name}}
                                        </td>
                                        <td>
                                            {{$result->locationName}}
                                        </td>
                                        <td>
                                            {{$result->professionalHeadline}}
                                        </td>
                                        <td>
                                            @foreach( $result->skills as $skill)
                                                <span>{{$skill->name}}</span>,
                                            @endforeach
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
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush