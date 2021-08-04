<?php
/**
 * LaravelTest
 * Olamiposi
 * 04/08/2021
 * 01:48
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.app')
@section('content')

    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
                @include('partials.errors')
                @include('partials.success')
                <form action="{{ isset($employee) ? route('employee.update', $employee->id) : route('employee.store') }}" method="POST">
                    @csrf
                    @if(isset($employee))
                        @method('PUT')
                    @endif
                    <div class="card bg-secondary text-light mb-3">
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="first_name"><span class="FieldInfo">First Name: </span></label>
                                <input class="form-control" type="text" name="first_name" placeholder="Type First Name here" value="{{ isset($employee) ? $employee->first_name:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="last_name"><span class="FieldInfo">Last Name: </span></label>
                                <input class="form-control" type="text" name="last_name" placeholder="Type First Name here" value="{{ isset($employee) ? $employee->last_name:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="email"><span class="FieldInfo">Email: </span></label>
                                <input class="form-control" type="email" name="email" placeholder="Type Email here" value="{{ isset($employee) ? $employee->email:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="company_id"><span class="FieldInfo">Company: </span></label>
                                <select class="form-control" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}"
                                                @isset($employee)
                                                @if($company->id == $employee->company_id)
                                                selected
                                            @endif
                                            @endisset
                                        >{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone"><span class="FieldInfo">Phone: </span></label>
                                <input class="form-control" type="number" name="phone" placeholder="Type Phone Number here" value="{{ isset($employee) ? $employee->phone:'' }}">
                            </div>


                            @isset($employee)
                                <input type="hidden" value="{{ $employee->id }}" name="employee_id">
                            @endisset
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a href="{{ route('home') }}" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back to Dashboard </a>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <button type="submit" class="btn btn-success btn-block">
                                        <i class="fas fa-check"></i>  {{ isset($employee) ? 'Update Employee' :'Add Employee' }} </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('header')
    {{ isset($employee) ? 'Edit Employee' : 'Create Employee ' }}
@endsection


