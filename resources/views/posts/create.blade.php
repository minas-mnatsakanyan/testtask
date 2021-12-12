<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf


            <div>
                <x-label for="Title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>
            <div>
                <x-label for="Slug" :value="__('Slug')" />

                <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="content" :value="__('Content')" />
				<div class="form-text-container " >
				<textarea name="content"
				id="content"
				class="form-input form-text rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" rows="3"></textarea>
				</div>

            </div>
			<div class="mt-4">
                <x-label for="website_key" :value="__('Website')" />
				<div class="form-text-container " >
				<select name="website_key"
				id="website_key"
				class="form-input form-text rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" rows="3">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				</select>
				</div>

            </div>



            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-3">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
