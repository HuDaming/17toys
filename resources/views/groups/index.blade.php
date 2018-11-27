@extends('layouts.app')
@section('title', '圈子列表')

@section('content')
<div class="row">
    <div class="col-lg-9 col-md-9 topic-list">
        <div class="panel panel-default">

            <div class="panel-body">
                {{-- 话题列表 --}}
                @include('groups._group_list', ['groups' => $groups])
                {{-- 分页 --}}
                {!! $groups->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 sidebar">
        @include('topics._sidebar')
    </div>
</div>
@endsection