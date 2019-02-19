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
                            <h4 class="card-title ">All Reservation</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Name </th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>time &amp; date</th>
                                    <th>message</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>

                                        @foreach($reservations as $key=>$reservation)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $reservation->name }}</td>
                                                <td>{{ $reservation->phone }}</td>
                                                <td>{{ $reservation->email }}</td>
                                                <td>{{ $reservation->date_and_time }}</td>
                                                <td>{{ $reservation->message }}</td>
                                                @if($reservation->status==true)
                                                <td class="bg-success"> <span >Confirmed</span></td>
                                                @else
                                                <td class="bg-danger"> <span >Not Confirmed</span></td>
                                                @endif
                                                <td>{{ $reservation->created_at }}</td>
                                                <td>{{ $reservation->updated_at }}</td>
                                                <td>
                                                    @if($reservation->status == false)
                                                        <form method="post" style="display: none;" id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status',$reservation->id) }}">
                                                            @csrf
                                                        </form>
                                                        <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Varified By Phone ?'))
                                                                {
                                                                event.preventDefault();
                                                                document.getElementById('status-form-{{ $reservation->id}}').submit();

                                                                }
                                                                else {
                                                                event.preventDefault();

                                                                }
                                                                ">
                                                            <i class="material-icons">done</i>
                                                        </button>

                                                    @endif

                                                        <form method="post" style="display: none;" id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy',$reservation->id) }}">
                                                            @csrf
                                                            @method('DELETE');
                                                        </form>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure ? You want to delete this ?'))
                                                                {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $reservation->id}}').submit();

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