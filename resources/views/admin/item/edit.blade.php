@extends('layouts.app')

@section('title','ItemUpdate')

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
                            <h4 class="card-title ">Update A Item</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form action="{{route('item.update',$item->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter Item Name" name="name" value="{{ $item->name }}">
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select name="category" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option {{ $category->id == $item->category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                        {{--@if($category->id == $item->category_id)--}}
                                                            {{--<option value="{{ $category->id }}" selected>{{ $category->name }}</option>--}}
                                                        {{--@else--}}
                                                            {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                                                        {{--@endif--}}
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Enter Description">
                                                    {{ $item->description }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ $item->price }}">
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="{{asset('public/uploads/item/'.$item->image)}}" alt="{{$item->image}}" width="70" height="70">
                                            <br> <br>
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>


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