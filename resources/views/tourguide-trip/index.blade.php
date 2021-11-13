@extends('layouts.app')

@section('template_title')
    Tourguide Trip
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tourguide Trip') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tourguide-trips.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tourguide Id</th>
										<th>Title</th>
										<th>Description</th>
										<th>Activities</th>
										<th>Hours</th>
										<th>Fair</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tourguideTrips as $tourguideTrip)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tourguideTrip->tourguide_id }}</td>
											<td>{{ $tourguideTrip->title }}</td>
											<td>{{ $tourguideTrip->description }}</td>
											<td>{{ $tourguideTrip->activities }}</td>
											<td>{{ $tourguideTrip->hours }}</td>
											<td>{{ $tourguideTrip->fair }}</td>

                                            <td>
                                                <form action="{{ route('tourguide-trips.destroy',$tourguideTrip->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tourguide-trips.show',$tourguideTrip->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tourguide-trips.edit',$tourguideTrip->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tourguideTrips->links() !!}
            </div>
        </div>
    </div>
@endsection
