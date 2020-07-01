@extends('layout.default')
@section('content')
<div id="wrapper">
    <h1>Create customer</h1>

    @if ($message)
        <div class="alert alert-primary" role="alert">{{ $message }}</div>
    @endif

    @if ($errors->all())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                *{{ $error }}<br/>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('create') }}">
        @csrf
        <div class="field">
            <label class="label" for="first_name">First name</label>
            <input class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required/>
        </div>
        <div class="field">
            <label class="label" for="last_name">Last name</label>
            <input class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required/>
        </div>
        <div class="field">
            <label class="label" for="email">Email</label>
            <input class="form-control" id="email" name="email" value="{{ old('email') }}" required/>
        </div>
        <div class="field">
            <label class="label" for="address">Address</label>
            <input class="form-control" id="address" name="address" value="{{ old('address') }}" required/>
        </div>
        <div class="field">
            <label class="label" for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender"  required>
                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
                <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="field is-grouped">
            <div class="field mt-2">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
        </div>
    </form>
</div>
@endsection
