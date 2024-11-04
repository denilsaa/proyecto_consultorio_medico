<button {{ $attributes->merge(['class' => 'text-white hover:text-white bg-blue-500 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center me-2 dark:border-blue-500 dark:text-gray-100 dark:hover:text-black dark:hover:bg-blue-500 dark:focus:ring-blue-800 transition-all duration-200']) }}>
    {{ $slot }}
</button>
