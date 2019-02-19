@extends('layouts.app')

@section('title','CreateCategory')

@push('styles')
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>
                                    <b> Danger - </b> {{ $error }}</span>
                                    </div>
                                @endforeach
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All New Category</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form action="{{route('category.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Category name" name="title">
                                            </div>
                                        </div>
                                    </div><br>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush