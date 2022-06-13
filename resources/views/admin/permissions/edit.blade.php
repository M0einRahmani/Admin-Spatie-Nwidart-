<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.permissions.index') }}"
                       class="px-4 py-2 bg-green-700 hover:bg-green-500 text-white text-slate-100 rounded-md">صفحه
                        مجوزها</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2">
                        <form method="POST" action="{{ route('admin.permissions.update' , $permission) }}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6 mt-6 mb-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> عنوان مجوز </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" value="{{$permission->name}}"
                                           class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                </div>
                                @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <button type="submit"
                                        class="px-4 py-2 mt-6 bg-blue-500 text-white hover:bg-blue-700 rounded-md">ثبت
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-6 p-2 bg-slate-100 rounded-lg">
                        <h2 class="text-2xl font-semibold">نقش ها</h2>
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($permission->roles)
                                @foreach ($permission->roles as $permission_role)
                                    <form
                                          method="POST"
                                          action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                                          onsubmit="return confirm('آیا از حذف نقش مطمئن هستید؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-4 py-2 mx-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">{{ $permission_role->name }}</button>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                        <div class="max-w-xl mt-6">
                            <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                                @csrf
                                <div class="sm:col-span-6">
                                    <label for="role" class="block text-sm font-medium text-gray-700">نقش ها</label>
                                    <select id="role" name="role" autocomplete="role-name"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <button type="submit"
                                    class="px-4 text-white py-2 bg-green-500 hover:bg-green-700 rounded-md">تخصیص
                            </button>
                        </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
