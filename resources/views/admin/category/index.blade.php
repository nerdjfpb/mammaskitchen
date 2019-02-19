@extends('layouts.app')

@section('title','Category')

@push('styles')
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('category.create') }}" class="btn btn-info">Add New</a>
                    @if (session('successMsg'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>
                                    <b> Message: </b> {{ session('successMsg') }}</span>
                            </div>
                    @endif
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Title </th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>

                                        @foreach($categories as $key=>$category)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>{{ $category->updated_at }}</td>
                                                <td><a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <form method="post" style="display: none;" id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}">
                                                        @csrf
                                                        @method('DELETE');
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure ? You want to delete this ?'))
                                                    {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $category->id}}').submit();

                                                    }
                                                    else {
                                                        event.preventDefault();

                                                    }
                                                        ">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </td>



                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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