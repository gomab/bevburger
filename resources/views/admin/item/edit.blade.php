@extends('layouts.app')

@section('title', 'Item')

@push('css')

@endpush


@section('content')
    <!-- Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Validation errors -->
                     @include('layouts.partial.msg')
                    <!-- End validation errors -->
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Item</h4>
                            <!--<p class="card-category"> Here is a subtitle for this table</p>-->
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" id="category">Catégory</label>
                                            <select class="form-control" name="category" id="category">
                                                @foreach($categories as $category)
                                                    <option {{ $category->id == $item->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>
                                            <input type="number" name="price" class="form-control" value="{{ $item->price }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> Write Item Description.</label>
                                                <textarea class="form-control" rows="5" name="description">{{ $item->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="bmd-label-floating">Image</label><br>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>

                                <br><br>

                                <a class="btn btn-danger" href="{{route('item.index')}}">Back</a>

                                <button type="submit" class="btn btn-primary">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush