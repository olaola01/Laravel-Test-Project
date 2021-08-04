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
                <form action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store') }}" method="POST">
                    @csrf
                    @if(isset($company))
                        @method('PUT')
                    @endif
                    <div class="card bg-secondary text-light mb-3">
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="name"><span class="FieldInfo">Company Name: </span></label>
                                <input class="form-control" type="text" name="name" placeholder="Type Company Name here" value="{{ isset($company) ? $company->name:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="email"><span class="FieldInfo">Company Email: </span></label>
                                <input class="form-control" type="email" name="email" placeholder="Type Company Email here" value="{{ isset($company) ? $company->email:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="website"><span class="FieldInfo">Website: </span></label>
                                <input class="form-control" type="text" name="website" placeholder="Type Company website here" value="{{ isset($company) ? $company->website:'' }}">
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a href="{{ route('home') }}" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back to Dashboard </a>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <button type="submit" name="submit" class="btn btn-success btn-block">
                                        <i class="fas fa-check"></i>  {{ isset($company) ? 'Update Company' :'Add Company' }} </button>
                                </div>
                            </div>
                            @isset($company)
                            <input type="hidden" value="{{ $company->id }}" name="company_id">
                            @endisset
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('header')
    {{ isset($company) ? 'Edit Company' : 'Create Company ' }}
@endsection


