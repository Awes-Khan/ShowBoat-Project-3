@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Entries</h1>
    <table id="form-entries-table" class="table table-striped">
        <thead>
            <tr>
                <th>Profile Image</th>
                <th>Profile Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>PAN Card Number</th>
                <th>Aadhar Card Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ( $formEntries as $entry )
            <tr>
            <td>{{$entry['profile_name']}}</td>
            <td>{{$entry['profile_image']}}</td>
            <td>{{$entry['email']}}</td>
            <td>{{$entry['address']}}</td>
            <td>{{$entry['pan_card_number']}}</td>
            <td>{{$entry['aadhar_card_numbers']}}</td>
            <td>
                <a href="{{route('admin.form-entry.edit', $entry->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{route('admin.form-entry.delete', $entry->id)}}" method="POST" style="display: inline">
                    {{method_field('DELETE')}} {{csrf_field()}}
                    <button type="submit" class="delete-entry btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
 --}}
            {{-- {{dd($entry->toArray(), $entry)}} --}}
            {{-- @endforeach --}}


        </tbody>
    </table>
</div>

<!-- DataTables CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



<script>
    //     $('.swal-delete').on('click', function(e) {
    //     e.preventDefault();
    //     var form = $(this).closest('form');
    
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: 'Once deleted, you will not be able to recover this form entry.',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#3085d6',
    //         confirmButtonText: 'Yes, delete it!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             form.submit();
    //         }
    //     });
    // });
    
            $(document).ready(function() {
                $('.delete-entry').on('click', confirmDelete);
                //     e.preventDefault();
                //     var form = $(this).closest('form');
                function confirmDelete(formEntryId) {
                    alert("insert");
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Once deleted, you will not be able to recover this form entry.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + formEntryId).submit();
                            // $('#delete-form').submit();
                        }
                    });
                }
                //     e.preventDefault();
                //     var form = $(this).closest('form');
                //     var title = $(this).data('title');
                //     var text = $(this).data('text');
                //     var confirmText = $(this).data('confirm-text');
                //     var cancelText = $(this).data('cancel-text');
    
                //     swal({
                //         title: title,
                //         text: text,
                //         icon: 'warning',
                //         buttons: {
                //             cancel: {
                //                 text: cancelText,
                //                 value: null,
                //                 visible: true,
                //                 className: 'btn btn-secondary'
                //             },
                //             confirm: {
                //                 text: confirmText,
                //                 value: true,
                //                 visible: true,
                //                 className: 'btn btn-danger'
                //             }
                //         }
                //     }).then(function(value) {
                //         if (value) {
                //             form.submit();
                //         }
                //     });
                });
            // });
        </script>
    <script>
    
$(document).ready(function() {
    // alert(' scrolling');
    $('#form-entries-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("admin.form-entries") }}',
            type: 'GET',
        },
        columns: [
            { 
                data: 'profile_image', 
                name: 'profile_image', 
                orderable: false, 
                searchable: false,
                render: function(data, type, full, meta) {
                    if (data) {

                        // <img src="avatar.png" alt="Avatar" class="avatar">
                        return '<img src="../storage/'+data+'" alt="Avatar" class="avatar" class="img-thumbnail" width="60" height="60" style="border-radius:50px" />';
                    } else {
                        return '';
                    }
                }
            },
            { data: 'profile_name', name: 'profile_name' },

            // { data: 'profile_image', name: 'profile_image' },
            { data: 'email', name: 'email' },
            { data: 'address', name: 'address' },
            { data: 'pan_card_number', name: 'pan_card_number' },
            { data: 'aadhar_card_number', name: 'aadhar_card_number' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false },
        ]
    });
});
</script>
@endsection
