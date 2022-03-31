@extends('admin.master')

@section('title', 'Departments | ' . env('APP_NAME'))

@section('content')
{{--
<marquee  onmouseover="this.stop();" onmouseout="this.start();"> يرجى تسديد الرسوم والا سوف يتم اغلاق صفحة الطالب </marquee>

<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FVISIONPLUS.pal&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2994602260758546" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> --}}

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">{{ __('admin.Departments') }}</h1>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-outline-primary px-5">Add New</a>
    </div>

    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif

    {{ App()->currentLocale() }}

    <table class="table table-hover table-striped table-bordered">
        <tr class="bg-dark text-white">
            <th>ID</th>
            <th>{{ __('admin.Name') }}</th>
            {{-- <th>Arabic Name</th> --}}
            <th>{{ __('admin.Created At') }}</th>
            <th>{{ __('admin.Updated At') }}</th>
            <th>{{ __('admin.Actions') }}</th>
        </tr>

        @forelse ($departments as $dep)
        @php
            $name = 'name_'.App()->currentLocale();
        @endphp
            <tr id="row_{{ $dep->id }}">
                <td>{{ $dep->id }}</td>
                <td class="name_en"><a href="{{ route('admin.departments.show', $dep->slug) }}">{{ $dep->$name }}</a></td>
                {{-- <td class="name_ar">{{ $dep->name_ar }}</td> --}}
                <td>
                    {{-- {{ $dep->created_at->format('d F, Y') }} --}}
                    {{ $dep->created_at->diffForHumans() }}
                </td>
                <td>
                    {{-- {{ $dep->created_at->format('d F, Y') }} --}}
                    {{ $dep->updated_at->diffForHumans() }}
                </td>
                <td>
                    @can('update-department')
                    <a data-id="{{ $dep->id }}" data-toggle="modal" data-target="#editModal" class="btn btn-sm btn-primary btn_edit">{{ __('admin.Edit') }}</a>
                    @endcan

                    <form class="d-inline" action="{{ route('admin.departments.destroy', $dep->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger">{{ __('admin.Delete') }}</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center">No Data Found</td>
            </tr>
        @endforelse
    </table>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST">
            @csrf
            @method('put')
            <div class="modal-body">
                <input type="hidden" name="id" value="">
                <div class="mb-3">
                    <label>English Name</label>
                    <input name="name_en" id="edit_name_en" class="form-control" />
                </div>

                <div class="mb-3">
                    <label>Arabic Name</label>
                    <input name="name_ar" class="form-control" />
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    {{ $departments->links() }}

@stop


@section('scripts')

<script>
    $('.btn_edit').click(function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        var name_en = $(this).parents('tr').find('.name_en').text();
        var name_ar = $(this).parents('tr').find('.name_ar').text();
        var url = '{{ route("admin.departments.index") }}/'+id;

        $('#editModal form').attr('action', url);

        $('#editModal input[name=name_en]').val(name_en);
        $('#editModal input[name=name_ar]').val(name_ar);
        $('#editModal input[name=id]').val(id);

    })

    $('#editModal form').submit(function(e) {
        e.preventDefault();

        var new_name_en = $('#editModal input[name=name_en]').val();
        var new_name_ar = $('#editModal input[name=name_ar]').val();
        var id = $('#editModal input[name=id]').val();
        var url = $('#editModal form').attr('action');
        var data = $('#editModal form').serialize();

        // console.log(data);

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function() {
                $('#row_'+id).find('.name_en').text(new_name_en);
                $('#row_'+id).find('.name_ar').text(new_name_ar);

                $('#editModal').modal('hide');
            },
            error: function(err) {
                console.log(err);
            }
        })



    })
</script>

@stop
