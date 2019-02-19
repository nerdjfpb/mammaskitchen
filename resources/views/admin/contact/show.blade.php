@extends('layouts.app')

@section('title','Reservation')

@push('styles')
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Details About {{ $contact->name }}&#39;s Message</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <strong>Name:: {{ $contact->name }}</strong><br>
                                    <b>Email: {{ $contact->email }}</b> <br>
                                    <b>Subject: {{ $contact->subject }}</b> <br>
                                    <strong>Message:</strong>
                                    <hr>
                                    <p>
                                        {{ $contact->message }}
                                    </p>
                                    <hr>

                                </div>
                            </div>
                            <a href="{{ route('contact.index') }}" class="btn btn-danger">back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush