@extends('layouts.admin')

@section('content')
    {{-- TABELLA CONTENENTE I DATI --}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" scope="col">
                                <h2 class="fw-bold">Id</h2>
                            </th>
                            <th class="bg-primary text-white" scope="col">
                                <h2 class="fw-bold">Title</h2>
                            </th>
                            <th class="bg-primary text-white" scope="col">
                                <h2 class="fw-bold">Slug</h2>
                            </th>
                            <th class="bg-primary text-white" scope="col">
                                <h2 class="fw-bold">Azioni</h2>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $post)
                            <tr>
                                <th class="bg-primary-subtle fw-bold" scope="row">{{ $post->id }}</th>
                                <td class="bg-primary-subtle fw-bold">{{ $post->name }}</td>
                                <td class="bg-primary-subtle fw-bold">{{ $post->slug }}</td>
                                <td class="bg-primary-subtle fw-bold">
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.tecnologies.show', $post->id) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('admin.tecnologies.edit', $post->id) }}"><i
                                            class="fas fa-pen"></i></a>
                                    <form class="d-inline-block delete-post-form"
                                        action="{{ route('admin.tecnologies.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.partials.modal_delete')
@endsection
