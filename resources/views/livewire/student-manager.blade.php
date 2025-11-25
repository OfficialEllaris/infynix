<div class="flex flex-col gap-10">
    <div class="flex flex-col gap-2">
        <h3 class="text-2xl font-bold text-primary">Add Student</h3>

        <form wire:submit.prevent="createStudent" class="space-y-4">
            {{-- Flash Message --}}
            @if (session()->has('feedback'))
                <div role="alert" class="alert alert-primary alert-soft">
                    <span>{{ session('feedback') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Student Name</legend>
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

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Assign Supervisor</legend>
                    <select class="select select-lg rounded-2xl w-full" wire:model="assignedSupervisor">
                        <option value="" selected>Pick a supervisor</option>
                        @foreach ($supervisors as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->fullname }}</option>
                        @endforeach
                    </select>
                    @error('assignedSupervisor')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>
            </div>

            <button class="btn btn-primary">Add Student</button>
        </form>
    </div>

    <div class="flex flex-col gap-2">
        <h3 class="text-2xl font-bold text-primary">Student List</h3>

        <div class="overflow-x-auto rounded-xl border border-base-content/5 bg-base-100 my-4">
            <table class="table text-center">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th class="uppercase">Full Name</th>
                        <th class="uppercase">Email Address</th>
                        <th class="uppercase">Phone Number</th>
                        <th class="uppercase">Supervisor</th>
                        <th class="uppercase">Account Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="hover:bg-base-200">
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $student->fullname }}</td>
                            <td>{{ $student->email_address }}</td>
                            <td>{{ $student->phone_number ?? '-- / --' }}</td>
                            <td>{{ $student->supervisor->fullname ?? 'N/A' }}</td>
                            <td class="inline-flex gap-2">
                                <button class="btn btn-sm btn-soft border-primary border-dashed btn-primary">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-soft border-error border-dashed btn-error">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>