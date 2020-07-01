@extends('layout.default')
@section('content')
<div id="wrapper">
    <h1>Update customer</h1>

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

    <form method="POST" action="{{ route('update', $customer) }}">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label" for="first_name">First name</label>
            <input class="form-control" id="first_name" name="first_name" value="{{ $customer->first_name }}"/>
        </div>
        <div class="field">
            <label class="label" for="last_name">Last name</label>
            <input class="form-control" id="last_name" name="last_name" value="{{ $customer->last_name }}"/>
        </div>
        <div class="field">
            <label class="label" for="email">Email</label>
            <input class="form-control" id="email" name="email" value="{{ $customer->email }}"/>
        </div>
        <div class="field">
            <label class="label" for="address">Address</label>
            <input class="form-control" id="address" name="address" value="{{ $customer->address }}"/>
        </div>
        <div class="field">
            <label class="label" for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender">
                <option value="1" {{ $customer->gender == 1 ? 'selected' : '' }}>Male</option>
                <option value="0" {{ $customer->gender == 0 ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="field is-grouped">
            <div class="field mt-2">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection
