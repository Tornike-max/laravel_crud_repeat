<x-layout>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 p-4 text-white">
                <h2 class="text-2xl font-semibold">Profile Details</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Name</h3>
                    <p class="text-gray-600">{{ $user->name }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Email</h3>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-medium text-gray-700">Created At</h3>
                    <p class="text-gray-600">{{ $user->created_at }}</p>
                </div>

                <div class="mt-6 flex items-center">
                    <a href="{{route('users.edit',$user->id)}}"
                        class="inline-block bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:bg-blue-700 transition-colors duration-200">Edit</a>


                    <a href="{{route('users.index')}}"
                        class="inline-block bg-slate-400 text-slate-900 hover:text-slate-100 py-2 px-4 rounded-md shadow-md hover:bg-slate-500 transition-colors duration-200 ml-2">Cancel</a>

                </div>
            </div>
        </div>
    </div>
</x-layout>