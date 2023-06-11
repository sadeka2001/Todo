@extends('layout')

@section('content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">My task</h4>
        </div>

        <div class="float-end">
            <a href="{{ route('create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
    <div class="clearfix"></div>
    @foreach ($task as $tasks)
        <div class="card mt-3">
            <div class="card-header">
                @if ($tasks->status === 'Todo')
                    {{ $tasks->tittle }}
                @else
                    <del>{{ $tasks->tittle }}</del>
                @endif
                <span class="badge rounded-pill text-bg-dark">{{ $tasks->created_at->diffForHumans() }}</span>

            </div>

            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">

                        @if ($tasks->status === 'Todo')
                            {{ $tasks->description }}
                        @else
                            <del>{{ $tasks->description }}</del>
                        @endif
                        <br>
                        @if ($tasks->status === 'Todo')
                            <span class="badge rounded-pill bg-info text-white">Todo</span>
                        @else
                            <span class="badge rounded-pill bg-success text-white">Done</span>
                        @endif

                        <small>Last updated at:{{ $tasks->updated_at->diffForHumans() }}</small>
                    </div>


                    <div class="float-end">
                        <a href="{{ route('edit', $tasks->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('delete', $tasks->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>

                    </div>
                    <div class="clearfix">

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
