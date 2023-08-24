<button {{ $attributes->merge(['type' => 'submit', 'class' => ' w-60 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-md']) }}>
    {{ $slot }}
</button>
