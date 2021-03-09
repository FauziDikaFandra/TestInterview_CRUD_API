@extends('Layout/main')

@section('container')
<div class="container">
<div class="table-responsive mt-3  shadow p-3 bg-white rounded">
<h2 class="mb-3 mt-3">Dashboard - Create</h2>
<form action="#" method="post">
        <div class="form-row">         
            <div class="form-group col-md">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status">
                    <option>Active</option>
                    <option>Inactive</option>                    
                </select>
            </div>
            <div class="form-group col-md">
                <label for="vendor_code">Position</label>
                <input type="text" class="form-control" id="position" placeholder="Position User" name="position">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 pt-1">
                <button type="submit" id="save" class="btn btn-primary mt-1"><span class="mr-2 mt-1" data-feather="save"> </span>Create</button>
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
