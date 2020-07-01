@extends('layout.default')
@section('content')
<div id="wrapper">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->gender ? "Male" : "Female"  }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('edit', $customer->id) }}">View</a>
                        <form method="POST" action="{{ route('delete', $customer) }}">
                            @csrf
                            @method('DELETE')
                            <br/>
                            <button class="btn btn-primary"
                                onClick="
                                if(confirm('Customer will be deleted, proceed?')) {
                                    return true;
                                }
                                else{
                                    return false;
                                }
                                "
                                >Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No customer data list</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
