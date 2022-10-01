{{-- <x-jet-confirmation-modal wire:model="confirmingClientDeletion">
    <x-slot name="title">
        {{ __('Delete Item') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete Item? ') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingClientDeletion', false)"
            wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteItem({{ $confirmingClientDeletion }})"
            wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal> --}}
