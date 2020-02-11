@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Oportunities</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th width="20%">Objective</th>
                                <th width="20%">Skills</th>
                                <th width="20%">Organizations</th>
                                <th width="20%">Location</th>
                                <th width="10%">Deadline</th>
                                </thead>
                                <tbody>
                                @foreach($results->results as $result)
                                    <tr>
                                        <td>
                                            <a href="/opportunity/{{$result->id}}">
                                                {!! $result->objective !!}}
                                            </a>
                                        </td>
                                        <td>
                                            @foreach( $result->skills as $skill)
                                                <span>{{$skill->name}}</span>,
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach( $result->organizations as $organization)
                                                <span>{{$organization->name}}</span>,
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach( $result->locations as $location)
                                                <span>{{$location}}</span>,
                                            @endforeach
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::parse($result->deadline)->toDateString()}}
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