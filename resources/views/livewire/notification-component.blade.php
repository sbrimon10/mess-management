<div>
    @foreach ($notifications as $notification)
        <div class="bg-blue-500 text-white p-2 mb-2 rounded">
            {{ $notification->data['message'] }}
        </div>
    @endforeach
</div>
