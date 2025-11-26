<div class="flex flex-col gap-10">
    <div class="flex flex-col gap-2">
        <h3 class="text-2xl font-bold text-primary">Add Supervisor</h3>

        <form wire:submit.prevent="createSupervisor" class="space-y-4">
            {{-- Flash Message --}}
            @if (session()->has('feedback'))
                <div role="alert" class="alert alert-primary alert-soft">
                    <span>{{ session('feedback') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Supervisor Name</legend>
                    <input type="text" wire:model="fullName" class="input input-lg rounded-2xl w-full"
                        placeholder="Type here" />
                    @error('fullName')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Email Address</legend>
                    <input type="text" wire:model="emailAddress" class="input input-lg rounded-2xl w-full"
                        placeholder="Type here" />
                    @error('emailAddress')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Phone Number</legend>
                    <input type="text" wire:model="phoneNumber" class="input input-lg rounded-2xl w-full"
                        placeholder="Type here" />
                    @error('phoneNumber')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>
            </div>

            <button class="btn btn-primary">Add Supervisor</button>
        </form>
    </div>

    <div class="flex flex-col gap-2">
        <h3 class="text-2xl font-bold text-primary">Supervisor List</h3>

        <div class="overflow-x-auto rounded-xl border border-base-content/5 bg-base-100 my-4">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th class="uppercase">Full Name</th>
                        <th class="uppercase">Email Address</th>
                        <th class="uppercase">Phone Number</th>
                        <th class="uppercase">Account Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($supervisors->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No supervisors found!
                            </td>
                        </tr>
                    @else
                        @foreach ($supervisors as $supervisor)
                            <tr class="hover:bg-base-200">
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $supervisor->fullname }}</td>
                                <td>{{ $supervisor->email_address }}</td>
                                <td>{{ $supervisor->phone_number ?? '-- / --' }}</td>
                                <td class="inline-flex gap-2">
                                    <button wire:click="loadSupervisorData({{ $supervisor->id }})"
                                        class="btn btn-sm btn-soft border-primary border-dashed btn-primary">
                                        Edit
                                    </button>
                                    <button wire:click="deleteSupervisor({{ $supervisor->id }})"
                                        class="btn btn-sm btn-soft border-error border-dashed btn-error">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Open the modal using ID.showModal() method -->
    <dialog id="manageSupervisorModal" class="modal" wire:ignore.self>
        <div class="modal-box space-y-4 max-w-4xl">
            <h3 class="text-2xl font-bold text-primary">Manage Supervisor Data</h3>
            <form wire:submit.prevent="updateSupervisorData" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Supervisor Name</legend>
                        <input type="text" wire:model="editingFullName" class="input input-lg rounded-2xl w-full"
                            placeholder="Type here" />
                        @error('editingFullName')<p class="label text-primary">{{ $message }}</p>@enderror
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Email Address</legend>
                        <input type="text" wire:model="editingEmailAddress" class="input input-lg rounded-2xl w-full"
                            placeholder="Type here" />
                        @error('editingEmailAddress')<p class="label text-primary">{{ $message }}</p>@enderror
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Phone Number</legend>
                        <input type="text" wire:model="editingPhoneNumber" class="input input-lg rounded-2xl w-full"
                            placeholder="Type here" />
                        @error('editingPhoneNumber')<p class="label text-primary">{{ $message }}</p>@enderror
                    </fieldset>
                </div>

                <div class="flex items-center justify-between">
                    <button class="btn" type="reset"
                        wire:click="$dispatch('closeManageSupervisorModal')">Cancel</button>
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </dialog>
</div>