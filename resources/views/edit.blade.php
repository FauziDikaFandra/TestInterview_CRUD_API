@extends('Layout/main')

@section('container')
<div class="container">
<div class="table-responsive mt-3  shadow p-3 bg-white rounded">
<h2 class="mb-3 mt-3">Dashboard - Edit</h2>
<form action="#" method="post">
        <div class="form-row">         
            <div class="form-group col-md">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status">
                @if ($dashboard[0]->status === 'Active')
                    <option selected>Active</option>
                    <option>Inactive</option>
                @else
                    <option>Active</option>
                    <option selected>Inactive</option>
                @endif                  
                </select>
            </div>
            <div class="form-group col-md">
                <label for="vendor_code">Position</label>
                <input type="text" class="form-control" id="position" placeholder="Position User" name="position" value="{{$dashboard[0]->position}}">
            </div>
            <input type="hidden" id="user_id" value="{{$dashboard[0]->user_id}}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 pt-1">
                <button type="submit" id="edit" class="btn btn-primary mt-1"><span class="mr-2 mt-1" data-feather="save"> </span>Update</button>
            </div>
        </div>
    </form>
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
</div>
</div>

@endsection
