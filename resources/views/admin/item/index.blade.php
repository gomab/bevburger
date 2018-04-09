@extends('layouts.app')

@section('title', 'Item')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@endpush


@section('content')
    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{ route('item.create') }}" class="btn btn-primary">Add New Item</a>

                    <!-- Success Message -->
                    @include('layouts.partial.msg')
                    <!-- End Success Msg -->

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Items</h4>
                            <!--<p class="card-category"> Here is a subtitle for this table</p>-->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width:100%">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Category Name
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Created At
                                            </th>
                                            <th>
                                                Updated At
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $key=>$item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name}}</td>
                                                <td><img class="img-responsive img-thumbnail" src="{{ asset('uploads/item/'.$item->image) }}" alt="{{ $item->image }}"></td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->price }}<strong>£</strong></td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->updated_at }}</td>
                                                <td><a class="btn btn-info btn-sm" href="{{ route('item.edit', $item->id) }}"><i class="material-icons">mode_edit</i></a>

                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('item.destroy', $item->id) }}" style="display: none;" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button class="btn btn-danger btn-sm" type="button" onclick="if(confirm('Confirmation suppression ?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $item->id }}').submit();
                                                    }else {
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
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            } );
        } );
    </script>
@endpush