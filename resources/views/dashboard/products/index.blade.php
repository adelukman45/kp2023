@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Products</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <div class="d-flex justify-content-beetwen">

            <a href="/dashboard/products/create" class="btn btn-primary mb-3">Create New Product</a>
            <div class="col-md-9 d-flex justify-content-end">
                <form action="/dashboard/products">
                    <div class="input-group mb-1">
                        <input type="search" class="form-control" placeholder="Search..." name="keyword"
                            value="{{ request('keyword') }}">
                        <button class="btn btn-secondary" type="submit"><span data-feather="search"></span></i></button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($products->count() > 0)
                    @foreach ($products as $key => $post)
                        <tr>
                            <td>{{ $products->firstItem() + $key }}</td>
                            <td>{{ $post->name }}</td>
                            <td>
                                <a href="/dashboard/products/{{ $post->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>
                                <a href="/dashboard/products/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/products/{{ $post->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Are you sure ?')"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-muted text-center" colspan="3">Data Tidak Ditemukan</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $products->links() }}
        </div>
    </div>
@endsection
