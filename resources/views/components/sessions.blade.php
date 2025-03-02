@session('success')
    <div class="border p-4 bg-green-200 text-green-900">
        {{ session('success') }}
    </div>
@endsession


@session('error')
    <div class="border p-4 bg-red-200 text-red-900">
        {{ session('error') }}
    </div>
@endsession
