<div class="space-y-6">

    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $todo?->title)"
            autocomplete="title" placeholder="Title" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $todo?->description)"
            autocomplete="description" placeholder="Description" />
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
    <div>
        <x-input-label for="priority" :value="__('Priority')" />
        <select name="priority" id="priority">
            <option value="-2" {{ $todo && $todo->priority == -2 ? 'selected' : '' }}>Critical</option>
            <option value="-1" {{ $todo && $todo->priority == -1 ? 'selected' : '' }}>High</option>
            <option value="0" {{ $todo && $todo->priority == 0 ? 'selected' : '' }}>Normal</option>
            <option value="1" {{ $todo && $todo->priority == 1 ? 'selected' : '' }}>Low</option>
            <option value="2" {{ $todo && $todo->priority == 2 ? 'selected' : '' }}>Trivial</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('priority')" />
    </div>

    <div>
        <label for="completed">Completed:</label>
        <select name="completed" id="completed">
            <option value="0" {{ $todo && $todo->completed == 0 ? 'selected' : '' }}>False</option>
            <option value="1" {{ $todo && $todo->completed == 1 ? 'selected' : '' }}>True</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('completed')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>





