@extends('layouts.portal')

@section('content')
<div class="container">
    <?php  ?>
    <div class="row justify-content-center text-center">
        <div class="col-10">
            <div class="mt-2 mb-5">

                <h4 class="text-success"> Edit Item Quanity</h4>
            </div>
            <table class="table">
                <thead>
                    <tr>

                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="/updatqty/{{$items->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <td class="col-5">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{old('quantity',$items->qty)}}">
                                @error('quantity')
                                <div class="text-danger">
                                    <p>{{$message}}</p>
                                </div>
                                @enderror
                                <input type="hidden" class="form-control" id="price" name="price" value="{{old('price',$items->price)}}">
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary btn-sm" name="savechange" value="Save changes">
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection