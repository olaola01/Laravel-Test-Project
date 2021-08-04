<?php
/**
 * LaravelTest
 * Olamiposi
 * 04/08/2021
 * 01:49
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List of Employees') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($employees->count() > 0)
                            <table class="table table-stripped table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td style="font-size: 15px;">{{ $employee->first_name }}</td>
                                        <td style="font-size: 15px;">{{ $employee->last_name }}</td>
                                        <td style="font-size: 15px;">{{ $employee->email }}</td>
                                        <td style="font-size: 15px;">{{ $employee->phone }}</td>
                                        <td style="font-size: 15px;"><a class="btn btn-success btn-sm" href="{{ route('employee.edit', $employee->id) }}">Edit</a></td>
                                        <td style="font-size: 15px;"><button class="btn btn-danger btn-sm" onclick="handleDelete({{$employee->id}})">Delete</button></td>
                                    </tr>
                                </tbody>
                                @endforeach


                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="" method="POST" id="deleteEmployeeForm">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-bold"> Are you sure you want to delete this Employee?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                                                <button type="submit" class="btn btn-danger">Yes, delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{ $employees->links() }}

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
                    Manage Employee
                @endsection

                @section('scripts')
                    <script>
                        function handleDelete(id) {
                            let form = document.getElementById('deleteEmployeeForm')
                            form.action = '/employee/' + id
                            $('#deleteModal').modal('show')
                        }
                    </script>
@endsection
