    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Client List
        </h2>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
                @endif
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                    <div class="pl-2">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input wire:model="search" type="text" id="table-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari dengan Kode...">
                        </div>

                    </div>
                </div>

                <button wire:click="create()" type="button"
                    class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">
                    {{ __('Add Client') }}
                </button>
            </div>

            <div class="mt-7 overflow-x-auto">
                {{-- <div class="items-center" wire:loading.table>
                    Loading...
                </div> --}}

                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Bandwidth</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3" align="center" valign="center">Expired</th>
                            <th class="px-4 py-3" style="width:7%">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($clients as $client)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    {{ $client->id }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $client->firstname }} {{ $client->lastname }}
                                            </p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $client->code }} > {{ $client->max_users }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ convertMegabit($client->bandwidth_down_kbps) }} -
                                    {{ convertMegabit($client->bandwidth_up_kbps) }}
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    {{ $client->price == 0 ? 'GRATIS' : 'Rp' . number_format($client->price) }}
                                </td>
                                <td class="px-4 py-3 text-sm" align="center" valign="center">
                                    {{-- <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Approved
                                </span> --}}
                                    {{ $client->expired }}
                                </td>
                                <td class="px-4 py-3" align="center" valign="center">
                                    <div class="flex items-center space-x-4 text-smcontent-center	">
                                        <button wire:click="edit({{ $client->id }})"
                                            class="items-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray content-center"
                                            aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button wire:click="confirmArticleDeletion({{ $client->id }}) "
                                            class="items-centerpx-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray content-center	"
                                            aria-label="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    {{-- {{ $clients->count() }} --}}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    @empty($search)
                        {{ $clients->links('clients.paginator') }}
                    @endempty
                </span>
            </div>
        </div>

        <x-jet-dialog-modal wire:model="isDelete">
            <x-slot name="title">
                {{ __('Hapus Client') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Yakin mau Hapus?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('isDelete', false)" wire:loading.attr="disabled">
                    {{ __('Batalkan') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete({{ $isDelete }})" wire:loading.attr="disabled">
                    {{ __('Hapus') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>



        <x-jet-dialog-modal wire:model="isModalOpen">
            <x-slot name="title">
                {{ isset($this->client->id) ? 'Edit Client' : 'Add Client' }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="firstname" value="{{ __('Firstname') }}" />
                        <x-jet-input id="firstname" type="text" class="mt-1 block w-full" wire:model.lazy="firstname"
                            placeholder="Ricki" />
                        <x-jet-input-error for="firstname" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
                        <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.lazy="lastname"
                            placeholder="Ajirasman" />
                        <x-jet-input-error for="lastname" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="code" value="{{ __('Code') }}" />
                        {{-- <input type="hidden" wire:model="oldcode"> --}}
                        <x-jet-input id="code" type="text" class="mt-1 block w-full" wire:model.lazy="code"
                            placeholder="kmzway87aa" />
                        <x-jet-input-error for="code" class="mt-2" required />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="max_users" value="{{ __('Max User') }}" />
                        <x-jet-input id="max_users" type="number" class="mt-1 block w-full" wire:model.lazy="max_users"
                            placeholder="6" required />
                        <x-jet-input-error for="max_users" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="bandwidth_down_kbps" value="{{ __('Download') }}" />
                        <x-jet-input id="bandwidth_down_kbps" type="number" class="mt-1 block w-full"
                            wire:model.lazy="bandwidth_down_kbps" placeholder="10000" required />
                        <x-jet-input-error for="bandwidth_down_kbps" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="bandwidth_up_kbps" value="{{ __('Upload') }}" />
                        <x-jet-input id="bandwidth_up_kbps" type="number" class="mt-1 block w-full"
                            wire:model.lazy="bandwidth_up_kbps" placeholder="1000" required />
                        <x-jet-input-error for="bandwidth_up_kbps" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="telepon" value="{{ __('Telepon') }}" />
                        <x-jet-input id="telepon" type="number" class="mt-1 block w-full" wire:model.lazy="telepon"
                            placeholder="6289514581444" required />
                        <x-jet-input-error for="telepon" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="price" value="{{ __('Harga') }}" />
                        <x-jet-input id="price" type="number" class="mt-1 block w-full" wire:model.lazy="price"
                            placeholder="150000" required />
                        <x-jet-input-error for="price" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-1">
                        <x-jet-label for="active" value="{{ __('Aktif') }}" />
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" wire:model.lazy="active" name="active">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <x-jet-input-error for="active" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-4 mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" wire:model.lazy="clean" name="clean" class="form-checkbox" />
                        <span class="ml-2 text-sm text-gray-600">Clean?</span>
                    </label>
                </div>


            </x-slot>

            <x-slot name="footer">
                <button wire:click="closeModal()" wire:loading.attr="disabled" type="button"
                    class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                    data-bs-dismiss="modal">
                    {{ __('Nevermind') }}
                </button>

                <button wire:click.prevent="store()" wire:loading.attr="disabled" type="button"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Save changes
                </button>
            </x-slot>
    </x-jet-dialog-modal>

    </div>
