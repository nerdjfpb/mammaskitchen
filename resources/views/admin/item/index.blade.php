@extends('layouts.app')

@section('title','Item')

@push('styles')
@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('item.create') }}" class="btn btn-info">Add New</a>
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
                            <h4 class="card-title ">All Item</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>

                                        @foreach($items as $key=>$item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td><img src="{{asset('public/uploads/item')}}/{{ $item->image }}" alt="{{ $item->image }}" width="50" height="50"></td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td><a href="{{ route('item.edit',$item->id) }}" class="btn btn-info btn-sm">
                                                        <i class="material-icons">mode_edit</i>
                                                    </a>
                                                    <form method="post" style="display: none;" id="delete-form-{{ $item->id }}" action="{{ route('item.destroy',$item->id) }}">
                                                        @csrf
                                                        @method('DELETE');
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure ? You want to delete this ?'))
                                                    {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $item->id}}').submit();

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