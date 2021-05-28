@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="card">
        <div class="card-header">Feedbacks</div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><i class="fas fa-user"></i> Nome</th>
                        <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-at"></i> Email</th>
                        <th scope="col"><i class="far fa-envelope-open"></i> Feedback</th>
                        <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-calendar-alt"></i> Data</th>
                        <th class="text-center" scope="col"><i class="fas fa-edit"></i> Ação</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($feedbacks as $key => $feedback)
                        <tr>
                            <th class="align-middle" scope="row"> {{ $key + 1 }}</th>
                            <td class="align-middle">{{ $feedback->nome }}</td>
                            <td class="align-middle d-none d-md-table-cell ">{{ $feedback->email }}</td>
                            <td class="align-middle">{{ $feedback->texto }}</td>
                            <td class="align-middle d-none d-md-table-cell ">{{ $feedback->updated_at->diffForHumans()}}</td>
                            <td class="">
                                <div class="justify-content-center d-flex">
                                    <form action="{{ route('admin.feedback.destroy', $feedback) }}" method="POST" class="">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
