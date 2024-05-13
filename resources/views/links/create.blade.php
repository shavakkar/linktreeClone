@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">
                        Create a new Link
                    </h2>
                    <form action="/dashboard/links/new" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Link Name</label>
                                    <input type="text" id="name" name="name" class="form-control{{ $errors->first('name') ? ' is-invalid' : '' }}" placeholder="My Youtube Channel">

                                    @if($errors->first('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="link">Link Url</label>
                                    <input type="text" id="link" name="link" class="form-control{{ $errors->first('link') ? ' is-invalid' : '' }}" placeholder="https://youtube.com/user/my-channel">

                                    @if($errors->first('link'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('link') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Save Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Url</th>
            <th>Visits</th>
            <th>Last Visit</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($links as $link)
            <tr>
                <td>{{ $link->name }}</td>
                <td>
                    <a href="{{ $link->link }}">
                        {{ $link->link }}
                    </a>
                </td>
                <td>0</td>
                <td>Aug</td>
                <td>
                    <a href="/dashboard/links/{{ $link->id }}">
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/dashboard/links/new" class="btn btn-primary">Add Link</a> --}}