@if (count($groups))

    <ul class="media-list">
        @foreach ($groups as $group)
            <li class="media">
                <div class="media-left">
                    <a href="{{ route('groups.show', [$group->id]) }}">
                        <img class="media-object img-thumbnail" style="width: 52px; height: 52px;" src="{{ $group->logo }}" title="{{ $group->title }}">
                    </a>
                </div>

                <div class="media-body">

                    <div class="media-heading">
                        <a href="{{ route('groups.show', [$group->id]) }}" title="{{ $group->name }}">
                            {{ $group->name }}
                        </a>
                        <a class="pull-right" href="{{ route('groups.show', [$group->id]) }}" >
                            <span class="badge"> {{ $group->member_count }} </span>
                        </a>
                    </div>

                    <div class="media-body meta">

                        <a href="#" title="{{ $group->category->name }}">
                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            {{ $group->category->name }}
                        </a>

                        @foreach($group->users as $user)
                            <span> • </span>
                            <a href="{{ route('users.show', [$user->id]) }}" title="{{ $user->name }}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            {{ $user->name }}
                            </a>
                        @endforeach

                        {{--<span> • </span>--}}
                        {{--<a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">--}}
                            {{--<span class="glyphicon glyphicon-user" aria-hidden="true"></span>--}}
                            {{--{{ $topic->user->name }}--}}
                        {{--</a>--}}
                        {{--<span> • </span>--}}
                        {{--<span class="glyphicon glyphicon-time" aria-hidden="true"></span>--}}
                        {{--<span class="timeago" title="最后活跃于">{{ $topic->updated_at->diffForHumans() }}</span>--}}
                    </div>

                </div>
            </li>

            @if ( ! $loop->last)
                <hr>
            @endif

        @endforeach
    </ul>

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif