@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Recent post sent to buffer</h3>
                <div class="activities">
                    <div class="filter-box">
                        <form>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="" placeholder="Search" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="" class="form-control datepicker" placeholder="Select Date">
                                </div>
                                <div class="col-md-3">
                                    <select name="" class="form-control">
                                        <option value="">Select Group</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Group Type</th>
                                <th>Account name</th>
                                <th>Post Text</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($posts)
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->groupInfo->name }}</td>
                                        <td>{{ $post->groupInfo->type }}</td>
                                        <td>
                                            <div class="avatar-media">
                                                <a href="#">
                                                    <span><i class="fa fa-{{ $post->account_service }}"></i></span>
                                                    <img src="{{ $post->accountInfo->avatar }}" alt="" class="media-object img-circle" width="50">
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $post->post_text }}</td>
                                        <td>{{ date('d M, Y h:i a', strtotime($post->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header-custom-styles')
    <style>
        .avatar-media a {
            position: relative;
        }

        .avatar-media a i.fa {
            position: absolute;
            top: 0;
            left: 35px;
            color: #fbfdff;
            background: #2196f3;
            border-radius: 50%;
            padding: 3px;
            z-index: 999;
            box-shadow: 0px 0px 0px 2px #fff;
        }

        .filter-box {
            padding: 0px 0px 15px 15px;
        }
    </style>
@endpush

