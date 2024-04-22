@extends('admin.layouts.app', ['pageTitle' => 'Profile' . ' - ' . auth()->user()->name])
@section('content')

        <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <section>
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2 align-middle flex justify-center">
                                <div class="">
                                    <label for="imageUpload"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        <img id="avatarImage" class="object-cover rounded-full w-48 h-48 "
                                            src="{{ is_null(auth()->user()->picture) ? 'https://ui-avatars.com/api/?name=' . auth()->user()->name : getImage(auth()->user()->picture) }}"
                                            alt="Extra large avatar">
                                    </label>
                                    <input onchange="updateAvatar(this)" class="hidden" type="file" name="picture"
                                        accept=".jpeg,.png,.jpg,.gif" id="imageUpload">
                                    @error('name')
                                        <p id="imageUpload_outline_error"
                                            class="mt-2 text-xs text-red-600 dark:text-red-400 text-center">
                                            {{ $message }}</p>
                                    @enderror

                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Enter Your Fullname" required value="{{ auth()->user()->name }}">
                                @error('name')
                                    <p id="name_outline_error" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Enter Valid Email" required value="{{ auth()->user()->email }}">
                                @error('email')
                                    <p id="email_outline_error" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                <input type="phone" name="phone" id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Enter Valid Phone" value="{{ auth()->user()->phone }}">
                                @error('phone')
                                    <p id="phone_outline_error" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" rows="8" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Your description here">{{ auth()->user()->description }}</textarea>
                                @error('description')
                                    <p id="description_outline_error" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Save Changes
                        </button>
                    </form>
                </div>
            </section>
        </div>
        <div
            class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700  mt-8 mb-64">
            <section class="flex flex-col md:flex-row">
                <div class=" p-4 w-full">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2 relative">
                                <label for="current_password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                                    Password</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Enter Current Password" required>
                                @error('current_password')
                                    <p id="current_password_outline_error"
                                        class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="password_change"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                    Password</label>
                                <input type="password" name="password" id="password_change"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Enter New Password" required>
                                @error('password')
                                    <p id="password_change_outline_error" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm New
                                    Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Confirm New Password" required>
                                @error('password_confirmation')
                                    <p id="password_confirmation_outline_error"
                                        class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <button type="submit"
                            class="inline-flex items-center
                            px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Change Password
                        </button>
                    </form>
                </div>
                <div class="hidden md:block border-r px-4 border-gray-200 dark:border-gray-700"></div>
                {{-- Divier in mobile --}}
                <div class="md:hidden border-t mt-6 border-gray-200 dark:border-gray-700"></div>
                <div class="p-4 w-full">
                    {{-- destroy PROFILE --}}
                    <form action="{{ route('dashboard.profile.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Are you sure you want to delete your account?
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Please
                            enter your password to confirm you would like to permanently delete your account.
                        </p>
                        <div class="mt-4">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Enter Your Password" required>
                        </div>
                        @error('password')
                            <p id="password_outline_error" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}</p>
                        @enderror
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800">
                            Delete Profile
                        </button>
                    </form>
                </div>
            </section>
        </div>

@endsection
@section('script')
    <script>
        function updateAvatar(input) {
            if (!['image/jpeg', 'image/png', 'image/jpg', 'image/gif'].includes(input.files[0].type)) {
                return;
            }
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('avatarImage').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                // If no file is selected (cancelled), reset the image source to the default
                document.getElementById('avatarImage').src = "https://ui-avatars.com/api/?name={{ auth()->user()->name }}";
            }
        }
    </script>
@endsection
