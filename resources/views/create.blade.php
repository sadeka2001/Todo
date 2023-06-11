@extends('layout')

@section('content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">My task</h4>
        </div>

        <div class="float-end">
            <a href="{{ route('index') }}" class="btn btn-primary">All Task</a>
        </div>

        <div class="clearfix"></div>

    </div>

    <div class="card card-body bg-light p-4">

        <form action="{{ route('store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="tittle" class="form-label">Tittle</label>
                <input type="text" class="form-control" id="tittle" name="tittle">

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-label" id="description" name="description" rows="5"></textarea>
            </div>
            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-label>
                    @foreach ($statusis  as $status)
                        <option value="{{$status['value'] }}">{{$status['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
