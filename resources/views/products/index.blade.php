@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Products</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @push('scripts')
        <script>
            $(document).on('click', '.delete-product', function () {
                var userId = $(this).data('id');
                var url = '{{ route("products.destroy", ":id") }}';
                url = url.replace(':id', userId);

                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            $('#products-table').DataTable().ajax.reload(null, false);
                            alert(response.message);
                        },
                        error: function (xhr) {

                            // Try to parse JSON response if available
                            try {
                                var response = JSON.parse(xhr.responseText);
                                let errorMessage="";

                                if (response.message) {
                                    errorMessage = response.message; // Use the error message from JSON response
                                } else if (response.error) {
                                    errorMessage = response.error; // Alternatively, use the error field
                                }else{
                                    errorMessage="Something went wrong!";
                                }
                                alert(errorMessage);
                            } catch (e) {
                                // If JSON parsing fails, use a fallback message
                                alert("Something went wrong!");
                            }

                        }
                    });
                }
            });
        </script>
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
@endpush
