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
                        <form action="" method="POST">
                            @csrf
                            <td><input type="number" name="quantity" value="  echo $_REQUEST['cartqty'];"> </td>
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