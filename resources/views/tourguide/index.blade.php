@extends('layouts.app')

@section('template_title')
    Tourguide
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tourguide') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tourguides.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>User Id</th>
										<th>Profile Img</th>
										<th>Languages</th>
										<th>Bio</th>
										<th>Activities</th>
										<th>Rate</th>
										<th>Video</th>
										<th>Activity Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tourguides as $tourguide)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $tourguide->user_id }}</td>
											<td>{{ $tourguide->profileImg }}</td>
											<td>{{ $tourguide->languages }}</td>
											<td>{{ $tourguide->bio }}</td>
											<td>{{ $tourguide->activities }}</td>
											<td>{{ $tourguide->rate }}</td>
											<td>{{ $tourguide->video }}</td>
											<td>{{ $tourguide->activity_id }}</td>

                                            <td>
                                                <form action="{{ route('tourguides.destroy',$tourguide->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tourguides.show',$tourguide->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tourguides.edit',$tourguide->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $tourguides->links() !!}
            </div>
        </div>
    </div>
@endsection
