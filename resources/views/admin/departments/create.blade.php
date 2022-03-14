@extends('admin.master')

@section('title', 'Departments | ' . env('APP_NAME'))

@section('styles')
<style>
    button.btn_remove {
    background: red;
    border: 0;
    color: #fff;
    width: 20px;
    height: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 2px;
    position: relative;
    top: 25px;
    font-size: 12px;
    opacity: .8;
}

button.btn_remove:hover {
    opacity: 1;
}
</style>
@stop

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">Add New Department</h1>
        <a href="#" onclick="history.back()" class="btn btn-outline-primary px-5">Return Back</a>
    </div>

    <div class="text-right">
        <span id="count">1</span> / 5 <button class="btn btn-primary btn-sm my-2" id="add_row">Add Row</button>
    </div>

    <form action="{{ route('admin.departments.store') }}" method="POST">
        @csrf

        <div class="item-wrapper">
            <div class="item">
                <div class="mb-3">
                    <label>English Name</label>
                    <input type="text" name="name_en[]" required placeholder="English Name" class="form-control" />
                </div>

                <div class="mb-3">
                    <label>Arabic Name</label>
                    <input type="text" name="name_ar[]" required placeholder="Arabic Name" class="form-control" />
                </div>
            </div>

        </div>

        <button class="btn btn-success">Add</button>
    </form>
@stop

@section('scripts')

<script>

    let row = `<div class="item">
                <button class="btn_remove"><i class="fas fa-times"></i></button>
                <hr>
                <div class="mb-3">
                    <label>English Name</label>
                    <input type="text" name="name_en[]" required placeholder="English Name" class="form-control" />
                </div>

                <div class="mb-3">
                    <label>Arabic Name</label>
                    <input type="text" name="name_ar[]" required placeholder="Arabic Name" class="form-control" />
                </div>
            </div>`;

    $('#add_row').click(function() {
        $('.item-wrapper').append(row);
        $('#count').html($('.item:not(".deleted")').length)
        if($('.item:not(".deleted")').length == 5) {
            $('#add_row').prop('disabled', 'true');
            $('#add_row').removeClass('btn-primary');
            $('#add_row').addClass('btn-danger');
            $('#count').addClass('text-danger');

        }
    })

    // $('.btn_remove').click(function() {
    //     alert(55)
    // })
    $('body').on('click', '.btn_remove', function(e) {
        e.preventDefault();

        // console.log($(this).parent().find('input').val());

        $(this).parent().fadeOut();
        $(this).parent().addClass('deleted');
        $(this).parent().find('input').prop('disabled', 'true');

        $('#count').html($('.item:not(".deleted")').length)
        if($('.item:not(".deleted")').length < 5) {
            $('#add_row').prop('disabled', false);
            $('#add_row').removeClass('btn-danger');
            $('#add_row').addClass('btn-primary');
            $('#count').removeClass('text-danger');
        }

    });
</script>

@stop
