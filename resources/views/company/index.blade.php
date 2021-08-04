@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List of companies') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($companies->count() > 0)
                            <table class="table table-stripped table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Company Website</th>
                                    <th>Number of Employees under this Company</th>
                                    <th>Edit</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td style="font-size: 15px;">{{ $company->name }}</td>
                                        <td style="font-size: 15px;">{{ $company->email }}</td>
                                        <td style="font-size: 15px;">{{ $company->website }}</td>
                                        <td style="font-size: 15px">{{ \App\Employee::countEmployees($company->id) }}</td>
                                        <td style="font-size: 15px;"><a class="btn btn-success btn-sm" href="{{ route('companies.edit', $company->id) }}">Edit</a></td>
                                        <td style="font-size: 15px;"><button class="btn btn-danger btn-sm" onclick="handleDelete({{$company->id}})">Delete</button></td>
                                    </tr>
                                </tbody>
                                @endforeach


                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="" method="POST" id="deleteCompanyForm">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete Company</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-bold"> Are you sure you want to delete this Company?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                                                <button type="submit" class="btn btn-danger">Yes, delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{ $companies->links() }}

                        @else
                            <h3 class="text-center">No Available data</h3>
                        @endif
                    </div>
                </div>

                @endsection

                @section('css')
                    {{--        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">--}}
                    <link href="{{ asset('css/n.css') }}" rel="stylesheet">
                @endsection
                @section('header')
                    Manage Companies
@endsection

@section('scripts')
        <script>
            function handleDelete(id) {
                let form = document.getElementById('deleteCompanyForm')
                form.action = '/companies/' + id
                $('#deleteModal').modal('show')
            }
        </script>
@endsection
